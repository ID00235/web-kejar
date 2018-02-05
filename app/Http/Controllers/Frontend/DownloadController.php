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

class DownloadController extends MainControler
{
    //
       

        public function downloadspesial($direktori, $filename){
            $filename = 'spesial/'.$direktori.'/'.$filename;
            $exist = Storage::disk('local')->exists($filename);
            if($exist){
                   return response()->download(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().'/'.$filename);
            }else{
                throw new HttpException(404);
            }
        }

        public function downloaddokumen($direktori, $filename){
            $path = 'dokumen/'.$direktori.'/'.$filename;
            $exist = Storage::disk('local')->exists($path);
            if($exist){
                    $akses = FileDokumen::where('direktori',$direktori)->where('filename',$filename)->first();
                    if(!$akses){
                        throw new HttpException(404);
                    }
                    if($akses->kunci){
                        throw new HttpException(404);
                    }else{
                        return response()->download(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().'/'.$path);
                    }
            }else{
                throw new HttpException(404);
            }
        }

        public function downloaddokumenlock($cyrpt){
            try {
            $id = Crypt::decrypt($cyrpt);
            }catch (DecryptException $e) {
               throw new HttpException(401);
            }
            $filedokumen = FileDokumen::find($id);
            if(!$filedokumen){
                throw new HttpException(404);
            }
            return view('frontend.dokumen.download-lock',array("filedokumen"=>$filedokumen,"crypt"=>$cyrpt, 
                "back"=>URL::previous(),"link"=>""));
        }

        public function downloadsession($cyrpt){
            try {
            $decrypt = Crypt::decrypt($cyrpt);
            }catch (DecryptException $e) {
               throw new HttpException(401);
            }
            $plain = explode("#", $decrypt);
            $direktori = $plain[0];
            $filename = $plain[1];
            $filename = 'dokumen/'.$direktori.'/'.$filename;
            $exist = Storage::disk('local')->exists($filename);

            if($exist){
                   return response()->download(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().'/'.$filename);
            }else{
                throw new HttpException(404);
            }
        }

        public function downloadkodeakses(Request $request){

            $this->validate($request,
                ['kode' => 'required',
                'crypt'=>'required',
                'captcha' => 'required|captcha']);

            $kode = $request->input('kode');
            $crypt = $request->input('crypt');

            try {
            $id = Crypt::decrypt($crypt);
            }catch (DecryptException $e) {
               throw new HttpException(401);
            }
            $filedokumen = FileDokumen::find($id);

            if(!$filedokumen){
                throw new HttpException(404);
            }

            $direktori = $filedokumen->direktori;
            $filename = $filedokumen->filename;
            $path = 'dokumen/'.$direktori.'/'.$filename;

            if ($filedokumen->kode ==$kode){
                $session = Crypt::encrypt($direktori."#".$filename);
                session(['download' => $session]);
                $link = URL::to("download/session/".$session);
                return view('frontend.dokumen.download-lock',array("filedokumen"=>$filedokumen,"crypt"=>"", 
                "back"=>URL::to("daftarinformasi/detail/".$direktori),"link"=>$link));
            }else{
                return Redirect::back()->withErrors(["Kode Akses Salah!"]);
            }
        }

        public function daftarunduhan(){
             $menu = $this->getlistmenu();      
             return view('frontend.unduhan.index',array("route"=>"download", "menu"=>$menu));
        }
        

}
