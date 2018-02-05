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
use Vinkla\Hashids\Facades\Hashids;
use Validator;
use App\Models\Agenda;
use Intervention\Image\ImageManagerStatic as Image;

class AgendaController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.agenda.index',
            array("route"=>"agenda","subroute"=>""));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, ['nama' => 'required','lokasi'=>'required','tanggal_mulai'=>'required']);

        $data = array("nama"=>$request->input('nama'),
                    "lokasi"=> $request->input('lokasi'),
                    "tanggal_mulai"=> $request->input('tanggal_mulai'),
                    "tanggal_selesai"=> $request->input('tanggal_selesai'),
                );

        $record = new Agenda;
        $record->nama = $data["nama"];
        $record->lokasi = $data["lokasi"];
        $record->tanggal_mulai = tanggalSystem($data["tanggal_mulai"]);
        if($data["tanggal_selesai"]){
            $record->tanggal_selesai = tanggalSystem($data["tanggal_selesai"]);
        }
        $record->save();

        return  response()->json(['status' => true,'message'=>"Data Agenda Baru Berhasil Disimpan!"]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $id = Crypt::decrypt($id);
        }catch (DecryptException $e) {
           throw new HttpException(401);
        }
              
        $record = DataAngka::find($id);
        if (!$record){
            throw new HttpException(401);
        }

        $this->validate($request, ['nama' => 'required',
            'isi'=>'required',
             ]);

        $data = array(
                "nama"=>$request->input('nama'),
                 "isi"=> addClassTable(addClassImages($request->input('isi')))
        );
        DB::table('agenda')->where('id',$id)->update($data);
        return  response()->json(['status' => true,'message'=>"Edit Agenda Berhasil Disimpan!"]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), ['crypt'=>'required']);
        
        if(!$validator->fails()){
            
            $id = $request->input('crypt');
            try {
                $id = Crypt::decrypt($id);
            }catch (DecryptException $e) {
                return  response()->json(['status' => false,'message'=>"Terjadi Kesalahan, Gagal Menambahkan Photo!"]); 
            }
            
            $gallery = Agenda::find($id);
            $gallery->delete();
            return  response()->json(['status' => true,'message'=>"Agenda Berhasil dihapus!"]); 
        }        
        
        return  response()->json(['status' => false,'message'=>"Terjadi Kesalahan, Gagal Menghapus Agenda!"]); 

    }

    public function listagenda()
    {
        
        $agenda = Agenda::orderBy('tanggal_mulai','desc')->paginate(12);
        
        return view('backend.agenda.list',array("agenda"=>$agenda));
    }


    public function detail($id){
        $id = Hashids::decode($id)[0];
        
        $record = Agenda::find($id);
        if (!$record){
            return  response()->json(['status' => false,'message'=>"Photo tidak ditemukan"]); 
        }
        
        return  response()->json(['status' => true,'data'=>$record,'crypt'=>Crypt::encrypt($record->id)]); 
    }
    
}
