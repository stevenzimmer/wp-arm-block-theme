<?php //print_r($attributes); 
// if(!isset($attributes["width"])):
//     $attributes["width"] = "container";
// endif;

// if(!isset($attributes["className"])):
//   $attributes["className"] = "lg:px-0";
// endif;
?>
<div class=" load-more-container">
  <div class="text-center">
    <a href="#load-more" class="btn btn-ghost btn-ghost-secondary btn-sm load-more-btn">Load more</a>
  </div>
  <div class="hidden load-more-content">
    <?php echo $content; ?>
  </div>
</div>

