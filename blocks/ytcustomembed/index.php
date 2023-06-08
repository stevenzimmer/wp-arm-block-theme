<?php 

if(!isset($attributes["videoID"])) :
    $attributes["videoID"] = "";
endif;

if(!isset($attributes["className"])) :
    $attributes["className"] = "";
endif;

if(!isset($attributes["thumbnailText"])) :
    $attributes["thumbnailText"] = "";
endif;

if(!isset($attributes["overlay"])) :
    $attributes["overlay"] = false;
endif;

if(!isset($attributes["imgURL"])) :
    $attributes["imgURL"] = get_theme_file_uri( 'assets/images/default-youtube-thumbnail.jpg');
endif;

if( $attributes['videoID'] ) :
   
?>


<div class="relative h-0 mb-4 shadow-lg bg-black overflow-hidden rounded-[40px] group <?php  ?> custom-youtube-embed" style="padding-bottom: 56.25%;">
    <iframe 
        class="absolute w-full h-full inset-0 object-cover lazy duration-200 z-10 custom-youtube-embed-iframe"
        data-src="https://www.youtube-nocookie.com/embed/<?php echo $attributes['videoID']; ?>?enablejsapi=1"
        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <div class="absolute w-full h-full inset-0 object-cover overflow-hidden cursor-pointer custom-youtube-embed-trigger z-20 bg-[#21344C]">
        <div class="transition group-hover:scale-105">
            <img src="<?php echo $attributes["imgURL"]; ?>" alt="">
        </div>
        <?php 
            if($attributes["overlay"]) :
        ?>
        <div class="absolute inset-0 h-full w-full bg-[#21344C] opacity-50"></div>
        <?php 
            endif;
        ?>
        <div class="absolute inset-0 h-full w-full flex items-center justify-center ">
            <div class="text-center">
                <div class="mb-[20px]">
                    <svg class="mx-auto transition-opacity group-hover:opacity-80 fill-white" width="69" height="69" viewBox="0 0 69 69" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M34.5 0C15.4474 0 0 15.4474 0 34.5C0 53.5526 15.4474 69 34.5 69C53.5526 69 69 53.5526 69 34.5C69 15.4474 53.5526 0 34.5 0ZM25.4471 48.062V20.938L49.2628 34.4064L25.4471 48.062Z" fill="inherit"/>
                    </svg>
                </div>
                <p class="text-white font-asBold text-[30px]">Watch this video</p>
                <?php 
                    if( $attributes["thumbnailText"] ) :
                ?>
                <p class="text-white font-asBold text-[18px] mt-[20px]"><?php echo $attributes["thumbnailText"]; ?></p>
                <?php 
                    endif;
                ?>
            </div>
            
        </div>
        
    </div>
</div>

<?php 
endif;
?>