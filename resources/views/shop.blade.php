
@extends('layouts.app')

@section('title', 'CLOTHÉ | Shop Collection')

@section('content')

<section class="shop-page">
    <div class="shop-heading">
        <p class="eyebrow">THE CLOTHÉ COLLECTION</p>
        <h1>Find Your Style</h1>
        <p class="shop-description">
            Discover timeless essentials made for your everyday style.
        </p>
    </div>

    <div class="shop-toolbar">
        <p>Our Collection</p>
        <span>4 Products</span>
    </div>

    <div class="product-grid">
@if (!request('category') || request('category') === 'tops')
        <article class="product-card">
            <div class="product-image">
                <img
                    src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=800&q=85"
                    alt="White essential cotton T-shirt"
                >
                <span class="product-tag">BESTSELLER</span>
            </div>
            <div class="product-info">
                <p class="product-category">TOPS</p>
                <h2>Essential Cotton Tee</h2>
                <p class="product-price">Rp129.000</p>
                <a class="product-link" href="{{ url('/product/essential-cotton-tee') }}">
    View Details &rarr;
</a>
            </div>
        </article>

        <article class="product-card">
            <div class="product-image">
                <img
                    src="https://images.unsplash.com/photo-1598033129183-c4f50c736f10?auto=format&fit=crop&w=800&q=85"
                    alt="Casual Oxford shirt"
                >
                <span class="product-tag">NEW</span>
            </div>
            <div class="product-info">
                <p class="product-category">TOPS</p>
                <h2>Relaxed Oxford Shirt</h2>
                <p class="product-price">Rp249.000</p>
                <a class="product-link" href="{{ url('/product/relaxed-oxford-shirt') }}">
    View Details &rarr;
</a>
            </div>
        </article>
@endif 
@if (!request('category') || request('category') === 'bottoms')
        <article class="product-card">
            <div class="product-image">
                <img
                    src="https://images.unsplash.com/photo-1542272604-787c3835535d?auto=format&fit=crop&w=800&q=85"
                    alt="Blue denim jeans"
                >
            </div>
            <div class="product-info">
                <p class="product-category">BOTTOMS</p>
                <h2>Straight Fit Denim</h2>
                <p class="product-price">Rp329.000</p>
                <a class="product-link" href="{{ url('/product/straight-fit-denim') }}">
    View Details &rarr;
</a>
            </div>
        </article>

        <article class="product-card">
            <div class="product-image">
                <img
                    src="https://images.unsplash.com/photo-1473966968600-fa801b869a1a?auto=format&fit=crop&w=800&q=85"
                    alt="Casual trousers"
                >
            </div>
            <div class="product-info">
                <p class="product-category">BOTTOMS</p>
                <h2>Everyday Chino Pants</h2>
                <p class="product-price">Rp279.000</p>
                <a class="product-link" href="{{ url('/product/everyday-chino-pants') }}">
    View Details &rarr;
</a>
            </div>
        </article>
@endif
    </div>
</section>

@endsection
