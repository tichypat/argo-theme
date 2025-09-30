<?php

// Register field group for team-member-grid block
add_action('acf/init', function () {
    if (function_exists('acf_add_local_field_group')) {

        acf_add_local_field_group([
            'key' => 'group_block_team_members_grid',
            'title' => 'Block: Team Member Grid Settings',
            'fields' => [
                [
                    'key' => 'field_grid_columns',
                    'label' => 'Number of Columns',
                    'name' => 'columns',
                    'type' => 'select',
                    'choices' => [
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                    ],
                    'allow_null' => 1,
                    'ui' => 1,
                ],
                [
                    'key' => 'field_grid_position',
                    'label' => 'Display Position',
                    'name' => 'display_position',
                    'type' => 'true_false',
                    'default_value' => 1,
                    'ui' => 1,
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'acf/team-member-grid',
                    ],
                ],
            ],
        ]);
    }
});

// Register field group for team-members-detail block
add_action('acf/init', function() {
    if( function_exists('acf_add_local_field_group') ) {

        acf_add_local_field_group([
            'key' => 'group_block_team_member_detail',
            'title' => 'Block: Team Member Detail Settings',
            'fields' => [
                [
                    'key' => 'field_team_member_select',
                    'label' => 'Select Team Member',
                    'name' => 'team_member',
                    'type' => 'post_object',
                    'post_type' => ['team_members'],
                    'return_format' => 'id',
                    'ui' => 1,
                    'required' => 1,
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'acf/team-member-detail',
                    ],
                ],
            ],
        ]);

    }
});
