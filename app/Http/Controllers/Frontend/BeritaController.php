<?php
//PermohonanController
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Frontend\Controller as MainControler;
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

use App\Models\Berita;


class BeritaController extends MainControler
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   	
   	public function baca($id, $title, $tanggal){
      
   		$menu = $this->getlistmenu();
      $berita = Berita::find($id);
      if (!$berita ){
          throw new HttpException(404);
      }
      $url = URL::to("baca/".$berita->id."/".generate_url($berita->judul)."/".$berita->tanggal);
      if($berita->gambar){
        $gambar = URL::to('berita/'.$berita->gambar);
      }else{
        $gambar = URL::to('images/ppid-share.png');
      }
      

      $this->setSEO($berita->judul,gettextdeskripsi($berita->isi),$url,$gambar);
      $berita->dibaca = $berita->dibaca + 1;
      $berita->save();
   		return view('frontend.berita.read',array("route"=>"berita", "menu"=>$menu, "berita"=>$berita));
   	}
    


    public function semua(){
      $menu = $this->getlistmenu();
      $berita = Berita::orderby('tanggal','desc')->paginate(10);
      return view('frontend.berita.semua',array("route"=>"berita", "menu"=>$menu, "berita"=>$berita));
    }

    
}
