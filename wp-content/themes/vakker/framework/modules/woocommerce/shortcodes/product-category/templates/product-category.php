<div class="eltd-category-holder <?php echo esc_html($skin) ?>">
    <a href=' <?php echo get_term_link($params['category'], 'product_cat'); ?>'>
        <div class="eltd-category-image">
            <?php echo wp_get_attachment_image($params['category_image'], 'full'); ?>
            <div class="eltd-category-text-wrapper">
                <div class="eltd-category-text-holder">
                    <div class="eltd-category-text">
                        <<?php echo esc_html($params['title_tag']); ?> class="eltd-category-title"> <?php echo esc_html($params['category']) ?> </<?php echo esc_html($params['title_tag']); ?>>
                        <h6 class="eltd-category-tag"><?php echo esc_html($params['additional_text']) ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>