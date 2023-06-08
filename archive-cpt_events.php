<?php 

    get_header();
    date_default_timezone_set('America/Los_Angeles');
    $current_date_time = date("Y-m-d H:i:s");
    $events_args = array(
        "post_type" => get_queried_object()->name,
        "posts_per_page" => -1,
        "meta_key" => "event_date",
        "orderby" => "meta_value_num",
        "order" => "ASC",
        "meta_query" => array(
            "key" => "event_date_end",
            "value" => $current_date_time,
            "type" => "DATETIME",
            "compare" => ">="
        )
    );

    $upcoming_events = new WP_Query( $events_args );

    $past_events_args = array(
        "post_type" => get_queried_object()->name,
        "posts_per_page" => -1,
        "meta_key" => "event_date",
        "orderby" => "meta_value_num",
        "order" => "DESC",
        "meta_query" => array(
            "key" => "event_date_end",
            "value" => $current_date_time,
            "type" => "DATETIME",
            "compare" => "<"
        )
    );

    $past_events = new WP_Query( $past_events_args );

?>

<section class="entry-content ">
    <div class="container pt-20 pb-12">
        <div class="mb-6">
            <h1 class="text-xl md:text-3xl m-0 text-center md:text-left"><?php 
            echo ( $upcoming_events->have_posts() ? "Upcoming " . get_queried_object()->label : "No upcoming events" ); ?></h1>
        </div>
       
        <div class="flex flex-wrap justify-center md:justify-start -mx-6">
        <?php
        while ($upcoming_events->have_posts()):
            $upcoming_events->the_post();

            $event_location = get_field("event_location", get_the_id());

            $event_month = date("M", strtotime(get_field("event_date", $id)));
            $event_day = date("j", strtotime(get_field("event_date", $id)));
            $event_day_end = get_field("event_date_end", $id)
                ? date("j", strtotime(get_field("event_date_end", $id)))
                : false;
            $event_month_end = get_field("event_date_end", $id)
                ? date("M", strtotime(get_field("event_date_end", $id)))
                : false;
            $new_month = false;
        
            if ($event_day_end):
                if ($event_month !== $event_month_end):
                    $new_month = true;
                endif;
            endif;
            
            $event_link = get_permalink();
            $target = "";
            
            if (
                get_field("event_external_link", get_the_id())
            ):
                $event_link = get_field("event_external_link", get_the_id());
                $target = "target='_blank'";
            endif;
         
            ?>

            <div class="w-11/12 sm:w-9/12 md:w-6/12 lg:w-1/3 px-3 mb-6">
                    
                <div class="border rounded-xl overflow-hidden h-full hover:bg-slate-50 relative group">
                    <a class="absolute w-full h-full inset-0" title="Register now" <?php echo $target; ?>
                        href="<?php echo $event_link; ?>"></a>
                    <div class="p-6">
                        
                        <div class="mb-2">
                            <p class="text-a-primary text-[24px] font-asMedium max-lines max-lines-2">
                                <?php the_title(); ?>
                            </p>
                        </div>
                        <p class="text-a-primary mb-3 text-[18px] font-asMedium"><?php echo $event_location; ?></p>
                        

                        <div class="py-2 mb-10">
                            <p class="text-[16px] font-bold m-0 leading-none">
                                <?php 
                                    echo $event_month; 
                                ?> 
                                <?php
                                    echo $event_day;

                                    if( $event_day !== $event_day_end ) :
                                    if ($event_day_end && !$new_month):
                                        echo " - " . $event_day_end;

                                    else :
                                        echo " - " . $event_month_end . " " . $event_day_end;
                                ?>

                                <?php
                                    endif;
                                endif;
                                ?>
                            </p>
                                                
                        </div>          
                    </div>

                    <a 
                        title="Register now"
                        <?php echo $target; ?>
                        href="<?php echo $event_link; ?>"
                        class="px-6 py-3 bg-grey-100 border-t text-a-blue block m-0 no-underline hover:no-underline transition-all duration-200 font-bold text-[14px] absolute w-full bottom-0 left-0 right-0"
                        
                    >
                        Register now
                        <span class="transform inline-block transition-transform group-hover:translate-x-0.5 text-xs">&#8594;</span>
                    </a>
                </div>
            </div>
            
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
        </div>

    </div>
</section>
<?php 
    if ( $past_events->have_posts() ) : 
?>
<div class="bg-grey-100 py-12 hidden">
    <div class="container ">
        
        <div class="mb-6">
            <h2 class="text-xl md:text-3xl m-0 text-center lg:text-left ">Previous Events</h2>
        </div>

        <div class="flex flex-wrap justify-center lg:justify-start -mx-3">
        
        <?php 

            while ( $past_events->have_posts() ) : 
                $past_events->the_post();

                $event_date = get_field('event_date', get_the_ID() );

                if( get_field('event_date_end', get_the_ID() ) ) :
                    $event_month = date('M', strtotime( get_field('event_date', get_the_ID() ) ) );
                    $event_day = date('j', strtotime( get_field('event_date', get_the_ID() ) ) );
                    $event_year = date('Y', strtotime( get_field('event_date', get_the_ID() ) ) );
                    $event_month_end = date('M', strtotime( get_field('event_date_end', get_the_ID() ) ) );
                    $event_day_end = date('j', strtotime( get_field('event_date_end', get_the_ID() ) ) );
                    $event_year_end = date('Y', strtotime( get_field('event_date_end', get_the_ID() ) ) );

                    if($event_day === $event_day_end ) :

                        $event_date = $event_month . " " . $event_day . ", " . $event_year_end;

                    elseif( $event_month !== $event_month_end ) :

                        $event_date = $event_month . " " . $event_day .  " - " . $event_month_end . " " . $event_day_end . ", " . $event_year_end;

                    else :

                        $event_date = $event_month . " " . $event_day .  " - " . $event_day_end . ", " . $event_year_end;

                    endif;

                endif;
        ?>

            <div class="w-11/12 sm:w-7/12 md:w-1/2 lg:w-1/3 px-3 mb-6">
                <div class="bg-white h-full p-6 rounded-lg border">    
                    <div class="mb-3">
                        <p class=" max-lines max-lines-2 font-bold m-0 md:text-lg group-hover:text-blue-light"><?php the_title(); ?></p>

                    </div>
                    <p class="m-0">
                        <?php echo $event_date; ?>
                    </p>

                </div>
            </div>
            
        <?php 
            endwhile;
            wp_reset_postdata();
        ?>
        </div>
            
    </div>
</div>
<?php 
    endif;

    get_footer();
?>