
@extends('layouts.app')

@section('title', 'CLOTHÉ | Shopping Cart')

@section('content')

<section class="cart-page">

    <div class="cart-heading">
        <p class="eyebrow">YOUR SELECTION</p>
        <h1>Shopping Cart</h1>
        <p>Periksa kembali produk pilihanmu sebelum melanjutkan.</p>
    </div>

    @if (session('success'))
        <div class="cart-alert">
            {{ session('success') }}
        </div>
    @endif

    @if (count($cart) > 0)

        <div class="cart-layout">

            <div class="cart-items">

                @foreach ($cart as $key => $item)

                    <article class="cart-item">

                        <div class="cart-item-image">
                            <img
                                src="{{ $item['image'] }}"
                                alt="{{ $item['name'] }}"
                            >
                        </div>

                        <div class="cart-item-info">

                            <p class="product-category">
                                {{ $item['category'] }}
                            </p>

                            <h2>{{ $item['name'] }}</h2>
                                       
<p>Ukuran: {{ $item['size'] }}</p>

<form
    action="{{ url('/cart/update/' . $key) }}"
    method="POST"
    class="cart-update-form"
>
    @csrf

    <label for="quantity-{{ $key }}">Jumlah:</label>

    <div class="cart-quantity-control">
        <input
            type="number"
            id="quantity-{{ $key }}"
            name="quantity"
            value="{{ $item['quantity'] }}"
            min="1"
            max="10"
            required
        >

        <button type="submit" class="cart-update-button">
            Update
        </button>
    </div>
</form>

<form
    action="{{ url('/cart/remove/' . $key) }}"
    method="POST"
    class="cart-remove-form"
>
    @csrf

    <button type="submit" class="cart-remove-button">
        Hapus Produk
    </button>
</form>


                            <p class="cart-item-price">
                                Rp{{ number_format($item['price_numeric'], 0, ',', '.') }}
                            </p>

                            <p class="cart-item-subtotal">
                                Subtotal:
                                Rp{{ number_format($item['price_numeric'] * $item['quantity'], 0, ',', '.') }}
                            </p>

                        </div>

                    </article>

                @endforeach

            </div>

            <aside class="cart-summary">

                <h2>Order Summary</h2>

                <div class="cart-summary-line">
                    <span>Total Belanja</span>
                    <strong>
                        Rp{{ number_format($total, 0, ',', '.') }}
                    </strong>
                </div>

                <a href="{{ url('/shop') }}" class="button-primary cart-continue">
                    Continue Shopping
                </a>

            </aside>

        </div>

    @else

        <div class="cart-empty">
            <h2>Keranjangmu masih kosong</h2>

            <p>
                Yuk, temukan pakaian favoritmu di koleksi CLOTHÉ.
            </p>

            <a href="{{ url('/shop') }}" class="button-primary">
                Explore Collection
            </a>
        </div>

    @endif

</section>

@endsection
