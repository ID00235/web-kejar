<?php
//PermohonanController
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Frontend\Controller as MainControler;
use Redirect;
use DB;
use Crypt;
use PDF;
use Mail;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Encryption\DecryptException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;

use App\Models\GalleryPhoto;
use App\Models\GalleryVideo;



class GalleryController extends MainControler
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   	
   	public function photo(){

      $menu = $this->getlistmenu();      
      $photo = GalleryPhoto::orderBy('created_at','desc')->paginate(12);
      return view('frontend.gallery.photo',array("route"=>"gallery", "menu"=>$menu, 
              "photo"=>$photo));      
    }

    public function video(){

      $menu = $this->getlistmenu();      
      $video = GalleryVideo::orderBy('created_at','desc')->paginate(12);
      return view('frontend.gallery.video',array("route"=>"gallery", "menu"=>$menu, 
              "video"=>$video));      
    }

    
    
}
