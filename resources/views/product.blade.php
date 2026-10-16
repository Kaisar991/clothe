
@extends('layouts.app')

@section('title')
    CLOTHÉ | {{ $product['name'] }}
@endsection

@section('content')

<section class="product-detail-page">

    <a href="{{ url('/shop') }}" class="back-to-shop">
        &larr; Back to Shop
    </a>

    <div class="product-detail-grid">

        <!-- Gambar Produk -->
        <div class="product-detail-image">
            <img
                src="{{ $product['image'] }}"
                alt="{{ $product['name'] }}"
            >
        </div>

        <!-- Informasi Produk -->
        <div class="product-detail-info">

            <p class="eyebrow">
                {{ $product['category'] }}
            </p>

            <h1>{{ $product['name'] }}</h1>

            <p class="product-detail-price">
                Rp{{ number_format($product['price_numeric'], 0, ',', '.') }}
            </p>

            <div class="product-detail-divider"></div>

            <p class="product-detail-description">
                {{ $product['description'] }}
            </p>

            <!-- Pesan Kesalahan -->
            @if ($errors->any())
                <div class="product-error">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <!-- Form Tambah ke Keranjang -->
            <form
                action="{{ url('/cart/add/' . $slug) }}"
                method="POST"
                class="add-to-cart-form"
            >

                @csrf

                <div class="form-field">
                    <label for="size">Choose Size</label>

                    <select id="size" name="size" required>
                        <option value="">Pilih ukuran</option>

                        <option value="S"
                            {{ old('size') == 'S' ? 'selected' : '' }}>
                            S
                        </option>

                        <option value="M"
                            {{ old('size') == 'M' ? 'selected' : '' }}>
                            M
                        </option>

                        <option value="L"
                            {{ old('size') == 'L' ? 'selected' : '' }}>
                            L
                        </option>

                        <option value="XL"
                            {{ old('size') == 'XL' ? 'selected' : '' }}>
                            XL
                        </option>
                    </select>
                </div>

                <div class="form-field">
                    <label for="quantity">Quantity</label>

                    <input
                        type="number"
                        id="quantity"
                        name="quantity"
                        min="1"
                        max="10"
                        value="{{ old('quantity', 1) }}"
                        required
                    >
                </div>

                <button type="submit" class="button-primary add-cart-button">
                    Add to Cart
                </button>

            </form>

        </div>

    </div>

</section>

@endsection