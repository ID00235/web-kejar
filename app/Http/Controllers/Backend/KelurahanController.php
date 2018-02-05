<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use DB;
use Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Encryption\DecryptException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;

use App\Models\Kelurahan;
use Intervention\Image\ImageManagerStatic as Image;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.kelurahan.index',
            array("route"=>"kelurahan","subroute"=>"","kelurahan"=>Kelurahan::all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function baru()
    {
         return view('backend.kelurahan.baru',
            array("route"=>"kelurahan","subroute"=>""));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, ['nama' => 'required', 'alamat_kantor' => 'required', 'tipe'=>'required',
                                  'nama_lurah'=>'required','pejabat_kelurahan'=>'required','photo_kantor'=>'required',
                                  'photo_lurah'=>'required'
                                  ]);


        $filetime = time();
        $file = $request->file('photo_kantor');
        $extension = $file->getClientOriginalExtension();
        $photo_kantor = "kelurahan/kantor-"."$filetime".".".$extension;
        Image::make($request->file('photo_kantor'))->resize(600,null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($photo_kantor);


        $filetime = time();
        $file = $request->file('photo_lurah');
        $extension = $file->getClientOriginalExtension();
        $photo_lurah = "kelurahan/lurah-"."$filetime".".".$extension;
        Image::make($request->file('photo_lurah'))->resize(180,null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($photo_lurah);


        $data = array(
                "nama"=>$request->input('nama'),
                "tipe"=>$request->input('tipe'),
                "alamat_kantor"=>$request->input('alamat_kantor'),
                "nama_lurah"=>$request->input('nama_lurah'),
                "pejabat_kelurahan"=>$request->input('pejabat_kelurahan'),
                "photo_lurah"=>$photo_lurah,
                "photo_kantor"=>$photo_kantor,
                );

        $kelurahan = new Kelurahan;
        $kelurahan->nama = $data["nama"];
        $kelurahan->tipe = $data["tipe"];
        $kelurahan->alamat_kantor = $data["alamat_kantor"];
        $kelurahan->nama_lurah = $data["nama_lurah"];
        $kelurahan->pejabat_kelurahan = addClassTable($data["pejabat_kelurahan"]);
        $kelurahan->photo_lurah = $data["photo_lurah"];
        $kelurahan->photo_kantor = $data["photo_kantor"];
        $kelurahan->save();

        $request->session()->flash('notice', $data["nama"]." Berhasil Ditambahkan!");
        return redirect("admin/kelurahan/detail/".$kelurahan->gethashid());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $id = Hashids::decode($id)[0];
              
        $record = Kelurahan::find($id);
        if (!$record ){
            throw new HttpException(401);
        }
        
        return view('backend.kelurahan.detail',
            array("route"=>"kelurahan","subroute"=>"","kelurahan"=>$record));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Hashids::decode($id)[0];
        $record = Kelurahan::find($id);
        if (!$record){
            throw new HttpException(401);
        }
        return view('backend.kelurahan.edit',
            array("route"=>"kelurahan","subroute"=>"","record"=>$record));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $id = Crypt::decrypt($id);
        }catch (DecryptException $e) {
           throw new HttpException(401);
        }
              
        $record = Kelurahan::find($id);
        if (!$record){
            throw new HttpException(401);
        }

        $this->validate($request, ['nama' => 'required', 'alamat_kantor' => 'required', 'tipe'=>'required',
                                  'nama_lurah'=>'required','pejabat_kelurahan'=>'required'
                                  ]);

        $photo_lurah = $record->photo_lurah;
        $photo_kantor = $record->photo_kantor;

        if ($request->hasFile('photo_lurah')) {
            $filetime = time();
            $file = $request->file('photo_lurah');
            $extension = $file->getClientOriginalExtension();
            $photo_lurah = "kelurahan/lurah-"."$filetime".".".$extension;
            Image::make($request->file('photo_lurah'))->resize(180,null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($photo_lurah);

        }

        if ($request->hasFile('photo_kantor')) {
            $filetime = time();
            $file = $request->file('photo_kantor');
            $extension = $file->getClientOriginalExtension();
            $photo_kantor = "kelurahan/kantor-"."$filetime".".".$extension;
            Image::make($request->file('photo_kantor'))->resize(600,null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($photo_kantor);
        }

        $data = array(
            "nama"=>$request->input('nama'),
            "tipe"=>$request->input('tipe'),
            "alamat_kantor"=>$request->input('alamat_kantor'),
            "nama_lurah"=>$request->input('nama_lurah'),
            "pejabat_kelurahan"=>addClassTable($request->input('pejabat_kelurahan')),
            "photo_lurah"=>$photo_lurah,
            "photo_kantor"=>$photo_kantor,
            );

        DB::table('kelurahan')->where('id',$id)->update($data);
        $request->session()->flash('notice', "Kelurahan/Desa [".$data["nama"]."] Berhasil Disimpan!");
        return redirect("admin/kelurahan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request->input('post_id');
        $id = Hashids::decode($id)[0];
              
        $record = Kelurahan::find($id);
        if (!$record ){
            throw new HttpException(401);
        }



        $nama =$record->nama;
        if($record->delete()){
            $request->session()->flash('notice', "Kelurahan/Desa: [$nama] Berhasil Dihapus!");
            return redirect("admin/kelurahan");
        }

        throw new HttpException(503);
    }
}
