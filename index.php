<?php get_header(); the_post(); ?>

    <main class="index">
        <!-- Title -->
        <section class="container-fluid">
            <div class="row no-gutters">
                <div class="col-12">
                    <h1>
                        <?php the_title(); ?>
                    </h1>
                </div>
            </div>
        </section>

        <!-- Content -->
        <section class="container">
            <div class="row no-gutters">
                <div class="col-12">
                    <p>
                        <?php the_content(); ?>
                    </p>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>