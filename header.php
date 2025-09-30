<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <?php wp_head();?>
    </head>
    <body id="body" <?php echo body_class(); ?>>
        <!-- Header -->
        <header>
            <nav class="navbar navbar-expand-md" role="navigation">
                <div class="container">

                    <!-- Logo -->
                    <div class="navbar-brand me-0">
                        <a class="d-flex" href="/" title="<?php echo esc_attr(get_bloginfo("name")) ?>">
                            <img src="<?php echo get_template_directory_uri() . "/assets/img/logo.svg" ?>" alt="<?php echo get_bloginfo("name") . " logo" ?>">
                        </a>
                    </div>

                    <!-- Menu items -->
                    <div class="d-none d-lg-flex justify-content-end w-100 mb-2 mb-lg-0">
                        <?php
                            wp_nav_menu([
                                'theme_location'  => 'top-navbar',
                                'container'       => '', 
                                'container_id'    => '', 
                                'container_class' => '',
                                'menu_id'         => 'top-menu',
                                'fallback_cb'     => '__return_false',
                                'items_wrap'      => '<ul id="%1$s" class="navbar-nav mb-2 mb-md-0 %2$s">%3$s</ul>',
                                'depth'           => 2,
                                'walker'          => new bs5_Walker()
                            ]);
                        ?>	
                    </div>   

                    <!-- Offcanvas toggler -->
                    <a href="#" class="offcanvas-toggler d-block d-lg-none" aria-label="<?php echo __('Zobrazit navigaci', 'starter-theme'); ?>"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div> 
            </nav>

            <!-- Offcanvas -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <p id="offcanvasRightLabel" class="mb-0 fs-5 text-white">Navigace</p>
                    <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                
                <div class="offcanvas-body">
                    <?php
                        wp_nav_menu([
                            'theme_location'  => 'top-navbar',
                            'container'       => '', 
                            'container_id'    => '', 
                            'container_class' => '',
                            'menu_id'         => 'top-menu',
                            'fallback_cb'     => '__return_false',
                            'items_wrap'      => '<ul id="%1$s" class="navbar-nav align-items-start me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                            'depth'           => 2,
                            'walker'          => new bs5_Walker()
                        ]);
                    ?>   
                </div>
            </div>
        </header>