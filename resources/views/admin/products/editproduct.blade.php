@php
    $is_edit = isset($product)
@endphp

@extends('admin.layouts.adminapp')
@section('page-title',  (($is_edit) ? 'Edit Product' : 'Create Product' ))

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $is_edit ? 'Edit Produk' : 'Create Product' }}</h1>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if($is_edit)
                    <div class="d-flex p-2 font-weight-bold text-decoration-underline">
                        {{ $product->name }}
                    </div>
                @endif
                <form action="/admin/product/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label class="font-weight-bold" for="productName">Product Name</label>
                        <input type="text" id="productName" name="productName" class="form-control @error('productName') is-invalid @enderror">
                        @error('productName')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="font-weight-bold" for="idBrand">Product Brand</label>
                        <select class="custom-select form-control @error('idBrand') is-invalid @enderror" name="idBrand" id="idBrand">
                            <option disabled selected>Choose brand below!</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        @error('idBrand')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="font-weight-bold" for="productImage">Product Image</label>
                        <input type="file" name="productImage" id="productImage" class="form-control-file @error('productImage') is-invalid @enderror" accept="image/*">
                        @error('productImage')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex flex-row mt-5 justify-content-around">
                        <button type="submit" class="btn btn-success">Create</button>
                        <a class="btn btn-warning" href="/admin/products">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection