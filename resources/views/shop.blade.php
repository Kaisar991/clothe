
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

    <!-- Form pencarian dan filter kategori -->
    <form action="{{ url('/shop') }}" method="GET" class="shop-filter-form">

        <input
            type="search"
            name="q"
            value="{{ $search }}"
            placeholder="Cari nama produk..."
            aria-label="Cari nama produk"
        >

        <select name="category" aria-label="Pilih kategori">
            <option value="" {{ $category === '' ? 'selected' : '' }}>
                Semua Kategori
            </option>

            <option value="tops" {{ $category === 'tops' ? 'selected' : '' }}>
                Tops
            </option>

            <option value="bottoms" {{ $category === 'bottoms' ? 'selected' : '' }}>
                Bottoms
            </option>
        </select>

        <button type="submit" class="button-primary">
            Cari Produk
        </button>

        @if ($search !== '' || $category !== '')
            <a href="{{ url('/shop') }}" class="shop-reset-link">
                Reset
            </a>
        @endif

    </form>

    <div class="shop-toolbar">
        <p>Our Collection</p>

        <span>
            {{ $products->count() }}
            {{ $products->count() === 1 ? 'Product' : 'Products' }}
        </span>
    </div>

    @if ($products->isNotEmpty())

        <div class="product-grid">

            @foreach ($products as $product)

                <article class="product-card">

                    <div class="product-image">

                        <a
                            href="{{ url('/product/' . $product['slug']) }}"
                            class="product-image-link"
                        >
                            <img
                                src="{{ $product['image'] }}"
                                alt="{{ $product['name'] }}"
                                loading="lazy"
                            >
                        </a>

                        @if ($product['slug'] === 'essential-cotton-tee')
                            <span class="product-tag">BESTSELLER</span>
                        @elseif ($product['slug'] === 'relaxed-oxford-shirt')
                            <span class="product-tag">NEW</span>
                        @endif

                    </div>

                    <div class="product-info">

                        <p class="product-category">
                            {{ $product['category'] }}
                        </p>

                        <h2>{{ $product['name'] }}</h2>

                        <p class="product-price">
                            Rp{{ number_format($product['price_numeric'], 0, ',', '.') }}
                        </p>

                        <a
                            href="{{ url('/product/' . $product['slug']) }}"
                            class="product-link"
                        >
                            View Details &rarr;
                        </a>

                    </div>

                </article>

            @endforeach

        </div>

    @else

        <div class="cart-empty">
            <h2>Produk tidak ditemukan</h2>

            <p>
                Coba kata pencarian lain atau ubah kategori yang kamu pilih.
            </p>

            <a href="{{ url('/shop') }}" class="button-primary">
                Lihat Semua Produk
            </a>
        </div>

    @endif

</section>

@endsection
