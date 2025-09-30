<?php

// Remove WP styles that are not needed
function optimize_stylesheets() {

    // Deregister not needed CSS files
    if (!is_admin()) {
        global $post;

        // If this post does not have any blocks in it's content, remove block-related CSS
        if(empty($post) || !has_blocks($post->post_content)) {
            wp_deregister_style("wp-block-library"); // Default block styles
            wp_dequeue_style('global-styles'); // Global inlice css containing various variables
            wp_dequeue_style('rank-math-toc-block-style'); // The handle for the TOC block's CSS
        }
    
        // If this post does not use the classis old school editor, remove classic editor related CSS
        if (empty($post) || isset($post->post_content) && !has_block('core/paragraph', $post->post_content)) {
            // Remove the classic theme styles if the post does not have Gutenberg blocks
            wp_dequeue_style('classic-theme-styles');
        }
    }
}
add_action ( 'wp_enqueue_scripts', 'optimize_stylesheets' );


// Disable emojis
function disable_wp_emojicons() {
    // Remove the emoji script from the front-end and admin area
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');

    // Remove the emoji script from the admin area
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');

    // Remove the TinyMCE emoji plugin
    add_filter('tiny_mce_plugins', function($plugins) {
        return is_array($plugins) ? array_diff($plugins, ['wpemoji']) : [];
    });

    // Prevent DNS prefetch for emojis
    add_filter('emoji_svg_url', '__return_false');
}
add_action('init', 'disable_wp_emojicons');