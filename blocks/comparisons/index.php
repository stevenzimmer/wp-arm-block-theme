<?php
    $comparisonID = isset($attributes["comparisonID"]) ? $attributes["comparisonID"] : "argo";
    if(!isset($attributes["className"])):
        $attributes["className"] = "";
      endif;
    include get_template_directory() . "/inc/comparisons.php";

    if($comparisonID) :
?>

<div class="comparison-table <?php echo $attributes["className"]; ?>">
<?php 
    foreach ($comparisons->$comparisonID as $j => $comp) :  
?>
    <div data-aos="fade-up" class="flex items-stretch">
        <div class="w-3/5 md:w-2/3">
            <div class="bg-grey-100 flex items-center h-full px-6 md:px-12 py-3 rounded-t-xl border-b border-a-blue">
                <p class="text-[20px] md:text-[25px] font-asMedium text-a-blue">
                    <?php echo $comp["header"]; ?>
                </p>
            </div>
        </div>
        <div class="w-2/5 md:w-1/3 px-1 md:px-3">
            <div class="flex items-stretch h-full">
                <div class="w-1/2 px-1 md:px-3">
                    <div class="bg-[#EFF8FB] h-full flex items-center justify-center w-full px-1 md:px-3 py-3 rounded-t-xl text-center border-b border-a-blue">
                        <img class="mx-auto " src="<?php echo get_theme_file_uri( 'src/images/logos/') ?>armory-blue.png" alt="Comparison Armory Logo">
                    </div>
                </div>
                <div class="w-1/2 px-1 md:px-3">
                    <div class="bg-[#EFF8FB] h-full flex items-center justify-center w-full px-1 md:px-3 py-3 rounded-t-xl text-center border-b border-a-blue">
                        <img class="mx-auto " src="<?php echo get_theme_file_uri( 'src/images/logos/') ?><?php echo $comparisonID ?>.png" alt="Comparison <?php echo $comparisonID ?> Logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        foreach ($comp["rows"] as $k => $row) : 
            $isLast = $k === count($comp["rows"]) - 1 ? true : false;
    ?>
    <div data-aos="fade-left" class="comparison-feature-row items-stretch <?php if ( $k > 6  ) : ?> hidden <?php else : ?> flex <?php endif; ?>">

        <div class="w-3/5 md:w-2/3">
            <div class="bg-grey-100 h-full px-6 md:px-12 py-3  prose max-w-full flex items-center <?php 
                if( $isLast ) : 
                    echo "rounded-b-xl";
                else :
                    echo "border-b border-a-blue";
                endif;
            ?>">
                <p class="text-[16px] md:text-[20px] leading-snug">
                    <?php echo $row[0]; ?>
                </p>
            </div>
        </div>
        <div class="w-2/5 md:w-1/3 px-1 md:px-3">
            <div class="flex items-stretch h-full">
                <?php comparisonColumn($row[1], $isLast); ?>
                <?php comparisonColumn($row[2], $isLast); ?>
            </div>
        </div>

    </div>
    <?php 
        endforeach;
    ?>
    <div class="text-center mt-6">
        <a href="#" class="btn mx-auto bg-a-blue text-center text-black hover:text-black hover:bg-opacity-80 comparison-feature-btn">Show more</a>
    </div>
</div>

<?php 
    endforeach;
else :
?>
<div class="text-center text-lg">
    Please add the Comparison ID
</div>
<?php 
endif;

?>
