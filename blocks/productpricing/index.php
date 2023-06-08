<?php
    $productID = isset($attributes["productID"]) ? $attributes["productID"] : "cdaas";

    include get_template_directory() . "/inc/pricing-meta.php";

    // if($productID) :
?>
<div class="flex flex-wrap justify-center items-stretch -mx-3 mb-12">
    <?php 

        foreach ($products->cdaas->cards as $i => $card) :
    ?>
        <div class="px-3 w-11/12 md:w-1/2 lg:w-1/3 mb-6 lg:mb-0">
            <div class="border relative rounded-lg p-6 bg-white shadow hover:shadow-lg transform hover:-translate-y-1 transition duration-200 h-full">
                <div class="mb-2">
                    <img class="mx-auto h-20 block" src="<?php echo get_theme_file_uri( 'src/images/icons/' . $card["icon"]) ?>" alt="<?php echo $i; ?> icon">
                </div>
                <div class="text-center">
                    <div class="mb-4">
                        <p class="m-0 text-[#263D5C] text-[32px] font-asBold"><?php echo $card["title"] ?></p>
                    </div>
                   
                    <div class="mb-6 lg:px-12">
                        <p class="text-[18px] lg:text-[22px] text-[#263D5C] font-asMedium"><?php echo $card["description"] ?></p>
                    </div>

                    <div class="px-6 mb-40">
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
                            if( $card["pricing"] !== "FREE" && $card["pricing"] !== "CUSTOM" && $card["pricing"] !== "CONTACT SALES" ) : 
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
                            <div class="group cursor-default w-8">
                                <span class="text-[12px] inline-block ">&#9432;</span>
                       
                                <div class="absolute z-20 w-full h-full left-0 right-0 bottom-12 opacity-0 invisible group-hover:visible  group-hover:opacity-100 transition-opacity duration-200">
                                    <div class="bg-white shadow-lg p-3 rounded-lg w-full">
                                        <p class="m-0 text-[12px] text-left"><?php echo $card["tooltip"]; ?></p>
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
                        <a href="<?php echo $card["cta"]["link"]; ?>" class="btn btn-sm btn-ghost btn-ghost-yellow pricing-btn"><?php echo $card["cta"]["text"]; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
            endforeach;
    
    ?>
</div>



<section class="py-6">
    <div class="flex items-center justify-center cursor-pointer group toggle-features packaging relative mb-12" id="cdaas">          
        <div class="px-3 toggle-features-caret origin-center rotate-180 transition-transform duration-200">
            <svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.4845 0.413278L9.56253 5.34775C9.54437 5.36596 9.53524 5.37507 9.51708 5.38417C9.48984 5.41149 9.45353 5.4388 9.4172 5.46611C9.38996 5.48432 9.36275 5.50252 9.3355 5.52073C9.29918 5.54805 9.27184 5.56625 9.23551 5.58446C9.20827 5.60267 9.18105 5.61178 9.14472 5.62999C9.11748 5.63909 9.09935 5.6573 9.07211 5.6664C9.05395 5.6755 9.04482 5.67551 9.02666 5.67551C8.99942 5.68461 8.96311 5.69371 8.93587 5.70282C8.89955 5.71192 8.85414 5.73013 8.81781 5.73924C8.78149 5.74834 8.75426 5.74834 8.72702 5.75744C8.68162 5.75744 8.64528 5.76655 8.59987 5.76655C8.56355 5.76655 8.53632 5.76655 8.49999 5.76655C8.46367 5.76655 8.41826 5.76655 8.38193 5.76655C8.34561 5.76655 8.31838 5.75744 8.28205 5.75744C8.24573 5.74834 8.2094 5.74834 8.16399 5.73924C8.12767 5.73013 8.10044 5.72103 8.06411 5.71192C8.02779 5.70282 7.98238 5.68461 7.94605 5.67551C7.93697 5.67551 7.92785 5.6664 7.90969 5.6664C7.89153 5.6573 7.87342 5.64819 7.85526 5.63909C7.81894 5.62088 7.78262 5.60267 7.74629 5.58446C7.70997 5.56625 7.68263 5.54805 7.65539 5.52073C7.62815 5.50252 7.60093 5.48432 7.57369 5.457C7.53737 5.42969 7.51014 5.40238 7.4829 5.37507C7.46474 5.35686 7.44653 5.34775 7.43745 5.33865L2.50642 0.395072C1.91614 -0.142075 1.008 -0.132974 0.43588 0.431486C0.145281 0.722821 0 1.1052 0 1.49668C0 1.87906 0.145281 2.26143 0.43588 2.55277L7.43745 9.5721C7.45561 9.59031 7.47382 9.59942 7.4829 9.60852C7.51014 9.63583 7.54645 9.66314 7.57369 9.69046C7.60093 9.70867 7.62815 9.72687 7.65539 9.75419C7.68263 9.7724 7.71905 9.7906 7.74629 9.81792C7.78262 9.83612 7.81894 9.85433 7.85526 9.87254C7.87342 9.88165 7.89153 9.89075 7.90969 9.89985C7.91877 9.90896 7.92789 9.90896 7.94605 9.90896C7.98238 9.92716 8.01871 9.93627 8.06411 9.94537C8.10044 9.95448 8.12767 9.96358 8.16399 9.97268C8.20032 9.98179 8.23665 9.99089 8.28205 9.99089C8.31838 10 8.34561 10 8.38193 10C8.41826 10 8.46367 10 8.49999 10C8.52724 10 8.56355 10 8.59987 10C8.64528 10 8.68162 9.99089 8.72702 9.99089C8.75426 9.98179 8.79057 9.98179 8.81781 9.97268C8.85414 9.96358 8.89955 9.95448 8.93587 9.93627C8.96311 9.92717 8.99942 9.91806 9.02666 9.90896C9.04482 9.89985 9.05395 9.89985 9.07211 9.89985C9.09935 9.89075 9.11748 9.87254 9.14472 9.86344C9.17196 9.84523 9.20827 9.83612 9.23551 9.81792C9.27184 9.79971 9.30826 9.7724 9.3355 9.75419C9.36275 9.73598 9.38996 9.71777 9.4172 9.69956C9.45353 9.67225 9.48076 9.64493 9.51708 9.61762C9.53524 9.60852 9.54437 9.59031 9.56253 9.58121L16.5641 2.56187C17.1453 1.9701 17.1453 1.02326 16.5641 0.440593C15.992 -0.132972 15.0657 -0.142079 14.4845 0.413278Z" fill="#263D5C"/>
            </svg>
        </div>
        <div>
            <p class="font-as text-blue-primary text-[18px] lg:text-[24px]">Features Comparison</p>
        </div>
    </div>
    <div class="package-table scroll-my-20 " id="package-table-cdaas">
        
        
        <?php pricing_table("cdaas", $products->cdaas->table); ?>
        
    </div>

</section>