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
				'social'  => __( 'Social Links Menu', 'linolakes' ),
			) );

			
			/*
			* theme styles
			*/
			//add_editor_style( array( 'lib/bootstrap/css/bootstrap.min.css', 'genericons/genericons.css', twentyfifteen_fonts_url() ) );
			
			
			// Feature image
			add_theme_support('post-thumbnails');
		}
endif;

add_action( 'after_setup_theme', 'linolakestheme_setup' );




/**
 * Enqueues scripts and styles for front end.
 */
if ( ! function_exists( 'linolakestheme_scripts_setup' ) ) :
	
	
	function linolakestheme_scripts_setup() {
		
		// Loads the Bootstrap stylesheet
		wp_enqueue_style( 'linolakes-bootstrap-css', get_template_directory_uri() . '/lib/bootstrap/css/bootstrap.min.css', array( ), current_time( 'mysql' ), 'all' );
		wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/lib/bootstrap/css/font-awesome.min.css', array( ), current_time( 'mysql' ), 'all' );
		 
		// Loads our main stylesheet.
		wp_enqueue_style( 'flat_responsive-style', get_stylesheet_uri(), array(), current_time( 'mysql' ) );
		
		// Loads our scripts.	 
		wp_enqueue_script('linolakes-bootstrap-js', get_template_directory_uri() . '/lib/bootstrap/js/bootstrap.min.js', array('jquery'), current_time( 'mysql' ), true);
		wp_enqueue_script('linolakes-jquery-js', get_template_directory_uri() . '/lib/bootstrap/js/jquery.min.js', array('jquery'), current_time( 'mysql' ), true);
				
	}
	
endif;

add_action( 'wp_enqueue_scripts', 'linolakestheme_scripts_setup' );


/**
 * Set active navigation menu.
 */
add_filter('nav_menu_css_class' , 'set_active_nav_class' , 10 , 2);

function set_active_nav_class ($classes, $item) {
	
	//only set active class for Primary menu
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'activemenu ';
    }
    return $classes;
}


/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function linolakestheme_excerpt_more( $more ) {
    return sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
        get_permalink( get_the_ID() ),
        __( ' Read more', 'textdomain' )
    );
}
add_filter( 'excerpt_more', 'linolakestheme_excerpt_more' );




function linolakestheme_comments($comment, $args, $depth) {
	 
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
        <span class="label label-default"><?php comment_author(); ?></span><span class="says"> says on <?php echo get_comment_date() . ' at ' ?><?php echo get_comment_time(); ?></span>
    </div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
         <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
          <br />
    <?php endif; ?>

    <?php comment_text(); ?>

    <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    
    <?php
}