<?php
/**
 * Template name: Accessibility
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
                    <img class="textImage__art parallax" src="<?php echo selectrum_get_image_url('art-m.svg'); ?>" alt="">
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
    $documents = get_field('documents');
    if ( !empty($documents) ) :
    ?>
    <section class="section sectionJobs">
        <div class="jobsListing">
            <div class="jobsListing__header">
                <div class="container container--middle">
                    <h2>Documents</h2>
                </div>
            </div>
            <div class="jobsListing__teasers">
                <?php foreach ( $documents as $item ) : ?>
                    <div class="jobTeaser">
                        <div class="jobTeaser__inner">
                            <h3><?php echo $item['document_title']; ?></h3>
                            <a class="btn" href="<?php echo $item['file_pdf']['url']; ?>" target="_blank">View PDF</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>


    <?php locate_template('parts/section-cta.php', true); ?>


<?php endwhile; ?>

<?php get_footer(); ?>