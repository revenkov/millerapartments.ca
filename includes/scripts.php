<?php
add_action('wp_enqueue_scripts', function () {
	$assets_path    = get_template_directory() . '/assets';
	$css_path       = $assets_path . '/css/';
	$js_path        = $assets_path . '/js/';
	$assets_uri     = get_template_directory_uri() . '/assets';
	$vendor_uri     = $assets_uri . '/vendor';
	$css_uri        = $assets_uri . '/css';
	$js_uri         = $assets_uri . '/js';

	// STYLESHEETS
	wp_enqueue_style('owl-carousel', $vendor_uri . '/owl.carousel-2.3.4/assets/owl.carousel.min.css', false, null);
	wp_enqueue_style('fancybox', $vendor_uri . '/fancybox-3.5.7/jquery.fancybox.min.css', false, null);
	//wp_enqueue_style('perfect-scrollbar', $vendor_uri . '/perfect-scrollbar-1.5.5/perfect-scrollbar.min.css', false, null);
	//wp_enqueue_style('videojs', '//vjs.zencdn.net/5.11.6/video-js.css', false, null);
	//wp_enqueue_style('animate', '//cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css', false, null);
	wp_enqueue_style('select2', '//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', false, null);
	wp_enqueue_style('tiny-slider', '//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css', false, null);
	//wp_enqueue_style('aos', '//unpkg.com/aos@next/dist/aos.css', false, null);

	wp_enqueue_style('styles', $css_uri . '/styles.css', [], filemtime( $css_path . 'styles.css' ), null);
	wp_enqueue_style('changes', $css_uri . '/changes.css', [], filemtime( $css_path . 'changes.css' ), null);

	//SCRIPTS
	if ( is_single() && comments_open() && get_option('thread_comments') ) {
		wp_enqueue_script('comment-reply');
	}

	//wp_enqueue_script("jquery-effects-core");
	//wp_enqueue_script("jquery-ui-widget");
	//wp_enqueue_script('jquery-ui-tabs');
	//wp_enqueue_script('jquery-ui-tooltip');
	//wp_enqueue_script('jquery-ui-accordion');
	//wp_enqueue_script('jquery-ui-datepicker');
	//wp_enqueue_script('jquery-ui-slider');
	//wp_enqueue_script('jquery-touch-punch');

	wp_enqueue_script('owl-carousel', $vendor_uri . '/owl.carousel-2.3.4/owl.carousel.min.js', array('jquery'), null, true);
	wp_enqueue_script('fancybox', $vendor_uri . '/fancybox-3.5.7/jquery.fancybox.min.js', array('jquery'), null, true);
	wp_enqueue_script('jquery-validation', '//cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js', array('jquery'), null, false);
	//wp_enqueue_script('jquery-validation-additional-methods', '//cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js', array('jquery-validation'), null, false);
	//wp_enqueue_script('jquery-validation-messages-fr', '//cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/localization/messages_fr.min.js', array('jquery-validation'), null, false);
	wp_enqueue_script('filestyle', $vendor_uri . '/jquery-filestyle-2.1.0/jquery-filestyle.min.js', array('jquery'), null, true);
	//wp_enqueue_script('masonry', '//unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', array('jquery'), null, true);
	//wp_enqueue_script('isotope', '//unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array('jquery'), null, true);
	//wp_enqueue_script('imagesloaded', '//unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js', array('jquery'), null, true);
	//wp_enqueue_script('perfect-scrollbar', $vendor_uri . '/perfect-scrollbar-1.5.5/js/perfect-scrollbar.min.js', array(), null, true);
	//wp_enqueue_script('google-maps', '//maps.googleapis.com/maps/api/js?key='.GOOGLE_MAPS_API_KEY, array(), null, false);
	//wp_enqueue_script('google-maps-infobox', $vendor_uri . '/googlemaps/infobox.min.js', array('google-maps'), null, false);
	//wp_enqueue_script('google-maps-markerwithlabel', $vendor_uri . '/googlemaps/markerwithlabel_packed.js', array('google-maps'), null, false);
	//wp_enqueue_script('youtube-player-api', '//www.youtube.com/player_api', array(), null, true);
	wp_enqueue_script('select2', '//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array(), null, true);
	wp_enqueue_script('tiny-slider', '//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js', array(), null, true);
	//wp_enqueue_script('aos', '//unpkg.com/aos@next/dist/aos.js', array(), null, true);
	//wp_enqueue_script('cookie', '//cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js', array(), null, true);
	//wp_enqueue_script('match-height', $vendor_uri . '/jquery.matchHeight.js', array('jquery'), null, true);

	wp_enqueue_script('scripts', $js_uri . '/scripts.js', ['jquery'], filemtime( $js_path . 'scripts.js' ), true);
	wp_localize_script('scripts', 'selectrum', [
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'theme_uri' => get_stylesheet_directory_uri()
	]);
}, 100);