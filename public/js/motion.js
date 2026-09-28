(() => {
    if (!('IntersectionObserver' in window) || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    const scope = document.body.dataset.motionScope;
    if (!scope) {
        return;
    }

    const observed = new WeakSet();
    const observer = new IntersectionObserver((entries) => {
        for (const entry of entries) {
            if (!entry.isIntersecting) {
                continue;
            }

            const element = entry.target;
            observer.unobserve(element);
            element.classList.remove('motion-pending');

            const animationClass = element.dataset.motionEffect === 'rise'
                ? 'motion-enter-rise'
                : 'motion-enter-fade';

            element.classList.add(animationClass);
            element.addEventListener('animationend', () => {
                element.classList.remove(animationClass);
            }, { once: true });
        }
    }, {
        threshold: 0.08,
        rootMargin: '0px 0px -24px 0px',
    });

    function add(element, effect = 'fade', delay = 0) {
        if (!element || observed.has(element) || element.closest('[x-cloak], [data-motion-ignore]')) {
            return;
        }

        if (element.getClientRects().length === 0) {
            return;
        }

        observed.add(element);
        element.dataset.motionEffect = effect;
        element.style.setProperty('--motion-delay', `${delay}ms`);
        element.classList.add('motion-pending');
        observer.observe(element);
    }

    function addAll(selector, effect, stagger = 0, filter = () => true) {
        document.querySelectorAll(selector).forEach((element, index) => {
            if (filter(element)) {
                add(element, effect, stagger ? (index % 4) * stagger : 0);
            }
        });
    }

    if (scope === 'public' || scope === 'private') {
        add(document.querySelector('body > header'), 'fade');
        addAll('body h1, body h2, body h3, body h4, body h5', 'rise', 0,
            (element) => !element.closest('header, footer, aside'));
        addAll('body .grid > div, body .grid > article, body .grid > a', 'fade', 75,
            (element) => !element.closest('header, footer, aside, form'));
    }

    if (scope === 'public') {
        addAll('body img', 'fade', 0,
            (element) => !element.closest('header, footer, aside, .grid > div, .grid > article, .grid > a')
                && !element.classList.contains('absolute'));
    }

    if (scope === 'private') {
        addAll('main table', 'fade');
        addAll('main form > .grid > div', 'fade', 85);
    }

    if (scope === 'admin') {
        addAll('aside > a, aside nav > div', 'fade', 35);
        addAll('main h1, main h2', 'rise');
        addAll('main table, main form', 'fade');
        addAll('main .grid > div, main .grid > a', 'fade', 65,
            (element) => !element.closest('form'));
    }

    if (scope === 'auth') {
        add(document.querySelector('body > div'), 'rise');
    }

    if (scope === 'public' || scope === 'private') {
        addAll('footer > .grid > div, footer .relative.grid > div', 'fade', 90);
    }

    document.documentElement.classList.add('motion-enabled');
})();