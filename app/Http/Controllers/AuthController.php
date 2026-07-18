<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Essential import
use Illuminate\Support\Facades\Auth; // Essential import

class AuthController extends Controller
{
    

    public function register(Request $request)
    {
        $cridit=$request->validate([
            'name'=>'required|min:5|max:10',
            "email"=>'required',
            'password'=>'required|confirmed|min:5|max:255'
        ]);
        $cridit['name']=strip_tags($cridit['name']);
        $cridit['password']=bcrypt($cridit['password']);
        $user=User::create($cridit);
        Auth::login($user);
        return redirect('/boards')->with('success','you are now registred');
    }

    public function login(Request $request)
    {
        $cridit=$request->validate([
            "email"=>'required',
            'password'=>'required|min:5|max:255'
        ]);
        if(!Auth()->attempt($cridit)){
            return redirect()->back()->with('error','pls cheque your email or password');
        }
        $request->session()->regenerate();
        return redirect('/boards')->with('success','you looged in');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success','you looged out');
    }
}