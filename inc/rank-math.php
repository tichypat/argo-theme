<?php

function custom_og_author_to_site_title($author) {
    // Get the site title
    $site_title = get_bloginfo('name');
    // Return the site title as the author
    return $site_title;
}
    
// Apply the filter to override the Facebook OG author meta
add_filter('rank_math/opengraph/fb_author', 'custom_og_author_to_site_title');