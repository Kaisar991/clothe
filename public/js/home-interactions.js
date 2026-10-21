
document.addEventListener('DOMContentLoaded', () => {
    const reduceMotion = window.matchMedia(
        '(prefers-reduced-motion: reduce)'
    ).matches;

    if (reduceMotion || !('IntersectionObserver' in window)) {
        return;
    }

    const elements = document.querySelectorAll([
        '.brand-statement',
        '.home-collections',
        '.collection-card',
        '.brand-philosophy',
        '.philosophy-item',
        '.home-closing'
    ].join(','));

    if (!elements.length) return;

    document.documentElement.classList.add('js-reveal');

    elements.forEach((element) => {
        element.classList.add('reveal-on-scroll');
    });

    const observer = new IntersectionObserver((entries, currentObserver) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                currentObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.12
    });

    elements.forEach((element) => observer.observe(element));
});
