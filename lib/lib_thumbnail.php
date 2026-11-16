<?php

/**
 * サムネイルのimgタグ出力関数
 * $size  : サイズ (thumbnail, medium, large, full)
 * $class : class属性値
 * $alt   : alt属性値
 * $p_id  : ページid
 */
function get_thumbnail_img($size = 'full', $class = null, $alt = null, $p_id = null)
{
    $p_id = ($p_id) ? $p_id : get_the_ID();
    $thumb_id = get_post_thumbnail_id($p_id);
    $thumb_img = wp_get_attachment_image_src($thumb_id, $size);
    $thumb_src = $thumb_img[0];
    $alt = ($alt) ? $alt : get_the_title($p_id);

    return '<img class="' . $class . '" src="' . $thumb_src . '" alt="' . $alt . '">';
}
