document.addEventListener('DOMContentLoaded', function () {
    // Navbar shadow on scroll
    var navbar = document.getElementById('krmNavbar');
    if (navbar) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 12) {
                navbar.classList.add('is-scrolled');
            } else {
                navbar.classList.remove('is-scrolled');
            }
        });
    }

    // Fade-up on scroll into view (progressive enhancement — elements are
    // fully visible by default in CSS; JS only adds the animated state).
    var animatedEls = document.querySelectorAll('[data-animate="fade-up"]');
    var prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if ('IntersectionObserver' in window && animatedEls.length && !prefersReducedMotion) {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });

        animatedEls.forEach(function (el) {
            el.classList.add('krm-will-animate');
            observer.observe(el);
        });
    }

    // Close mobile menu after clicking a link
    var navLinks = document.querySelectorAll('#krmNavMenu a');
    var collapseEl = document.getElementById('krmNavMenu');
    if (collapseEl && window.bootstrap) {
        var bsCollapse = null;
        navLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                if (collapseEl.classList.contains('show')) {
                    bsCollapse = window.bootstrap.Collapse.getOrCreateInstance(collapseEl);
                    bsCollapse.hide();
                }
            });
        });
    }
});