<?php get_header(); ?>

<main class="main">
    <section class="main">
        <div class="cnt">
            <h2>toppage</h2>
            <div style="width:100%;height:100svh;">
                <img class="object-cover" style="width: 100%;" src="<?php echo get_template_directory_uri(); ?>/assets/images/default_thumbnail.png" alt="">
            </div>
        </div>
    </section>
    <?php get_template_part('parts/contact'); ?>
</main>

<?php get_footer(); ?>