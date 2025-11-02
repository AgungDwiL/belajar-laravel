@php
    $is_edit = isset($brand)
@endphp

@extends('admin.layouts.adminapp')
@section('page-title',  (($is_edit) ? 'Edit Brand' : 'Create Brand' ))

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $is_edit ? 'Edit Brand' : 'Create Brand' }}</h1>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if($is_edit)
                    <div class="d-flex justify-content-center align-items-center p-2 fw-bold">
                        <h4 class="fw-bold border-bottom pb-1 d-inline-block">{{ $brand->name }}</h4>
                    </div>
                @endif
                <form action="/admin/brand/{{ $is_edit ? 'update/'.$brand->id : 'store' }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($is_edit)
                        @method('patch')
                    @endif
                    <div class="form-group mb-4">
                        <label class="font-weight-bold" for="brandName">Brand Name</label>
                        <input type="text" id="brandName" name="brandName" class="form-control @error('brandName') is-invalid @enderror" value="{{ $is_edit ? $brand->name : old('brandName') }}">
                        @error('brandName')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @if($is_edit)
                        <div class="mb-4">
                            <label class="form-label font-weight-bold">Current Brand Logo</label>
                            <br>
                            <img src="{{ asset('images/Brand/' . $brand->logo) }}" alt="Brand Logo" width="150" class="border shadow p-3 d-block mx-auto">
                        </div>
                    @endif
                    <div class="form-group mb-4">
                        <label class="font-weight-bold" for="brandImage">Brand Logo</label>
                        <input type="file" name="brandImage" id="brandImage" class="form-control-file @error('brandImage') is-invalid @enderror" accept="image/*">
                        @error('brandImage')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex flex-row mt-5 justify-content-around">
                        @if($is_edit)
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-brand">Delete</button>
                        @else
                            <button type="submit" class="btn btn-success">Create</button>
                        @endif
                        <a class="btn btn-warning" href="/admin/brands">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@if($is_edit)
    {{-- include modal --}}
    @include('admin.partials.modalDelete', [
        'modal_id'      => 'modal-delete-brand',
        'modal_title'   => 'Are you sure want to delete this brand?',
        'modal_body'    => 'This will delete brand and all its products permanently. You can not undo this action.',
        'modal_href'    => '/admin/brand/delete/'.$brand->id
    ])
@endif