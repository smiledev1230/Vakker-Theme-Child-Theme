<?php

vakker_eltd_get_single_post_format_html($blog_single_type);

do_action('vakker_eltd_after_article_content');

vakker_eltd_get_module_template_part('templates/parts/single/author-info', 'blog');

vakker_eltd_get_module_template_part('templates/parts/single/single-navigation', 'blog');

vakker_eltd_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

vakker_eltd_get_module_template_part('templates/parts/single/comments', 'blog');