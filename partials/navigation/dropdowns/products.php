<?php 
require get_theme_file_path( "/partials/navigation/inc/products.php" );



?>
<div class="flex justify-center flex-wrap ">
    <div class="w-full lg:w-3/4">
        <div class="flex justify-center flex-wrap h-full">
        <?php 
            foreach( $products as $i => $product ) :
        ?>
            <div class="w-full px-6 lg:px-0 lg:w-1/2 ">
                <?php 
                    echo dropdownCol($product);
                ?>
            </div>
        <?php 
            endforeach;
        ?>
        <?php 
            foreach( $features as $i => $feature ) :
        ?>
            <div class="w-full px-6 lg:px-0 lg:w-1/2 h-full">
                <?php 
                    echo dropdownCol($feature);
                ?>
            </div>
        <?php 
            endforeach;
        ?>
        </div>
    </div>
    <div class="w-full lg:w-1/4">
         <?php 
            foreach( $prod_learn_mores as $i => $learn_more ) :
        ?>
            <div class="w-full h-full  bg-grey-100 px-6 lg:px-0">
                <?php 
                    echo dropdownCol($learn_more);
                ?>
            </div>
        <?php 
            endforeach;
        ?>
    </div>
</div>
