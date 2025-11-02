<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationData;

class UserController extends Controller
{
    public function register(Request $request){
        // validation
        $validatedRequest = $request->validate([
            'name'      => 'string|required',
            'username'  => 'required|unique:App\User,username|alpha_num',
            'password'  => 'required|string|min:6'
        ]);

        // add data to database
        User::create([
            'name'      => $validatedRequest['name'],
            'username'  => $validatedRequest['username'],
            'password'  => Hash::make($request['password'])
        ]);
        
        return view('guest.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required|alpha_num',
            'password' => 'required|string'
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        
        return redirect('/login')->with('error', 'username or password must be wrong');
    }

    public function logout(){
        Auth::logout();
        request()->session()->regenerate();
        
        return redirect('/');
    }
}