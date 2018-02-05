<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Frontend\Controller as MainControler;
use Redirect;
use DB;
use Crypt;
use URL;

use Illuminate\Contracts\Encryption\DecryptException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;

use App\Models\Berita;
use App\Models\Kelurahan;
use App\Models\Profil;
use App\Models\Informasi;
use App\Models\DataAngka;
use App\Models\GalleryPhoto;

class HomeController extends MainControler
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->setSEO("Beranda","Official Website Kecamatan Batin XXIV",URL::to('/'),URL::to('images/ppid-share.png'));

    	$menu = $this->getlistmenu();
        $berita_terbaru = Berita::orderby('tanggal','desc')->offset(0)->limit(5)->get();
        $kelurahan = Kelurahan::select('id','nama')->get();
        $informasi = Informasi::select('id','nama')->get();
        $dataangka = DataAngka::select('id','nama')->get();        
        $profil = Profil::select('id','nama')->get();      
        return view('frontend.home.index', array("route"=>"home", "menu"=>$menu, 
            "berita"=>$berita_terbaru,
            "kelurahan"=>$kelurahan,
            "dataangka"=>$dataangka,
            "informasi"=>$informasi,
            "profil"=>$profil
            ));
    }

    
}
