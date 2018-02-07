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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;



use App\Models\Peraturan;
use Intervention\Image\ImageManagerStatic as Image;

class PeraturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.peraturan.index',
            array("route"=>"peraturan","subroute"=>"","peraturan"=>Peraturan::all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function baru()
    {
         return view('backend.peraturan.baru',
            array("route"=>"peraturan","subroute"=>""));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, ['nama' => 'required','tahun'=>'required', 'file_name'=>'required']);
        var_dump($request->file_name);
        $data = array("nama"=>$request->input('nama'),
            "tahun"=>$request->input('tahun')
            );

        $peraturan = new peraturan;
        $peraturan->nama = $data["nama"];
        $peraturan->tahun = $data["tahun"];
        $file = $request->file('file_name');
        $extension = $file->getClientOriginalExtension();
        $mime = $file->getClientMimeType();
        $namafile = str_replace(" ",".",$file->getClientOriginalName());
        $namafile = rand(1000,10000).$namafile;
        $filename = "upload-peraturan/".$namafile;
        Storage::disk('public')->put($filename,  File::get($file));
        $peraturan->file_name = $namafile;
        $peraturan->save();
        $request->session()->flash('notice', "peraturan [".$data["nama"]."] Berhasil Ditambahkan!");
        return redirect("admin/peraturan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Hashids::decode($id)[0];
        $record = peraturan::find($id);
        if (!$record){
            throw new HttpException(401);
        }
        return view('backend.peraturan.edit',
            array("route"=>"peraturan","subroute"=>"","record"=>$record));
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
              
        $record = peraturan::find($id);
        if (!$record){
            throw new HttpException(401);
        }

        $this->validate($request, ['nama' => 'required',
            'tahun'=>'required',
             ]);

        $file = $request->file('file_name');
        if($file){
            $extension = $file->getClientOriginalExtension();
            $mime = $file->getClientMimeType();
            $namafile = str_replace(" ",".",$file->getClientOriginalName());
            $namafile = rand(1000,10000).$namafile;
            $filename = "upload-peraturan/".$namafile;
            Storage::disk('public')->put($filename,  File::get($file));
            $file_name = $filename;
        }else{
            $file_name = $record->file_name;
        }
        
        $data = array(
                "nama"=>$request->input('nama'),
                 "tahun"=> $request->input('tahun'),
                 "file_name"=>$file_name,
        );

        DB::table('peraturan')->where('id',$id)->update($data);
        $request->session()->flash('notice', "peraturan [".$data["nama"]."] Berhasil Disimpan!");
        return redirect("admin/peraturan");
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
              
        $record = peraturan::find($id);
        if (!$record ){
            throw new HttpException(401);
        }

        $nama =$record->nama;
        if($record->delete()){
            $request->session()->flash('notice', "peraturan: [$nama] Berhasil Dihapus!");
            return redirect("admin/peraturan");
        }

        throw new HttpException(503);
    }
}
