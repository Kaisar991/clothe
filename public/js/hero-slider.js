
(() => {
    const carousel = document.querySelector('[data-hero-carousel]');

    if (!carousel) return;

    const slides = [...carousel.querySelectorAll('.hero-carousel__slide')];
    const dots = [...carousel.querySelectorAll('[data-hero-dot]')];

    const previousButton = carousel.querySelector('[data-hero-prev]');
    const nextButton = carousel.querySelector('[data-hero-next]');
    const indexLabel = carousel.querySelector('[data-hero-index]');
    const captionLabel = carousel.querySelector('[data-hero-caption]');

    if (!slides.length) return;

    let activeIndex = 0;
    let autoplayTimer = null;
    let touchStartX = null;

    const reducedMotion = window.matchMedia(
        '(prefers-reduced-motion: reduce)'
    ).matches;

    const prefersTouch = window.matchMedia(
        '(pointer: coarse)'
    ).matches;

    function showSlide(index) {
        activeIndex = (index + slides.length) % slides.length;

        slides.forEach((slide, i) => {
            const isActive = i === activeIndex;

            slide.classList.toggle('is-active', isActive);
            slide.setAttribute('aria-hidden', String(!isActive));
        });

        dots.forEach((dot, i) => {
            const isActive = i === activeIndex;

            dot.classList.toggle('is-active', isActive);
            dot.setAttribute('aria-pressed', String(isActive));
        });

        const activeSlide = slides[activeIndex];

        if (indexLabel) {
            indexLabel.textContent =
                `FIG. ${String(activeIndex + 1).padStart(3, '0')}`;
        }

        if (captionLabel) {
            captionLabel.textContent =
                activeSlide.dataset.caption || 'CLOTHÉ COLLECTION';
        }
    }

    function stopAutoplay() {
        if (autoplayTimer !== null) {
            clearInterval(autoplayTimer);
            autoplayTimer = null;
        }
    }

    function startAutoplay() {
        stopAutoplay();

        if (reducedMotion || slides.length < 2) return;

        autoplayTimer = setInterval(() => {
            showSlide(activeIndex + 1);
        }, 6000);
    }

    previousButton?.addEventListener('click', () => {
        showSlide(activeIndex - 1);
    });

    nextButton?.addEventListener('click', () => {
        showSlide(activeIndex + 1);
    });

    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            showSlide(i);
        });
    });

    // Pause autoplay while hovering or using keyboard controls.
    carousel.addEventListener('mouseenter', stopAutoplay);

    carousel.addEventListener('mouseleave', () => {
        carousel.style.setProperty('--hero-rotate-x', '0deg');
        carousel.style.setProperty('--hero-rotate-y', '0deg');
        startAutoplay();
    });

    carousel.addEventListener('focusin', stopAutoplay);

    carousel.addEventListener('focusout', (event) => {
        if (!carousel.contains(event.relatedTarget)) {
            startAutoplay();
        }
    });

    // Interactive 3D tilt for mouse users.
    carousel.addEventListener('pointermove', (event) => {
        if (event.pointerType !== 'mouse' || prefersTouch) return;

        const rect = carousel.getBoundingClientRect();

        const x = (event.clientX - rect.left) / rect.width;
        const y = (event.clientY - rect.top) / rect.height;

        const rotateY = (x - 0.5) * 9;
        const rotateX = (0.5 - y) * 7;

        carousel.style.setProperty(
            '--hero-rotate-x',
            `${rotateX.toFixed(2)}deg`
        );

        carousel.style.setProperty(
            '--hero-rotate-y',
            `${rotateY.toFixed(2)}deg`
        );
    });

    // Allow touch users to swipe between looks.
    carousel.addEventListener('pointerdown', (event) => {
        if (event.pointerType === 'touch') {
            touchStartX = event.clientX;
        }
    });

    carousel.addEventListener('pointerup', (event) => {
        if (event.pointerType !== 'touch' || touchStartX === null) return;

        const deltaX = event.clientX - touchStartX;

        if (Math.abs(deltaX) > 55) {
            showSlide(deltaX < 0 ? activeIndex + 1 : activeIndex - 1);
        }

        touchStartX = null;
    });

    carousel.addEventListener('pointercancel', () => {
        touchStartX = null;
    });

    showSlide(0);
    startAutoplay();
})();
