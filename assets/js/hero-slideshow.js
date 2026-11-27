document.addEventListener('DOMContentLoaded', async function () {
	const viewport = document.querySelector('.home-hero__photos');
	const track = document.querySelector('.home-hero__track');
	const toggle = document.querySelector('.home-hero__toggle');
	if (!viewport || !track || !toggle || typeof track.animate !== 'function') return;

	const photos = Array.from(track.children);
	if (photos.length < 2) return;

	const images = photos.map((photo) => photo.querySelector('img')).filter(Boolean);
	await Promise.allSettled(
		images.map((image) =>
			typeof image.decode === 'function' ? image.decode() : Promise.resolve(),
		),
	);

	// 同じ並びを後ろにつなぎ、半周した位置と先頭を一致させます。
	photos.forEach((photo) => {
		const clone = photo.cloneNode(true);
		clone.querySelectorAll('img').forEach((image) => image.removeAttribute('fetchpriority'));
		track.appendChild(clone);
	});

	const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
	const configuredSpeed = Number(track.dataset.heroSpeed);
	const speed = configuredSpeed > 0 ? configuredSpeed : 40;
	let pausedByUser = reducedMotion.matches;
	let inView = true;
	let animation = null;
	let duration = 0;
	let resizeFrame = null;

	function updatePlayback() {
		if (!animation) return;
		if (pausedByUser || document.hidden || !inView) animation.pause();
		else animation.play();
		toggle.textContent = pausedByUser ? '▷' : '||';
	}

	function updateAnimation() {
		const cycleWidth = photos.reduce((sum, photo) => sum + photo.getBoundingClientRect().width, 0);
		if (cycleWidth <= 0) return;
		const progress =
			animation && duration > 0 ? ((Number(animation.currentTime) || 0) % duration) / duration : 0;
		if (animation) animation.cancel();
		duration = (cycleWidth / speed) * 1000;
		animation = track.animate([{ transform: 'translateX(0)' }, { transform: 'translateX(-50%)' }], {
			duration,
			iterations: Infinity,
			easing: 'linear',
		});
		animation.pause();
		animation.currentTime = progress * duration;
		updatePlayback();
	}

	toggle.addEventListener('click', function () {
		pausedByUser = !pausedByUser;
		updatePlayback();
	});
	document.addEventListener('visibilitychange', updatePlayback);
	reducedMotion.addEventListener('change', function (event) {
		if (event.matches) pausedByUser = true;
		updatePlayback();
	});

	if (typeof IntersectionObserver === 'function') {
		const observer = new IntersectionObserver((entries) => {
			inView = entries[0].isIntersecting;
			updatePlayback();
		});
		observer.observe(viewport);
	}

	function onResize() {
		if (resizeFrame !== null) window.cancelAnimationFrame(resizeFrame);
		resizeFrame = window.requestAnimationFrame(function () {
			resizeFrame = null;
			updateAnimation();
		});
	}
	if (typeof ResizeObserver === 'function') {
		const observer = new ResizeObserver(onResize);
		observer.observe(viewport);
	} else {
		window.addEventListener('resize', onResize);
	}

	updateAnimation();
	toggle.hidden = false;
});
