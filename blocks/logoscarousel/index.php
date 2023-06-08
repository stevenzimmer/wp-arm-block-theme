<?php 
// print_r($attributes);
// print_r($content);
// print_r($block);


if(!isset($attributes["logoColor"])):
    $attributes["logoColor"] = "white";
endif;

if(!isset($attributes["bgHex"])):
  $attributes["bgHex"] = "#263D5C";
endif;

$logos = array(
    "hellosign","earnin","launchdarkly","autodesk","opengov","glovo","bnz","informatica","patreon","openx","primerica","firstrepublic","citadel","teamsnap","sugarcrm"
);
?>
<section style="background-color: <?php echo  $attributes['bgHex'];  ?>"> 

    <div class="carousel-ticker flex items-center justify-between w-full">
        <?php 
            foreach ($logos as $i => $logo) :
        ?>
        <div class="slide-tick w-1/4 md:w-48 h-20 flex items-center mx-6 md:mx-0">
            <img data-aos-once="true" 
            data-aos-anchor=".carousel-ticker" data-aos-delay="<?php echo $i ?>00" data-aos="fade-in" class="mx-auto" src="<?php echo get_theme_file_uri( 'src/images/logos/' . $logo . '-' . $attributes["logoColor"] . '.png' ); ?>" alt="<?php echo $logo; ?> white logo" />
        </div>
        <?php
            endforeach;
        ?>
    </div>
</section>