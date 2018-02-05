<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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
use Yajra\Datatables\Datatables;

use App\Models\JenisInformasi;
use App\Models\KategoriInformasi;
use App\Models\Dokumen;
use App\Models\PPIDPembantu;
use App\Models\FileDokumen;
use App\Models\KodeAkses;





class DIPController extends Controller
{
    //

    public function index()
    {
        
        $jenis = JenisInformasi::all();
        return view('backend.dip.index',
        	array("route"=>"dip","subroute"=>"","jenis"=>$jenis));
    }

    public function datatable($jenis){
         if((int)$jenis==0){
            $query = Dokumen::select(['nomor','nama','jenis','kategori','tanggal','id'])
            ->get();
        }else{
            $query = Dokumen::select(['nomor','nama','jenis','kategori','tanggal','id'])
            ->whereRaw("jenis=$jenis")->get();
        }
          

         return Datatables::of($query)
         ->editColumn('nama',function(Dokumen $row){
                $id_hash = Hashids::encode($row->id);
                $url_detail = URL::to("admin/dip/detail")."/".$id_hash ;
                return "<a href=\"$url_detail\">".$row->nama."</a>";
         })
         ->editColumn('kategori',function(Dokumen $row){return $row->getkategori->nama;})
         ->editColumn('jenis',function(Dokumen $row){return $row->getjenis->nama;})
         ->addColumn('action', function(Dokumen $row){
                $id_hash = Hashids::encode($row->id);
                $url_edit = URL::to("admin/dip/edit")."/".$id_hash;
                $edit = "<a href=\"$url_edit\" class=\"btn btn-xs btn-success\">"."<i class=\"fa fa-pencil\"></i></a>";
                $delete = "<a href=\"#\"  data-id=\"$id_hash\" data-nama=\"$row->nama\" class=\"btn btn-del btn-xs btn-danger\">"."<i class=\"fa fa-trash\"></i></a>";
                return $edit." ".$delete;
         })
         ->removeColumn('id')
         ->make(true);
    }

    

    public function baru()
    {
    	$kategori = KategoriInformasi::all();
        $ppidpembantu = PPIDPembantu::all();
    	$jenis = JenisInformasi::all();
        return view('backend.dip.baru',
        	array("route"=>"dip","subroute"=>"","kategori"=>$kategori,"jenis"=>$jenis,"ppidpembantu"=>$ppidpembantu));
    }

    public function insert(Request $request)
    {

        $this->validate($request, ['nama' => 'required',
        	'tanggal'=>'required',
        	 'kandungan_informasi'=>'required',
        	 'kategori'=>'required',
        	 'jenis'=>'required',
             'penerbit'=>'required'
        	 ]);

        $nama = $request->input('nama');
        $tanggal = $request->input('tanggal');
        $kandungan_informasi = $request->input('kandungan_informasi');
        $kategori = $request->input('kategori');
        $jenis = $request->input('jenis');
        $penerbit = $request->input('penerbit');

        $dip = new Dokumen;
        $nomor = DB::table('dokumen')->select("nomor")->orderBy("nomor","desc")->first();

        if($nomor){
        	$new_nomor = (int)$nomor->nomor + 1;
        	$nomor = str_pad($new_nomor, 4, "0", STR_PAD_LEFT);
        }else{
        	$nomor="0001";

        }

        $dip->nama = $nama;
        $dip->nomor = $nomor;
        $dip->tanggal = tanggalSystem($tanggal);
        $dip->kandungan_informasi = $kandungan_informasi;
        $dip->kategori = $kategori;
        $dip->jenis = $jenis;
        $dip->penerbit = $penerbit;
        $dip->save();
        $request->session()->flash('notice', "Dokumen Informasi Publik Baru Berhasil Ditambahkan!");
        $crypt_id = Hashids::encode($dip->id);
        return redirect("admin/dip/detail/$crypt_id");

    }


    public function detail($cid)
    {
    	//CEK URL DECRYPT ID        
        $id = Hashids::decode($cid)[0];
              
        $dokumen = Dokumen::find($id);
        if (!$dokumen ){
            throw new HttpException(401);
        }

    	$filedokumen = FileDokumen::whereRaw("id_dokumen=$id")->get();
    	return view('backend.dip.detail',
        	array("route"=>"dip","subroute"=>"","dokumen"=>$dokumen,"filedokumen"=>$filedokumen));
    }

    public function edit($cid)
    {
        //CEK URL DECRYPT ID        
        $id = Hashids::decode($cid)[0];
              
        $dokumen = Dokumen::find($id);
        if (!$dokumen ){
            throw new HttpException(401);
        }

        $kategori = KategoriInformasi::all();
        $ppidpembantu = PPIDPembantu::all();
        $jenis = JenisInformasi::whereRaw("id < 100")->get();
        return view('backend.dip.edit',
            array("route"=>"dip","subroute"=>"","dokumen"=>$dokumen,"kategori"=>$kategori,"jenis"=>$jenis,"ppidpembantu"=>$ppidpembantu));
    }

