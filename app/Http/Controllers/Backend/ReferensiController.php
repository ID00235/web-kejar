<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use DB;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Symfony\Component\HttpKernel\Exception\HttpException;

//MODEL
use App\Models\JenisInformasi;
use App\Models\KategoriInformasi;
use App\Models\AlasanKeberatan;

class ReferensiController extends Controller
{
    //JENIS INFORMASI
    public function jenisinformasi()
    {
        $jenisinformasi = DB::table('jenis_informasi')->orderBy('id','asc')->get();
        return view('backend.referensi.jenisinformasi',
        	array("route"=>"referensi","subroute"=>"jenisinformasi","jenisinformasi"=>$jenisinformasi));
    }

    public function datatablejenisinformasi(){

    }

    public function createjenisinformasi()
    {
       return view('backend.referensi.jenisinformasi-create',
       	array("route"=>"referensi","subroute"=>"jenisinformasi"));

    }

    public function insertjenisinformasi(Request $request)
    {
        $this->validate($request, ['nama' => 'required']);
        $nama = $request->input('nama');
        $jenisinformasi = new JenisInformasi;
        $jenisinformasi->nama = $nama;
        $jenisinformasi->save();
        $request->session()->flash('notice', "Jenis Informasi Baru Berhasil Ditambahkan!");
        return redirect("admin/referensi/jenisinformasi");

    }

    public function editjenisinformasi($cid)
    {
        //CEK URL DECRYPT ID        
        try {
            $id = Crypt::decrypt($cid);
        }catch (DecryptException $e) {
           throw new HttpException(401);
        }
              
        $jenisinformasi = JenisInformasi::find($id);
        if (!$jenisinformasi){
            throw new HttpException(401);
        }

        return view('backend.referensi.jenisinformasi-edit',
            array("route"=>"referensi","subroute"=>"jenisinformasi","jenisinformasi"=>$jenisinformasi));

    }


    public function updatejenisinformasi(Request $request){
        $this->validate($request, ['post_id'=>'required','nama' => 'required']);
        try {
            $id = Crypt::decrypt($request->input('post_id'));
        }catch (DecryptException $e) {
           throw new HttpException(401);
        }
        $nama = $request->input('nama');
        $jenisinformasi = JenisInformasi::find($id);
        $jenisinformasi->nama = $nama ;
        if($jenisinformasi->save()){
            $request->session()->flash('notice', "Data Jenis Informasi Berhasil Diperbarui!");
            return redirect("admin/referensi/jenisinformasi");
        }

        throw new HttpException(503);
       
        
    }   

    public function deletejenisinformasi(Request $request){
        $this->validate($request, ['post_id'=>'required']);
        try {
            $id = Crypt::decrypt($request->input('post_id'));
        }catch (DecryptException $e) {
           throw new HttpException(401);
        }
        $jenisinformasi = JenisInformasi::find($id);
        $nama =$jenisinformasi->nama;
        if($jenisinformasi->delete()){
            $request->session()->flash('notice', "Data Jenis Informasi: [$nama] Berhasil Dihapus!");
            return redirect("admin/referensi/jenisinformasi");
        }

        throw new HttpException(503);
       
        
    }   


    //KATEGORI INFORMASI

    public function kategoriinformasi()
    {
        $kategoriinformasi = DB::table('kategori_informasi')->orderBy('id','asc')->get();
        return view('backend.referensi.kategoriinformasi',
            array("route"=>"referensi","subroute"=>"kategoriinformasi","kategoriinformasi"=>$kategoriinformasi));
    }

    public function datatablekategoriinformasi(){

    }

    public function createkategoriinformasi()
    {
       return view('backend.referensi.kategoriinformasi-create',
        array("route"=>"referensi","subroute"=>"kategoriinformasi"));

    }

    public function insertkategoriinformasi(Request $request)
    {
        $this->validate($request, ['nama' => 'required']);
        $nama = $request->input('nama');
        $kategoriinformasi = new kategoriinformasi;
        $kategoriinformasi->nama = $nama;
        $kategoriinformasi->save();
        $request->session()->flash('notice', "Kategori Informasi Baru Berhasil Ditambahkan!");
        return redirect("admin/referensi/kategoriinformasi");

    }

