<?php
/**
 * Template name: Location
 */
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


    <?php locate_template('parts/section-hero.php', true); ?>


    <?php
    $content_1 = get_field('content_1');
    $image_1 = get_field('image_1');
	?>
    <section class="section" id="about">
        <div class="container">
            <div class="textImage">
                <div class="textImage__col1">
                    <img class="textImage__art parallax" src="<?php echo selectrum_get_image_url('art-m.svg'); ?>" alt="">
                    <div class="textImage__textContainer">
                        <div class="wysiwyg"><?php echo $content_1; ?></div>
                    </div>
                </div>
                <div class="textImage__col2">
                    <div class="textImage__imageContainer"><?php echo wp_get_attachment_image( $image_1['ID'], 'full', false, ['class'=>'textImage__image'] ); ?></div>
                </div>
            </div>
        </div>
    </section>


    <?php
    $content_2 = get_field('content_2');
    $image_2 = get_field('image_2');
    ?>
    <section class="section">
        <div class="container">
            <div class="imageText">
                <div class="imageText__col1">
                    <div class="imageText__textContainer">
                        <div class="wysiwyg"><?php echo $content_2; ?></div>
                    </div>
                </div>
                <div class="imageText__col2">
                    <div class="imageText__imageContainer"><?php echo wp_get_attachment_image( $image_2['ID'], 'full', false, ['class'=>'imageText__image'] ); ?></div>
                </div>
            </div>
        </div>
    </section>


    <?php
    $quote = get_field('quote');
    $google_map_link = get_field('google_map_link', 'options');
    ?>
    <section class="section" id="location">
        <div class="container">
            <div class="locationBlock">
                <div class="locationBlock__col1">
                    <img class="locationBlock__art parallax" src="<?php echo selectrum_get_image_url('art-m.svg'); ?>" alt="">
                    <h2 class="locationBlock__title"><?php echo $quote; ?></h2>
                </div>
                <div class="locationBlock__col2">
                    <div class="locationBlock__map">
                        <div class="locationBlock__mapContainer">
                            <img class="locationBlock__mapImage" src="<?php echo selectrum_get_image_url('map.jpg'); ?>" alt="">
                        </div>
                        <div class="locationBlock__mapLegend">
                            <a href="<?php echo $google_map_link; ?>" class="locationBlock__mapLocation" data-index="1" target="_blank">
                                <span class="locationBlock__mapLocationAddress">5510 Dickinson St</span>
                                <span class="locationBlock__mapLocationLogo"><img class="locationBlock__mapLocationLogoImage" src="<?php echo selectrum_get_image_url('logo.svg'); ?>" alt=""></span>
                            </a>
                            <?php /*
                            <a href="//maps.app.goo.gl/gj1Zo8jMC5esjEub8" class="locationBlock__mapLocation" data-index="2" target="_blank">
                                <span class="locationBlock__mapLocationTitle">Presentation Centre</span>
                                <span class="locationBlock__mapLocationAddress">414 Sparks Street</span>
                            </a>
                            */ ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="section sectionCTA">
        <div class="container">
            <div class="sectionCTA__inner">
                <?php get_template_part('parts/cta-book'); ?>
            </div>
        </div>
    </footer>


<?php endwhile; ?>

<?php get_footer(); ?>