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
        <h1 class="h2">Users Index</h1>
        <a class="btn btn-success text-decoration-none" href="/admin/user/create">Create</a>
    </div>
    <table class="table table-bordered mx-auto">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a class="btn btn-sm btn-primary text-decoration-none" href="/admin/user/edit/{{ $user->id }}">Edit</a>
                    <button type="button" data-id="{{ $user->id }}" data-toggle="modal" data-target="#modal-delete-user" class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection



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