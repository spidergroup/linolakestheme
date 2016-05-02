<?php

/*
Template Name: About
*/

get_header();
the_post();
$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );

?>

              <!-- Begin blog with 2 columns -->
              <div class="row">
                  <?php if ( ! empty( $large_image_url[0] ) ) : ?>
                        <div class="col-md-6">
                            <a href="#" class="thumbnail">
                                
                                <?php if ( ! empty( $large_image_url[0] ) ) : ?>
                                    <img src="<?php echo $large_image_url[0]; ?>" alt="..." >
                                <?php endif; ?>
                                
                            </a>
                        </div>
                        <div class="col-md-6 right-column">
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_content(); ?></p>
                        </div> 
                         
                  <?php else: ?>
                        <div class="col-md-12 right-column">
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_content(); ?></p>
                        </div> 
                  
                  <?php endif; ?>
                   
              </div>
              <!-- End blog with 2 columns -->
               
    <?php
get_footer();

?>