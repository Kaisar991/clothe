
@extends('layouts.app')

@section('title', 'CLOTHÉ | Order Confirmation')

@section('content')

<section class="success-page">

    <div class="success-card">

        <div class="success-icon">
            &#10003;
        </div>

        <p class="eyebrow">THANK YOU FOR SHOPPING WITH US</p>

        <h1>Order Received!</h1>

        <p class="success-description">
            Terima kasih telah berbelanja di CLOTHÉ.
            Ringkasan pesananmu tersimpan dalam sesi saat ini.
        </p>

        <div class="order-number">
            <span>Nomor Pesanan</span>
            <strong>{{ $order['order_number'] }}</strong>
        </div>

        <div class="success-divider"></div>

        <div class="success-details">
            <h2>Order Details</h2>

            <p>
                <span>Nama</span>
                <strong>{{ $order['customer']['name'] }}</strong>
            </p>

            <p>
                <span>Email</span>
                <strong>{{ $order['customer']['email'] }}</strong>
            </p>

            <p>
                <span>Nomor Telepon</span>
                <strong>{{ $order['customer']['phone'] }}</strong>
            </p>

            <p>
                <span>Alamat Pengiriman</span>
                <strong>{{ $order['customer']['address'] }}</strong>
            </p>

            <p>
                <span>Metode Pembayaran</span>
                <strong>
                    @if ($order['customer']['payment_method'] === 'qris')
                        QRIS
                    @elseif ($order['customer']['payment_method'] === 'bank_transfer')
                        Transfer Bank
                    @else
                        Cash on Delivery (COD)
                    @endif
                </strong>
            </p>
        </div>

        <div class="success-divider"></div>

        <h2 class="success-items-title">Products Ordered</h2>

        @foreach ($order['items'] as $item)
            <div class="success-product">
                <img
                    src="{{ $item['image'] }}"
                    alt="{{ $item['name'] }}"
                >

                <div class="success-product-info">
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

        <div class="success-total">
            <span>Total Belanja</span>
            <strong>
                Rp{{ number_format($order['total'], 0, ',', '.') }}
            </strong>
        </div>

        <p class="success-date">
            Tanggal pemesanan: {{ $order['created_at'] }}
        </p>

        <a href="{{ url('/shop') }}" class="button-primary success-button">
            Continue Shopping
        </a>

    </div>

</section>

@endsection
