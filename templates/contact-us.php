<?php
/**
 * Template name: Contact us
 */
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


	<?php locate_template('parts/section-hero.php', true); ?>


    <?php
    $address = get_field('address', 'options');
    $phone = get_field('phone', 'options');
    $email = get_field('email', 'options');
    $google_map_link = get_field('google_map_link', 'options');
    $facebook = get_field('facebook', 'options');
    $instagram = get_field('instagram', 'options');
    $linkedin = get_field('linkedin', 'options');
    $tiktok = get_field('tiktok', 'options');
    ?>
    <section class="section">
        <div class="container">
            <div class="locationBlock">
                <div class="locationBlock__col1">
                    <div class="locationBlock__col1Inner">
                        <h2>Get In Touch</h2>
                        <div class="locationBlock__contacts">
                            <?php if ( !empty( $address ) ) : ?><div class="locationBlock__address"><a href="<?php echo $google_map_link; ?>" target="_blank"><?php echo $address; ?></a></div><?php endif; ?>
                            <?php if ( !empty( $email ) ) : ?><div class="locationBlock__email"><span class="locationBlock__label">E</span> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div><?php endif; ?>
                            <?php if ( !empty( $phone ) ) : ?><div class="locationBlock__phone"><span class="locationBlock__label">T</span> <a href="tel:+1<?php echo preg_replace("/[^0-9]/", "", $phone); ?>"><?php echo $phone; ?></a></div><?php endif; ?>
                        </div>
                        <div class="locationBlock__socials">
                            <div class="locationBlock__socialsLinks">
                                <?php if ( !empty( $facebook ) ) : ?>
                                    <a href="<?php echo $facebook; ?>" title="Facebook" target="_blank">
                                        <svg fill="currentColor" height="25px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.78 50">
                                            <path d="M25,28.13l1.39-9H17.73V13.2c0-2.47,1.21-4.88,5.1-4.88h4V.61a48.21,48.21,0,0,0-7-.61C12.62,0,8,4.33,8,12.18v6.9H0v9.05H8V50h9.78V28.13Z"/>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <?php if ( !empty( $instagram ) ) : ?>
                                    <a href="<?php echo $instagram; ?>" title="Instagram" target="_blank">
                                        <svg fill="currentColor" height="23px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50.01 50">
                                            <path d="M25,12.18A12.82,12.82,0,1,0,37.83,25,12.8,12.8,0,0,0,25,12.18Zm0,21.15A8.33,8.33,0,1,1,33.35,25,8.34,8.34,0,0,1,25,33.33ZM41.34,11.66a3,3,0,1,1-3-3A3,3,0,0,1,41.34,11.66Zm8.5,3c-.19-4-1.11-7.55-4-10.48S39.33.38,35.32.18s-16.5-.24-20.63,0-7.54,1.1-10.48,4S.38,10.67.18,14.68s-.24,16.5,0,20.63,1.1,7.55,4,10.48,6.48,3.83,10.48,4,16.5.24,20.63,0,7.55-1.1,10.48-4,3.83-6.48,4-10.48.23-16.49,0-20.62ZM44.5,39.74a8.41,8.41,0,0,1-4.75,4.75c-3.29,1.31-11.1,1-14.74,1s-11.46.29-14.74-1a8.44,8.44,0,0,1-4.75-4.75c-1.31-3.29-1-11.1-1-14.74s-.29-11.46,1-14.74a8.41,8.41,0,0,1,4.75-4.75c3.29-1.31,11.1-1,14.74-1s11.46-.29,14.74,1a8.41,8.41,0,0,1,4.75,4.75c1.31,3.29,1,11.1,1,14.74S45.81,36.46,44.5,39.74Z"/>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <?php if ( !empty( $linkedin ) ) : ?>
                                    <a href="<?php echo $linkedin; ?>" title="Linkedin" target="_blank">
                                        <svg fill="currentColor" height="23px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                                            <path d="M11.19,50H.83V16.62H11.19ZM6,12.06A6,6,0,1,1,12,6,6.05,6.05,0,0,1,6,12.06ZM50,50H39.65V33.75c0-3.87-.08-8.84-5.39-8.84S28,29.12,28,33.47V50H17.69V16.62h9.94v4.55h.14a10.91,10.91,0,0,1,9.81-5.39C48.07,15.78,50,22.69,50,31.66V50Z"/>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <?php if ( !empty( $tiktok ) ) : ?>
                                    <a href="<?php echo $tiktok; ?>" title="TikTok" target="_blank">
                                        <svg fill="currentColor" height="26px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="locationBlock__col2">
                    <div class="locationBlock__map">
                        <div class="locationBlock__mapContainer">
                            <img class="locationBlock__mapImage" src="<?php echo selectrum_get_image_url('map.jpg'); ?>" alt="">
                        </div>
                        <div class="locationBlock__mapLegend">
                            <a href="//maps.app.goo.gl/1NKxaWEbyto1RVup7" class="locationBlock__mapLocation" data-index="1" target="_blank">
                                <span class="locationBlock__mapLocationAddress">1145 Bridge Street</span>
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


    <section class="section sectionForm sectionForm--bg">
        <div class="container container--narrow">
            <div class="wysiwyg">
                <h2>Have a Question?</h2>
                <div class="formContainer"><?php echo do_shortcode('[contact-form-7 id="3283b25" title="Contact us"]'); ?></div>
            </div>
        </div>
    </section>


<?php endwhile; ?>

<?php get_footer(); ?>