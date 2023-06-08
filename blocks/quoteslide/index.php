<?php 

if(!isset($attributes["imgURL"])) :
    $attributes["imgURL"] = get_theme_file_uri( 'assets/images/logos/autodesk-logo-canvas.jpg');
endif;

?>

<div class="flex items-stretch flex-wrap bg-white rounded-lg quote-slide opacity-50 transition-opacity duration-200 w-3/4 lg:w-2/3 xl:w-7/12 mx-2">
    <div class="w-full sm:w-1/4 md:w-1/3 p-3 md:p-6 bg-grey-100 flex items-center rounded-t-lg md:rounded-t-none md:rounded-l-lg">
        <img
            class="w-full object-fit"
            src=<?php echo $attributes["imgURL"]; ?>
        />
    </div>
    <div class="w-full sm:w-3/4 md:w-2/3 p-3 md:p-6 h-full flex items-center ">
        <div>
        <?php echo $content; ?>
        </div>
       
    </div>
</div>