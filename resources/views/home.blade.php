
@extends('layouts.app')

@section('title', 'CLOTHÉ | Wear It Your Way')

@section('content')

<!-- HERO EDITORIAL -->
<section class="editorial-hero">

    <div class="editorial-hero__content">

        <div class="editorial-index">
            <span>01</span>
            <span>THE CLOTHÉ EDIT</span>
            <span>2026</span>
        </div>

        <p class="editorial-eyebrow">
            CONTEMPORARY ESSENTIALS
        </p>

        <h1>
            Wear it<br>
            your <em>way.</em>
        </h1>

        <p class="editorial-description">
            Everyday essentials, reimagined.
            Discover clothing that speaks through
            simplicity, character, and individuality.
        </p>

        <div class="editorial-actions">

            <a href="{{ url('/shop') }}" class="editorial-button">
                Discover the collection
                <span>↗</span>
            </a>

            <a
                href="{{ url('/shop?category=tops') }}"
                class="editorial-text-link"
            >
                Explore tops
            </a>

        </div>

        <div class="editorial-footnote">
            <span>EVERYDAY UNIFORM</span>
            <span>STYLE / NO. 001</span>
        </div>

    </div>

    
<div class="editorial-hero__media hero-carousel"
     data-hero-carousel
     aria-label="CLOTHÉ fashion collection">

    <div class="hero-carousel__track" aria-live="polite">

        <!-- LOOK 01: Editorial -->
        <figure class="hero-carousel__slide is-active"
                data-caption="A STUDY IN STYLE"
                aria-hidden="false">
            <img
                src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=1400&q=85"
                alt="Editorial fashion look CLOTHÉ"
                fetchpriority="high"
            >
        </figure>

        <!-- LOOK 02: Essential Tee -->
        <figure class="hero-carousel__slide"
                data-caption="THE EVERYDAY LAYER"
                aria-hidden="true">
            <img
                src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=1400&q=85"
                alt="Essential Cotton Tee"
                loading="lazy"
            >
        </figure>

        <!-- LOOK 03: Oxford Shirt -->
        <figure class="hero-carousel__slide"
                data-caption="EASY STRUCTURE"
                aria-hidden="true">
            <img
                src="https://images.unsplash.com/photo-1598033129183-c4f50c736f10?auto=format&fit=crop&w=1400&q=85"
                alt="Relaxed Oxford Shirt"
                loading="lazy"
            >
        </figure>

        <!-- LOOK 04: Denim -->
        <figure class="hero-carousel__slide"
                data-caption="DENIM, REDEFINED"
                aria-hidden="true">
            <img
                src="https://images.unsplash.com/photo-1542272604-787c3835535d?auto=format&fit=crop&w=1400&q=85"
                alt="Straight Fit Denim"
                loading="lazy"
            >
        </figure>

        <!-- LOOK 05: Chino -->
        <figure class="hero-carousel__slide"
                data-caption="EVERYDAY FORM"
                aria-hidden="true">
            <img
                src="https://images.unsplash.com/photo-1473966968600-fa801b869a1a?auto=format&fit=crop&w=1400&q=85"
                alt="Everyday Chino Pants"
                loading="lazy"
            >
        </figure>

    </div>

    <div class="editorial-media-shade"></div>

    <div class="editorial-vertical-label">
        CLOTHÉ — CONTEMPORARY DRESSING
    </div>

    <div class="editorial-media-caption">
        <span data-hero-index>FIG. 001</span>
        <span data-hero-caption>A STUDY IN STYLE</span>
    </div>

    <div class="hero-carousel__controls">

        <button type="button"
                class="hero-carousel__arrow"
                data-hero-prev
                aria-label="Foto sebelumnya">
            &#8592;
        </button>

        <div class="hero-carousel__dots"
             aria-label="Pilih foto koleksi">

            <button type="button"
                    class="hero-carousel__dot is-active"
                    data-hero-dot="0"
                    aria-label="Tampilkan foto 1"
                    aria-pressed="true"></button>

            <button type="button"
                    class="hero-carousel__dot"
                    data-hero-dot="1"
                    aria-label="Tampilkan foto 2"
                    aria-pressed="false"></button>

            <button type="button"
                    class="hero-carousel__dot"
                    data-hero-dot="2"
                    aria-label="Tampilkan foto 3"
                    aria-pressed="false"></button>

            <button type="button"
                    class="hero-carousel__dot"
                    data-hero-dot="3"
                    aria-label="Tampilkan foto 4"
                    aria-pressed="false"></button>

            <button type="button"
                    class="hero-carousel__dot"
                    data-hero-dot="4"
                    aria-label="Tampilkan foto 5"
                    aria-pressed="false"></button>

        </div>

        <button type="button"
                class="hero-carousel__arrow"
                data-hero-next
                aria-label="Foto berikutnya">
            &#8594;
        </button>

    </div>

    <div class="editorial-stamp">
        <span>C.</span>
        <small>COLLECTION<br>NO. 01</small>
    </div>

</div>

<script src="{{ asset('js/hero-slider.js') }}" defer></script>

    </div>

</section>


<!-- BRAND STATEMENT -->
<section class="brand-statement">

    <div class="brand-statement__label">
        <span>01 / OUR APPROACH</span>
        <span>LESS, BUT BETTER.</span>
    </div>

    <div class="brand-statement__content">

        <h2>
            Less noise.<br>
            <em>More character.</em>
        </h2>

        <p>
            CLOTHÉ is about finding confidence in the everyday.
            Thoughtful essentials, timeless silhouettes, and
            personal style without unnecessary noise.
        </p>

        <a href="{{ url('/shop') }}" class="editorial-text-link">
            Find your style <span>↗</span>
        </a>

    </div>

</section>


<!-- COLLECTION CATEGORIES -->
<section class="home-collections">

    <div class="collection-heading">

        <div>
            <p class="editorial-eyebrow">CURATED FOR EVERYDAY</p>
            <h2>The selection<span>.</span></h2>
        </div>

        <a href="{{ url('/shop') }}" class="editorial-text-link">
            View all products ↗
        </a>

    </div>

    <div class="collection-grid">

        <a
            href="{{ url('/shop?category=tops') }}"
            class="collection-card"
        >

            <img
                src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=1000&q=85"
                alt="Essential cotton T-shirt collection"
                loading="lazy"
            >

            <div class="collection-card__overlay">

                <div class="collection-card__top">
                    <span>01 / CATEGORY</span>
                    <span>↗</span>
                </div>

                <div>
                    <p>THE EVERYDAY LAYER</p>
                    <h3>Tops</h3>
                </div>

            </div>

        </a>


        <a
            href="{{ url('/shop?category=bottoms') }}"
            class="collection-card"
        >

            <img
                src="https://images.unsplash.com/photo-1542272604-787c3835535d?auto=format&fit=crop&w=1000&q=85"
                alt="Classic denim trousers collection"
                loading="lazy"
            >

            <div class="collection-card__overlay">

                <div class="collection-card__top">
                    <span>02 / CATEGORY</span>
                    <span>↗</span>
                </div>

                <div>
                    <p>MADE TO MOVE</p>
                    <h3>Bottoms</h3>
                </div>

            </div>

        </a>

    </div>

    <div class="collection-bottom">
        <span>CLOTHÉ / COLLECTION 01</span>
        <span>BUILT AROUND YOUR EVERYDAY</span>
    </div>

</section>

@endsection
