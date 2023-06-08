<?php //  print_r($attributes); 
if( !isset( $attributes["className"] ) ) :

    $attributes["className"] = "";
endif;
?>
<div id="tab-panel-<?php echo $attributes["tabID"] ?>"  class="<?php echo $attributes['className'] ?> tab-panel">
    <?php echo $content; ?>  

</div>