<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Session;
use Auth;
use Hash;

class LoginController extends Controller
{
    public function form()
    {
        if(Auth::check()) return redirect()->route('/');
        
        // echo Hash::make('armatasoft3');
        return view('login');
    }
    
    public function process(Request $request)
    {
        $data = [
            'email'=> $request->user_name,
            'password'  => $request->user_password
        ];

        $user = User::where('email', $request->user_name)->get();
        if(!$user->count()) 
        {
            
            Session::flash('error', 'user tidak dikenal');
            return redirect()->route('login')->withInput($request->all);
        }

        if(!Auth::attempt($data))
        {
            //Login Fail
            Session::flash('error', 'login tidak berhasil');
            return redirect()->route('login')->withInput($request->all);
        }

        Session::flash('success', 'Selamat datang, '.Auth::user()->user_role.'!');
        if(Auth::check()) return redirect()->route('main');
    }
    
    public function logout()
    {
        Auth::logout();
        Session::flash('success', 'Logout berhasil, sampai jumpa!');
        return redirect()->route('login');
    }
}
