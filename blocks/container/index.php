<?php //print_r($attributes); 
if(!isset($attributes["width"])):
    $attributes["width"] = "container";
endif;

if(!isset($attributes["className"])):
  $attributes["className"] = "lg:px-0";
endif;
?>
<div class="mx-auto px-6 alignfull <?php echo $attributes["className"]; ?> w-full <?php echo $attributes['width']; ?>">
  <?php echo $content; ?>
</div>