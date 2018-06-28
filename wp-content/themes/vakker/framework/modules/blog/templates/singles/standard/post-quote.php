<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="eltd-post-content">
        <div class="eltd-post-text">
            <div class="eltd-post-text-inner">
                <div class="eltd-post-text-main">
                    <div class="eltd-post-mark">
                        <span class="eltd-quote-mark">”</span>
                    </div>
                    <?php vakker_eltd_get_module_template_part('templates/parts/post-type/quote', 'blog', '', $part_params); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="eltd-post-additional-content">
        <?php the_content(); ?>
    </div>
    <div class="eltd-post-info-bottom clearfix">
        <div class="eltd-post-info-bottom-left">
            <?php vakker_eltd_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
        </div>
        <div class="eltd-post-info-bottom-right">
            <?php vakker_eltd_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
        </div>
    </div>
</article>