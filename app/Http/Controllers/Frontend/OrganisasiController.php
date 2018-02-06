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

use App\Models\Organisasi;
use URL;

class OrganisasiController extends MainControler
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   	



    public function index( $id, $nama){


      $menu = $this->getlistmenu();
      
      $organisasi =  Organisasi::find($id);
      if($organisasi){
        
      }else{
         throw new HttpException(404);
      } 

       $url = URL::to('organisasi/'.$organisasi->id.'/'.generate_url($organisasi->judul));
      $gambar = URL::to('images/ppid-share.png');
      $this->setSEO($organisasi->nama,gettextdeskripsi($organisasi->isi),$url,$gambar);

      return view('frontend.organisasi.index',array("route"=>"organisasi", "menu"=>$menu, 
        "organisasi"=>$organisasi));
    }


    
}
