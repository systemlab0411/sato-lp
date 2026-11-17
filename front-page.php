<?php get_header(); ?>

<main class="main lp-home" id="top">
    <section class="home-hero" aria-labelledby="hero-title">
        <div class="home-hero__photos" aria-hidden="true">
            <div class="home-hero__photo home-hero__photo--left">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/hero-left.webp" width="4096" height="2731" alt="" fetchpriority="high">
            </div>
            <div class="home-hero__photo home-hero__photo--right">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/hero-right.webp" width="3500" height="2333" alt="">
            </div>
        </div>
        <div class="home-hero__copy">
            <h1 class="home-hero__title" id="hero-title">人と街に夢を</h1>
            <p class="home-hero__lead" lang="en">Dreams for people and cities</p>
        </div>
    </section>
    <section class="home-concept" aria-labelledby="concept-title">
        <div class="home-concept__background" aria-hidden="true">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/concept-background.webp" width="2560" height="1000" alt="" loading="lazy" decoding="async">
        </div>
        <div class="home-concept__content cnt">
            <h2 class="home-concept__title" id="concept-title">
                <span class="home-concept__vertical">岡山を、</span>
                <span class="home-concept__vertical">もっとステキに。</span>
            </h2>
            <div class="home-concept__body">
                <p class="home-concept__statement">
                    <span class="home-concept__vertical">建物をつくる。</span>
                    <span class="home-concept__vertical">道をつくる。</span>
                    <span class="home-concept__vertical">暮らしをつくる。</span>
                    <span class="home-concept__vertical">人を支える。</span>
                </p>
                <p class="home-concept__closing">
                    <span class="home-concept__vertical">人と街のよりよい</span>
                    <span class="home-concept__vertical">未来のために。</span>
                </p>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
