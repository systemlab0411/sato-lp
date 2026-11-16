<?php
// -----------------------------------------------------------------
// テーマセットアップ後の処理
// -----------------------------------------------------------------
function mytheme_content_width() //コンテンツ幅の設定
{
    $GLOBALS['content_width'] = apply_filters('mytheme_content_width', 960);
}
//アクションの登録 add_action(アクションフックの名前, フックする関数名)
add_action('after_setup_theme', 'mytheme_content_width', 0);

function hook_after_setup_theme()
{
    //add_theme_support() 使用中のテーマで特定の機能を使えるようにすること
    add_theme_support('automatic-feed-links'); //投稿・コメントのRSS（最新情報の配信）フィードへのリンクを<head>に追加する
    add_theme_support('title-tag');//titleタグを<head>に追加する
    add_theme_support('post-thumbnails');//アイキャッチ画像を使う設定にする
    //HTML５形式にする
    add_theme_support('html5', array( 
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    add_theme_support('align-wide');//幅広と全幅に対応
    add_theme_support('responsive-embeds');//レスポンス対応

    add_theme_support('wp-block-styles');//ブロックエディタGutenberg用スタイルの読込
    add_theme_support('editor-styles');//編集画面でスタイルシートの読込を可能にする
    add_editor_style(get_template_directory_uri() . '/assets/css/editor-style.css');//エディタにもサイトと同じCSSを適用する
}

add_action('after_setup_theme', 'hook_after_setup_theme');//after_setup_theme 親テーマの設定を変更する

// -----------------------------------------------------------------
// フロントで読み込むファイル
// -----------------------------------------------------------------
function my_enqueue_scripts() {

    //webFont
    //GoogleFonts zen-kaku
    wp_enqueue_style('zen-kaku-gothic-new', 'https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@400;500&display=swap');
    //wp_enqueue_style('zen-kaku-gothic-new-500', get_template_directory_uri() . '/assets/fonts/zen-kaku-gothic-new-v16-japanese-500.woff2', array(), null, "all");
    //wp_enqueue_style('zen-kaku-gothic-new-regular', get_template_directory_uri() . '/assets/fonts/zen-kaku-gothic-new-v16-japanese-regular.woff2', array(), null, "all");
    //GoogleFonts sippori-mincho
    // wp_enqueue_style('sippori-mincho', 'https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@400;500&display=swap');
    //wp_enqueue_style('sippori-mincho-500', get_template_directory_uri() . '/assets/fonts/shippori-mincho-v15-japanese-500.woff2', array(), null, "all");
    //wp_enqueue_style('sippori-mincho-regular', get_template_directory_uri() . '/assets/fonts/shippori-mincho-v15-japanese-regular.woff2', array(), null, "all");


    //GoogleFonts barlow-condensed
    wp_enqueue_style('barlow-condensed', 'https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500&display=swap');
    //GoogleFonts work-sans
    // wp_enqueue_style('work-sans', 'https://fonts.googleapis.com/css2?family=Work+Sans:wght@600&display=swap');
    //slick
    // wp_enqueue_style('slick-style', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    // swiper-css
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    //aos
    // wp_enqueue_style('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
    //fontawesome
    // wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v6.6.0/css/all.css');
    // original-CSS
    wp_enqueue_style('ress', 'https://unpkg.com/ress@4.0.0/dist/ress.min.css');
    //wp_enqueue_style("my", get_template_directory_uri() . "/assets/css/style.css", array(), filemtime(get_theme_file_path('/assets/css/style.css')), "all");
    wp_enqueue_style('mian-style', get_template_directory_uri(   ). '/assets/css/main.min.css', array(), filemtime( get_theme_file_path( '/assets/css/main.min.css')), 'all'); 

    // drawer.css
    //wp_enqueue_style('drawer-css', 'https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css');
    // jQuery
    wp_enqueue_script('jquery');

    // iScroll
    //wp_enqueue_script('iscroll', 'https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js', array('jquery'), null, true);
    // drawer.js
    //wp_enqueue_script('drawer-js', 'https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js', array('jquery', 'iscroll'), null, true);
    //slick
    // wp_enqueue_script('slick-script', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',  array(), null, true);
    // wp_enqueue_script('clipboard.js', 'https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.11/clipboard.min.js', array(), false, array('strategy' => 'async','in_footer' => true));
    // gsap
    wp_enqueue_script('gsap-main','https://cdn.jsdelivr.net/npm/gsap@3.14.1/dist/gsap.min.js', array(), false, array('strategy' => 'defer','in_footer' => true));
    // gsap scrollTrigger
    wp_enqueue_script('gsap-scroll','https://cdn.jsdelivr.net/npm/gsap@3.14.1/dist/ScrollTrigger.min.js', array('gsap-main'), false, array('strategy' => 'defer','in_footer' => true));
    // swiper
    wp_enqueue_script('swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), true);
    //aos
    // wp_enqueue_script('aos.js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), null, true);
    // original-js
    wp_enqueue_script("my", get_template_directory_uri() . "/assets/js/script.js", array("jquery"), filemtime(get_theme_file_path('/assets/js/script.js')), null, true);
    //wp_enqueue_script('script.js', get_template_directory_uri() . '/assets/js/script.js', array(), false, true);
    // wp_enqueue_script('init.js', get_template_directory_uri() . '/assets/js/init.min.js', array(), false, array('strategy' => 'async','in_footer' => true));
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');

//CSSやJSのバージョン非表示
// function remove_cssjs_ver2( $src ) {
//     if ( strpos( $src, 'ver=' ) )
//         $src = remove_query_arg( 'ver', $src );
//     return $src;
// }
// add_filter( 'style_loader_src', 'remove_cssjs_ver2', 9999 );
// add_filter( 'script_loader_src', 'remove_cssjs_ver2', 9999 );

// -----------------------------------------------------------------
// REST API リンクタグの出力をしない
// -----------------------------------------------------------------
remove_action('wp_head','rest_output_link_wp_head');//remove_action親テーマで設定しているアクションフックの解除


// -----------------------------------------------------------------
// oEmbed無効化 ウェブサイト上で他のウェブサイトのコンテンツを埋め込むための標準フォーマット
// -----------------------------------------------------------------
remove_action('wp_head','wp_oembed_add_discovery_links');
remove_action('wp_head','wp_oembed_add_host_js');

// -----------------------------------------------------------------
// textカット
// -----------------------------------------------------------------
function custom_excerpt_more($more)
{
    return '[...続きを読む]';
}

add_filter('excerpt_more', 'custom_excerpt_more');

// -----------------------------------------------------------------
// libの読み込み
// -----------------------------------------------------------------
locate_template("lib/lib_userdata.php", true, true);
locate_template("lib/lib_pagination.php", true, true);
locate_template("lib/lib_thumbnail.php", true, true);

// -----------------------------------------------------------------
// bodyタグ直後のコード挿入
// -----------------------------------------------------------------
function hook_wp_body_open()
{
}

add_action('wp_body_open', 'hook_wp_body_open');

// -----------------------------------------------------------------
// contact-form 7 メールアドレス確認用
// -----------------------------------------------------------------
add_filter( 'wpcf7_validate_email*', 'wpcf7_validate_email_filter_confrim', 11, 2 );
function wpcf7_validate_email_filter_confrim( $result, $tag ) {
    $type = $tag['type'];
    $name = $tag['name'];
    if ( 'email' == $type || 'email*' == $type ) {
        if (preg_match('/(.*)-confirm$/', $name, $matches)){ //確認用メルアド入力フォーム名を ○○○_confirm としています。
            $target_name = $matches[1];
                $posted_value = trim( (string) $_POST[$name] ); //前後空白の削除
                $posted_target_value = trim( (string) $_POST[$target_name] ); //前後空白の削除
            if ($posted_value != $posted_target_value) {
                $result->invalidate( $tag,"確認用のメールアドレスが一致していません");
            }
        }
    }
    return $result;
}
/* -------------------------------------------------
Contact Form 7で自動挿入されるPタグ、brタグを削除
-------------------------------------------------- */
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
    return false;
} 

// -----------------------------------------------------------------
// クエリ前の処理
// -----------------------------------------------------------------
function change_posts_per_page($query)
{
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->is_home()) {
        $query->set('posts_per_page', '10');
        return;
    }
}
add_action('pre_get_posts', 'change_posts_per_page');

//カテゴリーで親カテゴリー以下で表示を指定する指示
function post_is_in_descendant_category($cats, $_post = null)
{
    foreach ((array) $cats as $cat) {
        $descendants = get_term_children((int) $cat, 'category');
        if ($descendants && in_category($descendants, $_post))
            return true;
    }
    return false;
}

/* the_archive_title 余計な文字を削除 */
add_filter( 'get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('',false);
    } elseif (is_tag()) {
        $title = single_tag_title('',false);
	} elseif (is_tax()) {
	    $title = single_term_title('',false);
	} elseif (is_post_type_archive() ){
		$title = post_type_archive_title('',false);
	} elseif (is_date()) {
	    $title = get_the_time('Y年n月');
	} elseif (is_search()) {
	    $title = '検索結果：'.esc_html( get_search_query(false) );
	} elseif (is_404()) {
	    $title = '「404」ページが見つかりません';
	} else {

	}
    return $title;
});

// タグをカテゴリーと同じ「チェックボックス一覧型」に変更する（Gutenberg対応版）
function change_tag_to_checkbox()
{
    $args = get_taxonomy('post_tag'); // 既存のタグ設定を取得
    if ($args) {
        $args->hierarchical = true;     // 階層化（チェックボックス化）にする
        $args->show_in_rest = true;    // ブロックエディター（REST API）に表示する
        register_taxonomy('post_tag', 'post', (array)$args);
    }
}
add_action('init', 'change_tag_to_checkbox', 11);

?>