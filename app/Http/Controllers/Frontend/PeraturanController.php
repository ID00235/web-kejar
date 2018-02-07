<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use DB;
use URL;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\FileDokumen;
use App\Http\Controllers\Frontend\Controller as MainControler;
use App\Models\Peraturan;
class Peraturan extends MainControler
{
    //
    public function index(){

      $menu = $this->getlistmenu();
      
      $peraturan =  Peraturan::all();
      if($peraturan){
      }else{
         throw new HttpException(404);
      } 

      return view('frontend.peraturan.index',array("route"=>"peraturan", "menu"=>$menu, 
        "peraturan"=>$peraturan));
    }

}
