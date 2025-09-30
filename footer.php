<?php wp_footer(); ?>

    <footer class="container-fluid pt-5 pb-3">
        <section class="container">
            <!-- Main content -->
            <div class="row no-gutters upper-row">
                <div class="col-12 col-md-6 col-lg-2 my-3">
                    <a class="d-flex" href="/" title="<?php echo get_bloginfo("name") ?>">
                        <img src="<?php echo get_template_directory_uri() . "/assets/img/logo.svg" ?>" alt="<?php echo get_bloginfo("name") . " logo" ?>">
                    </a>
                </div>
            </div>
    
            <!-- Copyright claim -->
            <div class="row no-gutters mt-5 pt-2 bottom-row">
                <div class="col-12">
                    <p>
                        © <?php echo date("Y") . " " . get_bloginfo('name'); ?> 
                    </p>
                </div>
            </div>
        </section>
    </footer>
</body>
</html>
