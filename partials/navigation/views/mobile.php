<div class="bg-blue-dark">
    <?php 
        foreach ($mains as $i => $main) :      
    ?>
        <div class="cursor-pointer mobile-menu-item <?php echo isset($main["dropdown"]) ? "has-dropdown" : ""; ?> px-6 text-white " >
            <div class="flex items-center justify-between border-b py-6 relative">
                <?php 
                if( !isset($main["dropdown"]) ) :
                ?>
                <a href="<?php echo $main['link']; ?>" class="absolute w-full h-full inset-0 z-10"></a>
                <?php
                endif;
                ?>
                <div>
                    <p class=" text-[18px] font-avenirDemi text-white m-0"><?php echo $main["title"]; ?></p>
                </div>
                <div class="w-4 transform origin-center mobile-caret transition-transform duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="8.434" height="14.869" viewBox="0 0 8.434 14.869">
                        <path id="Path_263" data-name="Path 263" d="M10.748,6.48l6.02,6.02-6.02,6.021" transform="translate(-9.333 -5.066)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    </svg>
                </div>
            </div>
            <div class="bg-white mobile-dropdown h-[200px] overflow-y-scroll hidden">
                <div class="">
                <?php 
                    if(isset($main["dropdown"]) ) :
                        $file_path = strtolower($main["title"]);
                        require get_theme_file_path( "/partials/navigation/dropdowns/{$file_path}.php" );
                    endif;

                ?>
                </div>
            </div>
        </div>
    <?php
        endforeach;
    ?>
    <div class="px-6 text-center py-3">
        <div class="mb-3">
            <a target="_blank" class="btn btn-sm w-full bg-transparent border border-yellow-light text-white hover:bg-blue-darker transition-all duration-200 hover:text-white text-center" href="https://console.cloud.armory.io/">Log In</a>
        </div>
        <div class="">
            <a class="btn btn-sm w-full bg-yellow-light hover:bg-opacity-80 transition-all duration-200 text-black hover:text-black text-center" href="/demo-request/">Request a Demo</a>
        </div>
    </div>
    
</div>