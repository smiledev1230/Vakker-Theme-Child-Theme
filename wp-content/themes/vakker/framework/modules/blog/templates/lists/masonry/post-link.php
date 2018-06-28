<?php
$post_classes[] = 'eltd-item-space';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="eltd-post-content">
        <div class="eltd-post-text">
            <div class="eltd-post-text-inner">
                <div class="eltd-post-text-main">
                    <div class="eltd-post-mark">
                        <span class="fa fa-link eltd-link-mark"></span>
                    </div>
                    <?php vakker_eltd_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
                </div>
            </div>
        </div>
    </div>
</article>