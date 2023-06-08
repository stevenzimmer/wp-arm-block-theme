<?php 

    get_header(); 

    if ( have_posts() ) : 
        while ( have_posts() ) : 
        the_post(); 
        $post_type = get_post_type_object( get_queried_object()->post_type )->label;
    
?>
<header class="pb-6 lg:pb-12 pt-6 bg-blue-dark">
	<div class="container ">
        <div class="flex flex-wrap justify-center lg:justify-start">
            <div class="w-11/12 lg:w-full">
                <div class="mb-2 ">
                    <a href="<?php echo get_post_type_archive_link(get_post_type()) ?>" class="no-underline text-white hover:text-white m-0 text-sm"><?php echo $post_type; ?></a> &nbsp; <span class="text-white text-xs">&#9654;</span>
                </div>
                <div class=" ">
                    <h1 class="text-white text-2xl md:text-5xl"><?php the_title() ?></h1>
                </div>
                <div>
                    <p class="m-0 text-white"><?php the_field('event_date'); ?> at <?php the_field('event_time'); ?></p>
                </div>
            </div>
        </div>
	</div>
</header>
<section class="lg:pb-12">
    <div class="container">
        <div class="flex flex-wrap justify-center -mx-6 mb-12">
            <div class="w-11/12 lg:w-7/12 px-6">
                <div class="prose max-w-none pt-6">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="w-full lg:w-5/12">
                <?php 
                    if( get_field('marketo_form_id') && !isset( $_GET['aliId'] ) ) :
                ?>

                    <div class="bg-blue-primary p-6">
                        <form class="mktoForm" data-formid="<?php the_field('marketo_form_id') ?>"></form>
                    </div>
                   
                <?php 
                    else : 
                ?>
                    <div class="bg-grey-100 p-6 shadow rounded-lg">
                        <div class="prose max-w-none">
                            <?php the_field('event_thank_you_message'); ?>

                        </div>
                    </div>
                <?php
                    endif;
                ?>
            </div>
        </div>
        <?php 
            if( have_rows('presenters') ) :
        ?>
        <div class="text-center">
            <h2 class="text-xl md:text-3xl">
                <?php 
                    echo ( get_field('presenters_heading') ? the_field('presenters_heading') : 'Meet your panelists' );
                ?></h2>
        </div>
        <div class="flex flex-wrap -mx-3 justify-center md:justify-start">
            
            <?php 
                while( have_rows('presenters') ) :
                    the_row();
            ?>
            <div class="w-11/12 md:w-1/2 px-3 mb-6">
                <div class="shadow rounded h-full">
                    <div class="flex flex-wrap h-full">
                        <div class="w-full sm:w-1/3 md:w-full lg:w-1/3 px-3 bg-grey-50">
                            <div class="py-2">
                                <div class="mb-2 lg:m-0">
                                    <?php 
                                        if( get_sub_field('presenter_headshot') ) : 


                                    ?>
                                    <img class="w-full rounded-full mx-auto" src="<?php the_sub_field('presenter_headshot'); ?>" alt="<?php the_sub_field('presenter_name'); ?> headshot">
                                    <?php 
                                        else : 
                                    ?>
                                    <div class="w-32 h-32 rounded-full mx-auto bg-grey-200"></div>
                                    <?php
                                        endif;
                                    ?>
                                </div>
                                <div>  
                                    <p class="mb-0 font-bold"><?php the_sub_field('presenter_name'); ?></p>
                                </div>
                                <div class="mb-2">
                                    <p class="m-0 text-sm"><?php the_sub_field('presenter_type'); ?></p>
                                </div>
                                <div>
                                    <p class="m-0 text-sm"><?php the_sub_field('presenter_title'); ?></p>
                                </div>
                            </div>
                            
                        </div>
                        <div class="w-full sm:w-2/3 md:w-full lg:w-2/3 px-3 border-t-4 border-l-0 sm:border-l-4 sm:border-t-0 md:border-t-4 md:border-l-0 lg:border-t-0 lg:border-l-4 border-grey-200">
                            
                            <div class="py-2">
                                <p class="m-0 text-sm"><?php the_sub_field('presenter_bio'); ?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php
                 endwhile;
            ?>
        </div>
        <?php 
            endif;
        ?>
    </div>
</section>

<?php 
        endwhile;
        wp_reset_postdata();
    endif;
    get_footer();
?>