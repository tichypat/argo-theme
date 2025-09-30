<?php    
/**
 * Block Name: Team Member Detail
 *
 * @param array $block The block settings and attributes.
 */

// Show preview image in editor if available
if( isset($is_preview) && $is_preview ) :
    $preview_image = get_template_directory_uri() . '/assets/img/blocks-previews/team-member-detail.png';
    echo '<img src="' . esc_url($preview_image) . '" style="width:100%; height:auto;">';
    return;
endif;

// Get selected team member ID
$team_member_id = get_field('team_member');
if (empty($team_member_id)) return '';

// Retrieve team member fields
$name = get_the_title($team_member_id);
$position = get_field('position', $team_member_id);
$desc = get_field('description', $team_member_id);
$image = get_field('profile_image', $team_member_id);
$phone = get_field('phone', $team_member_id);
$email = get_field('email', $team_member_id);

// Get recent posts where this member is reviewer (up to 5)
$posts = get_posts([
    'post_type' => 'post',
    'post_status' => 'publish',
    'meta_query' => [
        [
            'key' => 'reviewer',
            'value' => $team_member_id,
            'compare' => '='
        ]
    ],
    'posts_per_page' => 5
]);
?>

<section class="team-member-detail d-flex flex-column justify-content-start p-4 bg-white my-5">
    <div class="wrapper d-flex flex-wrap">

        <!-- Team member image -->
        <div class="image d-flex justify-content-center mb-3 mb-md-0">
            <?php if ($image) { 
                // Get thumbnail ID
                $image_id = $image['ID'];
                $thumb = wp_get_attachment_image_src($image_id, 'medium-large');
                if ($thumb) { ?>
                    <img src="<?php echo esc_url($thumb[0]); ?>" alt="<?php echo esc_attr($name); ?>">
                <?php }
                else{ ?>
                    <img src="<?php echo get_template_directory_uri()."/assets/img/image-placeholder.jpg" ?>" alt="<?php echo esc_attr($name); ?>">
                <?php }
            } ?>
        </div>

        <div class="content d-flex flex-column align-items-start justify-content-between">

            <!-- Name -->
            <h2 class="name mb-0"><?php echo esc_html($name); ?></h2>

            <!-- Position (if exists) -->
            <?php if ($position) : ?>
                <p class="position"><?php echo esc_html($position); ?></p>
            <?php endif; ?>

            <!-- Description and contact info -->
            <?php if ($desc || $phone || $email): ?>
                <div class="d-flex flex-column align-items-start">

                    <!-- Description -->
                    <?php if ($desc) : ?>
                        <div class="desc"><?php echo $desc;?></div>
                    <?php endif; ?>

                    <!-- Contact info -->
                    <div class="contact">
                        <?php if ($phone) : ?>
                            <p class="phone">
                                <span class="dashicons dashicons-phone"></span>
                                <a href="tel:<?php echo esc_html($phone); ?>">
                                    <?php echo esc_html($phone); ?>
                                </a>
                            </p>
                        <?php endif; ?>

                        <?php if ($email) : ?>
                            <p class="contact mail d-flex align-items-center">
                                <span class="dashicons dashicons-email me-2"></span>
                                <a href="mailto:<?php echo esc_attr($email); ?>">
                                    <?php echo esc_html($email); ?>
                                </a>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Recent posts reviewed by this member -->
            <?php if ($posts): ?>
                <div class="reviews d-flex flex-wrap align-items-center justify-content-start">
                    <h2 class="title me-2 mb-0">Recent Reviews:</h2>
                    <div>
                        <?php 
                        $titles = [];
                        foreach ($posts as $post) {
                            $titles[] = '<a href="' . esc_url(get_permalink($post)) . '">' . esc_html(get_the_title($post)) . '</a>';
                        }
                        echo implode(', ', $titles);
                        ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>
