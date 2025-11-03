<?php

namespace App\Http\Controllers;

use App\User;
use GuzzleHttp\Promise\Is;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\IsEmpty;

// use Illuminate\Validation\ValidationData;

class UserController extends Controller
{
    // fungsi untuk guest
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
            if(Auth::user()->role === 'admin'){
                return redirect()->intended('/admin');    
            }
            return redirect()->intended('/');
        }
        
        return redirect('/login')->with('error', 'username or password must be wrong');
    }

    public function logout(){
        Auth::logout();
        request()->session()->regenerate();
        
        return redirect('/');
    }

    // fungsi untuk admin
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.users.indexusers', compact('users'));
    }

    public function create()
    {
        return view('admin.users.edituser');
    }

    public function store(Request $request)
    {
        // masukkan data ke database
        $new_user = $request->validate([
            'name'      => 'required|string',
            'username'  => 'required|unique:\App\User,username|alpha_num',
            'password'  => 'required|string|min:8'
        ]);

        User::create([
            'name'      => $new_user['name'],
            'username'  => $new_user['username'],
            'password'  => Hash::make($new_user['password'])
        ]);

        return redirect('/admin/users')->with('success', 'The user has been added!');
    }

    public function edit($id){

        $user = User::findOrFail($id);

        return view('admin.users.edituser', compact('user'));
    }

    public function update(Request $request, $id) {

        $user= User::findOrFail($id);
        
        // validasi input user
        $validated = $request->validate([
            'name'      => 'required|string',
            'username'  => 'required|alpha_num|unique:\App\User,username,'.$user->id,
            'password'  => 'nullable|string|min:8',
            'role'      => 'nullable|string|in:admin,guest'
        ]);
        
        $user->name     = $validated['name'];
        $user->username = $validated['username'];
        
        if(($validated['password']) !== null) {
            $user->password = Hash::make($validated['password']);
        }
        if($user->role !== $validated['role']) {
            $user->role = $validated['role'];
        }

        $user->save();

        return redirect('/admin/users')->with('success', 'User updated successfully');
    }

    public function destroy($id){
        $user = User::findOrFail($id);

        // Hapus data user
        $user->delete();

        // Return
        return redirect('/admin/users')->with('success', 'The Product has been deleted successfully');
    }
}