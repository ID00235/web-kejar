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
use App\Models\Setting;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record = Setting::find(1);
        return view('backend.setting.index',
            array("route"=>"setting","subroute"=>"","record"=>$record));
    }

    public function update(Request $request)
    {

        $record = Setting::find(1);
        $record->alamat = $request->input('alamat');
        $record->email = $request->input('email');
        $record->facebook = $request->input('facebook');
        $record->twitter = $request->input('twitter');
        $record->telepon = $request->input('telepon');
        
        $record->save();

        $request->session()->flash('notice', "Perubahan Settingan Aplikasi Berhasil Disimpan!");
        return redirect("admin/setting");

    }

}
