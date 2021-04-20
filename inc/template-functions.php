<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package devchallenge
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function devchallenge_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'devchallenge_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function devchallenge_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'devchallenge_pingback_header' );

/**
 * trims text to a space then adds ellipses if desired
 * @param string $input text to trim
 * @param int $length in characters to trim to
 * @param bool $ellipses if ellipses (...) are to be added
 * @param bool $strip_html if html tags are to be stripped
 * @return string
 */
function trim_text($input, $length, $ellipses = true, $strip_html = true) {
    //strip tags, if desired
    if ($strip_html) {
        $input = strip_tags($input);
    }

    //no need to trim, already shorter than trim length
    if (strlen($input) <= $length) {
        return $input;
    }

    //find last space within length
    $last_space = strrpos(substr($input, 0, $length), ' ');
    $trimmed_text = substr($input, 0, $last_space);

    //add ellipses (...)
    if ($ellipses) {
        $trimmed_text .= '...';
    }

    return $trimmed_text;
}

/**
 * return an excerpt of a certain number of words
 */
function get_the_limited_excerpt( $limit = 35 ) {
	$excerpt = get_the_excerpt();
	$excerpt = wp_strip_all_tags( $excerpt );
	$excerpt = wp_trim_words( $excerpt, $limit );

	return $excerpt;
}

/**
 * return post content of a certain number of words
 */
function get_the_limited_content( $limit = 35 ) {
	$content = apply_filters( 'the_content', get_the_content() );
	$content = wp_strip_all_tags( $content );
	$content = wp_trim_words( $content, $limit );

	return $content;
}
