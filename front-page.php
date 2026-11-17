<?php get_header(); ?>

<main class="main lp-home" id="top">
    <section class="home-hero" aria-labelledby="hero-title">
        <div class="home-hero__photos" aria-hidden="true">
            <div class="home-hero__photo home-hero__photo--left">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/hero-left.jpg" width="4096" height="2731" alt="" fetchpriority="high">
            </div>
            <div class="home-hero__photo home-hero__photo--right">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/hero-right.jpg" width="3500" height="2333" alt="">
            </div>
        </div>
        <div class="home-hero__copy">
            <h1 class="home-hero__title" id="hero-title">人と街に夢を</h1>
            <p class="home-hero__lead" lang="en">Dreams for people and cities</p>
        </div>
    </section>
</main>

<?php get_footer(); ?>
