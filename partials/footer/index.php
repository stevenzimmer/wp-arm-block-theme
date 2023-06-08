<footer class="bg-[#263D5C] py-20">
    <div class="container">
        <!-- <h2 class="text-white text-lg text-center">Global Footer</h2> -->
        <div class="flex flex-wrap justify-center mb-6 -mx-6">
            <div class="w-11/12 lg:w-2/3 mb-12 lg:mb-0 px-6">

            <?php 
                wp_nav_menu( 
                    array(
                        'menu' => 'footer-menu',
                        'container'       => 'false',
                        'menu_class'      => 'flex flex-wrap justify-between grow list-none p-0',
                        'element_class'   => 'global-footer-item',
                        'sub_menu_class'  => 'global-footer-submenu mt-2 list-none p-0',
                        'walker'          => new custom_simplify_walker
                    )
                ); 
            ?>
           
            </div>

            <div class="w-11/12 lg:w-1/3 px-6">
                <div class="mb-2">
                    <p class="text-yellow-light font-semibold text-lg m-0">Keep up to date with Armory</p>
                    <p class="text-white m-0">Get monthly updates, unsubscribe anytime</p>
                </div>
               
                <?php 
                    if( get_field('newsletter_form_id', 'option') ) :
                ?>
                <div class="mb-2">

                    <form class="mktoForm newsletter relative" data-formid="1154"></form>
                    <div class="flex items-center border-2 border-green-300 bg-green-200 bg-opacity-25 rounded-lg p-2 mb-1 hidden" id="newsletter-success">
                        <div class="w-4 h-4 rounded-full border-2 border-green-300 flex items-center justify-center">
                            <div>
                                <p class="m-0 text-xs text-green-500 font-bold">&#10003;</p>
                            </div>
                        </div>
                        <div class="w-full px-2">
                            <p class="m-0 text-xs text-green-500">
                            Success! You've subscribed to our monthly newsletter.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center border-2 border-green-300 bg-green-light bg-opacity-25 rounded-lg p-2 hidden" id="optin-accept">
                        <div class="w-4 h-4 rounded-full border-2 border-green-300 flex items-center justify-center">
                            <div>
                                <p class="m-0 text-xs text-green-300 font-bold">&#10003;</p>
                            </div>
                        </div>
                        <div class="w-full px-2">
                            <p class="m-0 text-xs text-green-500">
                            Success! You'll now receive all of the valuable information we share about software delivery.
                            </p>
                        </div>

                    </div>
                    <div class="pb-1 px-1 hidden" id="optin-text">
                        <div class="px-2 mb-2 py-1">
                            <div class="m-0 text-xs text-white">
                            <p class="mb-1"><strong>Want even more great info?</strong></p><p class="mb-0">Our monthly newsletter is great, but that's not all we offer. Would you like to receive additional emails about making software delivery continuous, collaborative, scalable, and safe?</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-2/5 text-center">
                                <p data-optin="0" class="m-0 text-grey-400 block cursor-pointer newsletter-btn">&#10005; No Thanks</p> 
                            </div>
                            <div class="w-3/5 text-center">
                                <p data-optin="1" class="block m-0 bg-yellow-light rounded py-2 cursor-pointer hover:bg-opacity-75 duration-200 transition newsletter-btn text-black">Give me all the info</p>
                            </div>
                        </div>
                    </div>
                        
                </div>
                <?php 
                    endif;
                ?>
                <div>
                    <ul class="flex items-center justify-start space-x-5 list-none w-full m-0 p-0">
                        <li><a href="https://twitter.com/cloudarmory" target="_blank"><img width="21" height="21" src="/wp-content/themes/Armory-Theme/ee/images/twitter-icon.png" alt="Twitter" /></a></li>
                        <li><a href="https://www.linkedin.com/company/armory.io/" target="_blank"><img width="21" height="21" src="/wp-content/themes/Armory-Theme/ee/images/linkedin-icon.png" alt="LinkedIn" /></a></li>
                        <li><a href="https://www.youtube.com/c/Armory-io" target="_blank"><img width="21" height="21" src="/wp-content/themes/Armory-Theme/ee/images/youtube-icon.png" alt="YouTube" /></a></li>
                        <li><a href="https://github.com/armory-io" target="_blank"><img width="21" height="21" src="/wp-content/themes/Armory-Theme/ee/images/github-icon.png" alt="Github" /></a></li>
                        <li><a href="https://www.facebook.com/cloudarmory/" target="_blank"><img width="21" height="21" src="/wp-content/uploads/2021/04/facebook.png" alt="Facebook" /></a></li>
                        <li><a href="/blog/feed/" target="_blank"><img width="21" height="21" src="/wp-content/uploads/2021/04/rss.png" alt="RSS Feed" /></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="w-11/12 lg:w-full">
                <div class="flex justify-between flex-wrap items-center">
                    
                    <div class="w-full lg:w-40">
                        <a href="<?php echo home_url() ?>">
                            <div class="w-full">
                                <img src="<?php echo get_theme_file_uri( "src/images/logos/armory-white.png" ); ?>" alt="Armory Logo white">
                            </div>
                        </a>
                    </div>
                    <div class="footer-contact-item flex items-center mb-3 lg:mb-0">
                        <div class="">
                            <img width="20" src="/wp-content/themes/Armory-Theme/ee/images/phone-icon.png" alt="phone icon">
                        </div>
                        <div class="px-2">
                            <a href="tel:8882223370" class="text-white text-xs no-underline">1-888-222-3370</a>
                        </div>
                    
                    </div>
                    <div class="footer-contact-item flex items-center mb-3 lg:mb-0">
                        <div class="">
                            <img width="20" src="/wp-content/themes/Armory-Theme/ee/images/email-icon.png" alt="phone icon">
                        </div>
                        <div class="px-2">
                            <a href="mailto:info@armory.io" class="text-white text-xs no-underline">info@armory.io</a>
                        </div>
                    
                    </div>
                    <div>
                        <p class="legal-text text-white m-0 text-xs">
                            &#169; <?php echo date('Y') ?> Armory Inc. All rights reserved.<br>
                            <a href="/terms-and-conditions/">Terms &amp; Conditions</a>&nbsp;&nbsp;<a href="/terms-of-service/" style="white-space: nowrap;">Terms of Service</a>&nbsp;&nbsp;<a href="/privacy-policy/">Privacy Policy</a>&nbsp;&nbsp;<a href="/security/">Security</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>