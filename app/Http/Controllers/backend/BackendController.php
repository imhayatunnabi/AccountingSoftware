<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class BackendController extends Controller
{
    public function index(){
        return view('backend.pages.dashboard.index');
    }
    public function login(){
        return view('auth.login');
    }
    public function loginSubmit(Request $request){
        $request->validate([
            'input' => 'required',
            'password' => 'required',
            // 'g-recaptcha-response' => 'required|captcha'
        ]);
        if (auth()->attempt(['username' => $request->input, 'password' => $request->password])) {
            Alert::success('Login Success');
            return to_route('backend.index');
        } elseif (auth()->attempt(['email' => $request->input, 'password' => $request->password])) {
             Alert::success('Login Success');
            return redirect()->route('backend.index');
        } elseif (auth()->attempt(['phone' => $request->input, 'password' => $request->password])) {
            Alert::success('Login Success');
            return to_route('backend.index');
        } else {
            Alert::error('Login Failed');
            return to_route('backend.auth.login');
        }
    }
    public function logout(){
        auth()->logout();
        Alert::success('Logout Success');
        return to_route('backend.auth.login');

   }
}