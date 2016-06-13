 		</div>
		<!-- End main container -->
		
		<div class="clearfix" ></div>
		<!-- Begin Footer -->
		<footer class="footer">
			<nav class="site-nav">
				<?php
				
					$args = array(
						'container'      => 'header clearfix',
						'fallback_cb'    => false,
						'menu_class'     => 'nav pull-right',
						'theme_location' => 'footer'
					);
					
				?>
				
				<?php wp_nav_menu(  $args ); ?>
			</nav>
			
			<p>&copy; <?php echo date('Y');?> <?php bloginfo('name'); ?></p>
		</footer>
		<!-- End Footer -->
		
		
	 
	</body>
	<?php wp_footer(); ?>
	
</html>