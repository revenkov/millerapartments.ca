<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


	<?php locate_template('parts/section-hero.php', true); ?>


    <section class="section">
        <div class="container container--narrow">
            <div class="wysiwyg"><?php echo get_field('content'); ?></div>
        </div>
    </section>


<?php endwhile; ?>

<?php get_footer(); ?>