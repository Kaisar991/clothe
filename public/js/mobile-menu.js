
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('mobileMenuToggle');
    const navigation = document.getElementById('mainNavigation');

    if (!toggle || !navigation) return;

    function closeMenu() {
        toggle.classList.remove('is-active');
        navigation.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.setAttribute('aria-label', 'Buka menu navigasi');
    }

    toggle.addEventListener('click', () => {
        const isOpen = navigation.classList.toggle('is-open');

        toggle.classList.toggle('is-active', isOpen);
        toggle.setAttribute('aria-expanded', String(isOpen));
        toggle.setAttribute(
            'aria-label',
            isOpen ? 'Tutup menu navigasi' : 'Buka menu navigasi'
        );
    });

    navigation.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', closeMenu);
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth > 768) {
            closeMenu();
        }
    });
});