    public function editkategoriinformasi($cid)
    {
        //CEK URL DECRYPT ID        
        try {
            $id = Crypt::decrypt($cid);
        }catch (DecryptException $e) {
           throw new HttpException(401);
        }
              
        $kategoriinformasi = KategoriInformasi::find($id);
        if (!$kategoriinformasi){
            throw new HttpException(401);
        }

        return view('backend.referensi.kategoriinformasi-edit',
            array("route"=>"referensi","subroute"=>"kategoriinformasi","kategoriinformasi"=>$kategoriinformasi));

    }


    public function updatekategoriinformasi(Request $request){
        $this->validate($request, ['post_id'=>'required','nama' => 'required']);
        try {
            $id = Crypt::decrypt($request->input('post_id'));
        }catch (DecryptException $e) {
           throw new HttpException(401);
        }
        $nama = $request->input('nama');
        $kategoriinformasi = KategoriInformasi::find($id);
        $kategoriinformasi->nama = $nama ;
        if($kategoriinformasi->save()){
            $request->session()->flash('notice', "Data Kategori Informasi Berhasil Diperbarui!");
            return redirect("admin/referensi/kategoriinformasi");
        }

        throw new HttpException(503);
       
        
    }   

    public function deletekategoriinformasi(Request $request){
        $this->validate($request, ['post_id'=>'required']);
        try {
            $id = Crypt::decrypt($request->input('post_id'));
        }catch (DecryptException $e) {
           throw new HttpException(401);
        }
        $kategoriinformasi = KategoriInformasi::find($id);
        $nama =$kategoriinformasi->nama;
        if($kategoriinformasi->delete()){
            $request->session()->flash('notice', "Data Kategori Informasi: [$nama] Berhasil Dihapus!");
            return redirect("admin/referensi/kategoriinformasi");
        }

        throw new HttpException(503);
       
        
    }   


    //ALASAN KEBERATAN INFORMASI

    public function alasankeberatan()
    {
        $alasankeberatan = DB::table('alasan_keberatan')->orderBy('id','asc')->get();
        return view('backend.referensi.alasankeberatan',
            array("route"=>"referensi","subroute"=>"alasankeberatan","alasankeberatan"=>$alasankeberatan));
    }

    public function datatablealasankeberatan(){

    }

    public function createalasankeberatan()
    {
       return view('backend.referensi.alasankeberatan-create',
        array("route"=>"referensi","subroute"=>"alasankeberatan"));

    }

    public function insertalasankeberatan(Request $request)
    {
        $this->validate($request, ['nama' => 'required']);
        $nama = $request->input('nama');
        $alasankeberatan = new alasankeberatan;
        $alasankeberatan->nama = $nama;
        $alasankeberatan->save();
        $request->session()->flash('notice', "Pilihan Alasan Keberatan Baru Berhasil Ditambahkan!");
        return redirect("admin/referensi/alasankeberatan");

    }

    public function editalasankeberatan($cid)
    {
        //CEK URL DECRYPT ID        
        try {
            $id = Crypt::decrypt($cid);
        }catch (DecryptException $e) {
           throw new HttpException(401);
        }
              
        $alasankeberatan = AlasanKeberatan::find($id);
        if (!$alasankeberatan){
            throw new HttpException(401);
        }

        return view('backend.referensi.alasankeberatan-edit',
            array("route"=>"referensi","subroute"=>"alasankeberatan","alasankeberatan"=>$alasankeberatan));

    }


    public function updatealasankeberatan(Request $request){
        $this->validate($request, ['post_id'=>'required','nama' => 'required']);
        try {
            $id = Crypt::decrypt($request->input('post_id'));
        }catch (DecryptException $e) {
           throw new HttpException(401);
        }
        $nama = $request->input('nama');
        $alasankeberatan = AlasanKeberatan::find($id);
        $alasankeberatan->nama = $nama ;
        if($alasankeberatan->save()){
            $request->session()->flash('notice', "Pilihan Alasan Keberatan Berhasil Diperbarui!");
            return redirect("admin/referensi/alasankeberatan");
        }

        throw new HttpException(503);
       
        
    }   

    public function deletealasankeberatan(Request $request){
        $this->validate($request, ['post_id'=>'required']);
        try {
            $id = Crypt::decrypt($request->input('post_id'));
        }catch (DecryptException $e) {
           throw new HttpException(401);
        }
        $alasankeberatan = AlasanKeberatan::find($id);
        $nama =$alasankeberatan->nama;
        if($alasankeberatan->delete()){
            $request->session()->flash('notice', "Pilihan Alasan Keberatan: [$nama] Berhasil Dihapus!");
            return redirect("admin/referensi/alasankeberatan");
        }

        throw new HttpException(503);
       
        
    }   





}
