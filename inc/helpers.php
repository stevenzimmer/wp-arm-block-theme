<?php
//
// Armory Helper Functions
// --------------------------------------------------


/**
 * DETECT IF ON LOGIN PAGE
 *
 * Simply detect if currently on the login or register pages
 * returns boolean
 */
// if(!function_exists('is_login_page')){
//     function is_login_page(){
//         return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
//     } //EF
// }


// /**
//  * ADD FILTERS TO MULTIPLE ITEMS WITH SAME FUNCTION
//  *
//  * Provide list of filters
//  * Provide function to be applied
//  */
// if(!function_exists('add_filters')){
//     function add_filters($tags, $function){
//         foreach($tags as $tag) add_filter($tag, $function);
//     } //EF
// }


// // Custom media upload directory
// // ---------------------------------------
// add_filter('upload_dir', 'fix_custom_media_dir');

// function fix_custom_media_dir($path){
//     $path['path']    = preg_replace('/\/wp\//', '/', $path['path']);
//     $path['url']     = preg_replace('/\/wp\//', '/', $path['url']);
//     $path['basedir'] = preg_replace('/\/wp\//', '/', $path['basedir']);
//     $path['baseurl'] = preg_replace('/\/wp\//', '/', $path['baseurl']);
//     return $path;
// }


// // dashItAll
// // Turn text and formatting into usable IDs or phone numbers
// // ---------------------------------------
// function dashItAll($string) {
//     // Lower case everything
//     $string = strtolower($string);
//     // Make alphanumeric (removes all other characters)
//     $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
//     // Clean up multiple dashes or whitespaces
//     $string = preg_replace("/[\s-]+/", " ", $string);
//     // Convert whitespaces and underscore to dash
//     $string = preg_replace("/[\s_]/", "-", $string);
//     return $string;
// }


// // a more readable & consistent var_dump() (assumes xdebug is installed, as on Local by Flywheel instances)
// // ---------------------------------------
// function readableDump( $contents ) {
//     echo '<div style="font-size: 0.9rem; font-weight: 400; color: #0d61ac; background: #FFF; text-align: left; text-transform: none; font-style: normal;">';
//     echo '<pre>';
//     var_dump($contents);
//     echo '</pre>';
//     echo '</div>';
// }


// // Put readableDump() behind a specific user check
// // ---------------------------------------
// function adminOnlyDump ( $contents, $users = [1, 2] ) {
//     $currentUser = get_current_user_id();
//     // if current user ID is 1 or 2 (in this case, the site creator account, and the second account after that)
//     if( in_array($currentUser, $users, true) ) {
//         echo "<code>This error log should only be shown for Kyle and Eugene. Please notify either of them if you see it.</code>";
//         readableDump( $contents );
//     }
// }

#EOF