    public function update(Request $request, $cid)
    {
        $this->validate($request, ['nama' => 'required',
            'tanggal'=>'required',
             'kandungan_informasi'=>'required',
             'kategori'=>'required',
             'jenis'=>'required',
             'penerbit'=>'required'
             ]);

        $nama = $request->input('nama');
        $tanggal = $request->input('tanggal');
        $kandungan_informasi = $request->input('kandungan_informasi');
        $kategori = $request->input('kategori');
        $jenis = $request->input('jenis');
        $penerbit = $request->input('penerbit');

        try {
            $id = Crypt::decrypt($cid);
        }catch (DecryptException $e) {
           throw new HttpException(401);
        }
              
        $record = Dokumen::find($id);
        if (!$record){
            throw new HttpException(401);
        }   

        $record->nama = $nama;
        $record->tanggal = tanggalSystem($tanggal);
        $record->kandungan_informasi = $kandungan_informasi;
        $record->kategori = $kategori;
        $record->jenis = $jenis;
        $record->penerbit = $penerbit;
        $record->save();
        $crypt_id = Hashids::encode($id);
        $request->session()->flash('notice', "Perubahan Data Informasi Dokumen Berhasil di Simpan");
        return redirect("admin/dip/detail/$crypt_id");

        $record->save();



    }

    public function upload(Request $request, $cid)
    {
        
        $this->validate($request, ['file' => 'required']);
        
        try {
            $id = Crypt::decrypt($cid);
        }catch (DecryptException $e) {
           throw new HttpException(401);
        }
              
        $record = Dokumen::find($id);
        if (!$record){
            throw new HttpException(401);
        }

        $dokumen = Dokumen::find($id);

        $direktori = $dokumen->nomor;
        $crypt_id = Hashids::encode($id);
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $mime = $file->getClientMimeType();
        $namafile = str_replace(" ",".",$file->getClientOriginalName());
        $filename = "dokumen/$direktori/".$namafile;
        Storage::disk('local')->put($filename,  File::get($file));
        
        $file_dokumen = new FileDokumen;
        $file_dokumen->id_dokumen = $id;
        $file_dokumen->filename = $namafile;
        $file_dokumen->direktori = $direktori;
        $file_dokumen->save();
        $request->session()->flash('notice', "Files Dokumen Berhasil di Upload");
        return redirect("admin/dip/detail/$crypt_id");

        //download file
        // $file = Storage::disk('local')->get($filename);
    

       // return (new Response($file, 200))
       //       ->header('Content-Type', $mime);
        //return redirect("admin/dip/detail/$crypt_id");
       
    }

    public function deletefiledokumen(Request $request){
        $this->validate($request, ['id_file' => 'required']);
        $id = Hashids::decode($request->input('id_file'));
        $id = $id[0];
        $filedokumen = FileDokumen::find($id);
        $id_dokumen = $filedokumen->id_dokumen;
        $dokumen = Dokumen::find($id_dokumen);

        if($filedokumen){
            $filedokumen->delete();
        }
        Storage::disk('local')->delete("dokumen/".$dokumen->nomor."/".$filedokumen->filename);

        $crypt_id = Hashids::encode($id_dokumen);
        $request->session()->flash('notice', "Files Dokumen Berhasil di Hapus");
        return redirect("admin/dip/detail/$crypt_id");
    }


    public function delete(Request $request){
        $this->validate($request, ['post_id' => 'required']);
        $id = Hashids::decode($request->input('post_id'));
        $id = $id[0];
        $dokumen = Dokumen::find($id);
        $filedokumen = FileDokumen::whereRaw("id_dokumen=$id")->get();
        foreach($filedokumen as $files){
            Storage::disk('local')->delete("dokumen/".$dokumen->nomor."/".$files->filename);
        }

        DB::table('file_dokumen')->whereRaw("id_dokumen = $id")->delete();
        $dokumen->delete();        
        return redirect("admin/dip");
    }
    
    
    public function changeaksesdokumen($cid, $cid2){
        $id = Hashids::decode($cid)[0];
        
        $file = FileDokumen::find($id);
        if (!$file ){
            throw new HttpException(401);
        }
        $kode = KodeAkses::find($id);
        $kunci = $file->kunci;
        if($kunci){
            $kunci = 0;
        }else{
            $kunci =1;
        }
        $file->kode  = $kode->kode;
        $file->kunci =$kunci;
        $file->save(); 
        return redirect("admin/dip/detail/$cid2");
    }

}
