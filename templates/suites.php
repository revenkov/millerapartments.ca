<?php
/**
 * Template name: Suites
 */
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


	<?php locate_template('parts/section-hero.php', true); ?>


    <?php
    $content_group = get_field('content_group');
    $image_group = get_field('image_group');
    ?>
    <section class="section">
        <div class="container">
            <div class="galleryBlock">
                <div class="galleryBlock__col1">
                    <div class="galleryBlock__textContainer wysiwyg"><?php echo $content_group['content']; ?></div>
                    <div class="galleryBlock__imageContainer"><?php echo wp_get_attachment_image( $image_group['image']['ID'], 'full' ); ?></div>
                    <div class="galleryBlock__textContainer wysiwyg"><?php echo $content_group['content_2']; ?></div>
                    <div class="galleryBlock__listContainer"><?php echo $content_group['content_box']; ?></div>
                    <?php if ( !empty( $content_group['callout_box'] ) ) : ?>
                    <div class="galleryBlock__calloutContainer">
                        <div class="galleryBlock__container"><?php echo $content_group['callout_box']; ?></div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="galleryBlock__col2">
                    <div class="galleryBlock__imageContainer"><?php echo wp_get_attachment_image( $image_group['image']['ID'], 'full' ); ?></div>
                    <div class="galleryBlock__textContainer2">
                        <img class="galleryBlock__art parallax" src="<?php echo selectrum_get_image_url('art-m.svg'); ?>" alt="">
                        <div class="galleryBlock__blueText"><?php echo $image_group['quote']; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php
    $suite_types = get_field('suite_types');
    if ( !empty( $suite_types ) ) :
    ?>
    <section class="section">
        <div class="container">
            <div class="suites">
                <div class="suites__header">
                    <div class="container container--middle">
                        <h2>Sample Suite Types</h2>
                    </div>
                </div>
                <div class="suites__listing">
                    <?php foreach ( $suite_types as $key=>$item ) : ?>
                    <div class="suites__item" data-id="<?php echo sanitize_title( $item['title'] ); ?>">
                        <div class="container container--middle">
                            <div class="suites__itemInner">
                                <div class="h2 suites__itemTitle"><?php echo $item['title']; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="suites__detail" data-id="<?php echo sanitize_title( $item['title'] ); ?>">
                        <div class="suites__detailContainer">
                            <?php echo wp_get_attachment_image( $item['image']['ID'], 'full' ); ?>
                            <div class="container container--middle">
                                <div class="suites__detailInner">
                                    <div class="h2 suites__detailLabel"><?php echo $item['unit_label']; ?></div>
                                    <a class="btn" href="<?php echo $item['floorplans_pdf']['url']; ?>" target="_blank">Download floorplans</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="suites__details">

                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>


    <footer class="section sectionCTA">
        <div class="container">
            <div class="sectionCTA__inner">
                <?php get_template_part('parts/cta-book'); ?>
                <?php get_template_part('parts/cta-amenities'); ?>
            </div>
        </div>
    </footer>


<?php endwhile; ?>

<?php get_footer(); ?>