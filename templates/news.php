<?php
/**
 * Template name: News
 */
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


	<?php locate_template('parts/section-hero.php', true); ?>


    <?php
    $query = new WP_Query([
        'post_type' => 'news',
        'posts_per_page' => -1
    ]);
    ?>
    <section class="section sectionNews">
        <div class="container">
            <div class="postsListing" data-responsive='<?php echo json_encode([0=>6,768=>8,1260=>9]); ?>'>
                <?php if ( $query->have_posts() ) : ?>
                    <div class="postsListing__teasers">
                        <?php while ( $query->have_posts() ) :
                            $query->the_post();
                            $thumbnail_image = get_field('thumbnail_image');
                            ?>
                            <div class="teaserNews">
                                <div class="teaserNews__imageContainer">
                                    <?php echo wp_get_attachment_image( $thumbnail_image['ID'], 'large', false, ['class'=>'teaserNews__image']); ?>
                                </div>
                                <div class="teaserNews__overlay">
                                    <h2 class="h3 teaserNews__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <a class="btn btn--hoverWhite" href="<?php the_permalink(); ?>">Read more</a>
                                </div>
                                <a class="teaserNews__lnkOverlay" href="<?php echo get_the_permalink(); ?>" title="<?php _e('Learn more', 'selectrum'); ?>"></a>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                    <div class="postsListing__pagination">
                        <button class="btn"><?php _e('Load More', 'selectrum'); ?></button>
                    </div>
                <?php else : ?>
                    <div class="postsListing__nothingFound"><?php _e('Nothing found', 'selectrum'); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </section>


<?php endwhile; ?>

<?php get_footer(); ?>