<?php 
    /* 
    **  Template Name: Event w/out form
    **	Template Post Type: cpt_events
    */ 

    get_header();

    while( have_posts() ): 
		the_post();
?>

<section class="pt-20 pb-12">
    <div class="container">
        <div class="flex justify-center">
            <div class="w-11/12 lg:w-full ">
                <div class="prose max-w-none ">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
	endwhile;
    get_footer(); 
?>