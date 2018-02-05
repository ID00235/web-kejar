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


use App\Models\SpesialKonten;


class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.support.index',
            array("route"=>"support","subroute"=>""));
    }


    public function datatable(){

        $query = SpesialKonten::select(['id','nama','filename'])->get();

         return Datatables::of($query)
         ->addColumn('action', function(SpesialKonten $row){
                $id_hash = Hashids::encode($row->id);
                $url_download = URL::to("download")."/".$row->filename;
                $download = "<a href=\"$url_download\" class=\"btn btn-xs btn-default\">"."<i class=\"fa fa-download\"></i> Download</a>";
                $delete = "<a href=\"#\"  data-id=\"$id_hash\" data-nama=\"$row->nama\" class=\"btn btn-del btn-xs btn-danger\">"."<i class=\"fa fa-trash\"></i></a>";
                $edit = "<a href=\"#\" data-id=\"$id_hash\" data-nama=\"$row->nama\"  class=\"btn btn-edit btn-xs btn-success\">"."<i class=\"fa fa-edit\"></i></a>";
                return "<span class=\"pull-right\">".$download." ".$edit." ".$delete."</span>";
                return "";
         })
         ->removeColumn('filename')
         ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function baru()
    {
         return view('backend.support.baru',
            array("route"=>"support","subroute"=>""));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, ['nama' => 'required','file'=>'required']);


        $data = array("nama"=>$request->input('nama'));

        $support = new SpesialKonten;
        $support->nama = $data["nama"];
        

        $direktori = time();
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $mime = $file->getClientMimeType();
        $namafile = str_replace(" ",".",$file->getClientOriginalName());
        $filename = "spesial/$direktori/".$namafile;
        Storage::disk('local')->put($filename,  File::get($file));
        
        $support->filename = $filename;
        $support->save();

        $request->session()->flash('notice', "Spesial Konten [".$data["nama"]."] Berhasil Ditambahkan!");
        return redirect("admin/support");
    }

    public function update(Request $request)
    {
        
        $this->validate($request, ['nama' => 'required','id_edit'=>'required']);

        $id = $request->input('id_edit');
        $id = Hashids::decode($id)[0];
        $data = array("nama"=>$request->input('nama'));
        $record = SpesialKonten::find($id);
        if (!$record ){
            throw new HttpException(401);
        }

        $record->nama = $data["nama"];
        $record->save();
        return redirect("admin/support");
    }

    
    public function delete(Request $request)
    {
        $id = $request->input('post_id');
        $id = Hashids::decode($id)[0];
              
        $record = SpesialKonten::find($id);
        if (!$record ){
            throw new HttpException(401);
        }

        $nama =$record->nama;
        $filename = $record->filename;
        Storage::disk('local')->delete($filename);
        if($record->delete()){
            $request->session()->flash('notice', "File/Dokumen : [$nama] Berhasil Dihapus!");
            return redirect("admin/support");
        }

        throw new HttpException(503);
    }
}
