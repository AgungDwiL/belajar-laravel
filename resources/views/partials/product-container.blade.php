@php
    use App\Http\Controllers\postController;
    $products = postController::getProducts();
@endphp

<style>
    .feature-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 20px;
    margin-top: 30px;
    }

    .feature-product {
        background: #bcccdc;
        border-radius: 10px;
        padding: 20px;
        transition: 0.3s;
        height: 200px;
    }

    .feature-product img {
        max-width: 150px;
        margin-bottom: 10px;
    }

    .feature-item:hover {
        background: #e0ebff;
    }
</style>


<div class="feature-grid">
    @foreach ($products as $product)
    <div class="feature-item">
        <div class="feature-product">
            <img src="{{ asset("images\Product\Valve.png") }}" alt="{{ $product->product_name }}">
        </div>
        <p>{{$product->product_name}}</p>
    </div>    
    @endforeach
</div>