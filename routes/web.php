
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Data Produk CLOTHÉ
|--------------------------------------------------------------------------
*/

$products = [
    'essential-cotton-tee' => [
        'name' => 'Essential Cotton Tee',
        'category' => 'TOPS',
        'price' => 'Rp129.000',
        'price_numeric' => 129000,
        'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=800&q=85',
        'description' => 'Kaus simpel untuk melengkapi gaya sehari-hari. Mudah dipadukan dengan berbagai jenis celana.',
    ],

    'relaxed-oxford-shirt' => [
        'name' => 'Relaxed Oxford Shirt',
        'category' => 'TOPS',
        'price' => 'Rp249.000',
        'price_numeric' => 249000,
        'image' => 'https://images.unsplash.com/photo-1598033129183-c4f50c736f10?auto=format&fit=crop&w=800&q=85',
        'description' => 'Kemeja kasual yang cocok untuk penampilan rapi maupun santai.',
    ],

    'straight-fit-denim' => [
        'name' => 'Straight Fit Denim',
        'category' => 'BOTTOMS',
        'price' => 'Rp329.000',
        'price_numeric' => 329000,
        'image' => 'https://images.unsplash.com/photo-1542272604-787c3835535d?auto=format&fit=crop&w=800&q=85',
        'description' => 'Celana denim dengan siluet straight fit yang mudah dipadukan dengan koleksi atasan CLOTHÉ.',
    ],

    'everyday-chino-pants' => [
        'name' => 'Everyday Chino Pants',
        'category' => 'BOTTOMS',
        'price' => 'Rp279.000',
        'price_numeric' => 279000,
        'image' => 'https://images.unsplash.com/photo-1473966968600-fa801b869a1a?auto=format&fit=crop&w=800&q=85',
        'description' => 'Celana kasual untuk melengkapi penampilan sehari-hari dengan gaya minimalis.',
    ],
];


/*
|--------------------------------------------------------------------------
| Halaman Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});


/*
|--------------------------------------------------------------------------
| Halaman Shop
|--------------------------------------------------------------------------
*/

Route::get('/shop', function () {
    return view('shop');
});


/*
|--------------------------------------------------------------------------
| Halaman Detail Produk
|--------------------------------------------------------------------------
*/

Route::get('/product/{slug}', function (string $slug) use ($products) {

    abort_unless(isset($products[$slug]), 404);

    return view('product', [
        'product' => $products[$slug],
        'slug' => $slug,
    ]);
});


/*
|--------------------------------------------------------------------------
| Halaman Keranjang
|--------------------------------------------------------------------------
*/

Route::get('/cart', function () {

    $cart = session()->get('cart', []);

    $total = 0;

    foreach ($cart as $item) {
        $total += $item['price_numeric'] * $item['quantity'];
    }

    return view('cart', [
        'cart' => $cart,
        'total' => $total,
    ]);
});


/*
|--------------------------------------------------------------------------
| Tambahkan Produk ke Keranjang
|--------------------------------------------------------------------------
*/

Route::post('/cart/add/{slug}', function (
    Request $request,
    string $slug
) use ($products) {

    abort_unless(isset($products[$slug]), 404);

    $validated = $request->validate([
        'size' => 'required|in:S,M,L,XL',
        'quantity' => 'required|integer|min:1|max:10',
    ]);

    $size = $validated['size'];
    $quantity = (int) $validated['quantity'];

    $cart = session()->get('cart', []);

    $key = $slug . '-' . $size;

    if (isset($cart[$key])) {

        $cart[$key]['quantity'] += $quantity;

    } else {

        $cart[$key] = [
            'slug' => $slug,
            'name' => $products[$slug]['name'],
            'category' => $products[$slug]['category'],
            'price_numeric' => $products[$slug]['price_numeric'],
            'image' => $products[$slug]['image'],
            'size' => $size,
            'quantity' => $quantity,
        ];
    }

    session()->put('cart', $cart);

    return redirect('/cart')->with(
        'success',
        'Produk berhasil ditambahkan ke keranjang.'
    );
});


/*
|--------------------------------------------------------------------------
| Update Jumlah Produk di Keranjang
|--------------------------------------------------------------------------
*/

Route::post('/cart/update/{key}', function (
    Request $request,
    string $key
) {
    $validated = $request->validate([
        'quantity' => 'required|integer|min:1|max:10',
    ]);

    $cart = session()->get('cart', []);

    abort_unless(isset($cart[$key]), 404);

    $cart[$key]['quantity'] = (int) $validated['quantity'];

    session()->put('cart', $cart);

    return redirect('/cart')->with(
        'success',
        'Jumlah produk berhasil diperbarui.'
    );
});


/*
|--------------------------------------------------------------------------
| Hapus Produk dari Keranjang
|--------------------------------------------------------------------------
*/

Route::post('/cart/remove/{key}', function (string $key) {

    $cart = session()->get('cart', []);

    abort_unless(isset($cart[$key]), 404);

    unset($cart[$key]);

    session()->put('cart', $cart);

    return redirect('/cart')->with(
        'success',
        'Produk berhasil dihapus dari keranjang.'
    );
});
