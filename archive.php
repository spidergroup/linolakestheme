<?php
 

get_header();

$args = array(
	'post_type' => 'post',
    'category_name' => 'WooCommerce'
);
$query = new WP_Query( $args );


if (is_category()) {
    echo single_cat_title();
    echo '\ncategory page';
} elseif (is_tag()){
    echo 'tag page';
} else{
    echo 'Archive page';
}
    

if ($query->have_posts()) : ?>


    <!-- Begin grid with 3 columns -->
    <div class="row">
           this is woocommerce page wwww
        <?php while ($query->have_posts()) : $query->the_post(); ?>
        
            <div class="col-sm-6 col-md-4">
                    
                    <?php 
                        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); 
                        //var_dump( $large_image_url);
                    ?>
                    
                    <div class="thumbnail threecolumns">
                        <?php if ( ! empty( $large_image_url[0] ) ) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo $large_image_url[0]; ?>" alt="..." >
                            </a>
                            
                        <?php endif; ?>

                      <div class="caption text-center">
                            <h4>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h4>
                            <!--<p><?php //the_content(); ?></p>-->
                      </div>
                    </div>
            </div>
                    
        
        
        <?php endwhile;
        
        else :
            echo '<p>No content found</p>';
        
        endif;
        
        wp_reset_postdata();
	?>
    
    </div><!-- End grid with 3 columns -->
              
              
    <?php
get_footer();

?>