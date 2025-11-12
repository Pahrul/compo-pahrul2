<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }

    public function actionLogin(Request $request)
    {
        $validate =  $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //jika email dan password benar
        if (Auth::attempt($validate)) {
            return redirect()->intended('admin/dashboard');
        }
        // return redirect()->to('login');
        return back()->withErrors(['email' => 'Please check your email and Password'])->withInput();
    }

    public function logOut()
    {
        Auth::logOut();
        return redirect()->to('login');
    }
}
