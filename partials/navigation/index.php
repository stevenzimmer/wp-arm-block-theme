<?php 

include_once get_theme_file_path( "/partials/navigation/inc/mains.php" );
include_once get_theme_file_path( "/partials/navigation/helpers/dropdown-header.php" );
include_once get_theme_file_path( "/partials/navigation/helpers/dropdown-text.php" );
include_once get_theme_file_path( "/partials/navigation/helpers/menu-item.php" );
include_once get_theme_file_path( "/partials/navigation/helpers/dropdown-wrapper.php" );
include_once get_theme_file_path( "/partials/navigation/helpers/dropdown-col.php" );
include_once get_theme_file_path( "/partials/navigation/helpers/learn-more-col.php" );

    if(get_field("global_banner_text","options")) :
?>

<div class="bg-a-green hidden md:flex announcement-banner transition-all  items-center justify-center" id="announcement-banner">
    <div class="container relative">
        <div class="absolute right-0 top-0 bottom-0 w-16 h-full flex items-center justify-center cursor-pointer group" id="close-announcement">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="text-white hover:text-[#263D5C]" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                </svg>
            </div>
        </div>
        <div class="flex justify-center space-x-[40px] items-center">
            <div class="bg-[#263D5C] px-3 py-1 text-white text-center rounded-full uppercase font-semibold text-[12px]">
            NEW GUIDE 
            </div>
            <div>
                <p class="font-asBold text-white text-[16px]">Explore the new Ultimate Guide to Continuous Deployment </p>
            </div>
            <div>
                <a 
                    class="group hover:text-[#263D5C] whitespace-nowrap block m-0 no-underline hover:no-underline text-white hover:opacity-80 transition-all duration-200 font-bold text-[14px]"
                    href="/continuous-deployment/"
                >
                View now
                    <span class="transform inline-block transition-transform group-hover:translate-x-0.5 text-xs ">&#8594;</span>
                </a>
            </div>
        </div>
    </div>
</div>
<?php 
    endif;
?>
<nav id="main-nav" class="main-nav-wrapper bg-[#263D5C] relative z-50 ">
    <div class="max-w-[1280px] px-6 mx-auto relative ">
        <div class="flex justify-start lg:justify-center items-center py-3 lg:py-0 ">
            <div class="w-1/2 lg:w-[200px]">
                <div class="">
                    <a href="<?php echo home_url() ?>">
                        <img width="150" src="<?php echo get_theme_file_uri( "src/images/logos/armory-white.png" ); ?>" alt="Armory Logo white">
                    </a>
                </div>
            </div>
            <div class="w-1/2 lg:w-full">

                <div class="lg:hidden">
                    <div class="flex justify-end">

                        <?php 
                            if( wp_is_mobile() ) :
                        ?>
               
                        <div id="search" class="pr-14"></div>

                        <?php 
                            endif;
                        ?>
                
                        <div class="flex justify-between items-center ">
                            <div class="mobile-toggle cursor-pointer right-6 " >
                                <span class="sr-only">Toggle Navigation</span>
                                <span class="nav-bar"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden lg:block">
                <?php                
                    include_once get_theme_file_path( "/partials/navigation/views/desktop.php" );
                ?>
                </div>
            </div>
        </div>
         
        <div class="absolute w-full h-full left-0 right-0 mobile-menu-wrapper hidden">
        <?php
            include_once get_theme_file_path( "/partials/navigation/views/mobile.php" );
        ?>
        </div>
    

    </div>
    
</nav>

<div class="absolute w-full h-full inset-0 backdrop-blur-sm bg-white/30 z-20 mobile-backdrop hidden "></div>
