<?php
/**
 * Template name: Amenities
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
    $amenities = get_field('amenities');
    if ( !empty( $amenities ) ) :
    ?>
    <div class="section">
        <div class="container">
            <div class="postsListing" data-responsive='<?php echo json_encode([0=>6,768=>8,1700=>16]); ?>'>
                <div class="postsListing__teasers">
                    <?php foreach ( $amenities as $item ) : ?>
                    <div class="amenityTeaser">
                        <div class="amenityTeaser__imageContainer"><?php echo wp_get_attachment_image( $item['image']['ID'],'full' ); ?></div>
                        <div class="amenityTeaser__textContainer">
                            <h3 class="amenityTeaser__title"><?php echo $item['title']; ?></h3>
                            <p class="amenityTeaser__description"><?php echo $item['description']; ?></p>
                            <?php if ( !empty( $item['button'] ) ) : ?>
                                <a class="amenityTeaser__link" href="<?php echo $item['button']['url']; ?>" target="<?php echo !empty( $item['button']['target'] ) ? '_blank' : '_self'; ?>"><?php echo $item['button']['title']; ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="postsListing__pagination">
                    <button class="btn" type="submit">Load more</button>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>


    <footer class="section sectionCTA">
        <div class="container">
            <div class="sectionCTA__inner">
                <?php get_template_part('parts/cta-book'); ?>
            </div>
        </div>
    </footer>


<?php endwhile; ?>

<?php get_footer(); ?>