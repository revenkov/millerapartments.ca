<?php
/**
 * Template name: Services guarantee
 */
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


	<?php locate_template('parts/section-hero.php', true); ?>


    <?php
    $content = get_field('content');
    $image = get_field('image');
    $pdf = get_field('pdf');
    ?>
    <section class="section" id="about">
        <div class="container">
            <div class="textImage">
                <div class="textImage__col1">
                    <img class="textImage__art parallax" src="<?php echo selectrum_get_image_url('art-m.svg'); ?>" alt="">
                    <div class="textImage__textContainer">
                        <div class="wysiwyg"><?php echo $content; ?></div>
                        <?php if ( !empty( $pdf['url'] ) ) : ?>
                            <a class="btn" href="<?php echo $pdf['url']; ?>" target="_blank"><span class="btn__text">View PDF</span></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="textImage__col2">
                    <div class="textImage__imageContainer textImage__imageContainer--video">
                        <?php echo wp_get_attachment_image( $image['ID'], 'full', false, ['class'=>'textImage__image'] ); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php locate_template('parts/section-cta.php', true); ?>


<?php endwhile; ?>

<?php get_footer(); ?>