<?php
/**
 * Template name: FAQ
 */
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


	<?php locate_template('parts/section-hero.php', true); ?>


    <?php
    $content = get_field('content');
    if ( !empty( $content ) ) :
    ?>
    <section class="section sectionIntro">
        <div class="container container--narrow">
            <?php echo $content; ?>
        </div>
    </section>
    <?php endif; ?>


    <?php
    $faq = get_posts([
        'post_type' => 'faq',
        'posts_per_page' => -1,
    ]);
    if ( !empty( $faq ) ) :
    ?>
    <section class="section">
        <div class="container">
            <div class="accordion">
                <?php
                foreach( $faq as $post ) :
                    setup_postdata($post);
                ?>
                <div class="accordion__item">
                    <div class="accordion__inner">
                        <div class="accordion__header">
                            <h3><?php echo get_the_title(); ?></h3>
                            <button class="accordion__button">
                                <span class="accordion__buttonText" data-text-default="READ MORE" data-text-close="READ LESS"></span>
                                <svg class="accordion__buttonAngle" width="40px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39.02 20.57">
                                    <polyline fill="none" stroke="#1c99ce" stroke-miterlimit="10" stroke-width="1.5px" points="38.49 .53 19.51 19.51 .53 .53"/>
                                </svg>
                            </button>
                        </div>
                        <div class="accordion__content" style="display: none;">
                            <?php echo get_field('content'); ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>


<?php endwhile; ?>

<?php get_footer(); ?>