<?php
/**
 * Template name: Careers
 */
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


	<?php locate_template('parts/section-hero.php', true); ?>


    <?php
    $content = get_field('content');
    $image = get_field('image');
    ?>
    <section class="section" id="about">
        <div class="container">
            <div class="textImage">
                <div class="textImage__col1">
                    <div class="textImage__textContainer">
                        <div class="wysiwyg"><?php echo $content; ?></div>
                    </div>
                </div>
                <div class="textImage__col2">
                    <div class="textImage__imageContainer"><?php echo wp_get_attachment_image( $image['ID'], 'full', false, ['class'=>'textImage__image'] ); ?></div>
                </div>
            </div>
        </div>
    </section>


    <?php
    $job_listings = get_field('job_listings');
    $no_job_postings_message = get_field('no_job_postings_message');
    ?>
    <section class="section sectionJobs">
        <div class="jobsListing">
            <div class="jobsListing__header">
                <div class="container container--middle">
                    <h2>Job Postings</h2>
                </div>
            </div>
            <?php if ( !empty( $job_listings ) ) : ?>
            <div class="jobsListing__teasers">
                <?php foreach ( $job_listings as $item ) : ?>
                    <div class="jobTeaser">
                        <div class="jobTeaser__inner">
                            <h3><?php echo $item['title']; ?></h3>
                            <a class="btn" href="<?php echo $item['pdf_file']['url']; ?>" target="_blank">Apply</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php else : ?>
            <div class="jobsListing__nothingFound">
                <div class="container container--middle"><?php echo $no_job_postings_message; ?></div>
            </div>
            <?php endif; ?>
        </div>
    </section>


    <section class="section sectionForm sectionForm--bg">
        <div class="container container--narrow">
            <div class="wysiwyg">
                <h2>Apply Today</h2>
                <div class="formContainer"><?php echo do_shortcode('[contact-form-7 id="7f22f9b" title="Apply"]'); ?></div>
            </div>
        </div>
    </section>


<?php endwhile; ?>

<?php get_footer(); ?>