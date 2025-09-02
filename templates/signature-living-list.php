<?php
/**
 * Template name: Signature living list
 */
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


	<?php locate_template('parts/section-hero.php', true); ?>


    <?php
    $content = get_field('content');
    $video_poster = get_field('video_poster');
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
                    <div class="textImage__imageContainer textImage__imageContainer--video">
                        <a href="javascript:" data-fancybox data-src="https://www.youtube.com/watch?v=7KR_ScAub8E" title="Watch video">
                            <?php echo wp_get_attachment_image( $video_poster['ID'], 'full', false, ['class'=>'textImage__image'] ); ?>
                            <button type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="42px" height="50px" viewBox="0 0 42 50">
                                    <path fill-rule="evenodd" fill="currentColor" d="M41.1000,24.1000 L0.000,49.250 L0.000,0.750 L41.1000,24.1000 Z"/>
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php locate_template('parts/section-cta.php', true); ?>


<?php endwhile; ?>

<?php get_footer(); ?>