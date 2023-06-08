<?php
//
// Armory content customization
// --------------------------------------------------


// Remove the hentry class from posts.
// ---------------------------------------
// Related to microformats & structured data.
// Allows a JSON version of structured data to appease search engines
// ---------------------------------------
// function post_class_remove_hentry( $post_class ) {
//     $post_class = array_diff( $post_class, array( 'hentry' ) );
//     return $post_class;
// }
// add_filter( 'post_class', 'post_class_remove_hentry' );



// // Add additional class(es) for every image brought in as an attachment
// // ---------------------------------------
// function add_img_class( $class ) {
//     return $class . ' img-fluid ';
// }
 
// add_filter( 'get_image_tag_class', 'add_img_class' );



// // add lazyloading to regular content
// // ---------------------------------------
// function add_lazy_loading_markup_to_images($content) {
//     //-- Change src/srcset to data attributes.
//     $content = preg_replace("/<img(.*?)(src=|srcset=)(.*?)>/i", '<img$1data-$2$3>', $content);

//     //-- Add .lazyload class to each image that already has a class.
//     $content = preg_replace('/<img(.*?)class=\"(.*?)\"(.*?)>/i', '<img$1class="$2 lazy"$3>', $content);

//     //-- Add .lazyload class to each image that doesn't already have a class.
//     $content = preg_replace('/<img((.(?!class=))*)\/?>/i', '<img class="lazy"$1>', $content);
    
//     return $content;
// }

// add_filter('the_content', 'add_lazy_loading_markup_to_images');
// add_filter('acf_the_content', 'add_lazy_loading_markup_to_images');
// // 