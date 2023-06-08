<?php
date_default_timezone_set("America/Los_Angeles");
$current_date_time = date("Y-m-d H:i:s");
if (!get_sub_field("upcoming_events")):
    $events_args = [
        "post_type" => "cpt_events",
        "posts_per_page" => 3,
        "meta_key" => "event_date",
        "orderby" => "meta_value_num",
        "order" => "ASC",
        "meta_query" => [
            "key" => "event_date_end",
            "value" => $current_date_time,
            "compare" => ">=",
            "type" => "DATETIME",
        ],
    ];

    $upcoming_events = new WP_Query($events_args);

    if ($upcoming_events->have_posts()):

        $textColor = "";
        if (get_sub_field("event_background_color") !== "ffffff"):
            $textColor = "text-white";
        endif;
        ?>
        
        <div class="flex flex-wrap justify-center">
        <?php
        while ($upcoming_events->have_posts()):
            $upcoming_events->the_post(); ?>
            <div class="w-11/12 sm:w-9/12 md:w-7/12 lg:w-1/3 px-6 mb-6 lg:mb-0">
                
                <?php if (get_field("event_thumbnail_graphic")): ?>
                    <div class="transform translate-y-0 hover:-translate-y-1 transition-transform duration-200 group text-center">
                    <a <?php if (
                        get_field("event_external_link", get_the_id())
                    ):
                        echo 'target="_blank"';
                    endif; ?> href="<?php if (
     get_field("event_external_link", get_the_id())
 ):
     echo get_field("event_external_link", get_the_id());
 else:
     echo get_the_permalink(get_the_id());
 endif; ?>">
                        <img class="mx-auto shadow group-hover:shadow-lg transition-shadow duration-200"  src="<?php the_field(
                            "event_thumbnail_graphic"
                        ); ?>" alt="<?php the_title(); ?> thumbnail graphic">
                    </a>
                    </div>
                    <?php else:event_card(get_the_id());endif; ?>
            </div>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
        </div>
     
<?php
    endif;
endif;
?>
