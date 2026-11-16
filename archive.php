<?php get_header(); ?>
<main class="main">
    <section class="u-page__ttl">
        <div class="cnt">
            <div class="u-page__ttl-wrap">
                <h2 class="u-page__ttl-ja">
                    <?php if(get_query_var('year')) : ?>
                        <?php echo get_query_var('year'); ?>年
                    <?php else : ?>
                        <?php echo get_the_archive_title(); ?>
                    <?php endif; ?>
                </h2>
                <?php if (have_posts()) : ?>
                <p class="u-page__ttl-en">
                <?php
                    // カテゴリーのデータを取得
                    $cat = get_the_category();
                    $cat = $cat[0];
                ?>
                <?php echo $cat->slug; ?>
                </p>
                <?php elseif(get_the_archive_title()=='コラム') : ?>
                <p class="u-page__ttl-en">column</p>
                <?php else: ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="archive__main">
        <div class="cnt archive__container">

            <!-- contents -->
            <div class="archive__contents">

                <?php if (have_posts()) : ?>

                    <!-- articles -->
                    <ul class="archive-list">

                        <?php while (have_posts()) : ?>
                            <?php
                            the_post();
                            $title    = esc_html(get_the_title());                              // 投稿タイトル
                            $url      = esc_url(get_permalink());                               // 投稿のurl
                            $date     = get_the_time('Y.m.d');                                  // 投稿日
                            $categories = get_the_category();                                   // カテゴリ情報
                            $tags     = get_the_tags();    
                            $excerpt = get_the_excerpt()                                     // タグ情報
                            ?>

                            <li class="archive-list__item">
                                <a class="archive-list__link" href="<?php echo $url; ?>">

                                    <?php if (has_post_thumbnail()) : ?>
                                        <!-- アイキャッチ画像あり -->
                                        <div class="archive-list__thumbnail">
                                            <?php echo get_the_post_thumbnail($post->ID, 'full',array('class' => 'thumbnail-img')); ?>
                                        </div>
                                    <?php else : ?>
                                        <!-- アイキャッチ画像なし -->
                                        <div class="archive-list__thumbnail">
                                            <img class="archive-list__thumbnail-img" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/default_thumbnail.png">
                                        </div>
                                    <?php endif; ?>

                                    <div class="archive-list__body">
                                        <div class="archive-list__meta">
                                            <time class="archive-list__date" datetime="<?php echo $date; ?>"><?php echo $date; ?></time>

                                            <?php if ($categories) : ?>
                                                <?php foreach ($categories as $category) : ?>
                                                    <span class="archive-list__category"><?php echo $category->name; ?></span>
                                                <?php endforeach ?>
                                            <?php endif; ?>


                                        </div>
                                        <!-- タイトル -->
                                        <?php if (mb_strlen($title) > 20) : ?>
                                            <div class="archive-list__title"><?php echo mb_substr($title, 0, 20, 'UTF-8') . '...'; ?></div>
                                        <?php else : ?>
                                            <div class="archive-list__title"><?php echo $title; ?></div>
                                        <?php endif; ?>

                                        <!-- 情報 -->
                                        <div class="archive-list__summary">

                                                <div class="archive-list__excerpt-wrap">
                                                    <?php if(mb_strlen($excerpt) > 70) : ?>
                                                        <div class="archive-list__excerpt"><?php echo mb_substr($excerpt, 0, 70, 'UTF-8') . '...'; ?></div>
                                                    <?php else: ?>
                                                        <div class="archive-list__excerpt"><?php echo $excerpt; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>

                    <!-- pagination -->
                    <div class="archive__pagination">
                        <?php
                        $args = array(
                            'query' =>  $wp_query,
                        );
                        get_template_part('/parts/pagination', null, $args);
                        ?>
                    </div>

                    <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                        <p class="archive__empty-text">現在表示する記事がありません</p>
                    <?php endif; ?>
            </div>

            <!-- sidebar -->
            <div class="archive__sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>

    </section>
</main>
<?php get_footer(); ?>