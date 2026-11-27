<?php get_header(); ?>
<main class="main contact-page">
    <section class="u-page__header" aria-labelledby="contact-title">
        <div class="cnt">
            <div class="u-page__header-inner">
                <p class="ttl-en" lang="en">CONTACT</p>
                <h1 class="ttl-ja" id="contact-title">お問い合わせ</h1>
            </div>
        </div>
    </section>
    <section class="contact-form">
        <div class="cnt">
            <div class="contact-page__lead">
                <h2 class="contact-page__lead-title t-center">どんな些細なことでも、<span class="i-bl">お答えします。</span></h2>
                <p class="t-center sp-justify">下記、フォームにてお気軽にお問い合わせください。<br class="sp-non-br">内容を確認してお返事させていただきます。<br class="sp-non-br">お返事には数日かかる場合がございますので、ご了承ください。</p>
            </div>
            <div class="contact-form__wrap"><?php echo do_shortcode('[contact-form-7 id="17023da" title="お問い合わせ"]') ?></div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
