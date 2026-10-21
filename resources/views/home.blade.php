
@extends('layouts.app')

@section('title', 'CLOTHÉ | Wear It Your Way')

@section('content')

<!-- HERO EDITORIAL -->

<section class="editorial-hero">
    <div class="editorial-hero__copy">
        <p class="editorial-hero__eyebrow">CLOTHÉ — NEW COLLECTION</p>
        <h1>Wear it<br><em>your way.</em></h1>
        <p class="editorial-hero__description">
            Everyday essentials. Timeless character.
        </p>
        <a href="{{ url('/shop') }}" class="editorial-hero__cta">
            EXPLORE COLLECTION ↗
        </a>
    </div>

    <div class="editorial-hero__media hero-carousel" id="heroCarousel">
        <div class="hero-carousel__track">

            <!-- FOTO 1 -->
            <figure class="hero-carousel__slide is-active">
                <div class="hero-flip-inner">
                    <div class="hero-flip-front" data-hero-flip role="button" tabindex="0" aria-label="Balik foto koleksi satu">
                        <img src="https://images.unsplash.com/photo-1529139574466-a303027c1d8b?auto=format&fit=crop&w=1400&q=85" alt="Fashion editorial look">
                    </div>
                    <div class="hero-flip-back">
                        <div class="hero-flip-back__top">CLOTHÉ / 01</div>
                        <div class="hero-flip-back__content">
                            <p>THE EDITORIAL</p>
                            <h2>Less noise.<br>More character.</h2>
                            <p>Style that speaks without saying too much.</p>
                            <a href="{{ url('/shop') }}" class="hero-flip-link">DISCOVER MORE ↗</a>
                        </div>
                    </div>
                </div>
            </figure>

            <!-- FOTO 2 -->
            <figure class="hero-carousel__slide">
                <div class="hero-flip-inner">
                    <div class="hero-flip-front" data-hero-flip role="button" tabindex="0" aria-label="Balik foto koleksi dua">
                        <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=1400&q=85" alt="Essential T-shirt collection">
                    </div>
                    <div class="hero-flip-back">
                        <div class="hero-flip-back__top">CLOTHÉ / 02</div>
                        <div class="hero-flip-back__content">
                            <p>THE ESSENTIALS</p>
                            <h2>Made for<br>every day.</h2>
                            <p>Comfortable staples for your everyday rotation.</p>
                            <a href="{{ url('/shop') }}" class="hero-flip-link">SHOP ESSENTIALS ↗</a>
                        </div>
                    </div>
                </div>
            </figure>

            <!-- FOTO 3 -->
            <figure class="hero-carousel__slide">
                <div class="hero-flip-inner">
                    <div class="hero-flip-front" data-hero-flip role="button" tabindex="0" aria-label="Balik foto koleksi tiga">
                        <img src="https://images.unsplash.com/photo-1509631179647-0177331693ae?auto=format&fit=crop&w=1400&q=85" alt="Oxford shirt collection">
                    </div>
                    <div class="hero-flip-back">
                        <div class="hero-flip-back__top">CLOTHÉ / 03</div>
                        <div class="hero-flip-back__content">
                            <p>THE OXFORD</p>
                            <h2>Classic<br>by nature.</h2>
                            <p>A clean silhouette that works beyond the season.</p>
                            <a href="{{ url('/shop') }}" class="hero-flip-link">DISCOVER SHIRTS ↗</a>
                        </div>
                    </div>
                </div>
            </figure>

            <!-- FOTO 4 -->
            <figure class="hero-carousel__slide">
                <div class="hero-flip-inner">
                    <div class="hero-flip-front" data-hero-flip role="button" tabindex="0" aria-label="Balik foto koleksi empat">
                        <img src="https://images.unsplash.com/photo-1771919371651-04d6ec4c239a?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D" alt="Denim collection">
                    </div>
                    <div class="hero-flip-back">
                        <div class="hero-flip-back__top">CLOTHÉ / 04</div>
                        <div class="hero-flip-back__content">
                            <p>THE DENIM</p>
                            <h2>Built to<br>be worn.</h2>
                            <p>Versatile denim for a wardrobe that lasts.</p>
                            <a href="{{ url('/shop') }}" class="hero-flip-link">SHOP DENIM ↗</a>
                        </div>
                    </div>
                </div>
            </figure>

            <!-- FOTO 5 -->
            <figure class="hero-carousel__slide">
                <div class="hero-flip-inner">
                    <div class="hero-flip-front" data-hero-flip role="button" tabindex="0" aria-label="Balik foto koleksi lima">
                        <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=1400&q=85" alt="Contemporary fashion look">
                    </div>
                    <div class="hero-flip-back">
                        <div class="hero-flip-back__top">CLOTHÉ / 05</div>
                        <div class="hero-flip-back__content">
                            <p>THE NEW MOOD</p>
                            <h2>Your style.<br>Your rules.</h2>
                            <p>Find the pieces that feel like you.</p>
                            <a href="{{ url('/shop') }}" class="hero-flip-link">EXPLORE SHOP ↗</a>
                        </div>
                    </div>
                </div>
            </figure>

        </div>

        <div class="hero-carousel__shade"></div>

        <div class="hero-carousel__caption">
            <span id="heroCaption">THE EDITORIAL</span>
            <span id="heroCounter">01 / 05</span>
        </div>

        <div class="hero-carousel__controls">
            <button type="button" class="hero-carousel__prev" aria-label="Foto sebelumnya">←</button>
            <div class="hero-carousel__dots">
                <button type="button" class="is-active" data-slide-to="0" aria-label="Foto 1"></button>
                <button type="button" data-slide-to="1" aria-label="Foto 2"></button>
                <button type="button" data-slide-to="2" aria-label="Foto 3"></button>
                <button type="button" data-slide-to="3" aria-label="Foto 4"></button>
                <button type="button" data-slide-to="4" aria-label="Foto 5"></button>
            </div>
            <button type="button" class="hero-carousel__next" aria-label="Foto berikutnya">→</button>
        </div>
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
    
