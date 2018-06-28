<div class="eltd-post-info-author">
    <span class="eltd-post-info-author-text">
        <?php esc_html_e('By', 'vakker'); ?>
    </span>
    <a itemprop="author" class="eltd-post-info-author-link" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
        <?php the_author_meta('display_name'); ?>
    </a>
</div>