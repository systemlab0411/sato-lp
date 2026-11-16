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
  
  <header class="header" id="header-body">
    <div class="header__wrap">
      <h1 class="header__logo"><a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo.webp" alt=""></a></h1>
      <div class="header__hamburger" id="js-ham-btn">
        <span></span>
        <span></span>
      </div>
      <div class="header__nav-wrap" id="ham_list">
        <nav class="header__nav">
          <ul class="header__nav-list">
            <li><a href="<?php echo esc_url(home_url('/about/')); ?>">会社概要</a></li>
            <li><a href="<?php echo esc_url(home_url('/service/')); ?>">事業内容</a></li>
            <li><a href="<?php echo esc_url(home_url('/recruit/')); ?>">採用情報</a></li>
            <li><a href="<?php echo esc_url(home_url('/news/')); ?>">お知らせ</a></li>
          </ul>
        </nav>
        <div class="header__nav-btn"><a class="btn" href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a></div>
      </div>
    </div>
  </header><!-- /.l-header -->