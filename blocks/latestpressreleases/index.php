<?php 
    $args = array(
        'post_type' => 'press-releases',
        'posts_per_page' => 3,
        'post_status' => array('publish')
    );
    $recent_posts = new WP_Query( $args );
    if( $recent_posts->have_posts() ) :
?>

    <div class="flex flex-wrap justify-center lg:justify-start -mx-6 mb-6">
        <?php 

            while( $recent_posts->have_posts() ) :

                $recent_posts->the_post();
        ?>
        <div class="w-11/12 sm:w-7/12 lg:w-1/3 px-6 mb-6 lg:mb-0">
            <?php 
                blog_card( get_the_id() );
            ?>
        </div>
        <?php 
            endwhile;
            wp_reset_postdata();
        ?>
    </div>
<?php
    endif;
?>