<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="eltd-post-content">
        <div class="eltd-post-heading">
            <?php if(has_post_thumbnail() && vakker_eltd_options()->getOptionValue('date_separated') == 'yes'): ?>
                <?php vakker_eltd_get_module_template_part('templates/parts/post-info/date-separated', 'blog', '', $part_params); ?>
            <?php endif; ?>
            <?php vakker_eltd_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
        </div>
        <div class="eltd-post-text">
            <div class="eltd-post-text-inner">
                <div class="eltd-post-info-top">
                    <?php vakker_eltd_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <?php vakker_eltd_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
                    <?php vakker_eltd_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
                    <?php vakker_eltd_get_module_template_part('templates/parts/post-info/like', 'blog', '', $part_params); ?>
                    <?php vakker_eltd_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                    <?php if(!has_post_thumbnail() || vakker_eltd_options()->getOptionValue('date_separated') == 'no'): ?>
                        <?php vakker_eltd_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                    <?php endif; ?>
                </div>
                <div class="eltd-post-text-main">
                    <?php vakker_eltd_get_module_template_part('templates/parts/excerpt', 'blog', '', $part_params); ?>
                    <?php do_action('vakker_eltd_single_link_pages'); ?>
                </div>
                <div class="eltd-post-info-bottom clearfix">
                    <div class="eltd-post-info-bottom-left">
                        <?php vakker_eltd_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $part_params); ?>
                    </div>
                    <div class="eltd-post-info-bottom-right">
                        <?php vakker_eltd_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>