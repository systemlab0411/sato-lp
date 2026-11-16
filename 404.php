<?php get_header(); ?>
    <section class="u-page-ttl">
        <div class="cnt">
            <div class="u-page-ttl__wrap">
                <h2 class="u-page-ttl__ja">404エラー</h2>
                <p class="u-page-ttl__en">404error</p>
            </div>
        </div>
    </section>
    <section class="section-padding">
            <div class="cnt">
                <div class="t-center">
                    <p class="notfound__desc-main">お探しのページが<span class="inline-block">見つかりませんでした</span></p>
                    <p class="notfound__desc-sub">申し訳ありません。<span class="inline-block">お探しのページが見つかりませんでした。</span><br>お手数ですが、トップページからお探しの情報をお探しください。</p>
                </div>
            </div>
        </div>
        <div class="notfound__btn-wrap">
            <a href="<?php echo esc_url(home_url("top")); ?>" class="btn m-center"><span class="text">トップページへ戻る</span></a>
        </div>
    </section>
<?php get_footer(); ?>