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

use App\Models\FileDokumen;
use App\Models\Dokumen;
use App\Models\JenisInformasi;
use App\Models\KategoriInformasi;
use URL;

class DaftarInformasiController extends MainControler
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   	
   	public function detail($nomor){
   		$menu = $this->getlistmenu();
      $dokumen = Dokumen::where('nomor',$nomor)->first();
      if (!$dokumen ){
          throw new HttpException(404);
      }
      $url = URL::to('daftarinformasi/detail/'.$nomor);
      $gambar = URL::to('images/ppid-share.png');
      $this->setSEO($dokumen->nama,gettextdeskripsi($dokumen->kandungan_informasi),$url,$gambar);
      $dokumen->dibaca = $dokumen->dibaca + 1;
      $dokumen->save();

   		return view('frontend.dokumen.detail',array("route"=>"daftarinformasi", "menu"=>$menu, "dokumen"=>$dokumen));
   	}
    


    public function semua( Request $request){


      $menu = $this->getlistmenu();
      $judul = $request->input("keyword");
      $kategori = $request->input("kategori");
      $jenis = $request->input("jenis");
      $pencarian = false;
      if (strlen($judul)>5){
        $where_judul = "nama like '%$judul%'";
        $pencarian = true;
        $keyword_judul = $judul;
      }else{
        $where_judul = " nama <> ''";
        $keyword_judul = "*";
      }

      if ($jenis > 0){
        $where_jenis = "jenis = '$jenis'";
        $pencarian = true;
        $get_jenis =  JenisInformasi::find($jenis);
        if($get_jenis){
          $keyword_jenis = $get_jenis->nama;
        }        
      }else{
        $where_jenis = " jenis > 0";
        $keyword_jenis = "*";
      }

      if ($kategori > 0){
        $where_kategori = "kategori = '$kategori'";
        $pencarian = true;
        $get_kategori=  KategoriInformasi::find($kategori);
        if($get_kategori){
          $keyword_kategori = $get_kategori->nama;
        }
      }else{
        $where_kategori = " kategori > 0";
        $keyword_kategori = "*";
      }
      $keyword = array("judul"=>$keyword_judul,"jenis"=>$keyword_jenis, "kategori"=>$keyword_kategori);
      $dokumen = Dokumen::orderby('nomor','desc')
          ->whereRaw($where_judul)
          ->whereRaw($where_jenis)
          ->whereRaw($where_kategori)->paginate(10);
      $count = 0;
      if($pencarian){
        $count = Dokumen::orderby('nomor','desc')
          ->whereRaw($where_judul)
          ->whereRaw($where_jenis)
          ->whereRaw($where_kategori)->count();
      }

      return view('frontend.dokumen.semua',array("route"=>"daftarinformasi", "menu"=>$menu, "dokumen"=>$dokumen, "pencarian"=>$pencarian, "count"=>$count, "keyword"=>$keyword));
    }


    public function jenis( $jenis, $nama){


      $menu = $this->getlistmenu();
      
      if ($jenis > 0){
        $where_jenis = "jenis = '$jenis'";
        $get_jenis =  JenisInformasi::find($jenis);
        if($get_jenis){
          $keyword = $get_jenis->nama;
        }else{
           throw new HttpException(404);
        }        
      }else{
          throw new HttpException(404);
      }

      $dokumen = Dokumen::orderby('nomor','desc')
          ->whereRaw($where_jenis)->paginate(10);

      $count = Dokumen::orderby('nomor','desc')
          ->whereRaw($where_jenis)->count();
      

      return view('frontend.dokumen.jenis',array("route"=>"daftarinformasi", "menu"=>$menu, 
        "dokumen"=>$dokumen,
        "count"=>$count, 
        "keyword"=>$keyword));
    }

    public function kategori( $kategori, $nama){


      $menu = $this->getlistmenu();
      
      if ($kategori > 0){
        $where_jenis = "kategori = '$kategori'";
        $get_jenis =  KategoriInformasi::find($kategori);
        if($get_jenis){
          $keyword = $get_jenis->nama;
        }else{
           throw new HttpException(404);
        }        
      }else{
          throw new HttpException(404);
      }

      $dokumen = Dokumen::orderby('nomor','desc')
          ->whereRaw($where_jenis)->paginate(10);

      $count = Dokumen::orderby('nomor','desc')
          ->whereRaw($where_jenis)->count();
      

      return view('frontend.dokumen.kategori',array("route"=>"daftarinformasi", "menu"=>$menu, 
        "dokumen"=>$dokumen,
        "count"=>$count, 
        "keyword"=>$keyword));
    }

    
}
