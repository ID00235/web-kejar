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

use App\Models\Prosedur;


class ProsedurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.prosedur.index',
            array("route"=>"prosedur","subroute"=>"","prosedur"=>Prosedur::all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function baru()
    {
         return view('backend.prosedur.baru',
            array("route"=>"prosedur","subroute"=>""));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, ['nama' => 'required','isi'=>'required']);

        $data = array("nama"=>$request->input('nama'),
        "isi"=> $request->input('isi'));

        $prosedur = new Prosedur;
        $prosedur->nama = $data["nama"];
        $prosedur->isi = $data["isi"];
        $prosedur->save();

        $request->session()->flash('notice', "Prosedur [".$data["nama"]."] Berhasil Ditambahkan!");
        return redirect("admin/prosedur/detail/".$prosedur->gethashid());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $id = Hashids::decode($id)[0];
              
        $record = Prosedur::find($id);
        if (!$record ){
            throw new HttpException(401);
        }
        
        return view('backend.prosedur.detail',
            array("route"=>"prosedur","subroute"=>"","prosedur"=>$record));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Hashids::decode($id)[0];
        $record = Prosedur::find($id);
        if (!$record){
            throw new HttpException(401);
        }
        return view('backend.prosedur.edit',
            array("route"=>"prosedur","subroute"=>"","record"=>$record));
    }

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
              
        $record = Prosedur::find($id);
        if (!$record){
            throw new HttpException(401);
        }

        $this->validate($request, ['nama' => 'required',
            'isi'=>'required',
             ]);

        $data = array("nama"=>$request->input('nama'),
        "isi"=> $request->input('isi'));
        DB::table('prosedur')->where('id',$id)->update($data);
        $request->session()->flash('notice', "Prosedur [".$data["nama"]."] Berhasil Disimpan!");
        return redirect("admin/prosedur");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request->input('post_id');
        $id = Hashids::decode($id)[0];
              
        $record = Prosedur::find($id);
        if (!$record ){
            throw new HttpException(401);
        }

        $nama =$record->nama;
        if($record->delete()){
            $request->session()->flash('notice', "Prosedur: [$nama] Berhasil Dihapus!");
            return redirect("admin/prosedur");
        }

        throw new HttpException(503);
    }
}
