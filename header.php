<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<title><?php bloginfo('name'); ?></title>
		<?php wp_head(); ?>
	</head>
	
<body <?php body_class(); ?>>
	  
		<!-- Begin main container -->
      <div class="container">
          
          <!-- Begin header -->
          <div class="header clearfix">
			  
			  
			<nav class="site-nav">
				
				<?php
					$args = array(
						'container'      => 'header clearfix',
						'fallback_cb'    => false,
						'menu_class'     => 'nav nav-pills pull-right',
						'theme_location' => 'primary'
					);
				?>
				
				<?php wp_nav_menu(  $args ); ?>
			</nav>
			 
			 
		  
		  
		  
			
            <!--<nav>
              <ul class="nav nav-pills pull-right">
                <li role="presentation" class="active"><a href="index.html">Home</a></li>
                <li role="presentation"><a href="blog.html">Blog</a></li>
                <li role="presentation"><a href="about.html">About</a></li>
              </ul>
            </nav>-->
            <h3 class="text-muted"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h3>
          </div>
          <!-- End header -->
        
        
          <!-- Begin main content -->
          <div id="main">