<?php 

require get_theme_file_path( "/partials/navigation/inc/spinnaker.php" );


?>
<div class="flex justify-center flex-wrap ">
    <div class="w-full lg:w-3/5">
        <div class="flex justify-center flex-wrap">
        <?php 
            foreach( $spinnaker_products as $i => $product ) :
        ?>
            <div class="w-full  px-6 lg:px-0">
                <?php 
                    echo dropdownCol($product);
                ?>
            </div>
        <?php 
            endforeach;
        ?>
        </div>
    </div>
    <div class="w-full lg:w-2/5">
         <?php 
            foreach( $spinnakers as $i => $spinnaker ) :
        ?>
            <div class="w-full h-full px-6 lg:px-0  bg-grey-100">
                <?php 
                    echo dropdownCol($spinnaker);
                ?>
            </div>
        <?php 
            endforeach;
        ?>
    </div>
</div>
