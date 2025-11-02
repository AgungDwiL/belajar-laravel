<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Requests\RequestBrandValidated;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('admin.brands.indexbrands', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.editbrand');
    }

    public function store(RequestBrandValidated $request)
    {
        // simpan gambar ke folder public/images/Product
        $imageName = time() . '_' . $request->file('brandImage')->getClientOriginalName();
        $request->file('brandImage')->move(public_path('images/Brand'), $imageName);

        // masukkan data ke database
        Brand::create([
            'name'      => $request->brandName,
            'logo'      => $imageName
        ]);

        return redirect('/admin/brands')->with('success', 'The new brand has been added!');
    }

    // public function edit($id){

    //     $product = Product::findOrFail($id);
    //     $brands  = Brand::get();

    //     return view('admin.products.editproduct', compact('brands', 'product'));
    // }

    // public function update(RequestProductValidated $request, $id) {
    //     $product = Product::findOrFail($id);

    //     // if uploaded new product image
    //     if ($request->hasFile('img')){
    //         if ($product->img && file_exists(public_path('images/Product/' . $product->img))) {
    //         unlink(public_path('images/Product/' . $product->img));
    //         }

    //     $file = $request->file('img');
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
    //     return redirect('/admin/products')->with('success', 'Produk berhasil dihapus');
    // }
}
