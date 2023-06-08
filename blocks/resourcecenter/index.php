<?php 
    $tax = "ct_content_type";
  
    // get all terms in the taxonomy
    // $terms = get_terms( "ct_content_type" ); 
    $terms = get_terms( array(
        "taxonomy" => $tax,
        "hide_empty" => true,

    ));
    // convert array of term objects to array of term IDs
    $term_slugs = wp_list_pluck( $terms, 'slug' );

    // $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $current_slug = isset( $_GET["content-type"] ) ? $_GET["content-type"] : "";

    if(isset( $_GET["content-type"] ) ) :
        $term_slugs = array( $_GET["content-type"] );
    endif;

    $resources_args = array(
        "post_type" => array("cpt_resources", "page"),
        "posts_per_page" => -1,
        // "paged" => $paged,
        'post_status' => 'publish',
        // 'meta_query' => $meta_query,
        'tax_query' => array(
            array(
              'taxonomy'  => $tax,
              'field' => 'slug',
              'terms'     => $term_slugs,
              'operator'  => 'IN'
            ),
        )
    );

    $resources = new WP_Query( $resources_args );

    // print_r($term_slugs);
    $current_term = get_term_by("slug", $current_slug, $tax);

    // print_r($current_term);

    if(count($terms) > 1 ) :

?>
<div class="flex justify-center mb-12 ">
    <div class="w-11/12 md:w-1/3 relative  bg-white shadow hover:h-full group  wrapper">
        <div class=" w-full flex items-center justify-between px-6 py-3 select-btn border rounded hover:rounded-t hover:rounded-b-none border-black">
            <div class="font-semibold">
            <?php 
                if( $current_term ) :
                    
                    echo $current_term->name;

                else :
                    echo "Filter by Content Type";

                endif;
            ?>
            </div>
            <div class="group-hover:rotate-180 origin-center transition-transform duration-200">
                <svg width="14" height="6" viewBox="0 0 14 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14 0H0L7.2 6L14 0Z" fill="#001321"/>
                </svg>
            </div>
        </div>
        <div class="content absolute top-10 hidden group-hover:block h-[200px] overflow-y-scroll w-full p-6 bg-white shadow z-20 border-l border-r border-b left-0  border-black rounded-b">

            <div class="options h-full overflow-y-auto">
        
            <?php 
                if( $current_slug ) :
            ?>

              <a class="block text-[#000000] no-underline mb-2 last:mb-0 border-b px-6 py-3" href="/resources">All</a>
            <?php 
                endif;
                foreach ($terms as $i => $term) :

                    $url = "?content-type=" .$term->slug;
                    if( $current_slug !== $term->slug ) :
            ?>
                <a class="block text-[#000000] no-underline mb-2 last:mb-0 border-b px-6 py-3" href="<?php echo $url; ?>"><?php echo $term->name; ?></a>
                
            <?php 
                    endif;
                endforeach;
            ?>


            </div>
        </div>
                
    </div>
</div>

<?php 
    endif;
?>
<div class="flex flex-wrap justify-center lg:justify-start -mx-3">
<?php
    while ($resources->have_posts()):
        $resources->the_post();
        $content_types = get_the_terms( get_the_id(), 'ct_content_type' );

        $cta_text = "Learn more";
        if($content_types[0]->slug === "webinars") :
            $cta_text = "Watch now";
        endif;

?>
    <div class="w-11/12 sm:w-9/12 md:w-1/2 lg:w-1/3 px-3 mb-6">
        
        <div class="border rounded-xl overflow-hidden h-full relative group hover:bg-slate-100">
            <a href="<?php the_permalink() ?>" class="absolute w-full h-full inset-0 z-10"></a>
           
            <div class="h-[220px] w-full">
            <?php 
                if(has_post_thumbnail()) :
            ?>
                <img class=" object-cover w-full h-full" src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title(); ?> thumbnail graphic">
            <?php 
                else :
            ?>
                 <div class="bg-slate-100 w-full h-full"></div>
             <?php
                endif;
            ?>
            </div>
            
            <div class="p-6 mb-12 ">
                <p class="text-a-blue mb-3 text-[20px] font-asMedium"><?php echo $content_types[0]->name; ?></p>
                <p class="text-a-primary text-[24px] font-asMedium max-lines max-lines-3">
                    <?php the_title(); ?>
                </p>
            </div>

            <a 
                title="<?php echo $cta_text; ?>"
                class=" px-6 py-3 bg-grey-100 border-t block m-0 no-underline group-hover:no-underline transition-all duration-200 font-bold text-[14px] absolute w-full bottom-0 left-0 right-0"
                href="<?php the_permalink() ?>"
            >
                <?php echo $cta_text; ?>
                <span class="transform inline-block transition-transform group-hover:translate-x-0.5 text-xs">&#8594;</span>
            </a>
        </div>
    </div>
<?php
    endwhile;
    wp_reset_postdata();
?>
</div>

<script>
    // const wrapper = document.querySelector(".wrapper");
    // const selectBtn = document.querySelector(".select-btn");

    // selectBtn.addEventListener("click", () => {
    //     wrapper.classList.toggle("active");
    // })
</script>