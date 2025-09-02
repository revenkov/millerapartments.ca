<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


    <?php locate_template('parts/section-hero.php', true); ?>


    <?php
    $gallery = get_field('gallery');
    ?>
    <section class="section sectionGallery">
        <div class="container">
            <div class="postsListing" data-responsive='<?php echo json_encode([0=>6,768=>8,1700=>9]); ?>'>
                <?php if ( !empty( $gallery ) ) : ?>
                    <div class="postsListing__teasers">
                        <?php foreach ( $gallery as $key=>$item ) : ?>
                            <div class="teaserGallery" data-fancybox data-src="#gallery" data-fancybox-index="<?php echo $key; ?>">
                                <div class="teaserGallery__imageContainer">
                                    <?php echo wp_get_attachment_image( $item['ID'], 'full', false, ['class'=>'teaserGallery__image']); ?>
                                </div>
                                <div class="teaserGallery__overlay">
                                    <div class="teaserGallery__caption"><?php echo $item['caption']; ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="postsListing__pagination">
                        <button class="btn"><?php _e('Load More', 'selectrum'); ?></button>
                    </div>
                <?php else : ?>
                    <div class="postsListing__nothingFound"><?php _e('Nothing found', 'selectrum'); ?></div>
                <?php endif; ?>
            </div>
            <div id="gallery" class="popupGallery" style="display: none">
                <div class="popupGallery__inner">
                    <div class="popupGallery__slider">
                        <div class="popupGallery__slides">
                            <?php foreach ( $gallery as $item ) : ?>
                            <div class="popupGallery__slide">
                                <div class="popupGallery__slideContainer"><?php echo wp_get_attachment_image( $item['ID'], 'full' ); ?></div>
                                <div class="popupGallery__slideCaption"><?php echo $item['caption']; ?></div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <nav class="section postNav">
        <div class="container">
            <?php if ( !empty( get_next_post() ) ) : ?><a class="postNav__linkPrev" href="<?php echo get_the_permalink( get_next_post() ); ?>" data-text-mobile="Prev"><span>Previous gallery</span></a><?php endif; ?>
            <a class="postNav__linkBack" href="<?php echo selectrum_get_permalink( 2553 ); ?>"><span>Back to<br> gallery</span></a>
            <?php if ( !empty( get_previous_post() ) ) : ?><a class="postNav__linkNext" href="<?php echo get_the_permalink( get_previous_post() ); ?>" data-text-mobile="Next"><span>Next gallery</span></a><?php endif; ?>
        </div>
    </nav>



    <footer class="section sectionCTA">
        <div class="container">
            <div class="sectionCTA__inner">
                <?php get_template_part('parts/cta-book'); ?>
            </div>
        </div>
    </footer>


<?php endwhile; ?>

<?php get_footer(); ?>
