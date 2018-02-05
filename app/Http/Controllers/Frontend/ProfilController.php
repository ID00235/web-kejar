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

use App\Models\Profil;
use URL;

class ProfilController extends MainControler
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   	



    public function index( $id, $nama){


      $menu = $this->getlistmenu();
      
      $profil =  Profil::find($id);
      if($profil){
        
      }else{
         throw new HttpException(404);
      } 

       $url = URL::to('profil/'.$profil->id.'/'.generate_url($profil->judul));
      $gambar = URL::to('images/ppid-share.png');
      $this->setSEO($profil->nama,gettextdeskripsi($profil->isi),$url,$gambar);

      return view('frontend.profil.index',array("route"=>"profil", "menu"=>$menu, 
        "profil"=>$profil));
    }


    
}
