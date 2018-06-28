<?php
$title_tag = isset($quote_tag) ? $quote_tag : 'h6';
$quote_text_meta = get_post_meta(get_the_ID(), "eltd_post_quote_text_meta", true );

$post_title = !empty($quote_text_meta) ? $quote_text_meta : get_the_title();

$post_author = get_post_meta(get_the_ID(), "eltd_post_quote_author_meta", true );

$post_position = get_post_meta(get_the_ID(), "eltd_post_quote_author_position_meta", true );
?>

<div class="eltd-post-quote-holder">
    <div class="eltd-post-quote-holder-inner">
        <<?php echo esc_attr($title_tag);?> itemprop="name" class="eltd-quote-title eltd-post-title">
        <?php if(vakker_eltd_blog_item_has_link()) { ?>
            <a itemprop="url" href="<?php echo get_the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php } ?>
            <?php echo esc_html($post_title); ?>
        <?php if(vakker_eltd_blog_item_has_link()) { ?>
            </a>
        <?php } ?>
        </<?php echo esc_attr($title_tag);?>>
        <?php if($post_author != '') { ?>
            <span class="eltd-quote-author">
                <?php echo esc_html($post_author); ?>
            </span>
        <?php } ?>
        <?php if($post_position != '') { ?>
            <span class="eltd-quote-author-position">
                <?php echo esc_html($post_position); ?>
            </span>
        <?php } ?>
    </div>
</div>