<?php
$blog_single_navigation = vakker_eltd_options()->getOptionValue('blog_single_navigation') === 'no' ? false : true;
$blog_navigation_through_same_category = vakker_eltd_options()->getOptionValue('blog_navigation_through_same_category') === 'no' ? false : true;
?>
<?php if($blog_single_navigation){ ?>
	<div class="eltd-blog-single-navigation">
		<div class="eltd-blog-single-navigation-inner clearfix">
			<?php
				/* Single navigation section - SETTING PARAMS */
				$post_navigation = array(
					'prev' => array(
						'mark' => '<span class="eltd-blog-single-nav-mark ion-ios-arrow-thin-left"></span>',
						'label' => '<span class="eltd-blog-single-nav-label">'.esc_html__('previous', 'vakker').'</span>'
					),
					'next' => array(
						'mark' => '<span class="eltd-blog-single-nav-mark ion-ios-arrow-thin-right"></span>',
						'label' => '<span class="eltd-blog-single-nav-label">'.esc_html__('next', 'vakker').'</span>'
					)
				);
			
				if($blog_navigation_through_same_category){
					if(get_previous_post(true) !== ""){
						$post_navigation['prev']['post'] = get_previous_post(true);
					}
					if(get_next_post(true) !== ""){
						$post_navigation['next']['post'] = get_next_post(true);
					}
				} else {
					if(get_previous_post() !== ""){
						$post_navigation['prev']['post'] = get_previous_post();
					}
					if(get_next_post() !== ""){
						$post_navigation['next']['post'] = get_next_post();
					}
				}

				/* Single navigation section - RENDERING */
				foreach (array('prev', 'next') as $nav_type) {
					if (isset($post_navigation[$nav_type]['post'])) { ?>
						<?php $eltd_nav_class = get_the_post_thumbnail($post_navigation[$nav_type]['post']->ID) == '' ? 'eltd-no-nav-image' : '';  ?>
						<div class="eltd-blog-single-nav-wrapper <?php echo esc_html($nav_type); ?>">
							<a itemprop="url" class="eltd-blog-single-<?php echo esc_attr($nav_type); ?> <?php echo esc_attr($eltd_nav_class); ?>" href="<?php echo get_permalink($post_navigation[$nav_type]['post']->ID); ?>">
								<?php if($nav_type == 'prev') { ?>
									<span class="eltd-blog-single-nav-image">
										<?php echo get_the_post_thumbnail($post_navigation[$nav_type]['post']->ID, 'vakker_eltd_square'); ?>
									</span>
								<?php } ?>
								<span class="eltd-blog-single-nav-text">
									<h4 class="eltd-blog-single-nav-title"><?php echo the_title_attribute(array('post' => $post_navigation[$nav_type]['post']->ID)); ?></h4>
									<?php echo wp_kses($post_navigation[$nav_type]['mark'], array('span' => array('class' => true))); ?>
									<?php echo wp_kses($post_navigation[$nav_type]['label'], array('span' => array('class' => true))); ?>
								</span>
								<?php if($nav_type == 'next') { ?>
									<span class="eltd-blog-single-nav-image">
										<?php echo get_the_post_thumbnail($post_navigation[$nav_type]['post']->ID, 'vakker_eltd_square'); ?>
									</span>
								<?php } ?>
							</a>
						</div>
					<?php }
				}
			?>
		</div>
	</div>
<?php } ?>