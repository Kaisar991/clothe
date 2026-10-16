
@extends('layouts.app')

@section('title', 'CLOTHÉ | Discover Your Style')

@section('content')

<section class="hero">
    <div class="hero-content">
        <p class="eyebrow">THE NEW COLLECTION</p>

        <h1>Discover Your Style</h1>

        <p class="hero-description">
            Temukan koleksi baju dan celana untuk melengkapi
            gaya sehari-harimu.
        </p>

        <a href="{{ url('/shop') }}" class="button-primary">
            Explore Collection
        </a>
    </div>
</section>

<section class="categories">
    <div class="section-heading">
        <p class="eyebrow">EXPLORE OUR COLLECTION</p>
        <h2>Shop by Category</h2>
    </div>

    <div class="category-grid">
        <a href="{{ url('/shop?category=tops') }}"
           class="category-card category-tops">
            <span>Tops</span>
            <span class="category-arrow">↗</span>
        </a>

        <a href="{{ url('/shop?category=bottoms') }}"
           class="category-card category-bottoms">
            <span>Bottoms</span>
            <span class="category-arrow">↗</span>
        </a>
    </div>
</section>

@endsection
