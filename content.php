 
 
        <?php $postID = 'post' . get_the_ID(); ?>
     
        <div class="col-sm-12 col-md-12">

            <div class="panel panel-info">

                <div class="panel-heading">
                    <a data-toggle="collapse" href="#<?php echo $postID; ?>" aria-expanded="false" aria-controls="<?php echo $postID; ?>">
                        <h3 class="panel-title">
                            <?php the_title(); ?>
                        </h3>
                    </a>
                </div>
                <div class="collapse" id="<?php echo $postID; ?>">
                    <div class="panel-body" >
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            </div>
        </div> 