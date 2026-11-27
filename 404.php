<?php get_header(); ?>
<main class="main">
    <section class="u-page__header" aria-labelledby="notfound-title">
        <div class="cnt">
            <div class="u-page__header-inner">
                <p class="ttl-en" lang="en">404 NOT FOUND</p>
                <h1 class="ttl-ja" id="notfound-title">ページが見つかりません</h1>
            </div>
        </div>
    </section>
    <section class="notfound">
        <div class="cnt">
            <div class="notfound__inner">
                <p class="notfound__desc-main">お探しのページが<span class="i-bl">見つかりませんでした</span></p>
                <p class="notfound__desc-sub">申し訳ありません。<span class="i-bl">お探しのページが見つかりませんでした。</span><br>お手数ですが、トップページからお探しの情報をお探しください。</p>
            </div>
            <div class="notfound__btn-wrap">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="contact-btn">トップページへ戻る</a>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
