<?php
/**
 * Template name: Book a tour
 */
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


	<?php locate_template('parts/section-hero.php', true); ?>


    <section class="section sectionForm">
        <div class="container container--narrow">
            <div class="wysiwyg">
                <p>Please complete the form below and we will reach out to schedule your private tour.</p>
                <div class="formContainer"><?php echo do_shortcode('[contact-form-7 id="b86d9e1" title="Book a tour"]'); ?></div>
                <p>Call and book your tour today.</p>
            </div>
        </div>
    </section>


<?php endwhile; ?>

<?php get_footer(); ?>