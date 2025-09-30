<?php
// Register custom ACF blocks
add_action('acf/init', function () {
    if (function_exists('acf_register_block_type')) {

        acf_register_block_type([
            'name'            => 'team-member-detail',
            'title'           => __('Team Member Detail'),
            'description'     => __('Display a single team member profile.'),
            'render_template' => 'blocks/team-member-detail/team-member-detail.php',
            'category'        => 'widgets',
            'icon'            => 'admin-users',
            'keywords'        => ['team', 'member', 'detail'],
            'supports'        => ['align' => false, 'customClassName' => true],
            'enqueue_style'   => get_template_directory_uri() . '/blocks/team-member-detail/team-member-detail.css',
        ]);

        acf_register_block_type([
            'name'            => 'team-member-grid',
            'title'           => __('Team Member Grid'),
            'description'     => __('Display multiple team members in a grid.'),
            'render_template' => 'blocks/team-member-grid/team-member-grid.php',
            'category'        => 'widgets',
            'icon'            => 'grid-view',
            'keywords'        => ['team', 'members', 'grid'],
            'supports'        => ['align' => false, 'customClassName' => true],
            'enqueue_style'   => get_template_directory_uri() . '/blocks/team-member-grid/team-member-grid.css',
            'example' => [
                'attributes' => [
                    'mode' => 'preview',
                    'preview' => true,
                    'data' => [
                        'preview_screenshot' => get_template_directory_uri() . '/assets/img/blocks-previews/team-member-grid.png',
                    ]
                ]
            ]
        ]);
    }
});