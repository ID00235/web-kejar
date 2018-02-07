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

use App\Models\Berita;
use Intervention\Image\ImageManagerStatic as Image;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.berita.index',
            array("route"=>"berita","subroute"=>"","berita"=>Berita::orderBy("tanggal","desc")->get()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function baru()
    {
         return view('backend.berita.baru',
            array("route"=>"berita","subroute"=>""));
    }

    public function insert(Request $request)
    {
        
        $this->validate($request, ['judul' => 'required','isi'=>'required','tanggal'=>'required','gambar'=>'required']);
       
       
        $data = array("judul"=>$request->input('judul'),
                "isi"=> $request->input('isi'),
                "tanggal"=> $request->input('tanggal'),
                "title_gambar"=>$request->input('title_gambar')
                );

        $filetime = time();
        $file = $request->file('gambar');
        $extension = $file->getClientOriginalExtension();
        $filename = "berita/$filetime".".".$extension;
        $thumbs = "berita/thumb.".$filetime.".".$extension;
        Image::make($request->file('gambar'))->resize(1200,null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($filename);
        Image::make($request->file('gambar'))
        ->resize(400,null, function ($constraint) {
            $constraint->aspectRatio();
        })->crop(320,320)->save($thumbs);
        $record = new Berita;
        $record->judul = $data["judul"];
        $record->isi = $data["isi"];
        $record->tanggal = tanggalSystem($data["tanggal"]);
        $record->gambar = $filetime.".".$extension;
        $record->title_gambar = $data["title_gambar"];    
        $record->save();

        $request->session()->flash('notice', "Berita Baru Berhasil Ditambahkan!");
        return redirect("admin/berita/detail/".$record->gethashid());
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
              
        $record = Berita::find($id);
        if (!$record ){
            throw new HttpException(401);
        }
        
        return view('backend.berita.detail',
            array("route"=>"berita","subroute"=>"","record"=>$record));
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
        $record = Berita::find($id);
        if (!$record){
            throw new HttpException(401);
        }
        return view('backend.berita.edit',
            array("route"=>"berita","subroute"=>"","record"=>$record));
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
              
        $record = Berita::find($id);
        if (!$record){
            throw new HttpException(401);
        }

       $this->validate($request, ['judul' => 'required','isi'=>'required','tanggal'=>'required']);

        $data = array("judul"=>$request->input('judul'),
                "isi"=> $request->input('isi'),
                "tanggal"=> $request->input('tanggal'),
                "title_gambar"=>$request->input('title_gambar')
                );

        if ($request->hasFile('gambar')) {
            
            Storage::disk('public')->delete("berita/".$record->gambar);
            Storage::disk('public')->delete("berita/thumb.".$record->gambar);

            $filetime = time();
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = "berita/$filetime".".".$extension;
            $thumbs = "berita/thumb.".$filetime.".".$extension;
            Image::make($request->file('gambar'))->resize(600,null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($filename);
            Image::make($request->file('gambar'))->crop(320,320)->save($thumbs);
            $record->gambar = $filetime.".".$extension;
        }
       
       
        $record->judul = $data["judul"];
        $record->isi = $data["isi"];
        $record->tanggal = tanggalSystem($data["tanggal"]);
        
        $record->title_gambar = $data["title_gambar"];    
        $record->save();

        
        $request->session()->flash('notice', "Berita Berhasil Disimpan!");
         return redirect("admin/berita/detail/".$record->gethashid());
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
              
        $record = Berita::find($id);
        if (!$record ){
            throw new HttpException(401);
        }
        
        Storage::disk('public')->delete("berita/".$record->gambar);
        Storage::disk('public')->delete("berita/thumb.".$record->gambar);
        if($record->delete()){
            $request->session()->flash('notice', "Berita Berhasil Dihapus!");
            return redirect("admin/berita");
        }

        throw new HttpException(503);
    }
}
