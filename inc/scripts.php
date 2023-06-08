<?php
//
// Armory custom scripts
// --------------------------------------------------


// Performance enhancement: remove extra scripts
// ---------------------------------------
// function armory_strip_unnecessary_scripts() {
//     // emojis
//     remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
//     remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
//     remove_action( 'wp_print_styles', 'print_emoji_styles' );
//     remove_action( 'admin_print_styles', 'print_emoji_styles' );
//     remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
//     remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
//     remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

//     // embeds
//     // Remove the REST API endpoint.
//     /* MOVE TO CHILD THEME */
//     remove_action( 'rest_api_init', 'wp_oembed_register_route' );
// }
// // add_action('init', 'armory_strip_unnecessary_scripts');


// // Performance enhancement: remove footer scripts
// // ---------------------------------------
// function armory_remove_footer_scripts(){
//     // revisit in the future (does Gutenberg take care of Youtube and other embeds automatically?)
//     wp_deregister_script( 'wp-embed' );
// }
// add_action( 'wp_footer', 'armory_remove_footer_scripts' );


// // Performance enhancement: remove Gutenberg styles
// // ---------------------------------------
// function custom_theme_assets() {
//     wp_dequeue_style( 'wp-block-library' );
// }
// add_action( 'wp_enqueue_scripts', 'custom_theme_assets', 100 );


// // ACF Admin Customization
// // ---------------------------------------
// // function my_admin_enqueue_scripts() {
// //     wp_enqueue_script( 'my-admin-js', get_template_directory_uri() . 'dist/js/admin-acf-customizations.js', array(), '1.0.0', true );
// // }
// // add_action('acf/input/admin_enqueue_scripts', 'my_admin_enqueue_scripts');

// function my_acf_input_admin_footer() {
    
// ?>
<!-- // <script type="text/javascript"> -->
// (function() {
//     acf.addFilter('color_picker_args', function( args, field ) {
//         args.palettes = ['#BC002E', '#FAB500', '#37C666', '#38B6D9', '#005491', '#FF6A00', '#FFFFFF']
//         return args;
//     });
// })(); 
<!-- // </script> -->
// <?php
        
// }

// add_action('acf/input/admin_footer', 'my_acf_input_admin_footer');


// // Add "Section Types" helper link
// // ---------------------------------------
// if( is_user_logged_in() && current_user_can( 'edit_posts' ) && !is_admin() ) {
//     function enqueue_logged_in_scripts(){
//         wp_enqueue_script('acf-name-helper', get_template_directory_uri() . '/dist/js/acf-section-name-helper.js');
//     }
//     add_action('wp_enqueue_scripts','enqueue_logged_in_scripts');

//     // add a link to the WP Toolbar
//     function custom_toolbar_link($wp_admin_bar) {
//         $args = array(
//             'id' => 'fc-section-name-helper-button',
//             'title' => 'Section Types', 
//             'href' => '#/', 
//             'meta' => array(
//                 //'html' => '<script></script>',
//                 'class' => '',
//                 'title' => 'Visually show the each ACF Flexible Content Section/Module name centered within each section/module.'
//                 )
//         );
//         $wp_admin_bar->add_node($args);
//     }
//     add_action('admin_bar_menu', 'custom_toolbar_link', 999);
// }


// // Hide Customizer link from Toolbar
// // ---------------------------------------
// add_action( 'admin_bar_menu', 'remove_some_nodes_from_admin_top_bar_menu', 999 );
// function remove_some_nodes_from_admin_top_bar_menu( $wp_admin_bar ) {
//     $wp_admin_bar->remove_menu( 'customize' );
// }
