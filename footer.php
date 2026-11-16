<footer class="footer">
    <div class="cnt">
        <div class="footer__warp">
            <div class="footer-__company">
                <div class="footer__company-img">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo.webp" alt="">
                </div>
                <ul class="footer__company-info">
                    <li><?php echo get_ownerData('companyName'); ?></li>
                    <li><?php echo get_ownerData('postalCode'); ?></li>
                    <li><?php echo get_ownerData('address'); ?></li>
                    <li><?php echo get_ownerData('tel'); ?></li>
                </ul>
            </div>
            <div class="footer__links">
                <ul class="footer__links-list">
                    <li><a href="<?php echo esc_url(home_url('/about/')); ?>">会社概要</a></li>
                    <li><a href="<?php echo esc_url(home_url('/service/')); ?>">事業内容</a></li>
                    <li><a href="<?php echo esc_url(home_url('/recruit/')); ?>">採用情報</a></li>
                    <li><a href="<?php echo esc_url(home_url('/news/')); ?>">お知らせ</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="copyright t-center">
        <p>©2025 Sample Co.,LTD.</p>
    </div>
</footer>


<?php wp_footer(); ?>
</body>
</html> 