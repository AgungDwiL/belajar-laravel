<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationData;

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

    // public function update(RequestProductValidated $request, $id) {
    //     $product = Product::findOrFail($id);

    //     // if uploaded new product image
    //     if ($request->hasFile('productImage')){
    //         if ($product->img && file_exists(public_path('images/Product/' . $product->img))) {
    //         unlink(public_path('images/Product/' . $product->img));
    //         }

    //     $file = $request->file('productImage');
    //     $filename = time() . '_' . $file->getClientOriginalName();
    //     $file->move(public_path('images/Product'), $filename);
        
    //     $product->img       = $filename;
    //     }

    //     $product->name      = $request->productName;
    //     $product->brand_id  = $request->idBrand;
        

    //     $product->save();

    //     return redirect('/admin/products')->with('success', 'Product updated successfully');
    // }

    // public function destroy($id){
    //     $product = Product::findOrFail($id);
    //     // Hapus gambar produk
    //     if ($product->img && file_exists(public_path('images/Product/' . $product->img))) {
    //         unlink(public_path('images/Product/' . $product->img));
    //         }

    //     // Hapus data produk
    //     $product->delete();

    //     // Return
    //     return redirect('/admin/products')->with('success', 'The Product has been deleted successfully');
    // }
}