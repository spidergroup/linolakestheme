<?php

/*
Template Name: Page Template - WooCommerce Category
*/
?>

<?php
 
    get_header();

    $args = array(
        'post_type' => 'post',
        'category_name' => 'woocommerce'
       
    );
    $query = new WP_Query( $args );
?>


<?php if ($query->have_posts()) : ?>
    
    <?php while ($query->have_posts()) : $query->the_post(); ?>
        <div class="row">
            <?php get_template_part('content'); ?>
        </div>
    <?php endwhile; ?>

<?php else : ?>
    <p>No content found</p>
<?php endif; ?>    


<?php
    wp_reset_postdata();
	 
    get_footer();

?>