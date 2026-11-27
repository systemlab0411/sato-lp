<?php
$footer_company_links = array(
    array('name' => '佐藤建設株式会社', 'url' => 'https://satoukensetsu.co.jp/'),
    array('name' => '株式会社佐藤砕石', 'url' => 'https://satousaiseki.jp/'),
    array('name' => '佐藤砕石販売株式会社', 'url' => 'https://satousaiseki.jp/'),
    array('name' => '株式会社タケイ', 'url' => 'https://www.k-takei.co.jp/'),
    array('name' => '三栄工業株式会社', 'url' => 'https://sanei.in/'),
    array('name' => '社会福祉法人藤暢会', 'url' => 'https://fuyoukai.bsj.jp/'),
    array('name' => 'BELLE HOME', 'url' => 'https://www.belle-home.jp/', 'lang' => 'en', 'modifier' => 'min-width'),
    array('name' => 'OKAYAMA DREAM LAB.', 'url' => 'https://sato-odl.jp/', 'lang' => 'en'),
);
?>

<footer class="footer">
    <div class="footer__inner cnt">
        <a class="footer__logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="SATO GROUP トップページ">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/footer-logo.svg" width="179" height="50" alt="SATO GROUP">
        </a>
        <div class="footer__content">
            <div class="footer__main">
                <div class="footer__company">
                    <p class="footer__name">サトウ・ホールディングス株式会社</p>
                    <address class="footer__address">
                        <p>〒<span class="footer__number">709-4316</span> 勝田郡勝央町勝間田<span class="footer__number">225</span>番地<span class="footer__number">27</span></p>
                        <div class="footer__phone">
                            <p>TEL <a href="<?php echo esc_url('tel:0868753438'); ?>">0868-75-3438</a></p>
                            <p>FAX 0868-75-6292</p>
                        </div>
                    </address>
                </div>
                <nav class="footer__pages" aria-label="フッターメニュー">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a>
                    <a href="<?php echo esc_url(home_url('/privacy/')); ?>">プライバシーポリシー</a>
                </nav>
            </div>
            <nav class="footer__companies" aria-label="グループ企業・関連事業">
                <ul class="footer__company-list">
                    <?php foreach ($footer_company_links as $footer_company) : ?>
                        <li class="footer__company-item<?php if (!empty($footer_company['modifier'])) : ?> footer__company-item--<?php echo esc_attr($footer_company['modifier']); ?><?php endif; ?>"<?php if (!empty($footer_company['lang'])) : ?> lang="<?php echo esc_attr($footer_company['lang']); ?>"<?php endif; ?>>
                            <a class="footer__company-link" href="<?php echo esc_url($footer_company['url']); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($footer_company['name'] . '（別タブで開く）'); ?>">
                                <span class="footer__company-label"><?php echo esc_html($footer_company['name']); ?></span>
                                <span class="footer__external-icon"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/footer-external-link.svg" width="18" height="15" alt=""></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </div>
    <div class="footer__bottom">
        <p class="footer__copyright" lang="en"><small>Copyright © SATO Holdings, All rights reserved.</small></p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
