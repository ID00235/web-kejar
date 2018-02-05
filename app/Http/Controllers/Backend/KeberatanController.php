<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use DB;
use Crypt;
use PDF;
use URL;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Encryption\DecryptException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\Datatables\Datatables;

use App\Models\Keberatan;



class KeberatanController extends Controller
{
    //

    public function index()
    {
        return view('backend.keberatan.index',
        	array("route"=>"keberatan","subroute"=>""));
    }

    public function create()
    {
        return view('backend.keberatan.baru',
            array("route"=>"keberatan","subroute"=>""));
    }

    public function datatable(){
        $query = Keberatan::select(['nomor','nomor_permohonan','nama_pemohon','alasan_keberatan','tanggal','id'])
            ->orderBy('nomor','desc')->get();
        

         return Datatables::of($query)
         ->editColumn('tanggal',function(Keberatan $row){
                
                return tanggal_singkat_indo($row->tanggal);
         })
         ->addColumn('action', function(Keberatan $row){
                $id_hash = Hashids::encode($row->id);
                $url_detail = URL::to("admin/keberatan/detail")."/".$id_hash;
                $proses = "<a href=\"$url_detail\" class=\"btn btn-xs btn-default\">".
                        "<i class=\"fa fa-eye\"></i> Lihat</a>";
                return $proses;
         })
         ->removeColumn('id')
         ->make(true);
    }

    



    public function detail($cid)
    {
    	//CEK URL DECRYPT ID        
        $id = Hashids::decode($cid)[0];
              
        $keberatan = Keberatan::find($id);
        if (!$keberatan ){
            throw new HttpException(401);
        }
        
    	return view('backend.keberatan.detail',
        	array("route"=>"keberatan","subroute"=>"","keberatan"=>$keberatan));
    }


    public function edit($cid)
    {
      //CEK URL DECRYPT ID        
       
        try {
            $id = Crypt::decrypt($cid);
        }catch (DecryptException $e) {
           throw new HttpException(401);
        }

        $keberatan = Keberatan::find($id);
        if (!$keberatan ){
            throw new HttpException(401);
        }
        
      return view('backend.keberatan.edit',
          array("route"=>"keberatan","subroute"=>"","keberatan"=>$keberatan));
    }


    public function store(Request $request){
        $this->validate($request,[
          'nomor_permohonan' => 'required',
          'nama_pemohon'=>'required',
          'alamat_pemohon'=> 'required',
          'telp_pemohon'=> 'required',
          'pekerjaan_pemohon'=> 'required',
          'informasi_tujuan'=> 'required',
          'alasan_keberatan'=> 'required',
          'nama_kuasa'=> 'required_if:kuasa_pemohon,1',
          'alamat_kuasa'=> 'required_if:kuasa_pemohon,1',
          'telp_kuasa'=> 'required_if:kuasa_pemohon,1',
          'pekerjaan_kuasa'=> 'required_if:kuasa_pemohon,1',
          'captcha' => 'required|captcha'
        ]);

        $nomor = DB::table('keberatan')->select("nomor")->orderBy("nomor","desc")->first();
        if($nomor){
          $nomor = $nomor->nomor;
          $nomor = str_replace("KB","",$nomor);
          $new_nomor = (int)$nomor + 1;
          $nomor = "KB".str_pad($new_nomor, 4, "0", STR_PAD_LEFT);
        }else{
          $nomor="KB0001";
        }

        $tanggal = date("Y-m-d");
        $keberatan = new Keberatan;
        $keberatan->nomor = $nomor;
        $keberatan->nomor_permohonan = $request->input('nomor_permohonan');
        $keberatan->nama_pemohon = $request->input('nama_pemohon');
        $keberatan->alamat_pemohon = $request->input('alamat_pemohon');
        $keberatan->telp_pemohon = $request->input('telp_pemohon');
        $keberatan->pekerjaan_pemohon = $request->input('pekerjaan_pemohon');
        if($request->input('kuasa_pemohon')){
            $keberatan->dikuasakan = 1;
            $keberatan->nama_kuasa = $request->input('nama_kuasa');
            $keberatan->alamat_kuasa = $request->input('alamat_kuasa');
            $keberatan->telp_kuasa = $request->input('telp_kuasa');
            $keberatan->pekerjaan_kuasa = $request->input('pekerjaan_kuasa');
        }
        
        $keberatan->alasan_keberatan = $request->input('alasan_keberatan');
        $keberatan->informasi_tujuan = $request->input('informasi_tujuan');
        $keberatan->keterangan = $request->input('keterangan');
        $keberatan->tanggal = $tanggal;
        $keberatan->save();
        $request->session()->flash('notice', "Registrasi Keberatan [".$keberatan->nomor."] Berhasil Disimpan!");
        return redirect("admin/keberatan/detail/" .$keberatan->gethashid());
    }


