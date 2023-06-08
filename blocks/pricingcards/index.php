<?php 
include get_template_directory() . "/inc/pricing-meta.php";

?>
<div class="flex flex-wrap justify-center items-stretch">
    <?php 

        foreach ($products->cdaas->cards as $i => $card) :
    ?>
        <div class=" w-11/12 md:w-1/2 lg:w-1/3 mb-6 lg:mb-0">
            <div class="<?php if($i === 0 ) : echo "bg-a-yellow"; endif; ?> p-3 h-full rounded-xl ">
                
                <p class="text-center py-1 mb-1 text-[20px] font-bold text-a-primary">
                <?php 
                    if($i === 0 ) : 
                ?>
                    Start Here
                <?php
                    else :
                ?>
                    &nbsp;
                <?php
                    endif; 
                ?>
                </p>
            
                <div class="border relative rounded-xl p-6 <?php if($i === 0 ) : echo "bg-slate-100"; else : echo "bg-white"; endif; ?> shadow  relative ">
                    <!-- <a href="<?php echo $card["cta"]["link"]; ?>" class="absolute w-full h-full inset-0 z-10"></a> -->
                    <div class="mb-2">
                        <img class="mx-auto h-20 block" src="<?php echo get_theme_file_uri( 'src/images/icons/' . $card["icon"]) ?>" alt="<?php echo $i; ?> icon">
                    </div>
                    <div class="text-center">
                        <div class="mb-4">
                            <p class="m-0 text-[#263D5C] text-[32px] font-asBold"><?php echo $card["title"] ?></p>
                        </div>
                    
                        <div class="mb-6 lg:h-20">
                            <p class="text-[18px] lg:text-[22px]  font-asMedium"><?php echo $card["description"] ?></p>
                        </div>

                        <div class=" px-6 mb-40">
                        <?php
                            foreach ($card["bullets"] as $k => $bullet) :
                                if($bullet === "") :
                        ?>
                            <div class="mb-2 last:mb-0">
                                &nbsp;
                            </div>
                        <?php
                                else :
                        ?>
                            <div class="flex mb-2 last:mb-0 text-left">
                                <div class="mt-1">
                                    <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 5.5L3.31818 10L6.79546 1" stroke="#0E6027" stroke-width="2" stroke-linecap="round"/>
                                    </svg>

                                </div>
                                <div class="px-2 w-full">
                                    <p class="text-[14px] text-a-primary">
                                    <?php echo $bullet; ?>
                                    </p>
                                </div>
                            </div>
                        <?php
                                endif;
                            endforeach;
                        ?>
                        </div>

                        <div class="text-center absolute bottom-6 left-0 right-0 px-12">
                        <?php 
                            if(isset($card["pricing"])) :
                        ?>
                        <div class="">
                            <?php 
                                if( $card["pricing"] !== "FREE" && $card["pricing"] !== "FREE" && $card["pricing"] !== "CONTACT SALES" ) : 
                            ?>
                            <p class="m-0 text-[12px] text-[#263D5C]">Starting at</p>
                            <?php 
                                endif; 
                            ?>
                            <p class="m-0 text-[26px] font-os font-bold text-[#263D5C] mb-2"><?php echo $card["pricing"]; ?></p>

                            <div class="relative flex mb-3 ">
                                <?php 
                                    if( isset($card["tooltip"]) ) :
                                ?>
                                <div class="group/tooltip cursor-default w-8">
                                    <span class="text-[12px] inline-block text-a-primary ">&#9432;</span>
                        
                                    <div class="absolute z-20 w-full h-full left-0 right-0 bottom-12 opacity-0 invisible group-hover/tooltip:visible  group-hover/tooltip:opacity-100 transition-opacity duration-200">
                                        <div class="bg-white shadow-lg p-3 rounded-lg w-full">
                                            <p class="m-0 text-[12px] text-a-primary text-left"><?php echo $card["tooltip"]; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    endif;
                        
                                ?>
                                <?php 
                                    if( isset($card["measurement"]) ) :
                                ?>
                                <p class="m-0 text-[12px] text-[#263D5C] w-full text-left"><?php echo $card["measurement"]; ?></p>
                                <?php 
                                    endif;
                                ?>
                            </div>
                
                        </div>

                        <?php
                    
                            endif;
                        ?>

                        <div class="text-center">
                            <a href="<?php echo $card["cta"]["link"]; ?>" class="btn btn-sm btn-ghost btn-ghost-yellow pricing-btn group-hover/card:bg-a-yellow"><?php echo $card["cta"]["text"]; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <?php 
            endforeach;
    
    ?>
</div>

