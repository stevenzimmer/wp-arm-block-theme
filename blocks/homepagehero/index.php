<?php 
// print_r( $attributes );
// print_r( $content );

if(!isset($attributes["imgURL"])) :
    $attributes["imgURL"] = get_theme_file_uri( 'assets/images/homepage-hero.jpg');
endif;

?>
<header class="relative">
    <div class="relative  z-10 py-12 lg:py-20">
        <?php echo $content; ?>
        <!-- <div class="flex justify-start">
            <div class="w-9/12 md:w-8/12 lg:w-5/12">
                
                </div>
            </div>
        </div> -->
    </div>
    <div class="absolute w-full sm:w-3/5 right-0 top-0 h-full ">
        <img
            class="w-full h-full object-cover"
            src="<?php echo $attributes["imgURL"]; ?>"
        />
    </div>
    <div class="absolute w-4/5 sm:w-4/5 h-full inset-0 bg-gradient-to-r from-white via-white to-transparent "></div>
</header>