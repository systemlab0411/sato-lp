<?php get_header(); ?>
<main class="main">
    <section class="u-page__ttl">
        <div class="cnt">
            <div class="u-page__ttl-wrap">
                <h2 class="u-page__ttl-ja">お問い合わせ内容確認</h2>
                <p class="u-page__ttl-en">CONFIRM</p>
            </div>
        </div>
    </section>
    <section class="contact-form">
        <div class="cnt">
            <div class="contact-form__text">
                <p>こちらの内容でお間違いありませんか？<br>お間違いなければ下記の送信ボタンを<br class="sp-br">押してください。</p>
            </div>
            <div><?php echo do_shortcode('[contact-form-7 id="9ed0724" title="お問い合わせ（確認画面）"]') ?></div>
        </div>
    </section>
</main>
<?php get_footer(); ?> 