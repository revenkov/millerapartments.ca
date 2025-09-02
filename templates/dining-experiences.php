<?php
/**
 * Template name: Dining Experiences
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
    $restaurants = get_posts([
        'post_type' => 'restaurant',
        'posts_per_page' => -1,
    ]);
    if ( !empty( $restaurants ) ) :
        foreach ( $restaurants as $key=>$post ) :
            setup_postdata( $post );
            $content = get_field('content');
            $image = get_field('image');
            $breakfast = get_field('breakfast2');
            $lunch = get_field('lunch2');
            $dinner = get_field('dinner2');
            $disclaimer_box = get_field('disclaimer_box');
            if ( $key%2 == 0 ) :
            ?>
                <section class="section">
                    <div class="container">
                        <div class="textImage">
                            <div class="textImage__col1">
                                <?php if ( $key == 0 ) : ?>
                                <img class="textImage__art parallax" src="<?php echo selectrum_get_image_url('art-m.svg'); ?>" alt="">
                                <?php endif; ?>
                                <?php if ( $key == 2 ) : ?>
                                    <img class="textImage__art parallax" src="<?php echo selectrum_get_image_url('art-m.svg'); ?>" alt="">
                                <?php endif; ?>
                                <div class="textImage__textContainer">
                                    <div class="wysiwyg">
                                        <h2><?php echo get_the_title(); ?></h2>
                                        <?php echo $content; ?>
                                    </div>
                                    <?php if ( !empty( $breakfast['content'] ) || !empty( $lunch['content'] ) || !empty( $dinner['content'] ) ) : ?>
                                    <button class="btn" data-fancybox data-src="#<?php echo sanitize_title( get_the_title() ); ?>"><span class="btn__text">View sample menu</span></button>
                                    <div class="popupMenu" id="<?php echo sanitize_title( get_the_title() ); ?>" style="display: none;">
                                        <div class="popupMenu__content">
                                            <div class="popupMenu__container">
                                                <h2><?php echo get_the_title(); ?> <span class="divider">|</span> Sample Menu</h2>
                                                <?php if ( !empty( $breakfast ) ) : ?>
                                                <div class="popupMenu__subtitle"><?php echo $breakfast['title']; ?></div>
                                                <?php echo $breakfast['content']; ?>
                                                <?php endif; ?>
                                                <div class="popupMenu__cols">
                                                    <?php if ( !empty( $lunch ) ) : ?>
                                                    <div class="popupMenu__col">
                                                        <div class="popupMenu__subtitle"><?php echo $lunch['title']; ?></div>
                                                        <?php echo $lunch['content']; ?>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if ( !empty( $dinner ) ) : ?>
                                                    <div class="popupMenu__col">
                                                        <div class="popupMenu__subtitle"><?php echo $dinner['title']; ?></div>
                                                        <?php echo $dinner['content']; ?>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="popupMenu__disclaimer">
                                            <div class="popupMenu__container"><?php echo $disclaimer_box; ?></div>
                                        </div>
                                    </div>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="textImage__col2">
                                <div class="textImage__imageContainer"><?php echo wp_get_attachment_image( $image['ID'], 'full', false, ['class'=>'textImage__image'] ); ?></div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php else : ?>
                <section class="section">
                    <div class="container">
                        <div class="imageText">
                            <div class="imageText__col1">
                                <div class="imageText__textContainer">
                                    <div class="wysiwyg">
                                        <h2><?php echo get_the_title(); ?></h2>
                                        <?php echo $content; ?>
                                    </div>
                                    <button class="btn" data-fancybox data-src="#<?php echo sanitize_title( get_the_title() ); ?>"><span class="btn__text">View sample menu</span></button>
                                    <div class="popupMenu" id="<?php echo sanitize_title( get_the_title() ); ?>" style="display: none;">
                                        <div class="popupMenu__content">
                                            <div class="popupMenu__container">
                                                <h2><?php echo get_the_title(); ?> <span class="divider">|</span> Sample Menu</h2>
                                                <?php if ( !empty( $breakfast ) ) : ?>
                                                    <div class="popupMenu__subtitle"><?php echo $breakfast['title']; ?></div>
                                                    <?php echo $breakfast['content']; ?>
                                                <?php endif; ?>
                                                <div class="popupMenu__cols">
                                                    <?php if ( !empty( $lunch ) ) : ?>
                                                        <div class="popupMenu__col">
                                                            <div class="popupMenu__subtitle"><?php echo $lunch['title']; ?></div>
                                                            <?php echo $lunch['content']; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ( !empty( $dinner ) ) : ?>
                                                        <div class="popupMenu__col">
                                                            <div class="popupMenu__subtitle"><?php echo $dinner['title']; ?></div>
                                                            <?php echo $dinner['content']; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="popupMenu__disclaimer">
                                            <div class="popupMenu__container"><?php echo $disclaimer_box; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="imageText__col2">
                                <div class="imageText__imageContainer"><?php echo wp_get_attachment_image( $image['ID'], 'full', false, ['class'=>'imageText__image'] ); ?></div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php
            endif;
        endforeach;
        wp_reset_postdata();
    endif;
    ?>


<?php endwhile; ?>

<?php get_footer(); ?>