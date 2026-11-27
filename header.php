<!DOCTYPE html>
<html lang="ja">

<head prefix="og: https://ogp.me/ns#">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="body">
  <?php wp_body_open(); ?>
  
<header class="header">
    <a class="header__logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="SATO GROUP トップページ">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo-sato-group.svg" width="251" height="70" alt="SATO GROUP">
    </a>
    <nav class="header__nav" aria-label="ページ内ナビゲーション">
        <ul class="header__nav-list">
            <li class="header__nav-item"><a class="header__nav-link header__nav-link--top<?php if (is_front_page()) : ?> header__nav-link--current<?php endif; ?>" href="<?php echo esc_url(home_url('/#top')); ?>" lang="en">TOP</a></li>
            <li class="header__nav-item"><a class="header__nav-link" href="<?php echo esc_url(home_url('/#group-synergy')); ?>">グループの強み</a></li>
            <li class="header__nav-item">
                <details class="header__nav-disclosure">
                    <summary class="header__nav-link header__nav-link--companies">グループ企業<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/nav-plus.svg" width="11" height="11" alt=""></summary>
                    <ul class="header__nav-companies">
                        <li><a href="<?php echo esc_url(home_url('/#company-holdings')); ?>">サトウ・ホールディングス株式会社</a></li>
                        <li><a href="<?php echo esc_url(home_url('/#company-sato')); ?>">佐藤建設株式会社</a></li>
                        <li><a href="<?php echo esc_url(home_url('/#company-saiseki')); ?>">株式会社佐藤砕石</a></li>
                        <li><a href="<?php echo esc_url(home_url('/#company-saiseki-sales')); ?>">佐藤砕石販売株式会社</a></li>
                        <li><a href="<?php echo esc_url(home_url('/#company-takei')); ?>">株式会社タケイ</a></li>
                        <li><a href="<?php echo esc_url(home_url('/#company-sanei')); ?>">三栄工業株式会社</a></li>
                        <li><a href="<?php echo esc_url(home_url('/#company-fuyoukai')); ?>">社会福祉法人藤暢会</a></li>
                    </ul>
                </details>
            </li>
        </ul>
        <a class="header__nav-contact" href="<?php echo esc_url(home_url('/contact/')); ?>">
            <span>お問い合わせ</span>
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/nav-contact-arrow.svg" width="40" height="40" alt="">
        </a>
    </nav>
</header>
