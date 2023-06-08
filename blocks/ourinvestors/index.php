<?php 
    $investors = array(
        array(
            array(
                "img" => "bcapgrouplogo.png",
                "name" => "B Capital Group"
            ),

            
            array(
                "img" => "Insight_Partners_Logo.png",
                "name" => "Insight Partners"
            ),
            
            array(
                "img" => "crosslink_logo.png",
                "name" => "crosslink capital"
            ),
            
        ),
        array(
            array(
                "img" => "javelin_ventures_logo.png",
                "name" => "Javelin Ventures"
            ),
            array(
                "img" => "Bain_Capital_Ventures_logo.png",
                "name" => "Bain Capital Ventures"
            ),
            array(
                "img" => "MANGO-ORANGE-COLOR-1.svg",
                "name" => "Mango Capital"
            ),
            array(
                "img" => "Y_Combinator_logo.png",
                "name" => "Y Combinator"
            ),
            
            
        ),
    );


?>
<?php 
    foreach ($investors as $i => $investor) :
?>
<div class="flex items-center flex-wrap justify-center mb-12">
    <?php 
        foreach ($investor as $j => $item) :
    ?>

    <div class="px-12 w-full <?php 
    
            if( $i === 0 ) : 
                echo "md:w-1/3";
            else : 
                echo "md:w-1/4";
            endif;
        
        ?>">
        <img class="w-full h-auto" src="<?php echo get_theme_file_uri( 'assets/images/logos/investors/' . $item["img"]) ?>" alt="<?php echo $item["name"] ?> logo">    
    </div>    

    <?php 
        endforeach;
    ?>
   
</div>
<?php
    endforeach;
?>
