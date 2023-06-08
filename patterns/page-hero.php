<?php
 /**
  * Title: Page Hero
  * Slug: custom-block-patterns/page-hero
  * Categories: custom
  */
?>

<!-- wp:cover {"url":"<?php echo get_theme_file_uri( 'src/images/blocks/') ?>coder-hero.webp","id":14184,"dimRatio":20,"overlayColor":"purple","align":"full"} -->
<div class="wp-block-cover alignfull"><span aria-hidden="true" class="wp-block-cover__background has-purple-background-color has-background-dim-20 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-14184" alt="Coder Hero graphic" src="<?php echo get_theme_file_uri( 'src/images/blocks/') ?>coder-hero.webp" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:spacer -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:themeblocks/container -->
<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":12276,"width":246,"height":74,"sizeSlug":"large","linkDestination":"custom"} -->
<figure class="wp-block-image size-large is-resized"><a href="/"><img src="<?php echo get_theme_file_uri( 'src/images/blocks/') ?>armory-logo-white.png" alt="armory logo white" class="wp-image-12276" width="246" height="74"/></a></figure>
<!-- /wp:image -->

<!-- wp:spacer {"height":"40px"} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"70px"}},"className":"leading-none"} -->
<h1 class="leading-none" style="font-size:70px">Header hero h1 spanning three rows or less</h1>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"20px"} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"30px"}},"textColor":"yellow"} -->
<p class="has-yellow-color has-text-color" style="font-size:30px">Subheader content that should not go beyond two rows</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"40px"} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"yellow","textColor":"black"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-black-color has-yellow-background-color has-text-color has-background wp-element-button">Download CTA Text</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<!-- /wp:themeblocks/container -->

<!-- wp:spacer -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div></div>
<!-- /wp:cover -->