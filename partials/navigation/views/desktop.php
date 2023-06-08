
<div class="justify-between items-center hidden lg:flex">
    <div class="lg:w-2/3 ">
        <ul class="flex items-center justify-between main-nav list-none m-0 p-0">
            <?php 
                foreach ($mains as $i => $main) :
                    
                    echo menuItem($main);
        
                endforeach;
            ?>

        </ul>
    </div>
    <div class="lg:w-1/3">
        <div class="flex items-center justify-end">
            <div class="">
                <a target="_blank" class="btn btn-mini bg-transparent border border-yellow-light text-white hover:bg-blue-darker transition-all duration-200 hover:text-white text-center" href="https://console.cloud.armory.io/">Log In</a>
            </div>
            <div class="px-2">
                <a class="btn btn-mini bg-yellow-light border border-yellow-light hover:bg-opacity-80 transition-all duration-200 text-black hover:text-black text-center demo-click-cta" href="https://go.armory.io/signup">Try for Free</a>
            </div>
            <div class="w-8 h-8 flex items-center justify-center ml-1">
            <?php  if( !wp_is_mobile() && !is_page_template("page-search.php") ) : ?>
            <div id="search" class="flex justify-center items-center w-full"></div>
            <?php  endif; ?>
            </div>
            <div>
                <a target="_blank" href="https://docs.armory.io/cd-as-a-service/" class="text-white no-underline hover:no-underline hover:text-[#4AC1E0] py-5 px-2 xl:px-3 cursor-pointer  font-semibold block select-none lg:text-[12px] xl:text-[14px]">Docs</a>
            </div>
        </div>
    </div>
</div>