<!-- CLOTHÉ STACKED FASHION SLIDER -->
<section class="clothe-stack" id="clotheStack">

    <div class="clothe-stack__heading">
        <p class="editorial-eyebrow">CLOTHÉ / VISUAL JOURNAL</p>
        <h2>Wear it <em>your way.</em></h2>
    </div>

    <div class="clothe-stack__stage" aria-label="Fashion editorial carousel">

        <div class="clothe-stack__cards">

            <button class="clothe-stack__card" data-slide="0"
                aria-label="Lihat fashion look 1">
                <img src="https://images.unsplash.com/photo-1529139574466-a303027c1d8b?auto=format&fit=crop&w=900&q=85"
                    alt="Contemporary streetwear editorial" loading="lazy">
                <span class="clothe-stack__number">01 / THE EDITORIAL</span>
            </button>

            <button class="clothe-stack__card" data-slide="1"
                aria-label="Lihat fashion look 2">
                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=900&q=85"
                    alt="Modern everyday fashion look" loading="lazy">
                <span class="clothe-stack__number">02 / THE NEW MOOD</span>
            </button>

            <button class="clothe-stack__card" data-slide="2"
                aria-label="Lihat fashion look 3">
                <img src="https://images.unsplash.com/photo-1523398002811-999ca8dec234?auto=format&fit=crop&w=900&q=85"
                    alt="Minimal streetwear outfit" loading="lazy">
                <span class="clothe-stack__number">03 / EVERYDAY ESSENTIALS</span>
            </button>

            <button class="clothe-stack__card" data-slide="3"
                aria-label="Lihat fashion look 4">
                <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=900&q=85"
                    alt="Fashion collection inspiration" loading="lazy">
                <span class="clothe-stack__number">04 / PERSONAL STYLE</span>
            </button>

            <button class="clothe-stack__card" data-slide="4"
                aria-label="Lihat fashion look 5">
                <img src="https://images.unsplash.com/photo-1487222477894-8943e31ef7b2?auto=format&fit=crop&w=900&q=85"
                    alt="Contemporary clothing editorial" loading="lazy">
                <span class="clothe-stack__number">05 / THE COLLECTION</span>
            </button>

        </div>

        <button class="clothe-stack__control clothe-stack__prev"
            type="button" aria-label="Foto sebelumnya">←</button>

        <button class="clothe-stack__control clothe-stack__next"
            type="button" aria-label="Foto berikutnya">→</button>

    </div>

    <div class="clothe-stack__footer">
        <span>LESS NOISE. MORE CHARACTER.</span>
        <a href="{{ url('/shop') }}">EXPLORE THE COLLECTION ↗</a>
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
                src="https://i.pinimg.com/736x/6b/41/ee/6b41ee4a196e8ee0d0ab67490aa40737.jpg"
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
                src="https://i.pinimg.com/1200x/f0/5f/1e/f05f1e481ecc335b7ecf1d0eccd7f816.jpg"
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

<!-- THE CLOTHÉ PHILOSOPHY -->
<section class="brand-philosophy">
    <div class="brand-philosophy__heading">
        <p class="editorial-eyebrow">WHAT WE BELIEVE</p>
        <h2>Style is personal.<br><em>Make it yours.</em></h2>
        <p>
            We believe everyday fashion should feel effortless,
            expressive, and true to who you are.
        </p>
    </div>

    <div class="brand-philosophy__values">
        <article class="philosophy-item">
            <span>01 / STYLE</span>
            <h3>Made to Mix.</h3>
            <p>
                Pieces designed to work together and fit naturally
                into your everyday wardrobe.
            </p>
        </article>

        <article class="philosophy-item">
            <span>02 / EXPRESSION</span>
            <h3>Own Your Look.</h3>
            <p>
                Your style is your own. Find the pieces that reflect
                your personality and mood.
            </p>
        </article>

        <article class="philosophy-item">
            <span>03 / EVERYDAY</span>
            <h3>Less, but Better.</h3>
            <p>
                A considered approach to everyday dressing,
                with versatility at its core.
            </p>
        </article>
    </div>
</section>

<!-- CLOSING STATEMENT -->
<section class="home-closing">
    <p class="editorial-eyebrow">CLOTHÉ / YOUR EVERYDAY EDIT</p>
    <h2>Make it <em>yours.</em></h2>
    <p>
        Discover your next everyday favourite
        and create a style that feels like you.
    </p>
    <a href="{{ url('/shop') }}" class="editorial-hero__cta">
        EXPLORE THE COLLECTION ↗
    </a>
</section>

@endsection
