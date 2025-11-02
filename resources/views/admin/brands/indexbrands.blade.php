@extends('admin.layouts.adminapp')
@section('page-title', 'Brands Index')

@section('content')

    {{-- Alert Success --}}
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    {{-- Main Content --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Brands Index</h1>
        <a class="btn btn-success text-decoration-none" href="/admin/brand/create">Create</a>
    </div>
    <table class="table table-bordered mx-auto">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Logo</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $brand->name }}</td>
                <td>
                    <img src="{{ asset('images/Brand/'. ($brand->logo ))}}" alt="{{ $brand->name }}" style="width: 60px">
                </td>
                <td>
                    <a class="btn btn-sm btn-primary text-decoration-none" href="/admin/brand/edit/{{ $brand->id }}">Edit</a>
                    <button type="button" data-id="{{ $brand->id }}" data-toggle="modal" data-target="#modal-delete-brand" class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection

{{-- include modal --}}
@include('admin.partials.modalDelete', [
    'modal_id'      => "modal-delete-brand",
    'modal_title'   => 'Are you sure want to delete this brand?',
    'modal_body'    => 'This will delete brand and all its products permanently. You can not undo this action.',
])

@section('script')
{{-- Script untuk modal --}}
<script> $('#modal-delete-brand').on('show.bs.modal', function (event) {
     const button = $(event.relatedTarget);
     const id = button.data('id');  
     const modal = $(this); 
     
     modal.find('#modal_href').attr('action', '/admin/brand/delete/' + id); }); 
</script>
@endsection