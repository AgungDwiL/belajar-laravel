@php
    $is_edit = isset($user)
@endphp

@extends('admin.layouts.adminapp')
@section('page-title',  (($is_edit) ? 'Edit User' : 'Create User' ))

@section('head')
    <style>
    /* Hide form by default */
    .collapse-area {
    display: none;
    }

    /* Show when checkbox checked */
    #toggleForm:checked ~ .collapse-area {
    display: block;
    }
    </style>
@endsection


@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $is_edit ? 'Edit User' : 'Create User' }}</h1>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if($is_edit)
                    <div class="d-flex justify-content-center align-items-center p-2 fw-bold">
                        <h4 class="fw-bold border-bottom pb-1 d-inline-block">{{ $user->name }}</h4>
                    </div>
                @endif
                <form action="/admin/user/{{ $is_edit ? 'update/'.$user->id : 'store' }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($is_edit)
                        @method('patch')
                    @endif
                    <div class="form-group mb-4">
                        <label class="font-weight-bold" for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $is_edit ? $user->name : old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="font-weight-bold" for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ $is_edit ? $user->username : old('username') }}">
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @if($is_edit)
                        <!-- Label & checkbox di atas -->
                        <div class="d-flex justify-content-left mb-2">
                            <label for="toggleForm" class="font-weight-bold col-sm-5">
                                Edit user's password?
                            </label>
                            <input type="checkbox" id="toggleForm" name="toggleForm" class="form-check-input mr-2 col-sm-8" {{ old('toggleForm') ? 'checked' : '' }}>

                        <!-- BOX Password jadi sibling -->
                            <div class="collapse-area border rounded p-3">

                                <label class="font-weight-bold" for="password">New Password</label>
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    @else
                        <div class="form-group mb-4">
                        <label class="font-weight-bold" for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        </select>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    @endif

                    @if($is_edit)
                        <!-- Label & checkbox di atas -->
                        <div class="d-flex justify-content-left mb-2">
                            <label for="toggleForm" class="font-weight-bold col-sm-5">
                                Change user's role?
                            </label>
                            <input type="checkbox" id="toggleForm" name="toggleForm" class="form-check-input mr-2 col-sm-8" {{ old('toggleForm') ? 'checked' : '' }}>

                        <!-- BOX Role jadi sibling -->
                            <div class="collapse-area border rounded p-3">

                                <label class="font-weight-bold" for="role">Choose role user bellow</label>
                                <select name="role" name="role" id="role" class="custom-select">
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="guest" {{ $user->role === 'guest' ? 'selected' : '' }}>Guest</option>
                                </select>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endif
                    
                    <div class="d-flex flex-row mt-5 justify-content-around">
                        @if($is_edit)
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-danger" data-id="{{ $user->id }}" data-toggle="modal" data-target="#modal-delete-user">Delete</button>
                        @else
                            <button type="submit" class="btn btn-success">Create</button>
                        @endif
                        <a class="btn btn-warning" href="/admin/users">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@if($is_edit)
    @section('script')
        {{-- include modal --}}
        @include('admin.partials.modalDelete', [
        'modal_id'      => 'modal-delete-user',
        'modal_title'   => 'Are you sure want to delete this user?',
        'modal_body'    => 'This will delete user permanently. You can not undo this action.',
        ])
        
        {{-- Script untuk modal --}}
        <script> $('#modal-delete-user').on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget);
            const id = button.data('id');
            const modal = $(this); 
            
            modal.find('#modal_href').attr('action', '/admin/user/delete/' + id); }); 
        </script>
    @endsection
@endif