<?php

get_header();

if (have_posts()) :
	while (have_posts()) : the_post(); 
		$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
		?>
 	
	 	 
		<!-- Begin blog with 1 column -->
		<div class="row">
			<?php if ( ! empty( $large_image_url[0] ) ) : ?>
				<div class="col-md-12">
					<img src="<?php echo $large_image_url[0]; ?>" alt="" >
				</div>
			<?php endif; ?>
		</div> 
			  
		<div class="row">
			
			<div class="col-md-12 ">
				<h2><?php the_title(); ?></h2>
				<p><?php the_content(); ?></p>
			</div>
			
		
		</div>
		<!-- End blog with 1 column -->
				    
	
	<?php endwhile;
	
	else :
		echo '<p>No content found</p>';
	
	endif;
	
get_footer();

?>