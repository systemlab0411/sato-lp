<div class="sidebar">

    <aside class="sidebar-box">
        <h3 class="sidebar-box__title note-sans-medium"><span class="sidebar-box__title-en roboto-mideum">Latest</span>最新の投稿</h3>
        <ul class="sidebar-box__list">
            <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $args = array(
                "post_type" => "post",
                "posts_per_page" => 3,
                'paged' => $paged,
                "orderby" => "date",
                "order" => "DESC",
            );
            $query =  new WP_Query($args);
            ?>
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : ?>
                    <?php $query->the_post(); ?>

                    <li class="sidebar-box__item">
                        <a href="<?php the_permalink(); ?>">
                        <div class="sidebar-box__post-title"><?php the_title(); ?></div>
                        <?php $date = get_the_time('Y.m.d');?>
                        <time class="archive-list__date" datetime="<?php echo $date ?>"><?php echo $date; ?></time>
                        </a>
                    </li>
                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>

            <?php endif; ?>
        </ul>
    </aside>

    <aside class="sidebar-box">
        <h3 class="sidebar-box__title note-sans-medium"><span class="sidebar-box__title-en roboto-mideum">Category</span>カテゴリー</h3>
        <ul class="sidebar-box__list">
            <?php
            $categories = get_categories();
            foreach ($categories as $category) :
            ?>
                <li class="sidebar-box__category">
                    <a class="note-sans-medium" href="<?php echo get_category_link($category->term_id); ?>">
                        <?php echo $category->name; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </aside>

    <aside class="sidebar-box">
        <h3 class="sidebar-box__title note-sans-medium"><span class="sidebar-box__title-en roboto-mideum">Archive</span>年間アーカイブ</h3>
        <ul class="sidebar-box__list">
            <div class="sidebar__select-wrap">
                <select class="sidebar__select note-sans-regular fs-14" name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
                    <option disabled selected value>年を選択</option>
                        
                        <?php wp_get_archives('type=yearly&format=option&post_type=post'); ?>
                </select>
            </div>
        </ul>
    </aside>

    <aside class="sidebar-box">
        <h3 class="sidebar-box__title note-sans-medium"><span class="sidebar-box__title-en roboto-mideum">Tag</span>タグ</h3>
        <div class="sidebar__tag-links flex flex-wrap">
            <?php
            $tags = get_tags();
            foreach ($tags as $tag) :
            ?>
                <a class="sidebar__tag-link" href="<?php echo get_tag_link($tag->term_id); ?>">
                    ＃<?php echo $tag->name; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </aside>

</div>

