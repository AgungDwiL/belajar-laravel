<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('guest.products', compact('products'));
    }

    public function create()
    {
        return view('add-products');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_img' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // simpan gambar ke folder public/images/Product
        $imageName = time() . '_' . $request->file('product_img')->getClientOriginalName();
        $request->file('product_img')->move(public_path('images/Product'), $imageName);

        // masukkan data ke database
        DB::table('products')->insert([
            'product_name' => $request->product_name,
            'product_img_url' => $imageName,
            'time_modified' => now(),
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }
}

