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
        // simpan gambar ke folder public/images/Brand
        $imageName = time() . '_' . $request->file('brandImage')->getClientOriginalName();
        $request->file('brandImage')->move(public_path('images/Brand'), $imageName);

        // masukkan data ke database
        Brand::create([
            'name'      => $request->brandName,
            'logo'      => $imageName
        ]);

        return redirect('/admin/brands')->with('success', 'The new brand has been added!');
    }

    public function edit($id){

        $brand = Brand::findOrFail($id);

        return view('admin.brands.editbrand', compact('brand'));
    }

    public function update(RequestBrandValidated $request, $id) {
        $brand = Brand::findOrFail($id);

        // if uploaded new brand logo
        if ($request->hasFile('brandImage')){
            // dd('true');
            if ($brand->logo && file_exists(public_path('images/Brand/' . $brand->logo))) {
            unlink(public_path('images/Brand/' . $brand->logo));
            }

        $file = $request->file('brandImage');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images/Brand'), $filename);
        
        $brand->logo       = $filename;
        }

        $brand->name      = $request->brandName;

        $brand->save();

        return redirect('/admin/brands')->with('success', 'Brand updated successfully');
    }

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
