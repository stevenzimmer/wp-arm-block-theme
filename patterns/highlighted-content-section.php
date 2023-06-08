<?php
 /**
  * Title: Highlighted Content Section
  * Slug: custom-block-patterns/highlighted-content-section
  * Categories: custom
  */
?>
<!-- wp:group {"align":"full","backgroundColor":"blue-darker","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-blue-darker-background-color has-background"><!-- wp:spacer -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:themeblocks/container -->
<!-- wp:columns {"verticalAlignment":"top"} -->
<div class="wp-block-columns are-vertically-aligned-top"><!-- wp:column {"verticalAlignment":"top","width":"33.33%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:33.33%"><!-- wp:image {"align":"center","id":14123,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image aligncenter size-full"><img src="<?php echo get_theme_file_uri( 'src/images/blocks/') ?>highlighted-image-placeholder.jpg" alt="" class="wp-image-14123"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","width":"66.66%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:66.66%"><!-- wp:heading {"level":3,"textColor":"white"} -->
<h3 class="has-white-color has-text-color"><strong>Highlighted Content Title</strong></h3>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"20px"} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"className":"prose max-w-full","layout":{"type":"constrained"}} -->
<div class="wp-block-group prose max-w-full"><!-- wp:paragraph {"textColor":"white","fontSize":"medium"} -->
<p class="has-white-color has-text-color has-medium-font-size">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"20px"} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"yellow","textColor":"black"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-black-color has-yellow-background-color has-text-color has-background wp-element-button">Read More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<!-- /wp:themeblocks/container -->

<!-- wp:spacer -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->