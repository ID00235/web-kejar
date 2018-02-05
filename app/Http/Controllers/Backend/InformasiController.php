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

use App\Models\Informasi;
use Intervention\Image\ImageManagerStatic as Image;

class InformasiController   extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.informasi.index',
            array("route"=>"informasi","subroute"=>"","informasi"=>informasi::all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function baru()
    {
         return view('backend.informasi.baru',
            array("route"=>"informasi","subroute"=>""));
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

        $record = new Informasi;
        $record->nama = $data["nama"];
        $record->isi = $data["isi"];
        $record->save();

        $request->session()->flash('notice', "Halaman  [".$data["nama"]."] Berhasil Ditambahkan!");
        return redirect("admin/informasi/detail/".$record->gethashid());
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
              
        $record = Informasi::find($id);
        if (!$record ){
            throw new HttpException(401);
        }
        
        return view('backend.informasi.detail',
            array("route"=>"informasi","subroute"=>"","informasi"=>$record));
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
        $record = Informasi::find($id);
        if (!$record){
            throw new HttpException(401);
        }
        return view('backend.informasi.edit',
            array("route"=>"informasi","subroute"=>"","record"=>$record));
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
              
        $record = Informasi::find($id);
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
        DB::table('informasi')->where('id',$id)->update($data);
        $request->session()->flash('notice', "Halaman [".$data["nama"]."] Berhasil Disimpan!");
        return redirect("admin/informasi/detail/".$record->gethashid());
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
              
        $record = Informasi::find($id);
        if (!$record ){
            throw new HttpException(401);
        }

        $nama =$record->nama;
        if($record->delete()){
            $request->session()->flash('notice', "Halaman Data Angka: [$nama] Berhasil Dihapus!");
            return redirect("admin/informasi");
        }

        throw new HttpException(503);
    }
}
