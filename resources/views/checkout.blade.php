
@extends('layouts.app')

@section('title', 'CLOTHÉ | Checkout')

@section('content')

<section class="checkout-page">

    <div class="checkout-heading">
        <p class="eyebrow">ALMOST YOURS</p>
        <h1>Checkout</h1>
        <p>Lengkapi data pemesanan untuk melanjutkan.</p>
    </div>

    @if ($errors->any())
        <div class="checkout-error">
            <p>Periksa kembali data yang kamu masukkan:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="checkout-layout">

        <!-- Form Data Pelanggan -->
        <div class="checkout-form-section">

            <h2>Informasi Pemesan</h2>

            <form action="{{ url('/checkout') }}" method="POST">
                @csrf

                <div class="checkout-field">
                    <label for="name">Nama Lengkap</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama lengkap"
                        maxlength="100"
                        autocomplete="name"
                        required
                    >
                </div>

                <div class="checkout-field">
                    <label for="email">Alamat Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="nama@email.com"
                        maxlength="255"
                        autocomplete="email"
                        required
                    >
                </div>

                <div class="checkout-field">
                    <label for="phone">Nomor Telepon</label>
                    <input
                        type="tel"
                        id="phone"
                        name="phone"
                        value="{{ old('phone') }}"
                        placeholder="Contoh: 081234567890"
                        maxlength="25"
                        autocomplete="tel"
                        required
                    >
                </div>

                <div class="checkout-field">
                    <label for="address">Alamat Pengiriman</label>
                    <textarea
                        id="address"
                        name="address"
                        rows="4"
                        maxlength="1000"
                        autocomplete="street-address"
                        placeholder="Masukkan alamat lengkap"
                        required
                    >{{ old('address') }}</textarea>
                </div>

                <div class="checkout-field">
                    <label for="payment_method">Metode Pembayaran</label>

                    <select
                        id="payment_method"
                        name="payment_method"
                        required
                    >
                        <option value="">Pilih metode pembayaran</option>

                        <option
                            value="qris"
                            {{ old('payment_method') == 'qris' ? 'selected' : '' }}
                        >
                            QRIS
                        </option>

                        <option
                            value="bank_transfer"
                            {{ old('payment_method') == 'bank_transfer' ? 'selected' : '' }}
                        >
                            Transfer Bank
                        </option>

                        <option
                            value="cod"
                            {{ old('payment_method') == 'cod' ? 'selected' : '' }}
                        >
                            Cash on Delivery (COD)
                        </option>
                    </select>
                </div>

                <button type="submit" class="button-primary checkout-submit">
                    Place Order
                </button>

            </form>

            <a href="{{ url('/cart') }}" class="checkout-back-link">
                &larr; Kembali ke Keranjang
            </a>

        </div>

        <!-- Ringkasan Pesanan -->
        <aside class="checkout-summary">

            <h2>Order Summary</h2>

            @foreach ($cart as $item)
                <div class="checkout-product">

                    <img
                        src="{{ $item['image'] }}"
                        alt="{{ $item['name'] }}"
                    >

                    <div class="checkout-product-info">
                        <h3>{{ $item['name'] }}</h3>

                        <p>Ukuran: {{ $item['size'] }}</p>

                        <p>Jumlah: {{ $item['quantity'] }}</p>

                        <strong>
                            Rp{{ number_format(
                                $item['price_numeric'] * $item['quantity'],
                                0,
                                ',',
                                '.'
                            ) }}
                        </strong>
                    </div>

                </div>
            @endforeach

            <div class="checkout-total">
                <span>Total Belanja</span>

                <strong>
                    Rp{{ number_format($total, 0, ',', '.') }}
                </strong>
            </div>

            <p class="checkout-note">
                Harga di atas merupakan total belanja produk.
                Biaya pengiriman belum dihitung.
            </p>

        </aside>

    </div>

</section>

@endsection
