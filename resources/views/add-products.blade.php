@extends('layouts.app')
@section('page-title', 'Add Products')

@section('content')

<div class="main-container">
    <div class="form-wrapper">
        <h2>Add Products</h2>

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
                <label for="product_name">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Input product name" required>
            </div>

            <div class="form-group mb-3">
                <label>Product Image</label>
                <input type="file" name="product_img" id="product_img" class="form-control" accept="image/*" required>
            </div>

            <button type="submit" class="btn-submit">Save</button>
        </form>
    </div>
</div>

<style>
    body {
    background-color: #f7f9fc;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

    .main-container {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1500px;
    }
    .container {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        min-height: 80vh;
    }

    .form-wrapper {
        background: #fff;
        padding: 2rem 2.5rem;
        border-radius: 1rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        width: 100%;
        max-width: 500px;
    }

    h2 {
        text-align: center;
        margin-bottom: 1.5rem;
        color: #333;
    }

    .form-group {
        margin-bottom: 1.2rem;
    }

    label {
        font-weight: 600;
        display: block;
        margin-bottom: 0.5rem;
        color: #444;
    }

    .form-control {
        width: 100%;
        padding: 0.6rem 0.8rem;
        border: 1px solid #ccc;
        border-radius: 0.5rem;
        transition: 0.2s;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 4px rgba(0,123,255,0.3);
        outline: none;
    }

    .form-control-file {
        border: 1px solid #ddd;
        padding: 0.5rem;
        border-radius: 0.5rem;
        background: #fafafa;
    }

    .btn-submit {
        display: block;
        width: 100%;
        background-color: #007bff;
        color: white;
        border: none;
        padding: 0.75rem;
        border-radius: 0.5rem;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
    }

    .btn-submit:hover {
        background-color: #0056b3;
    }

    .alert {
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        margin-bottom: 1rem;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
    }

    ul {
        margin: 0;
        padding-left: 1.2rem;
    }
</style>

@endsection