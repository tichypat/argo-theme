<?php get_header(); the_post(); ?>

<main class="front-page">
    <div class="container text-center py-5 my-5">
        <?php the_content() ?>
    </div>
</main>

<?php get_footer(); ?>