<?php

/**
 * DISGUISE WP AND THE LIKE
 */



/**
 * REMOVE UNWANTED ACTIONS
 *
 * remove uneccessary items
 */

// add_filter('the_generator', '__return_false');

// add_action('init', 'armory_head_cleanup');
// function armory_head_cleanup(){
//     remove_action('wp_head', 'rsd_link');
//     remove_action('wp_head', 'feed_links', 2);
//     remove_action('wp_head', 'feed_links_extra', 3);
//     remove_action('wp_head', 'wlwmanifest_link');
//     remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
//     remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
//     remove_action('wp_head', 'wp_generator');

//     global $wp_widget_factory;
//     if(isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
//         remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
//     }

//     if (!class_exists('WPSEO_Frontend')) {
//         remove_action('wp_head', 'rel_canonical');
//         add_action('wp_head', 'armory_rel_canonical');
//     }
// } //EF

// function armory_rel_canonical(){
//     global $wp_the_query;
//     if(!is_singular()){
//         return;
//     }
//     if(!$id = $wp_the_query->get_queried_object_id()){
//         return;
//     }
//     $link = get_permalink($id);
//     echo "\t<link rel=\"canonical\" href=\"$link\">\n";
// } //EF


// /**
//  * HIDE THEME|PLUGIN-EDITOR FROM USERS
//  *
//  * don't allow people to break files!
//  */

// if(is_admin() && !defined('DISALLOW_FILE_EDIT')){
//     add_action('admin_init', 'armory_remove_admin', 102);
// }
// function armory_remove_admin(){
//     remove_submenu_page('themes.php', 'theme-editor.php');
//     remove_submenu_page('plugins.php', 'plugin-editor.php');
// } //EF


// /**
//  * Root relative URLs
//  *
//  * WordPress likes to use absolute URLs on everything - let's clean that up.
//  * Inspired by http://www.456bereastreet.com/archive/201010/how_to_make_wordpress_urls_root_relative/
//  */
// function armory_relative_url($input) {
//     preg_match('|https?://([^/]+)(/.*)|i', $input, $matches);
//     if (!isset($matches[1]) || !isset($matches[2])) {
//         return $input;
//     } elseif (($matches[1] === $_SERVER['SERVER_NAME']) || $matches[1] === $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT']) {
//         return wp_make_link_relative($input);
//     } else {
//         return $input;
//     }
// } //EF


// if(!is_admin() && !is_login_page()){
//     $_relative_url_filters = array(
//         'bloginfo_url',
//         'the_permalink',
//         'wp_list_pages',
//         'wp_list_categories',
//         'soil_wp_nav_menu_item',
//         'the_content_more_link',
//         'the_tags',
//         'get_pagenum_link',
//         'get_comment_link',
//         'month_link',
//         'day_link',
//         'year_link',
//         'tag_link',
//         'the_author_posts_link',
//         'script_loader_src',
//         'style_loader_src'
//     );
//     add_filters($_relative_url_filters, 'armory_relative_url');
// }

#EOF
