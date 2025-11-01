@extends('admin.layouts.adminapp')
@section('page-title', 'Products Index')

@section('content')

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products Index</h1>
        <a class="btn btn-success text-decoration-none" href="/admin/product/create">Create</a>
    </div>
    <table class="table table-bordered mx-auto">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Brand</th>
                <th scope="col">Name</th>
                <th scope="col">Picture</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $product->brand->name }}</td>
                <td>{{ $product->name }}</td>
                <td>
                    <img src="{{ asset('images/Product/'. ($product->img ))}}" alt="{{ $product->name }}" style="width: 60px">
                </td>
                <td>
                    <a class="btn btn-sm btn-primary text-decoration-none" href="/admin/product/edit/{{ $product->id }}">Edit</a>
                    <a class="btn btn-sm btn-danger text-decoration-none" href="#">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection