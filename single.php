<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <section class="section heroSection">
        <div class="container">
            <h1><?php the_title(); ?></h1>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div><?php the_content(); ?></div>
            <?php include( locate_template( 'parts/share.php' )); ?>
            <?php comments_template( '/parts/comments.php' ); ?>
        </div>
    </section>

<?php endwhile; ?>

<?php get_footer(); ?>
