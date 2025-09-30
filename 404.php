<?php get_header(); ?>
    <main class="404 py-5">
        <section class="container py-5 ">
            <div class="row my-5">
                <div class="col-12 text-center mt-5">
                    <h1>
                        404 <br>
                        <?php _e( 'Nenalezeno', 'wordpress-starter-theme-main' ); ?>
                    </h1>
                </div>
                <div class="col-12 text-center">
                    <p><?php _e( 'Na této adrese jsme nic nenašli.', 'wordpress-starter-theme-main' ); ?></p>
                </div>
                
            </div>
        </section>
    </main>
<?php get_footer(); ?>