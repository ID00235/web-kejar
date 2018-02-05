<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use DB;
use Crypt;
use URL;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Encryption\DecryptException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;
use Intervention\Image\ImageManagerStatic as Image;


use App\Models\Header;


class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.header.index',
            array("route"=>"header","subroute"=>"","record"=>Header::all()));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function baru()
    {
         return view('backend.header.baru',
            array("route"=>"header","subroute"=>""));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, ['nama' => 'required','file'=>'required']);


        $data = array("nama"=>$request->input('nama'),  "kutipan"=>$request->input('kutipan'));

        $record = new Header;
        $record->nama = $data["nama"];
        $record->kutipan = '';
        $record->aktif = 1;
        
        //RESOULSI GAMBAR 1360x480
        $filetime = time();
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $filename = "header/$filetime".".".$extension;
        Image::make($request->file('file'))->resize(1360,240)->save($filename);

        $record->gambar = $filetime.".".$extension;
        $record->save();

        $request->session()->flash('notice', "Header [".$data["nama"]."] Berhasil Ditambahkan!");
        return redirect("admin/header");
    }

    public function update(Request $request)
    {
        
        $this->validate($request, ['nama' => 'required','id_edit'=>'required']);

        $id = $request->input('id_edit');
        $id = Hashids::decode($id)[0];
        $data = array("nama"=>$request->input('nama'), "kutipan"=>$request->input('kutipan'));
        $record = Header::find($id);
        if (!$record ){
            throw new HttpException(401);
        }

        if ($request->hasFile('file')) {
            
            Storage::disk('public')->delete("header/".$record->gambar);
            $filetime = time();
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = "header/$filetime".".".$extension;
            Image::make($request->file('file'))->resize(1360,240)->save($filename);
            $record->gambar = $filetime.".".$extension;
        }
        $record->kutipan = $data["kutipan"];
        $record->nama = $data["nama"];
        $record->save();
        $request->session()->flash('notice', "Header [".$data["nama"]."] Berhasil Disimpan!");
        return redirect("admin/header");
    }

    
    public function aktivasi(Request $request)
    {
        
        $this->validate($request, ['post_id'=>'required']);

        $id = $request->input('post_id');
        $id = Hashids::decode($id)[0];
        
        $record = Header::find($id);
        if (!$record ){
            throw new HttpException(401);
        }
        $aktif = $record->aktif ;
        if($aktif){
            $aktif = 0;
        }else{
            $aktif = 1;
        }
        $record->aktif = $aktif;
        $record->save();
        $request->session()->flash('notice', "Perubahan Data Header Berhasil Disimpan!");
        return redirect("admin/header");
    }

    public function delete(Request $request)
    {
        $id = $request->input('post_id');
        $id = Hashids::decode($id)[0];
              
        $record = Header::find($id);
        if (!$record ){
            throw new HttpException(401);
        }

        $nama =$record->nama;
        
        Storage::disk('public')->delete("header/".$record->gambar);
        if($record->delete()){
            $request->session()->flash('notice', "Header : [$nama] Berhasil Dihapus!");
            return redirect("admin/header");
        }

        throw new HttpException(503);
    }
}
