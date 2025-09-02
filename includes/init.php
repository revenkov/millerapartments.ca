<?php
/**
 * Initial setup and constants
 */
add_action('after_setup_theme', function () {
	// Make theme available for translation
	load_theme_textdomain('selectrum', get_template_directory() . '/languages');

	// Register wp_nav_menu() menus
    register_nav_menus(array(
        'primary_menu' => __('Primary Navigation', 'selectrum'),
        //'secondary_menu' => __('Secondary Navigation', 'selectrum'),
        //'footer_menu' => __('Footer Navigation', 'selectrum')
    ));

	// Add post thumbnails
	// http://codex.wordpress.org/Post_Thumbnails
	// http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
	// http://codex.wordpress.org/Function_Reference/add_image_size
	add_theme_support('post-thumbnails');

	// Add post formats
	// http://codex.wordpress.org/Post_Formats
	//add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

	// Add HTML5 markup for captions
	// http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
	add_theme_support('html5', array('caption'));

	// Tell the TinyMCE editor to use a custom stylesheet
	add_editor_style('/assets/css/editor-style.css');

	/*
	 * Custom Sizes of Images
	 */
	//add_image_size( 'employer_thumb1', 440, 510, true );
});


/*
 * Remove inline css of the wordpress admin bar
 */
add_action('admin_bar_init', function () {
	remove_action('wp_head', '_admin_bar_bump_cb');
});


/*
 * Remove Emoji
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


/*
 * Hide Admin Bar
 */
add_filter('show_admin_bar', '__return_false');


/**
 * Enqueue Google Fonts
 */
add_action('wp_head', function () {
	$fonts = array(
		//'family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800',
		//'family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900',
		//'family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900',
		//'family=Oswald:wght@200;300;400;500;600;700',
		//'family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		//'family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		//'family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'family=Cormorant:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700'
	);
	if ( !empty( $fonts ) ) :
		echo '
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?'.implode('&', $fonts).'&display=swap" rel="stylesheet">';
	endif;
});


/**
 * Add Google Maps API Key to ACF
 */
add_action('acf/init', function () {
	acf_update_setting('google_api_key', GOOGLE_MAPS_API_KEY);
});



//Change default mail content type to HTML
add_filter( 'wp_mail_content_type', function () {
	return "text/html";
});


/**
 * Manipulate of navigation classes
 */
add_filter( 'nav_menu_css_class', function ( array $classes, $item ) {
	if ( is_singular( 'news' ) ) {
		if ( $item->object_id == selectrum_filter_id( 2543 ) ) {
			$classes[] = 'current-menu-item';
		}
	}

	return $classes;
}, 10, 2 );



/**
 * Additional custom query vars
 */
add_filter( 'query_vars', function ( $query_vars ){
	//$query_vars[] = 'custom_var';
	return $query_vars;
} );


/**
 * Additional custom rewrite rules
 */
add_action('init', function () {
	//add_rewrite_rule('^news/([^/]*)/([^/]*)/?','index.php?page_id=11&custom_cat=$matches[1]&custom_year=$matches[2]','top');
}, 10, 0);



/**
 * Enable ACF Pro Options Admin Page
 */
if ( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}


/*
add_action('init', function () {
	if(!session_id()) {
		session_start();
	}
}, 1);
*/


/*
add_action('wp_logout', function () {
	session_destroy();
	wp_redirect( home_url() );
	exit();
});
*/


add_filter( 'walker_nav_menu_start_el', function($item_output, $item, $depth, $args) {

	if ( $args->menu_id == 'mainMenu' && in_array('menu-item-has-children', $item->classes) ) :
		$classes = array('menuArrow');
		if ( in_array('current-menu-ancestor', $item->classes) ) :
			$classes[] = 'open';
		endif;
		$item_output .= '
			<span class="'.implode(' ', $classes).'">
				<svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.01 50.02">
                	<polyline points="3 3 25.01 25.01 3 47.02"/>
                </svg>
			</span>';
	endif;

	return $item_output;
}, 10, 4);


add_filter( 'tiny_mce_before_init', function ( $mce ) {
	$mce['body_class'] .= ' wysiwyg';
	return $mce;
} );


add_filter( 'wpcf7_mail_components', function( $components ) {
	$components['body'] = apply_filters( 'the_content', $components['body'] );
	return $components;
});


add_action( 'admin_head', function () {
    $user = wp_get_current_user();
    if ( in_array( 'career', (array) $user->roles ) ) {
        ?>
        <style>
            li.toplevel_page_wpcf7 {
                display: none !important;
            }
        </style>
        <?php
    }
} );