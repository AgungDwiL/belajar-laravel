@php
    use App\Http\Controllers\postController;
    $products = postController::getProducts();
@endphp

<style>
.feature-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 200px));
    gap: 20px;
    padding: 10px;
}

.feature-item {
    text-align: center;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 15px;
    background-color: #fafafa;
    transition: transform 0.2s;
}

.feature-item:hover {
    transform: scale(1.05);
}

.feature-product img {
    background-color: #bcccdc;
    max-width: 140px;
    max-height: 140px;
    object-fit: contain;
    border-radius: 4px;
}
</style>


<div class="feature-grid">
    @foreach ($products as $product)
    <div class="feature-item">
        <div class="feature-product">
            <img src="{{ asset('images/Product/' . $product->img) }}" alt="{{ $product->name }}">
        </div>
        <p>{{$product->name}}</p>
    </div>    
    @endforeach
</div>