<?php

// Register Team Members CPT
function register_team_members_cpt()
{
    $labels = [
        'name' => 'Team Members',
        'singular_name' => 'Team Member',
        'menu_name' => 'Team Members',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Team Member',
        'edit_item' => 'Edit Team Member',
        'new_item' => 'New Team Member',
        'view_item' => 'View Team Member',
        'search_items' => 'Search Team Members',
        'not_found' => 'No Team Members found',
        'not_found_in_trash' => 'No Team Members found in Trash',
    ];

    $args = [
        'label' => 'Team Members',
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-groups',
        'supports' => ['title', 'editor', 'thumbnail'],
        'has_archive' => false,
        'show_in_rest' => true,
    ];

    register_post_type('team_members', $args);
}
add_action('init', 'register_team_members_cpt');
