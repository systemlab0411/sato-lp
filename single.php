<?php get_header(); ?>
<main class="main">
    <section class="page-header">
        <div class="cnt">
            <div class="page-header__wrap">
                <h2 class="page-header__title">
                <?php
                    $cat= get_the_category();
                    if ( $cat ) {
                        echo $cat[0]->name;
                    }
                ?>
                </h2>
                <p class="page-header__title-en">
                <?php
                    // カテゴリーのデータを取得
                    $cat = get_the_category();
                    $cat = $cat[0];
                ?>
                <?php echo $cat->slug; ?>
                </p>
            </div>
        </div>
    </section>

    <section class="section-padding section-bg">
        <div class="cnt single__container">

        <!-- contents -->
        <div class="single__main">

            <?php if (have_posts()) : ?>

                <!-- article -->
                <?php while (have_posts()) : ?>
                    <?php
                    the_post();
                    $title    = esc_html(get_the_title());                              // 投稿タイトル
                    $url      = esc_url(get_permalink());                               // 投稿のurl
                    $date     = get_the_time('Y.m.d');                                  // 投稿日
                    $categories = get_the_category();                                   // カテゴリ情報
                    $tags     = get_the_tags();                                         // タグ情報
                    ?>

                    <article class="single__article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <!-- 情報 -->
                        <div class="single__info">
                            <time class="single__date" datetime="<?php echo $date; ?>"><?php echo $date; ?></time>

                            <div class="single__categories">
                                <?php if ($categories) : ?>
                                    <?php foreach ($categories as $category) : ?>
                                        <div class="single__category"><?php echo $category->name; ?></div>
                                    <?php endforeach; ?>
                                <?php endif; ?>


                            </div>
                        </div>
                        <!-- タイトル -->
                        <h2 class="single__title"><?php echo $title; ?></h2>

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="single__thumbnail">
                                <?php echo get_the_post_thumbnail($post->ID, 'full',array('class' => 'thumbnail-img')); ?>
                            </div>
                        <?php endif; ?>

                        <div class="post-content single__content">
                            <?php the_content(); ?>
                        </div>

                    </article>
                    <div class="single__tag-links flex">
                        <?php if ($tags) : ?>
                            <?php foreach ($tags as $tag) : ?>
                                <a class="single__tag-link" href="<?php echo get_tag_link($tag->term_id); ?>">
                                    ＃<?php echo $tag->name; ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>

                <!-- この記事を書いた人欄　画像なしバージョン -->




                <div class="single__pagination flex" style="display: none;">
                    <!-- 前後記事へのリンク　ノーマルパターン -->
                    <div class="single__pagination-item">
                        <?php if(get_next_post()): ?>
                            <span class="single__pagination-label"><?php next_post_link('%link','次の記事へ', true); ?></span>
                            <span class="single__pagination-link fw-500"><?php next_post_link('%link','< %title', true); ?></span>
                        <?php else : ?>
                            <span class="single__pagination-empty">最新の記事です</span>
                        <?php endif; ?>
                    </div>

                    <div class="single__pagination-item">
                        <?php if(get_previous_post()): ?>
                            <span class="single__pagination-label"><?php previous_post_link('%link','前の記事へ', true); ?></span>
                            <span class="single__pagination-link fw-500"><?php previous_post_link('%link','%title >', true); ?></span>
                        <?php else : ?>
                            <span class="single__pagination-empty">最後の記事です</span>
                        <?php endif; ?>
                    </div>

                </div><!-- pagination end -->
            <?php endif; ?>
        </div>

        <!-- sidebar -->
        <div class="single__sidebar">
            <?php get_sidebar(); ?>
        </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>