document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.querySelector('#heroCarousel');
    if (!carousel) return;

    const slides = Array.from(carousel.querySelectorAll('.hero-carousel__slide'));
    const dots = Array.from(carousel.querySelectorAll('[data-slide-to]'));
    const prevButton = carousel.querySelector('.hero-carousel__prev');
    const nextButton = carousel.querySelector('.hero-carousel__next');
    const caption = document.querySelector('#heroCaption');
    const counter = document.querySelector('#heroCounter');

    const captions = [
        'THE EDITORIAL',
        'THE ESSENTIALS',
        'THE OXFORD',
        'THE DENIM',
        'THE NEW MOOD'
    ];

    let currentIndex = 0;
    let autoplayTimer = null;
    const heroSection = carousel.closest('.editorial-hero');

    function syncBlurredBackground() {
        const activeSlide = slides[currentIndex];
        const image = activeSlide?.querySelector('.hero-flip-front img');
        if (heroSection && image) {
            heroSection.style.setProperty('--hero-bg-image', `url("${image.currentSrc || image.src}")`);
        }
    }

    function stopAutoplay() {
        if (autoplayTimer !== null) {
            window.clearInterval(autoplayTimer);
            autoplayTimer = null;
        }
    }

    function startAutoplay() {
        stopAutoplay();

        if (
            slides.length < 2 ||
            window.matchMedia('(prefers-reduced-motion: reduce)').matches ||
            carousel.matches(':hover') ||
            carousel.classList.contains('has-flipped-card')
        ) {
            return;
        }

        autoplayTimer = window.setInterval(() => {
            showSlide(currentIndex + 1);
        }, 6000);
    }

    function setFlipped(slide, shouldFlip) {
        slide.classList.toggle('is-flipped', shouldFlip);
        carousel.classList.toggle('has-flipped-card', shouldFlip);

        if (shouldFlip) {
            stopAutoplay();
        } else {
            startAutoplay();
        }
    }

    function showSlide(index) {
        currentIndex = (index + slides.length) % slides.length;

        slides.forEach((slide, slideIndex) => {
            const isActive = slideIndex === currentIndex;

            slide.classList.toggle('is-active', isActive);
            slide.classList.remove('is-flipped');
            slide.setAttribute('aria-hidden', String(!isActive));
        });

        dots.forEach((dot, dotIndex) => {
            const isActive = dotIndex === currentIndex;

            dot.classList.toggle('is-active', isActive);

            if (isActive) {
                dot.setAttribute('aria-current', 'true');
            } else {
                dot.removeAttribute('aria-current');
            }
        });

        carousel.classList.remove('has-flipped-card');
        syncBlurredBackground();

        if (caption) {
            caption.textContent = captions[currentIndex] || 'CLOTHÉ COLLECTION';
        }

        if (counter) {
            counter.textContent =
                String(currentIndex + 1).padStart(2, '0') +
                ' / ' +
                String(slides.length).padStart(2, '0');
        }
    }

    // Click photo to flip; click the back side to return to the photo.
    carousel.addEventListener('click', (event) => {
        // Preserve normal navigation for collection links.
        if (event.target.closest('a')) return;

        // Do not let clicks on carousel controls trigger a flip.
        if (event.target.closest('.hero-carousel__controls')) return;

        const slide = event.target.closest('.hero-carousel__slide');
        if (!slide || !slide.classList.contains('is-active')) return;

        setFlipped(slide, !slide.classList.contains('is-flipped'));
    });

    // Keyboard access for the photo area.
    carousel.addEventListener('keydown', (event) => {
        const front = event.target.closest('[data-hero-flip]');

        if (!front || !['Enter', ' '].includes(event.key)) return;

        event.preventDefault();
        front.click();
    });

    prevButton?.addEventListener('click', (event) => {
        event.stopPropagation();
        showSlide(currentIndex - 1);
        startAutoplay();
    });

    nextButton?.addEventListener('click', (event) => {
        event.stopPropagation();
        showSlide(currentIndex + 1);
        startAutoplay();
    });

    dots.forEach((dot, index) => {
        dot.addEventListener('click', (event) => {
            event.stopPropagation();
            showSlide(index);
            startAutoplay();
        });
    });

    carousel.addEventListener('mouseenter', stopAutoplay);
    carousel.addEventListener('mouseleave', startAutoplay);

    // Swipe support on touch screens.
    let touchStartX = 0;
    let touchStartY = 0;

    carousel.addEventListener('touchstart', (event) => {
        const touch = event.changedTouches[0];
        touchStartX = touch.clientX;
        touchStartY = touch.clientY;
    }, { passive: true });

    carousel.addEventListener('touchend', (event) => {
        if (carousel.classList.contains('has-flipped-card')) return;

        const touch = event.changedTouches[0];
        const deltaX = touch.clientX - touchStartX;
        const deltaY = touch.clientY - touchStartY;

        if (Math.abs(deltaX) > 55 && Math.abs(deltaX) > Math.abs(deltaY)) {
            showSlide(currentIndex + (deltaX < 0 ? 1 : -1));
            startAutoplay();
        }
    }, { passive: true });

    showSlide(0);
    startAutoplay();
});
