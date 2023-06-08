<?php 
    function dropdownCol($col) {
        ob_start();
?>
<div class="flex justify-center border-0 lg:border-r h-full py-3 lg:py-6">
    <div class="w-full lg:w-9/12">

        <?php 
            if( isset( $col["header"]) ) :
        ?>
        <div class="border-b border-blue-light py-1 pr-2 inline-block mb-6">
            <?php 
                if( isset( $col["url"]) ) :
            ?>
            <a href="<?php echo $col["url"]; ?>" class="text-blue-light font-semibold whitespace-nowrap m-0 no-underline hover:no-underline"><?php echo $col['header']; ?></a>
            <?php
                else :
            ?>
            <p class="text-blue-light font-semibold whitespace-nowrap m-0"><?php echo $col['header']; ?></p>

            <?php
                endif;
            ?>
            
        </div>
        <?php 

            else : 

        ?>
        <div class="mb-6">
            <a href="<?php echo $col["link"]; ?>">
            
                <img class="lazy" width="100" data-src="<?php echo get_theme_file_uri( "src/images/logos/armory-blue.png" ); ?>" alt="Armory dropdown header logo">
            </a>
        </div>
        
        <?php
            endif;
        ?>
        <div >
            <?php 
                foreach ($col['items'] as $i => $item) :
            ?>
            <div class="mb-3 last:mb-0 <?php 
            
                if( isset($item["indent"] ) ) : 
                    echo "px-8"; 
                endif;  
                
                ?>">
                <div class="flex items-center">
                    <?php 
                        if(isset($item["icon"])) :
                    ?>
                    <div class="w-6">

                        <?php 
                            if($item["icon"]) :
                        ?>
                        
                        <img class="lazy" data-src="<?php echo get_theme_file_uri( "src/images/icons/{$item["icon"]}.png" ); ?>" alt="<?php echo $item["title"]; ?>">
                        <?php 
                            endif;
                        ?>
                    </div>
                    <?php 
                        endif;
                    ?>
                    <div class="w-full <?php 
                        if(isset($item["icon"])) :
                    ?> px-2 <?php endif; ?>">
                        <a class="text-blue-light block font-semibold no-underline" href="<?php echo $item["link"]; ?>"><?php echo $item["title"]; ?></a>
                        
                    </div>

                </div>
                <?php 
                    if( isset( $item["paragraph"] ) ) :
                ?>
                <div class="flex">
                    <div class="w-6"></div>
                    <div class="w-full px-2">
                    <?php 
            
                        if( isset($item["subtitle"] ) ) : 
                    ?>
                    <p class="font-asMedium text-[12px] text-blue-light mb-1"><?php echo $item["subtitle"]; ?></p>
                    <?php
                            
                        endif;  
                    
                    ?>
                    <p class="text-[12px] m-0 text-black">
                        <?php  echo $item["paragraph"] ?>
                    </p>
                    
                    </div>
                </div>
                <?php 
                    endif;
                ?>
            </div>

            <?php
                endforeach;
            ?>
        </div>
    </div>
</div>
<?php
    return ob_get_clean();
    }
?>