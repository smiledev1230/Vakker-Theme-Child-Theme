<?php
$title_tag = isset($link_tag) ? $link_tag : 'h5';
$post_link_meta = get_post_meta(get_the_ID(), "eltd_post_link_link_meta", true );

$post_link_text = get_post_meta(get_the_ID(), "eltd_post_link_text_meta", true ) != '' ? get_post_meta(get_the_ID(), "eltd_post_link_text_meta", true ) : get_the_title();

if(vakker_eltd_get_blog_module() == 'list') {
    $post_link = get_the_permalink();
} else {
    if(!empty($post_link_meta)) {
        $post_link = esc_html($post_link_meta);
    }
}
?>

<div class="eltd-post-link-holder">
    <div class="eltd-post-link-holder-inner">
        <<?php echo esc_attr($title_tag);?> itemprop="name" class="eltd-link-title eltd-post-title">
        <?php if(isset($post_link) && $post_link != '') { ?>
            <a itemprop="url" href="<?php echo esc_url($post_link); ?>" title="<?php the_title_attribute(); ?>" target="_blank">
        <?php } ?>
        <?php if($post_link_text != '') { ?>
            <span class="eltd-post-link-text"><?php echo esc_html($post_link_text); ?></span>
        <?php } ?>
        <?php if(isset($post_link) && $post_link != '') { ?>
            </a>
        <?php } ?>
        </<?php echo esc_attr($title_tag);?>>
    </div>
</div>