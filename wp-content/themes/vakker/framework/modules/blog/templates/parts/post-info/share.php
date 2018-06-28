<?php
$share_type = isset($share_type) ? $share_type : 'list';
?>
<?php if(vakker_eltd_options()->getOptionValue('enable_social_share') === 'yes' && vakker_eltd_options()->getOptionValue('enable_social_share_on_post') === 'yes') { ?>
    <div class="eltd-blog-share">
        <div class="eltd-blog-share-title"><?php echo esc_html('share:'); ?></div>
        <?php echo vakker_eltd_get_social_share_html(array('type' => $share_type)); ?>
    </div>
<?php } ?>