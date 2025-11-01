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
                    <div class="d-flex justify-content-center align-items-center p-2 fw-bold">
                        <h4 class="fw-bold border-bottom pb-1 d-inline-block">{{ $product->name }}</h4>
                    </div>
                @endif
                <form action="/admin/product/{{ $is_edit ? 'update/'.$product->id : 'store' }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($is_edit)
                        @method('patch')
                    @endif
                    <div class="form-group mb-4">
                        <label class="font-weight-bold" for="productName">Product Name</label>
                        <input type="text" id="productName" name="productName" class="form-control @error('productName') is-invalid @enderror" value="{{ $is_edit ? $product->name : old('productName') }}">
                        @error('productName')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="font-weight-bold" for="idBrand">Product Brand</label>
                        <select class="custom-select form-control @error('idBrand') is-invalid @enderror" name="idBrand" id="idBrand">
                            @if (!$is_edit)
                                <option disabled selected>Choose brand below!</option>
                            @endif
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ ($is_edit && ($product->brand_id == $brand->id)) ? 'selected' : ''}}>
                                    {{ $brand->name }}</option>
                            @endforeach
                        </select>
                        @error('idBrand')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @if($is_edit)
                        <div class="mb-4">
                            <label class="form-label font-weight-bold">Current Product Image</label>
                            <br>
                            <img src="{{ asset('images/Product/' . $product->img) }}" alt="Product Image" width="150" class="border shadow p-3 d-block mx-auto">
                        </div>
                    @endif
                    <div class="form-group mb-4">
                        <label class="font-weight-bold" for="productImage">Product Image</label>
                        <input type="file" name="productImage" id="productImage" class="form-control-file @error('productImage') is-invalid @enderror" accept="image/*">
                        @error('productImage')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex flex-row mt-5 justify-content-around">
                        @if($is_edit)
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <a class="btn btn-danger" href="#">Delete</a>
                        @else
                            <button type="submit" class="btn btn-success">Create</button>
                        @endif
                        <a class="btn btn-warning" href="/admin/products">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection