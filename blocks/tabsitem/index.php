<?php //  print_r($attributes); 
if( !isset( $attributes["className"] ) ) :

    $attributes["className"] = "";
endif;
?>
<div id="tab-item-<?php echo $attributes["tabID"]; ?>" data-tab="<?php echo $attributes["tabID"]; ?>" class="<?php echo $attributes['className'] ?> tab-item w-full h-16 md:h-12 px-1 sm:px-2 md:px-6 ease-out border-b transition-all border-blue-lighter cursor-pointer text-center hover:opacity-100 duration-200 text-xs sm:text-sm md:text-base lg:text-lg md:whitespace-nowrap">
    <?php echo $attributes["text"]; ?>
</div>