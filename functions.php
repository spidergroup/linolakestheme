<?php

 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
if ( ! function_exists( 'linolakestheme_setup' ) ) :

		function linolakestheme_setup() {

			
			/*
			* Let WordPress manage the document title.
			*/
			add_theme_support( 'title-tag' );

			
			// This theme uses wp_nav_menu() in two locations.
			register_nav_menus( array(
				'primary' => __( 'Primary Menu', 'linolakes' ),
				'footer'  => __( 'Footer Menu', 'linolakes' ),
			) );
 
			 
			// Feature image
			add_theme_support('post-thumbnails');
		}
endif;

add_action( 'after_setup_theme', 'linolakestheme_setup' );




/**
 * Enqueues scripts and styles for front end.
 */
if ( ! function_exists( 'linolakes_scripts_setup' ) ) :
	
	
	function linolakes_scripts_setup() {
		
		// Loads the Bootstrap stylesheet
		wp_enqueue_style( 'linolakes-bootstrap-css', get_template_directory_uri() . '/lib/bootstrap/css/bootstrap.min.css', array( ), current_time( 'mysql' ), 'all' );
		 
		// Loads our main stylesheet.
		wp_enqueue_style( 'linolakes-style', get_stylesheet_uri(), array(), current_time( 'mysql' ) );
		 
		
		// Loads our scripts.	 
		wp_enqueue_script('linolakes-bootstrap-js', get_template_directory_uri() . '/lib/bootstrap/js/bootstrap.min.js', array('jquery'), current_time( 'mysql' ), true);
		wp_enqueue_script('linolakes-jquery-js', get_template_directory_uri() . '/lib/bootstrap/js/jquery.min.js', array('jquery'), current_time( 'mysql' ), true);
		 
		 
				
	}
	
endif;

add_action( 'wp_enqueue_scripts', 'linolakes_scripts_setup' );


/**
 * Set active navigation menu.
 */
add_filter('nav_menu_css_class' , 'set_active_nav_class' , 10 , 2);

function set_active_nav_class ($classes, $item) {
	 
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'activemenu ';
    }
    return $classes;
}
	
