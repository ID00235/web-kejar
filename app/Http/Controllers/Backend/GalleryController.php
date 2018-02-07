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

use App\Models\GalleryPhoto;
use App\Models\GalleryVideo;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.gallery.index',
            array("route"=>"gallery","subroute"=>""));
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
     
    public function uploadGambar (Request $request){
        $validator = Validator::make($request->all(), ['upload' => 'required']);
        $file = $request->file('upload');
        
         if(!$validator->fails()){
             $extension = $file->getClientOriginalExtension();
             $allow = array("jpg", "png");
             if (!in_array($extension, $allow)) {
                return false;
             }
             $file = $request->file('upload');
             $filetime = date("Ymdhis");
             $gallery = rand(100,999);
             $fileupload = strtolower($gallery."-".$filetime.".".$extension);
             $filename = "gallery/gambar/".$fileupload;
             
            Image::make($file)->save($filename);
            $url = URL::to($filename);
            
            return "<script type='text/javascript'>
            var par = window.parent,
                op = window.opener,
                o = (par && par.CKEDITOR) ? par : ((op && op.CKEDITOR) ? op : false);
            if (o !== false) {
                if (op) window.close();
                o.CKEDITOR.tools.callFunction(0, '$url', '');
            } else {
                alert('terjadi kesalahan dalam meng-upload file');
                if (op) window.close();
            }
            </script>";
         }
    }
    
    public function storePhoto(Request $request)
    {
        
        $validator = Validator::make($request->all(), ['deskripsi' => 'required','photo'=>'required']);
        
        if(!$validator->fails()){
            $file = $request->file('photo');
            $deskripsi = $request->input('deskripsi');
            
            $extension = $file->getClientOriginalExtension();
            $filetime = date("Ymdhis");
            $gallery = rand(100,999);
            $fileupload = strtolower($gallery."-".$filetime.".".$extension);
            $fileupload_thumbs = "thumb-".$gallery."-".$filetime.".".$extension;
            $filename = "gallery/photo/".$fileupload;
            $thumbs = "gallery/photo/". $fileupload_thumbs;

            Image::make($file)->resize(1200,null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($filename);
            Image::make($file)->resize(600,null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbs);

            $img = Image::make($thumbs);
            $img->crop(300, 220);
            $img->save();
            $gallery = new GalleryPhoto;
            $gallery->filename = $fileupload;
            $gallery->deskripsi = $deskripsi;
            $gallery->save();
            return  response()->json(['status' => true,'message'=>"Photo Baru Berhasil ditambahkan!"]); 
        }        
        
        return  response()->json(['status' => false,'message'=>"Terjadi Kesalahan, Gagal Menambahkan Photo!"]); 
        
    }
    
    public function updatePhoto(Request $request)
    {
        
        $validator = Validator::make($request->all(), ['deskripsi' => 'required','crypt'=>'required']);
        
        if(!$validator->fails()){
            
            $id = $request->input('crypt');
            try {
                $id = Crypt::decrypt($id);
            }catch (DecryptException $e) {
                return  response()->json(['status' => false,'message'=>"Terjadi Kesalahan, Gagal Menambahkan Photo!"]); 
            }
            
            $gallery = GalleryPhoto::find($id);
            
            if($request->hasFile('photo')){
                    $file = $request->file('photo');
                    $extension = $file->getClientOriginalExtension();
                    $filetime = date("Ymdhis");
                    $random = rand(100,999);
                    $fileupload = strtolower($random."-".$filetime.".".$extension);
                    $fileupload_thumbs = "thumb-".$random."-".$filetime.".".$extension;
                    $filename = "gallery/photo/".$fileupload;
                    $thumbs = "gallery/photo/". $fileupload_thumbs;

                    Image::make($file)->resize(680,null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($filename);
                    Image::make($file)->resize(400,null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($thumbs);

                    $img = Image::make($thumbs);
                    $img->crop(300, 220);
                    $img->save();
                
                    Storage::disk('public')->delete("gallery/photo/".$gallery->filename);
                    Storage::disk('public')->delete("gallery/photo/thumb-".$gallery->filename);
                    
                    $gallery->filename = $fileupload;
            }
           
            $deskripsi = $request->input('deskripsi');
            $gallery->deskripsi = $deskripsi;
            $gallery->save();
            return  response()->json(['status' => true,'message'=>"Photo Berhasil Disimpan!"]); 
        }        
        
        return  response()->json(['status' => false,'message'=>"Terjadi Kesalahan, Gagal Menambahkan Photo!"]); 
        
    }

    
 public function deletePhoto(Request $request) { $validator = Validator::make($request->all(), ['crypt'=>'required']); if(!$validator->fails()){ $id = $request->input('crypt'); try { $id = Crypt::decrypt($id); }catch (DecryptException $e) { return response()->json(['status' => false,'message'=>"Terjadi Kesalahan, Gagal Menambahkan Photo!"]); } $gallery = GalleryPhoto::find($id); Storage::disk('public')->delete("gallery/photo/".$gallery->filename); Storage::disk('public')->delete("gallery/photo/thumb-".$gallery->filename); $gallery->delete(); return response()->json(['status' => true,'message'=>"Photo Berhasil dihapus!"]); } return response()->json(['status' => false,'message'=>"Terjadi Kesalahan, Gagal Menghapus Photo!"]); }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listphoto()
    {
        
        $photo = GalleryPhoto::orderBy('created_at','desc')->paginate(12);
        
        return view('backend.gallery.list-photo',array("photo"=>$photo));
    }

    public function detailphoto($id){
        $id = Hashids::decode($id)[0];
        
        $record = GalleryPhoto::find($id);
        if (!$record){
            return  response()->json(['status' => false,'message'=>"Photo tidak ditemukan"]); 
        }
        
        return  response()->json(['status' => true,'data'=>$record,'crypt'=>Crypt::encrypt($record->id)]); 
    }
    
    
    public function storevideo(Request $request)
    {
        
        $validator = Validator::make($request->all(), ['judul' => 'required','embed_id'=>'required']);
        
        if(!$validator->fails()){
            $url = $request->input('embed_id');
            $judul = $request->input('judul');
            
            $gallery = new GalleryVideo;
            $gallery->url = $url;
            $gallery->embed_id = youtube_id($url);
            $gallery->judul = $judul;
            $gallery->save();
            return  response()->json(['status' => true,'message'=>"Video Baru Berhasil ditambahkan!"]); 
        }        
        
        return  response()->json(['status' => false,'message'=>"Terjadi Kesalahan, Gagal Menambahkan Video!"]); 
        
    }
    
     public function listvideo()
    {
        
        $photo = GalleryVideo::orderBy('created_at','desc')->paginate(12);
        
        return view('backend.gallery.list-video',array("video"=>$photo));
    }

    public function detailvideo($id){
        $id = Hashids::decode($id)[0];
        
        $record = GalleryVideo::find($id);
        if (!$record){
            return  response()->json(['status' => false,'message'=>"Video tidak ditemukan"]); 
        }
        
        return  response()->json(['status' => true,'data'=>$record,'crypt'=>Crypt::encrypt($record->id)]); 
    }
    
    
     public function updatevideo(Request $request)
    {
        
        $validator = Validator::make($request->all(), ['judul' => 'required','embed_id'=>'required','crypt'=>'required']);
        
        if(!$validator->fails()){
            
            $id = $request->input('crypt');
            try {
                $id = Crypt::decrypt($id);
            }catch (DecryptException $e) {
                return  response()->json(['status' => false,'message'=>"Terjadi Kesalahan, Gagal Menambahkan Photo!"]); 
            }
            
            $gallery = GalleryVideo::find($id);
            
            $url = $request->input('embed_id');
            $judul = $request->input('judul');
            
            $gallery->url = $url;
            $gallery->embed_id = youtube_id($url);
            $gallery->judul = $judul;
            
            $gallery->save();
            return  response()->json(['status' => true,'message'=>"Video Berhasil Disimpan!"]); 
        }        
        
        return  response()->json(['status' => false,'message'=>"Terjadi Kesalahan, Gagal Menambahkan Photo!"]); 
        
    }
    
      public function deletevideo(Request $request)
    {
        
        $validator = Validator::make($request->all(), ['crypt'=>'required']);
        
        if(!$validator->fails()){
            
            $id = $request->input('crypt');
            try {
                $id = Crypt::decrypt($id);
            }catch (DecryptException $e) {
                return  response()->json(['status' => false,'message'=>"Terjadi Kesalahan, Gagal Menambahkan Photo!"]); 
            }
            
            $gallery = GalleryVideo::find($id);
            $gallery->delete();
            return  response()->json(['status' => true,'message'=>"Video Berhasil dihapus!"]); 
        }        
        
        return  response()->json(['status' => false,'message'=>"Terjadi Kesalahan, Gagal Menghapus Photo!"]); 
        
    }
}
