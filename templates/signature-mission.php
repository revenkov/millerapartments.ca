<?php
/**
 * Template name: Signature mission
 */
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


	<?php locate_template('parts/section-hero.php', true); ?>


    <?php
    $content_group = get_field('content_group');
    $image = get_field('image');
    ?>
    <section class="section amenitiesSection" id="amenities">
        <div class="container">
            <div class="galleryBlock">
                <div class="galleryBlock__col1">
                    <div class="galleryBlock__textContainer wysiwyg"><?php echo $content_group['content']; ?></div>
                    <div class="galleryBlock__imageContainer">
                        <?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
                    </div>
                    <div class="galleryBlock__textContainer wysiwyg"><?php echo $content_group['content_2']; ?></div>
                    <div class="galleryBlock__listContainer"><?php echo $content_group['content_box']; ?></div>
                </div>
                <div class="galleryBlock__col2">
                    <div class="galleryBlock__imageContainer">
                        <?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php locate_template('parts/section-cta.php', true); ?>


<?php endwhile; ?>

<?php get_footer(); ?>