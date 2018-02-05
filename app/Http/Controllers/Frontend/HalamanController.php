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
use App\Models\Kelurahan;
use App\Models\DataAngka;
use App\Models\Informasi;
use App\Models\Agenda;
use URL;

class HalamanController extends MainControler
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   	



    public function kelurahan( $id, $nama){


      $menu = $this->getlistmenu();
      
      $halaman =  Kelurahan::find($id);
      if($halaman){
        
      }else{
         throw new HttpException(404);
      } 

       $url = URL::to('kelurahan/'.$halaman->id.'/'.generate_url($halaman->judul));
       $gambar = URL::to('images/ppid-share.png');
       $this->setSEO($halaman->nama,gettextdeskripsi($halaman->isi),$url,$gambar);

      return view('frontend.kelurahan.index',array("route"=>"kelurahan", "menu"=>$menu, 
        "halaman"=>$halaman));
    }



    public function semuaagenda(){
           $menu = $this->getlistmenu();

          $agenda =  Agenda::orderby('tanggal_mulai','desc')->get();
          
           $url = URL::to('semua-agenda');
           $gambar = URL::to('images/ppid-share.png');
           $this->setSEO('Agenda Kegiatan','Daftar Agenda Kegiatan Kecamatan Batin XXIV',$url,$gambar);

          return view('frontend.berita.semua-agenda',array("route"=>"agenda", "menu"=>$menu, 
            "agenda"=>$agenda));
    }

    public function informasi( $id, $nama){


      $menu = $this->getlistmenu();
      
      $halaman =  Informasi::find($id);
      if($halaman){
        
      }else{
         throw new HttpException(404);
      } 

       $url = URL::to('informasi/'.$halaman->id.'/'.generate_url($halaman->judul));
       $gambar = URL::to('images/ppid-share.png');
       $this->setSEO($halaman->nama,gettextdeskripsi($halaman->isi),$url,$gambar);

      return view('frontend.informasi.index',array("route"=>"informasi", "menu"=>$menu, 
        "halaman"=>$halaman));
    }


    public function dataumum( $id, $nama){


      $menu = $this->getlistmenu();
      
      $halaman =  DataAngka::find($id);
      if($halaman){
        
      }else{
         throw new HttpException(404);
      } 

       $url = URL::to('dataumum/'.$halaman->id.'/'.generate_url($halaman->judul));
       $gambar = URL::to('images/ppid-share.png');
       $this->setSEO($halaman->nama,gettextdeskripsi($halaman->isi),$url,$gambar);

      return view('frontend.dataumum.index',array("route"=>"dataumum", "menu"=>$menu, 
        "halaman"=>$halaman));
    }
    
}
