document.addEventListener('DOMContentLoaded', function() {
    const nav = document.querySelector('.header__nav');
    if (!nav) return;
    const mobile = window.matchMedia('(max-width: 1080px)');
    let frame = null;

    function updatePosition() {
        frame = null;
        if (mobile.matches) {
            nav.style.removeProperty('--header-nav-offset');
            return;
        }
        const style = window.getComputedStyle(nav);
        const start = parseFloat(style.getPropertyValue('--header-nav-start')) || 180;
        const adminHeight = parseFloat(style.getPropertyValue('--admin-bar-height')) || 0;
        const center = Math.max(0, (window.innerHeight - adminHeight - nav.getBoundingClientRect().height) / 2);
        // 中央位置が初期位置より上になる低い画面だけ、スクロールに追従させます。
        const stop = Math.min(start, center);
        const progress = Math.min(Math.max(window.scrollY, 0) / start, 1);
        const offset = start + (stop - start) * progress;
        nav.style.setProperty('--header-nav-offset', offset + 'px');
    }

    function scheduleUpdate() {
        if (frame !== null) return;
        frame = window.requestAnimationFrame(updatePosition);
    }

    window.addEventListener('scroll', scheduleUpdate, { passive: true });
    window.addEventListener('resize', scheduleUpdate);
    window.addEventListener('load', scheduleUpdate);
    window.addEventListener('pageshow', scheduleUpdate);
    mobile.addEventListener('change', scheduleUpdate);
    if (typeof ResizeObserver === 'function') {
        const observer = new ResizeObserver(scheduleUpdate);
        observer.observe(nav);
    }
    updatePosition();
});
