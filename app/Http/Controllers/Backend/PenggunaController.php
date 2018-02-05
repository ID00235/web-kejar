<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use DB;
use Crypt;
use Hash;
use Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;

use App\User;


class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username = Auth::user()->username;
        return view('backend.pengguna.index',
            array("route"=>"pengguna","subroute"=>"","pengguna"=>User::whereRaw("username!='master' and username !='$username'")->get()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function baru()
    {
         return view('backend.pengguna.baru',
            array("route"=>"pengguna","subroute"=>""));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        
        $this->validate($request, ['nama' => 'required',
                'username'=>'required|unique:users|min:5',
                'email'=>'required|email',
                'usertype'=>'required',
                'password' => 'required|min:5|confirmed',
                'password_confirmation' => 'required|min:5']);

        $data = array("nama"=>$request->input('nama'),
                    "username"=> $request->input('username'),
                    "email"=>$request->input('email'),
                    "usertype"=>$request->input('usertype'),
                    "password"=>Hash::make($request->input('password')));

        $pengguna = new User;
        $pengguna->nama = $data["nama"];
        $pengguna->username = $data["username"];
        $pengguna->email = $data["email"];
        $pengguna->password = $data["password"];
        $pengguna->usertype = $data["usertype"];
        $pengguna->save();

        $request->session()->flash('notice', "User ID [".$data["username"]."] Berhasil Ditambahkan!");
        return redirect("admin/pengguna");
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
              
        $record = User::find($id);
        if (!$record ){
            throw new HttpException(401);
        }
        
        return view('backend.pengguna.detail',
            array("route"=>"pengguna","subroute"=>"","pengguna"=>$record));
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
        $record = User::find($id);
        if (!$record){
            throw new HttpException(401);
        }
        return view('backend.pengguna.edit',
            array("route"=>"pengguna","subroute"=>"","record"=>$record));
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
              
        $record = User::find($id);
        if (!$record){
            throw new HttpException(401);
        }

        $this->validate($request, ['nama' => 'required',
                'email'=>'required|email',
                'usertype'=>'required',
                'password' => 'required_if:ganti_password,1|min:5|confirmed',
                'password_confirmation' => 'required_if:ganti_password,1|min:5'
             ]);

        $data = array("nama"=>$request->input('nama'),
                    "email"=>$request->input('email'),
                    "usertype"=>$request->input('usertype'),
                    "password"=>Hash::make($request->input('password')));

        $record->nama = $data["nama"];
        $record->email = $data["email"];
        $record->usertype = $data["usertype"];
        if($request->input("ganti_password")=="1"){
            $record->password = $data["password"];
        }
        $record->save();

        $request->session()->flash('notice', "Perubahan Data User ID [".$record->username."] Berhasil Disimpan!");
        return redirect("admin/pengguna");

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
              
        $record = User::find($id);
        if (!$record ){
            throw new HttpException(401);
        }

        $username =$record->username;
        if($record->delete()){
            $request->session()->flash('notice', "Username : [$username] Berhasil Dihapus!");
            return redirect("admin/pengguna");
        }

        throw new HttpException(503);
    }
}
