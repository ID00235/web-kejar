<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Redirect;
use OAuth;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('login')->with("google_url", "#");
        $code = $request->get('code');
        $googleService = OAuth::consumer('Google');
        $google_url = $googleService->getAuthorizationUri();
        if ( ! is_null($code))
        {
            $token = $googleService->requestAccessToken($code);        
            // Send a request with it
            $result = json_decode($googleService->request('https://www.googleapis.com/oauth2/v1/userinfo'), true);            
            $email = $result["email"];
            $picture = $result["picture"];
            $nama = $result["name"];
            $user  = User::where('email', $email)->first();
            if($user){
                $user->avatar  =$picture;
                $user->save();
                Auth::loginUsingId($user->id, true);
                return redirect()->intended('admin/');
            }else{
                return view('login')->with("google_url", $google_url)->with("google_error","Akun Google Tidak Terdaftar Sebagai USER PPID");    
            }
        }else{
            return view('login')->with("google_url", $google_url);
        }

        
    }   

    public function submitlogin(Request $request){
        $this->validate($request, ['username' => 'required','password' => 'required']);
        
        $username = $request->input('username');
        $password = $request->input('password');
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
                return redirect()->intended('admin/');
        }else{
            return back()->withErrors(array("login"=>"Username dan Password Tidak Sesuai!"));
        }
    }
    
}
