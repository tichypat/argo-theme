<?php
/**
 * Block Name: Team Member Grid
 *
 * @param array $block The block settings and attributes.
 */

// Show static preview in Gutenberg editor
if( isset($is_preview) && $is_preview ) :
    $preview_image = get_template_directory_uri() . '/assets/img/blocks-previews/team-member-grid.png';
    echo '<img src="' . esc_url($preview_image) . '" style="width:100%; height:auto;">';
    return;
endif;

// Get block-level settings
$columns = get_field('columns') ?: 3;    
$show_position = get_field('display_position') ?? true;

// Get all published team member posts
$team_members = get_posts([
    'post_type' => 'team_members',
    'post_status' => 'publish',
    'posts_per_page' => -1,
]);

if ($team_members) {
    // Grid container with dynamic column count
    echo '<section class="team-members my-5 d-grid gap-3" style="grid-template-columns: repeat(' . esc_attr($columns) . ', 1fr)">';

    foreach ($team_members as $member) {
        $id = $member->ID;
        $name = get_the_title($id);
        $position = get_field('position', $id);
        $image = get_field('profile_image', $id);
        $phone = get_field('phone', $id);
        ?>

        <div class="wrapper d-flex flex-column">

            <!-- Team member image -->
            <div class="image overflow-hidden bg-white d-flex align-items-end">
                <?php 
                if ($image) { 
                    // Get thumbnail ID
                    $image_id = $image['ID'];
                    $thumb = wp_get_attachment_image_src($image_id, 'medium-large');
                    if ($thumb) { ?>
                        <img src="<?php echo esc_url($thumb[0]); ?>" alt="<?php echo esc_attr($name); ?>">
                    <?php } else { ?>
                        <!-- Use theme placeholder if no image -->
                        <img src="<?php echo get_template_directory_uri() . "/assets/img/image-placeholder.jpg"; ?>" alt="<?php echo esc_attr($name); ?>">
                    <?php } 
                } ?>
            </div>

            <!-- Team member content: name, position, phone -->
            <div class="content d-flex flex-column align-items-start mt-4 ps-4">
                <h2 class="name"><?php echo esc_html($name) ?></h2>

                <div class="d-flex justify-content-between flex-wrap w-100">
                    <?php if ($position && $show_position) : ?>
                        <div>
                            <p class="position mb-0"><?php echo esc_html($position); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if ($phone) : ?>
                        <div>
                            <p class="phone">
                                <span class="dashicons dashicons-phone"></span>
                                <a href="tel:<?php echo esc_html($phone); ?>">
                                    <?php echo esc_html($phone); ?>
                                </a>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
        <?php
    }

    echo '</section>'; // Close grid container
}
