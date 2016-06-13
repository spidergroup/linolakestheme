<?php
 
    get_header();

?>


<?php if (have_posts()) : ?>
    
    <?php while (have_posts()) : the_post(); ?>
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