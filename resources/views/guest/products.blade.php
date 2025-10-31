@extends('guest.layouts.app')
@section('page-title', 'Our Products')

@section('content')

<div class="features container">
    <section class="intro container">
        <h1>Our Products</h1>
    </section>
    @include('guest.partials.product-container')
</div>
@endsection