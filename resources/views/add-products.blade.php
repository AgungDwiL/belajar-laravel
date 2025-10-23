@extends('layouts.app')
@section('page-title', 'Add Products')

@section('content')

<div class="features container">
    <section class="intro container">
        <h1>Add Products</h1>
    </section>

     @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label>Product Name</label>
            <input type="text" name="product_name" class="form-control" placeholder="Input product name">
        </div>

        <div class="form-group mb-3">
            <label>Product Image</label>
            <input type="file" name="product_img" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection