<?php
//PermohonanController
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Frontend\Controller as MainControler;
use Redirect;
use DB;
use Crypt;


use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Encryption\DecryptException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;

use App\Models\Sarana;
use URL;

class SaranaController extends MainControler
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   	



    public function index( $id, $nama){


      $menu = $this->getlistmenu();
      
      $sarana =  sarana::find($id);
      if($sarana){
        
      }else{
         throw new HttpException(404);
      } 

       $url = URL::to('sarana/'.$sarana->id.'/'.generate_url($sarana->judul));
     /* $gambar = URL::to('images/ppid-share.png');
      $this->setSEO($sarana->nama,gettextdeskripsi($sarana->isi),$url,$gambar);
      */
      return view('frontend.sarana.index',array("route"=>"sarana", "menu"=>$menu, 
        "sarana"=>$sarana));
    }


    
}
