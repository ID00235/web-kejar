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

use App\Models\Sarana;
use Intervention\Image\ImageManagerStatic as Image;

class SaranaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.sarana.index',
            array("route"=>"sarana","subroute"=>"","sarana"=>sarana::all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function baru()
    {
         return view('backend.sarana.baru',
            array("route"=>"sarana","subroute"=>""));
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
        "isi"=> addClassTable(addClassImages($request->input('isi')))
            );

        $sarana         = new Sarana;
        $sarana->nama   = $data["nama"];
        $sarana->isi    = $data["isi"];
        $sarana->save();

        $request->session()->flash('notice', "sarana [".$data["nama"]."] Berhasil Ditambahkan!");
        return redirect("admin/sarana/detail/".$sarana->gethashid());
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
              
        $record = Sarana::find($id);
        if (!$record ){
            throw new HttpException(401);
        }
        
        return view('backend.sarana.detail',
            array("route"=>"sarana","subroute"=>"","sarana"=>$record));
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
        $record = sarana::find($id);
        if (!$record){
            throw new HttpException(401);
        }
        return view('backend.sarana.edit',
            array("route"=>"sarana","subroute"=>"","record"=>$record));
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
              
        $record = sarana::find($id);
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
        DB::table('sarana')->where('id',$id)->update($data);
        $request->session()->flash('notice', "Sarana [".$data["nama"]."] Berhasil Disimpan!");
        return redirect("admin/sarana/detail/".$record->gethashid());
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
              
        $record = sarana::find($id);
        if (!$record ){
            throw new HttpException(401);
        }

        $nama =$record->nama;
        if($record->delete()){
            $request->session()->flash('notice', "Sarana: [$nama] Berhasil Dihapus!");
            return redirect("admin/sarana");
        }

        throw new HttpException(503);
    }
}
