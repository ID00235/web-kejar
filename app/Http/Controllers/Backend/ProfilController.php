<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use DB;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;

use App\Models\Profil;
use Intervention\Image\ImageManagerStatic as Image;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.profil.index',
            array("route"=>"profil","subroute"=>"","profil"=>profil::all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function baru()
    {
         return view('backend.profil.baru',
            array("route"=>"profil","subroute"=>""));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, ['nama' => 'required','isi'=>'required']);

        $data = array("nama"=>$request->input('nama'),
        "isi"=> addClassTable(addClassImages($request->input('isi')))
            );

        $profil = new Profil;
        $profil->nama = $data["nama"];
        $profil->isi = $data["isi"];
        $profil->save();

        $request->session()->flash('notice', "profil [".$data["nama"]."] Berhasil Ditambahkan!");
        return redirect("admin/profil/detail/".$profil->gethashid());
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
              
        $record = Profil::find($id);
        if (!$record ){
            throw new HttpException(401);
        }
        
        return view('backend.profil.detail',
            array("route"=>"profil","subroute"=>"","profil"=>$record));
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
        $record = Profil::find($id);
        if (!$record){
            throw new HttpException(401);
        }
        return view('backend.profil.edit',
            array("route"=>"profil","subroute"=>"","record"=>$record));
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
              
        $record = Profil::find($id);
        if (!$record){
            throw new HttpException(401);
        }

        $this->validate($request, ['nama' => 'required',
            'isi'=>'required',
             ]);

        $data = array(
                "nama"=>$request->input('nama'),
                 "isi"=> addClassTable(addClassImages($request->input('isi')))
        );
        DB::table('profil')->where('id',$id)->update($data);
        $request->session()->flash('notice', "Profil [".$data["nama"]."] Berhasil Disimpan!");
        return redirect("admin/profil/detail/".$record->gethashid());
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
              
        $record = Profil::find($id);
        if (!$record ){
            throw new HttpException(401);
        }

        $nama =$record->nama;
        if($record->delete()){
            $request->session()->flash('notice', "Profil: [$nama] Berhasil Dihapus!");
            return redirect("admin/profil");
        }

        throw new HttpException(503);
    }
}
