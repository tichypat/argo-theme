<?php get_header(); ?>
<main class="search-page">
    <section class="container my-5 py-5">
        <?php if ( have_posts() ) { ?>
            <h1 class="mb-3">
                Výsledky vyhledávání pro: "<?php the_search_query(); ?>"
            </h1>

            <!-- List posts -->
            <div class="row">
                <?php 
                    while ( have_posts() )  {
                    the_post(); 
                    ?>
                    <div class="col-12 col-md-6 mb-3">
                        <article class="post">
                            <?php if ( has_post_thumbnail() ) {
                                render_image([
                                    "img_id" => get_post_thumbnail_id(),
                                    "title" => get_the_title(),
                                    "alt" => get_the_title(),
                                    "lazy" => false
                                ]);
                            } ?>
                            
                            <h2>
                                <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                            
                            </h2>
                            
                            <p class="post-meta">
                                <?php the_time('d M, Y'); ?> |
                            
                                <?php
                                    $categories = get_the_category();
                                    $comma      = ', ';
                                    $output     = '';
                                    
                                    if ( $categories ) {
                                        foreach ( $categories as $category ) {
                                            $output .= $category->cat_name ;
                                        }
                                        
                                    }
                                    if($output == "") {
                                        $output = "Stránka";
                                    } 
                                    echo $output;
                                ?>
                            </p>
                            <p>
                                <a href="<?php echo get_permalink() ?>">
                                    <?php
                                        echo substr(get_the_excerpt(), 0, 400); 
                                     ?>
                                </a>
                            </p>
                        </article>
                    </div>
                </div>
                <?php 
            }  
        } else { ?>
            <h2 class="text-center">
                Žádné výsledky. Zkuste prosím něco jiného.
            </h2>
        <?php } ?>
    </section>
</main>
 
<?php get_footer(); ?>
