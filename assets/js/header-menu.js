document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('.header');
    if (!header) return;
    const toggle = header.querySelector('.header__toggle');
    const nav = header.querySelector('.header__nav');
    const backdrop = header.querySelector('.header__backdrop');
    if (!toggle || !nav || !backdrop) return;

    // CSSのnote mixinと同じ、1080px以下でメニューを切り替えます。
    const mobile = window.matchMedia('(max-width: 1080px)');
    const background = Array.from(document.querySelectorAll('main, .footer'));
    let open = false;
    let previousInert = [];

    function setOpen(next, restoreFocus) {
        const nextOpen = mobile.matches && next;
        if (nextOpen && !open) {
            previousInert = background.map(function(element) { return element.inert; });
            background.forEach(function(element) { element.inert = true; });
        } else if (!nextOpen && open) {
            background.forEach(function(element, index) { element.inert = previousInert[index]; });
        }
        open = nextOpen;
        header.classList.toggle('header--menu-open', open);
        document.documentElement.classList.toggle('has-mobile-menu', open);
        toggle.setAttribute('aria-expanded', String(open));
        toggle.setAttribute('aria-label', open ? 'メニューを閉じる' : 'メニューを開く');
        const label = toggle.querySelector('.header__toggle-label');
        if (label) label.textContent = open ? 'CLOSE' : 'MENU';
        nav.inert = mobile.matches && !open;
        backdrop.hidden = !open;
        if (!open && restoreFocus && mobile.matches) toggle.focus();
    }

    toggle.addEventListener('click', function() { setOpen(!open, false); });
    backdrop.addEventListener('click', function() { setOpen(false, true); });
    nav.addEventListener('click', function(event) {
        if (event.target.closest('a[href]')) setOpen(false, false);
    });
    document.addEventListener('keydown', function(event) {
        if (!open) return;
        if (event.key === 'Escape') {
            event.preventDefault();
            setOpen(false, true);
        } else if (event.key === 'Tab') {
            const focusable = Array.from(header.querySelectorAll('a[href], button, summary')).filter(function(element) {
                return !element.disabled && element.getClientRects().length > 0;
            });
            const first = focusable[0];
            const last = focusable[focusable.length - 1];
            if (event.shiftKey && document.activeElement === first) {
                event.preventDefault();
                last.focus();
            } else if (!event.shiftKey && document.activeElement === last) {
                event.preventDefault();
                first.focus();
            }
        }
    });
    mobile.addEventListener('change', function() {
        const focusWasInNav = nav.contains(document.activeElement);
        setOpen(false, focusWasInNav);
    });
    window.addEventListener('pageshow', function() { setOpen(false, false); });
    header.classList.add('header--menu-ready');
    toggle.hidden = false;
    setOpen(false, false);
});
