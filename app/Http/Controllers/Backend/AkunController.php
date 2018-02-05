<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use DB;
use Crypt;
use Hash;
use Illuminate\Contracts\Encryption\DecryptException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Vinkla\Hashids\Facades\Hashids;
use Auth;
use App\User;


class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record = User::find(Auth::user()->id);
        return view('backend.akun.index',
            array("route"=>"akun","subroute"=>"","record"=>$record));
    }

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
                'password' => 'required_if:ganti_password,1|min:5|confirmed',
                'password_confirmation' => 'required_if:ganti_password,1|min:5'
             ]);

        $data = array("nama"=>$request->input('nama'),
                    "email"=>$request->input('email'),
                    "password"=>Hash::make($request->input('password')));

        $record->nama = $data["nama"];
        $record->email = $data["email"];
        if($request->input("ganti_password")=="1"){
            $record->password = $data["password"];
        }
        $record->save();

        $request->session()->flash('notice', "Perubahan Data User ID [".$record->username."] Berhasil Disimpan!");
        return redirect("admin/akun");

    }

}
