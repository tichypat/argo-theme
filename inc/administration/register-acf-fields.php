<?php
if (function_exists('acf_add_local_field_group')):

    // Fields for Team Member
    acf_add_local_field_group([
        'key' => 'group_team_member',
        'title' => 'Team Member Fields',
        'fields' => [
            [
                'key' => 'field_position',
                'label' => 'Position',
                'name' => 'position',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'key' => 'field_description',
                'label' => 'Description',
                'name' => 'description',
                'type' => 'wysiwyg',
            ],
            [
                'key' => 'field_profile_image',
                'label' => 'Profile Image',
                'name' => 'profile_image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
            ],
            [
                'key' => 'field_phone',
                'label' => 'Phone Number',
                'name' => 'phone',
                'type' => 'text',
            ],
            [
                'key' => 'field_email',
                'label' => 'E-mail',
                'name' => 'email',
                'type' => 'email',
                'required' => 1,
            ],
        ],
        'location' => [[
            ['param' => 'post_type', 'operator' => '==', 'value' => 'team_members']
        ]],
    ]);

    // Reviewer field for Posts
    acf_add_local_field_group([
        'key' => 'group_post_reviewer',
        'title' => 'Reviewer',
        'fields' => [
            [
                'key' => 'field_reviewer',
                'label' => 'Reviewer',
                'name' => 'reviewer',
                'type' => 'post_object',
                'post_type' => ['team_members'],
                'return_format' => 'id',
                'ui' => 1,
            ],
        ],
        'location' => [[
            ['param' => 'post_type', 'operator' => '==', 'value' => 'post']
        ]],
    ]);

endif;
