
        <div class="flex justify-center">
            <div class="w-11/12 md:w-10/12 lg:w-8/12">
                <?php
                    $i = 0;
                    while (have_rows("logo_groups", "options")):
                        the_row(); 

                        if( $i === 0 ) :
                ?>
                <div class="flex items-center flex-wrap justify-center sm:grid sm:grid-flow-col sm:gap-2 -mx-2 sm:-mx-0">

                <?php 
                            while (have_rows("logo_group_logos")):
                                the_row(); 

                                customerLogo(get_sub_field("logo_group_logo"),get_sub_field("logo_group_link"), true);
         
                            endwhile; 
                ?>
                </div>
                <?php
                        endif;
                    $i++;
                    endwhile;
                ?>
                 <div class="grid sm:grid-flow-col sm:grid-cols-[3fr auto] sm:gap-2 -mx-2 sm:-mx-0 ">
                 <?php
                    $i = 0;
                    while (have_rows("logo_groups", "options")):
                        the_row(); 

                        if( $i !== 0 ) :
                ?>
                    <div class="border-2 border-blue-tertiary px-6 mb-2 sm:mb-0 
                    <?php 
                            if($i === 1 ) : 
                                echo "sm:row-span-2";
                            else : 
                                echo "sm:row-span-1";
                            endif; 
                    ?>">
                        <?php if(get_sub_field("logo_group_name")): ?>
                        <div class="py-6">
                            <p class="uppercase text-blue-light m-0 font-semibold text-sm"><?php the_sub_field("logo_group_name") ?></p>
                        </div>
                        <?php endif; ?>
                        <div class="flex items-center flex-wrap justify-center md:justify-start">
                <?php 
                            while (have_rows("logo_group_logos")):
                                the_row(); 

                                customerLogo(get_sub_field("logo_group_logo"),get_sub_field("logo_group_link"));

                            endwhile; 
                ?>
                        </div>
                    </div>
                
                <?php
                        endif;
               
                    $i++;
                    endwhile;
                ?>
                </div>
            </div>
        </div>



<?php
function customerLogo($logo, $link, $top_row = false) {
?>
<div class="w-1/2 px-2 sm:px-0 sm:w-full mb-6 relative group">
    <?php 
        if ($link): 
    ?>
    <a href="<?php echo $link["url"]; ?>" class="absolute w-full h-full inset-0 z-50"></a>
    <div class="absolute inset-0 w-full h-full flex items-center justify-center transition  opacity-0 group-hover:opacity-100 ">
        <div class="transition bg-black bg-opacity-70 px-2 py-2 rounded-lg shadow-lg border-white border border-opacity-20 translate-y-1 group-hover:translate-y-0" >
            <p class="m-0 text-white font-bold text-xs md:text-sm text-center"><?php echo $link["title"]; ?></p>
        </div>
    </div>
    <?php
        endif; 
    ?>
    <div>
        <img width="<?php echo !$top_row ? '150' : '' ?>" class="mx-auto " src="<?php echo $logo["url"]; ?>" alt="<?php echo $logo["title"]; ?> logo">	
    </div>
</div>
<?php

}


