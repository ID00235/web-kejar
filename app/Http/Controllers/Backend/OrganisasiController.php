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

use App\Models\Organisasi;
use Intervention\Image\ImageManagerStatic as Image;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.organisasi.index',
            array("route"=>"organisasi","subroute"=>"","organisasi"=>organisasi::all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function baru()
    {
         return view('backend.organisasi.baru',
            array("route"=>"organisasi","subroute"=>""));
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

        $organisasi = new Organisasi;
        $organisasi->nama = $data["nama"];
        $organisasi->isi = $data["isi"];
        $organisasi->save();

        $request->session()->flash('notice', "organisasi [".$data["nama"]."] Berhasil Ditambahkan!");
        return redirect("admin/organisasi/detail/".$organisasi->gethashid());
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
              
        $record = Organisasi::find($id);
        if (!$record ){
            throw new HttpException(401);
        }
        
        return view('backend.organisasi.detail',
            array("route"=>"organisasi","subroute"=>"","organisasi"=>$record));
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
        $record = Organisasi::find($id);
        if (!$record){
            throw new HttpException(401);
        }
        return view('backend.organisasi.edit',
            array("route"=>"organisasi","subroute"=>"","record"=>$record));
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
              
        $record = Organisasi::find($id);
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
        DB::table('organisasi')->where('id',$id)->update($data);
        $request->session()->flash('notice', "Organisasi [".$data["nama"]."] Berhasil Disimpan!");
        return redirect("admin/organisasi/detail/".$record->gethashid());
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
              
        $record = Organisasi::find($id);
        if (!$record ){
            throw new HttpException(401);
        }

        $nama =$record->nama;
        if($record->delete()){
            $request->session()->flash('notice', "Organisasi: [$nama] Berhasil Dihapus!");
            return redirect("admin/organisasi");
        }

        throw new HttpException(503);
    }
}