     public function update(Request $request, $cid){
        $this->validate($request,[
          'nomor_permohonan' => 'required',
          'nama_pemohon'=>'required',
          'alamat_pemohon'=> 'required',
          'telp_pemohon'=> 'required',
          'pekerjaan_pemohon'=> 'required',
          'informasi_tujuan'=> 'required',
          'alasan_keberatan'=> 'required',
          'nama_kuasa'=> 'required_if:kuasa_pemohon,1',
          'alamat_kuasa'=> 'required_if:kuasa_pemohon,1',
          'telp_kuasa'=> 'required_if:kuasa_pemohon,1',
          'pekerjaan_kuasa'=> 'required_if:kuasa_pemohon,1',
          'captcha' => 'required|captcha'
        ]);

        try {
            $id = Crypt::decrypt($cid);
        }catch (DecryptException $e) {
           throw new HttpException(401);
        }

        $keberatan = Keberatan::find($id);        
        $keberatan->nomor_permohonan = $request->input('nomor_permohonan');
        $keberatan->nama_pemohon = $request->input('nama_pemohon');
        $keberatan->alamat_pemohon = $request->input('alamat_pemohon');
        $keberatan->telp_pemohon = $request->input('telp_pemohon');
        $keberatan->pekerjaan_pemohon = $request->input('pekerjaan_pemohon');
        if($request->input('kuasa_pemohon')){
            $keberatan->dikuasakan = 1;
            $keberatan->nama_kuasa = $request->input('nama_kuasa');
            $keberatan->alamat_kuasa = $request->input('alamat_kuasa');
            $keberatan->telp_kuasa = $request->input('telp_kuasa');
            $keberatan->pekerjaan_kuasa = $request->input('pekerjaan_kuasa');
        }else{
            $keberatan->dikuasakan = 0;
            $keberatan->nama_kuasa = '';
            $keberatan->alamat_kuasa = '';
            $keberatan->telp_kuasa = '';
            $keberatan->pekerjaan_kuasa = '';
        }
        
        $keberatan->alasan_keberatan = $request->input('alasan_keberatan');
        $keberatan->informasi_tujuan = $request->input('informasi_tujuan');
        $keberatan->keterangan = $request->input('keterangan');
        $keberatan->save();
        $request->session()->flash('notice', "Data Registrasi Keberatan [".$keberatan->nomor."] Berhasil Disimpan!");
        return redirect("admin/keberatan/detail/" .$keberatan->gethashid());
    }


    public function delete(Request $request, $cid){
        
        try {
            $id = Crypt::decrypt($cid);
        }catch (DecryptException $e) {
           throw new HttpException(401);
        }

         $keberatan = Keberatan::find($id); 
         $request->session()->flash('notice', "Registrasi Keberatan [".$keberatan->nomor."] Berhasil Dihapus!");
         $keberatan->delete();
         return redirect("admin/keberatan");
  }

    public function cetak($nomor){
        try {
            $id = Crypt::decrypt($nomor);
        }catch (DecryptException $e) {
           throw new HttpException(401);
        }     

        $keberatan = Keberatan::find($id);
        if (!$keberatan ){
            throw new HttpException(401);
        }
        
        $pdf = PDF::loadView('cetak.keberatan', array("keberatan"=>$keberatan));
        $pdf->setPaper('folio', 'potrait');

        return $pdf->download("Formulir Keberatan #".$keberatan->nomor.".pdf");
    }

}
