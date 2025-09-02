<?php
function selectrum_get_title() {
	if ( is_home() ) :

		if (get_option('page_for_posts', true)) {
			return get_the_title(get_option('page_for_posts', true));
		} else {
			return __('Latest Posts', 'selectrum');
		}

	elseif ( is_archive() ) :

		$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
		if ($term) {
			return apply_filters('single_term_title', $term->name);
		} elseif (is_post_type_archive()) {
			return apply_filters('the_title', get_queried_object()->labels->name);
		} elseif (is_day()) {
			return sprintf(__('Daily Archives: %s', 'selectrum'), get_the_date());
		} elseif (is_month()) {
			return sprintf(__('Monthly Archives: %s', 'selectrum'), get_the_date('F Y'));
		} elseif (is_year()) {
			return sprintf(__('Yearly Archives: %s', 'selectrum'), get_the_date('Y'));
		} elseif (is_author()) {
			$author = get_queried_object();
			return sprintf(__('Author Archives: %s', 'selectrum'), apply_filters('the_author', is_object($author) ? $author->display_name : null));
		} else {
			return single_cat_title('', false);
		}

	elseif ( is_search() ) :

		return sprintf(__('Search Results for %s', 'selectrum'), get_search_query());

	elseif ( is_404() ) :

		return __('Not Found', 'selectrum');

	elseif ( is_singular( 'news' ) ) :

		return __('News', 'selectrum');

	else :

		return get_the_title();

	endif;
}

function selectrum_get_hero_image_post_id() {
    global $post;

    if ( is_singular('news') ) :
        return selectrum_filter_id( 2543 );
    endif;

    if ( !empty( $post->post_parent ) ) :
        //return $post->post_parent;
    endif;

    return $post->ID;
}

function selectrum_filter_id( $post_id = 0 ) {
	return apply_filters('wpml_object_id', $post_id);
}

function selectrum_get_permalink( $post_id ) {
	return get_the_permalink( selectrum_filter_id( $post_id ) );
}


function selectrum_get_image_url( $filename ) {
	return get_stylesheet_directory_uri().'/assets/images/'.$filename;
}

function selectrum_get_hero_title() {
	global $post;

	if ( !empty( $post->post_parent ) ) :
		//return get_the_title( $post->post_parent );
	endif;

    if ( is_singular('gallery') ) :
        return 'Gallery &nbsp; | &nbsp; '.get_the_title();
    endif;

	return selectrum_get_title();
}

function selectrum_get_hero_text() {
	$text = '<h1 class="heroSection__title">'.selectrum_get_hero_title().'</h1>';

	return $text;
}

function selectrum_truncate_string($str, $chars, $to_space, $replacement = "...") {
	if($chars > strlen($str)) return $str;

	$str = substr($str, 0, $chars);

	$space_pos = strrpos($str, " ");
	if($to_space && $space_pos >= 0) {
		$str = substr($str, 0, strrpos($str, " "));
	}

	return($str . $replacement);
}