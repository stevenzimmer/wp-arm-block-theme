<?php 
// print_r( $attributes );
// print_r( $content );

if(!isset($attributes["bgColor"])) :
    $attributes["bgColor"] = "#4AC1E0";
endif;

if(!isset($attributes["textureColor"])) :
    $attributes["textureColor"] = "#ffffff";
endif;

if(!isset($attributes["className"])) :
    $attributes["className"] = "";
endif;

if(!isset($attributes["texture"])) :
    $attributes["texture"] = "sides";
endif;


?>
<section class="relative <?php echo $attributes["className"]; ?>" style="background-color: <?php echo $attributes["bgColor"]; ?>;">
    <?php 
        if( $attributes["texture"] === "sides" ) :
    ?>
    <?php textured_bg(false, false, $attributes["textureColor"]) ?>
    <?php textured_bg("right-0", "rotate-180", $attributes["textureColor"]); ?>

    <?php
        endif;
    ?>

    <?php 
        if( $attributes["texture"] === "bottom" ) :
    ?>
    <div class="absolute w-full bottom-0 left-0 right-0 bg-blue-primary h-12"></div>
    <div class="absolute lg:w-[1440px] mx-auto h-40 bottom-6 md:-bottom-6  z-10 left-0 right-0 text-center flex items-end">
        <img
            data-aos="fade-up"
            data-aos-offset="100"
            data-aos-duration="300"
            data-aos-easing="ease-in-out"
            data-aos-anchor-placement="top-bottom"
            class="inline-block lazy"
            data-src="<?php echo get_theme_file_uri( 'src/images/blocks/texture-3.png'); ?>"
            alt="Bespoke Texture graphic"
        />
    </div>

    <?php
        endif;
    ?>
   
    <div class="relative z-20">
        <?php echo $content; ?>
    </div>
</section>

