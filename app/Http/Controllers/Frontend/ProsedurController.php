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

use App\Models\Prosedur;
use URL;

class ProsedurController extends MainControler
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   	



    public function index( $id, $nama){


      $menu = $this->getlistmenu();
      
      $prosedur =  Prosedur::find($id);
      if($prosedur){
        
      }else{
         throw new HttpException(404);
      } 

         $url = URL::to('prosedur/'.$prosedur->id.'/'.generate_url($prosedur->nama));
      $gambar = URL::to('images/ppid-share.png');
      $this->setSEO($prosedur->nama,gettextdeskripsi($prosedur->isi),$url,$gambar);

      return view('frontend.prosedur.index',array("route"=>"prosedur", "menu"=>$menu, 
        "prosedur"=>$prosedur));
    }


    
}
