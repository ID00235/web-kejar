<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use DB;
use Crypt;
use URL;
use Illuminate\Contracts\Encryption\DecryptException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Intervention\Image\ImageManagerStatic as Image;

use App\Models\Pejabat;


class PejabatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pejabat.index',
            array("route"=>"pejabat","subroute"=>""));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
    function store(Request $request){

    	$validator = Validator::make($request->all(), ['nama' => 'required','jabatan' => 'required',
    		'photo'=>'required']);
        
        if(!$validator->fails()){
            $file = $request->file('photo');
            $jabatan = $request->input('jabatan');
            $nama = $request->input('nama');
            
            $extension = $file->getClientOriginalExtension();
            $filetime = date("Ymdhis");
            $gallery = rand(100,999);
            $fileupload = strtolower($gallery."-".$filetime.".".$extension);
            $fileupload_thumbs = "thumb-".$gallery."-".$filetime.".".$extension;
            $filename = "gallery/pejabat/".$fileupload;
            $thumbs = "gallery/pejabat/". $fileupload_thumbs;

            Image::make($file)->resize(1200,null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($filename);
            Image::make($file)->resize(600,null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbs);

            $img = Image::make($thumbs);
            $img->crop(300, 220);
            $img->save();
            $pejabat = new Pejabat;
            $pejabat->filename = $fileupload;
            $pejabat->jabatan = $jabatan;
            $pejabat->nama = $nama;
            $pejabat->save();
            return  response()->json(['status' => true,'message'=>"Photo Pejabat Baru Berhasil ditambahkan!"]); 
        }        
        
        return  response()->json(['status' => false,'message'=>"Terjadi Kesalahan, Gagal Menambahkan Photo!"]); 
    }

    public function list()
    {
        
        $pejabat = Pejabat::orderBy('created_at','asc')->paginate(12);
        
        return view('backend.pejabat.list',array("pejabat"=>$pejabat));
    }

    public function detail($id){
    	$id = Hashids::decode($id)[0];
        
        $record = Pejabat::find($id);
        if (!$record){
            return  response()->json(['status' => false,'message'=>"Photo Pejabat tidak ditemukan"]); 
        }
        
        return  response()->json(['status' => true,'data'=>$record,'crypt'=>Crypt::encrypt($record->id)]);
    }

     public function delete(Request $request) { $validator = Validator::make($request->all(), ['crypt'=>'required']); if(!$validator->fails()){ $id = $request->input('crypt'); try { $id = Crypt::decrypt($id); }catch (DecryptException $e) { return response()->json(['status' => false,'message'=>"Terjadi Kesalahan, Gagal Menambahkan Photo!"]); } $gallery = Pejabat::find($id); Storage::disk('public')->delete("gallery/pejabat/".$gallery->filename); Storage::disk('public')->delete("gallery/pejabat/thumb-".$gallery->filename); $gallery->delete(); return response()->json(['status' => true,'message'=>"Photo Berhasil dihapus!"]); } return response()->json(['status' => false,'message'=>"Terjadi Kesalahan, Gagal Menghapus Photo!"]); }
}
