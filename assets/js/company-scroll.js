document.addEventListener('DOMContentLoaded', function() {
    const section = document.querySelector('.home-companies');
    if (!section) return;
    const list = section.querySelector('.home-companies__list');
    if (!list) return;
    const articles = Array.from(list.querySelectorAll('.home-companies__article'));
    const sources = articles.map(function(article) {
        return article.querySelector('.home-companies__main-image img');
    });
    if (!articles.length || sources.some(function(image) { return !image; })) return;

    // 元の画像は1列表示に残し、2列表示では共通の画像枠へ同じ写真を表示します。
    const body = document.createElement('div');
    body.className = 'home-companies__body';
    const panel = document.createElement('div');
    panel.className = 'home-companies__main-image home-companies__sticky';
    panel.setAttribute('aria-hidden', 'true');
    const images = sources.map(function(source) {
        const image = source.cloneNode(true);
        image.className = 'home-companies__sticky-image';
        panel.appendChild(image);
        return image;
    });
    list.before(body);
    body.appendChild(panel);
    body.appendChild(list);

    let currentIndex = -1;
    let frame = null;

    function updateImage() {
        frame = null;
        // ナビの現在位置と同じ判定位置で、次の会社の画像へ切り替えます。
        const marker = window.innerHeight * 0.3;
        let nextIndex = 0;
        articles.forEach(function(article, index) {
            if (article.getBoundingClientRect().top <= marker) nextIndex = index;
        });
        if (currentIndex === nextIndex) return;
        images.forEach(function(image, index) {
            image.classList.toggle('home-companies__sticky-image--current', index === nextIndex);
        });
        images[nextIndex].loading = 'eager';
        currentIndex = nextIndex;
    }

    function scheduleUpdate() {
        if (frame !== null) return;
        frame = window.requestAnimationFrame(updateImage);
    }

    window.addEventListener('scroll', scheduleUpdate, { passive: true });
    window.addEventListener('resize', scheduleUpdate);
    window.addEventListener('load', scheduleUpdate);
    window.addEventListener('pageshow', scheduleUpdate);
    if (typeof ResizeObserver === 'function') {
        const observer = new ResizeObserver(scheduleUpdate);
        observer.observe(list);
    }
    updateImage();
});
