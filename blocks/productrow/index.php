<?php 

if(!isset($attributes["imgURL"])) :
    $attributes["imgURL"] = get_theme_file_uri( 'src/images/blocks/coder-hero.webp');
endif;

if(!isset($attributes["className"])) :
    $attributes["className"] = "";
endif;


?>
<div class="flex justify-center md:justify-end relative ">
    <div class="w-11/12">
        <div class="flex items-center flex-wrap <?php echo $attributes['className']; ?>">
            <div class="w-full md:w-1/2 px-6 mb-6 md:mb-0">
                <div class="flex justify-center">
                    <div class="w-11/12 sm:w-8/12 lg:w-10/12">
                        <img
                            class="w-full object-fit"
                            src=<?php echo $attributes  ["imgURL"]; ?>
                        />
                    </div>
                </div>
               
            </div>
            <div class="w-full  md:w-1/2">
                <div class="prose">
                <?php echo $content; ?>
                </div>
            
            </div>
        </div>
    </div>
</div>