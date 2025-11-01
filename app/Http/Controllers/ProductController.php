<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Requests\RequestProductValidated;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // Fungsi untuk admin 
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.products.indexproducts', compact('products'));
    }

    public function create()
    {
        $brands = Brand::get();
        return view('admin.products.editproduct', compact('brands'));
    }

    public function store(RequestProductValidated $request)
    {
        // simpan gambar ke folder public/images/Product
        $imageName = time() . '_' . $request->file('productImage')->getClientOriginalName();
        $request->file('productImage')->move(public_path('images/Product'), $imageName);

        // masukkan data ke database
        Product::create([
            'name'      => $request->productName,
            'brand_id'  => $request->idBrand,
            'img'       => $imageName
        ]);

        return redirect('/admin/products')->with('success', 'The product has been added!');
    }

    public function edit(){
        
    }


    // Fungsi untuk Guest
    public function show()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('guest.products', compact('products'));
    }
}

