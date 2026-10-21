
document.addEventListener('DOMContentLoaded', () => {
    const slider = document.querySelector('#clotheStack');
    if (!slider) return;

    const cards = Array.from(
        slider.querySelectorAll('.clothe-stack__card')
    );
    const prev = slider.querySelector('.clothe-stack__prev');
    const next = slider.querySelector('.clothe-stack__next');

    if (cards.length < 2) return;

    let activeIndex = 0;
    let autoplay = null;

    function renderCards() {
        const total = cards.length;

        cards.forEach((card, index) => {
            card.classList.remove(
                'is-center',
                'is-left-1',
                'is-right-1',
                'is-left-2',
                'is-right-2',
                'is-hidden'
            );

            let offset = (index - activeIndex + total) % total;

            if (offset > total / 2) {
                offset -= total;
            }

            if (offset === 0) {
                card.classList.add('is-center');
            } else if (offset === -1) {
                card.classList.add('is-left-1');
            } else if (offset === 1) {
                card.classList.add('is-right-1');
            } else if (offset === -2) {
                card.classList.add('is-left-2');
            } else if (offset === 2) {
                card.classList.add('is-right-2');
            } else {
                card.classList.add('is-hidden');
            }

            card.setAttribute(
                'aria-pressed',
                String(offset === 0)
            );
        });
    }

    function showSlide(index) {
        activeIndex = (index + cards.length) % cards.length;
        renderCards();
    }

    function stopAutoplay() {
        if (autoplay) {
            clearInterval(autoplay);
            autoplay = null;
        }
    }

    function startAutoplay() {
        stopAutoplay();

        if (
            window.matchMedia('(prefers-reduced-motion: reduce)').matches
        ) {
            return;
        }

        autoplay = setInterval(() => {
            showSlide(activeIndex + 1);
        }, 5000);
    }

    prev.addEventListener('click', () => {
        showSlide(activeIndex - 1);
        startAutoplay();
    });

    next.addEventListener('click', () => {
        showSlide(activeIndex + 1);
        startAutoplay();
    });

    cards.forEach((card, index) => {
        card.addEventListener('click', () => {
            showSlide(index);
            startAutoplay();
        });
    });

    slider.addEventListener('mouseenter', stopAutoplay);
    slider.addEventListener('mouseleave', startAutoplay);
    slider.addEventListener('focusin', stopAutoplay);
    slider.addEventListener('focusout', startAutoplay);

    renderCards();
    startAutoplay();
});
