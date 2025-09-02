<?php
/**
 * Template name: Home
 */
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


    <?php
    global $post;
    $desktop = get_field('desktop', selectrum_get_hero_image_post_id());
    $tablet = get_field('tablet', selectrum_get_hero_image_post_id());
    $mobile = get_field('mobile', selectrum_get_hero_image_post_id());
    $content_hero = get_field('content_hero', selectrum_get_hero_image_post_id());
    $video = get_field('video', selectrum_get_hero_image_post_id());
    ?>
    <section class="section homeHeroSection">
        <div class="homeHeroSection__mediaContainer <?php if ( !empty( $banner_visible ) && !empty( $banner_text ) ) : ?>banner<?php endif; ?>">
            <?php if ( !empty( $video ) ) : ?>
                <video class="homeHeroSection__video" width="<?php echo $video['width']; ?>" height="<?php echo $video['height']; ?>" playsinline autoplay muted loop>
                    <source src="<?php echo $video['url']; ?>" type="<?php echo $video['mime_type']; ?>">
                </video>
            <?php else : ?>
                <picture>
                    <?php if ( !empty( $mobile ) ) : ?><source media="(max-width: 767px)" srcset="<?php echo wp_get_attachment_image_srcset( $mobile['ID'] ); ?>"><?php endif; ?>
                    <?php if ( !empty( $tablet ) ) : ?><source media="(max-width: 1259px)" srcset="<?php echo wp_get_attachment_image_srcset( $tablet['ID'] ); ?>"><?php endif; ?>
                    <?php echo wp_get_attachment_image( $desktop['ID'], 'full', false, ['class'=>'homeHeroSection__image']); ?>
                </picture>
            <?php endif; ?>
        </div>
        <?php if ( !empty( $content_hero['banner_visible'] ) && !empty( $content_hero['banner_text'] ) ) : ?>
        <div class="homeHeroSection__banner"><?php echo $content_hero['banner_text']; ?></div>
        <?php endif; ?>
        <div class="homeHeroSection__overlay">
            <div class="container">
                <div class="homeHeroSection__textContainer wysiwyg"><?php echo $content_hero['content']; ?></div>
                <?php if ( !empty( $content_hero['button'] ) ) : ?>
                    <a class="btn btn--hoverWhite" href="<?php echo $content_hero['button']['url']; ?>"><span class="btn__text"><?php echo $content_hero['button']['title']; ?></span></a>
                <?php endif; ?>
            </div>
        </div>
    </section>


    <?php
    $content_group_1 = get_field('content_group_1');
    $image_1 = get_field('image_1');
	?>
    <section class="section" id="about">
        <div class="container">
            <div class="textImage">
                <div class="textImage__col1">
                    <img class="textImage__art parallax" src="<?php echo selectrum_get_image_url('art-m.svg'); ?>" alt="">
                    <div class="textImage__textContainer">
                        <div class="wysiwyg"><?php echo $content_group_1['content']; ?></div>
                    </div>
                    <?php if ( !empty( $content_group_1['button']['url'] ) ) : ?>
                    <a class="btn" href="<?php echo $content_group_1['button']['url']; ?>"><span class="btn__text"><?php echo $content_group_1['button']['title']; ?></span></a>
                    <?php endif; ?>
                </div>
                <div class="textImage__col2">
                    <div class="textImage__imageContainer"><?php echo wp_get_attachment_image( $image_1['ID'], 'full', false, ['class'=>'textImage__image'] ); ?></div>
                </div>
            </div>
        </div>
    </section>


    <?php
	$content = get_field('content');
	$card_1 = get_field('content_card_1');
	$card_2 = get_field('content_card_2');
	$card_3 = get_field('content_card_3');
    ?>
    <section class="section" id="services">
        <div class="container">
            <div class="centerText wysiwyg"><?php echo $content; ?></div>

            <div class="floorPlans">
                <div class="floorPlans__item">
                    <div class="floorPlans__itemContainer">
                        <h3 class="floorPlans__itemTitle"><?php echo $card_1['title']; ?></h3>
                        <div class="floorPlans__itemContent"><?php echo $card_1['description']; ?></div>
                    </div>
                    <a class="floorPlans__itemBtn btn" href="<?php echo $card_1['button']['url']; ?>"><?php echo $card_1['button']['title']; ?></a>
                    <a class="floorPlans__itemOverlay" href="<?php echo $card_1['button']['url']; ?>" title="<?php echo $card_1['button']['title']; ?>"></a>
                </div>
                <div class="floorPlans__item">
                    <div class="floorPlans__itemContainer">
                        <h3 class="floorPlans__itemTitle"><?php echo $card_2['title']; ?></h3>
                        <div class="floorPlans__itemContent"><?php echo $card_2['description']; ?></div>
                    </div>
                    <a class="floorPlans__itemBtn btn" href="<?php echo $card_2['button']['url']; ?>"><?php echo $card_2['button']['title']; ?></a>
                    <a class="floorPlans__itemOverlay" href="<?php echo $card_2['button']['url']; ?>" title="<?php echo $card_2['button']['title']; ?>"></a>
                </div>
                <div class="floorPlans__item">
                    <div class="floorPlans__itemContainer">
                        <h3 class="floorPlans__itemTitle"><?php echo $card_3['title']; ?></h3>
                        <div class="floorPlans__itemContent"><?php echo $card_3['description']; ?></div>
                    </div>
                    <a class="floorPlans__itemBtn btn" href="<?php echo $card_3['button']['url']; ?>"><?php echo $card_3['button']['title']; ?></a>
                    <a class="floorPlans__itemOverlay" href="<?php echo $card_3['button']['url']; ?>" title="<?php echo $card_3['button']['title']; ?>"></a>
                </div>
            </div>
        </div>
    </section>


    <?php
	$content_group_2 = get_field('content_group_2');
    $img_gallery = get_field('img_gallery');
    ?>
    <section class="section" id="location">
        <div class="container">
            <?php if ( !empty( $content_group_2 ) ) : ?>
            <div class="textImage">
                <div class="textImage__col1">
                    <div class="textImage__textContainer">
                        <?php echo $content_group_2['content']; ?>
                    </div>
                    <a class="btn" href="<?php echo $content_group_2['button']['url']; ?>"><?php echo $content_group_2['button']['title']; ?></a>
                </div>
                <div class="textImage__col2">
                    <div class="gallerySlider">
                        <div class="gallerySlider__slider owl-carousel">
                            <?php foreach ( $img_gallery as $item ) : ?>
                                <div class="gallerySlider__slide">
                                    <div class="gallerySlider__imageContainer"><?php echo wp_get_attachment_image( $item['ID'], 'full', false, ['class'=>'gallerySlider__image', 'loading'=>'eager'] ); ?></div>
                                    <div class="gallerySlider__caption"><?php echo !empty($item['caption']) ? $item['caption'] : false; ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>


    <?php
    $testimonials = get_field('testimonials');
    if ( !empty( $testimonials ) ) :
    ?>
    <section class="section sectionTestimonials">
        <div class="container">
            <div class="testimonials">
                <img class="testimonials__art parallax" src="<?php echo selectrum_get_image_url('art-m.svg'); ?>" alt="">
                <h2>What Our Residents are Saying</h2>
                <div class="testimonials__carousel">
                    <?php foreach ( $testimonials as $item ) : ?>
                        <div class="testimonials__slide">
                            <div class="testimonials__testimonial"><?php echo $item['testimonial']; ?></div>
                            <div class="testimonials__author"><?php echo $item['author']; ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>


<?php endwhile; ?>

<?php get_footer(); ?>