<?php 
print_r($attributes);

if(isset($attributes["eventPostId"])) : 
    wp_enqueue_style("callout");
    $eventPost = new WP_Query(array(
        "post_type" => "cpt_events",
        "p" => $attributes["eventPostId"]
    ));

    while( $eventPost->have_posts() ) :
        $eventPost->the_post();
        $event_graphic = get_field("event_thumbnail_graphic");
?>
<div class="py-20 text-center bg-blue-100 event-block">
    <div class="container">
        <h1 class=""><?php the_title(); ?></h1>
        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo $event_graphic; ?>" alt="<?php the_title(); ?> thumbnail graphic">
        </a>
    </div>
</div>
<?php
    wp_reset_postdata();
    endwhile;
?>

<?php
else :
    return NULL;
endif;
?>
