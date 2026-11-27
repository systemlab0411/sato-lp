<?php get_header(); ?>
<main class="main contact-page">
    <section class="u-page__header" aria-labelledby="contact-thanks-title">
        <div class="cnt">
            <div class="u-page__header-inner">
                <p class="ttl-en" lang="en">THANKS</p>
                <h1 class="ttl-ja" id="contact-thanks-title">お問い合わせ完了</h1>
            </div>
        </div>
    </section>
    <section class="contact-form">
        <div class="cnt">
            <div class="contact-form__text">
                <p>お問い合わせありがとうございました。<br>担当から折り返しさせてご連絡させていただきます。<br>今しばらくお待ちください。</p>
            </div>
            <div class="contact-form__thanks-actions flex jus-center mt-5em">
                <a href="<?php echo home_url("top") ?>" class="btn contact-btn"><span class="btn__text">トップページへ戻る</span></a>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
