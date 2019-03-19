<?php

function my_theme_enqueue_styles() {

$parent_style = 'twentynineteen-style'; 

wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
wp_enqueue_style( 'child-style',
    get_stylesheet_directory_uri() . '/style.css',
    array( $parent_style ),
    wp_get_theme()->get('Version')
);
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// loading custom js file

function my_scripts_method() {
    wp_enqueue_script(
        'custom-script',
        get_stylesheet_directory_uri() . '/script/childTheme.js', array('jquery'), null, true);
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );


// to disable default theme post thumbnail display
 add_filter('twentynineteen_can_show_post_thumbnail', '__return_false');


/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 100,
				'width'       => 150,
				'flex-width'  => true,
				'flex-height' => true,
				'header-text' => array( 'site-title', 'site-description' ),
			)
		);


// Post sidebar function

function post_sidebar_widget(){
	register_sidebar(
		array(
			'name'          => __( 'post_sidebar', 'twentynineteen' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Add widgets here to appear in post sidebar.', 'twentynineteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',

		

		)

	);
}

add_action('widgets_init', 'post_sidebar_widget');


// excerpt read more function
function excerpt_readmore($more) {
    return '... <a href="'. get_permalink($post->ID) . '" class="readmore">' . 'Read More' . '</a>';
}
add_filter('excerpt_more', 'excerpt_readmore');

// excerpt length
function excerptLength($length) {
    return 40;
}
add_filter('excerpt_length', 'excerptLength');