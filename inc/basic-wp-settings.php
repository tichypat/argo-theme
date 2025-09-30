<?php

//Adds "menus" sub-item in administration under "Appearance" item.
add_theme_support('menus'); 
register_nav_menus( // Adds menu locations
    [
        'top-navbar' => __('Top Navbar', 'boost_it'),
    ]
);

// Necessary
add_theme_support("title-tag");

// Add support for post thumbnails
add_theme_support('post-thumbnails');

// Change default dots [...] after excerpt
function custom_excerpt_dots( $more ) {
    return '...';
}
add_filter('excerpt_more', 'custom_excerpt_dots');


// Add excerpt support to pages
add_action('init', 'wpdocs_custom_init');
function wpdocs_custom_init() {
	add_post_type_support( 'page', 'excerpt' );
}