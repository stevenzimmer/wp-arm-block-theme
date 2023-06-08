<?php

function armory_enqueue_scripts() {
    $VERSION = wp_get_environment_type() === "development" ? time() : "2.2.19";
    
    wp_enqueue_script(
        "mkto-forms",
        "//at.armory.io/js/forms2/js/forms2.min.js",
        [],
        "1.1",
        false
    );

    wp_enqueue_script(
        "main",
        get_template_directory_uri() . "/build/index/scripts.js",
        ["mkto-forms", "jquery", "wp-element"],
        $VERSION,
        true
    );

    wp_enqueue_style(
        "style",
        get_template_directory_uri() . "/build/index/styles.min.css",
        [],
        $VERSION
    );
}

add_action("wp_enqueue_scripts", "armory_enqueue_scripts");

function enqueue_fonts() {
    // Register custom fonts. 
    wp_register_style( 'amplesoft-fonts', get_stylesheet_directory_uri() . '/src/css/_fonts.css', [] );
 
    // Enqueue Fonts
    wp_enqueue_style( 'amplesoft-fonts' );
    wp_enqueue_style( 'os-g-font', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap', false );
 }
 
 add_action( 'wp_enqueue_scripts', 'enqueue_fonts' );

// Blocks register
class JSXBlock {
    function __construct($name, $renderCallback = null, $data = null) {
        $this->name = $name;
        $this->data = $data;
        $this->renderCallback = $renderCallback;
        add_action("init", [$this, "onInit"]);
    }
    function renderCallback($attributes, $content, $block) {
        ob_start();
        require get_theme_file_path( "blocks/{$this->name}/index.php" );
        return ob_get_clean();
    }
    function onInit() {
        wp_register_script( $this->name, get_stylesheet_directory_uri() . "/build/{$this->name}/scripts.js", array('wp-blocks', 'wp-editor', "wp-element") );
        wp_register_style( $this->name, get_stylesheet_directory_uri() . "/build/{$this->name}/styles.min.css" );
        if($this->data) :
            wp_localize_script($this->name, $this->name, $this->data);
        endif;
        $args = array(
            "editor_script" => $this->name,
            // "editor_style" => $this->name,
        );
        if($this->renderCallback) :
            $args['render_callback'] = [$this, "renderCallback"];
        endif;
        register_block_type( "themeblocks/{$this->name}", $args);

    }
}


new JSXBlock("sectionlink", true );
new JSXBlock("container", true );
new JSXBlock("uberflipstream", true );
new JSXBlock("mktoform", true );
new JSXBlock("carousel", true );
new JSXBlock("quoteslide", true, ['fallbackLogo' => get_theme_file_uri( 'assets/images/logos/autodesk-logo-canvas.jpg')] );
new JSXBlock("customquote", true );
new JSXBlock("custombox", true );
new JSXBlock("ytplaylist", true );
new JSXBlock("tabs", true );
new JSXBlock("tabsitem", true );
new JSXBlock("tabspanel", true );
new JSXBlock("texturedbg", true, ['texture_1' => get_theme_file_uri( 'assets/images/cdaas/texture-1.png'),'texture_2' => get_theme_file_uri( 'assets/images/cdaas/texture-2.png'), 'texture_3' => get_theme_file_uri( 'src/images/blocks/texture-3.png')]);
new JSXBlock("productpricing", true );
new JSXBlock("logoscarousel", true);
new JSXBlock("loadmore", true);
new JSXBlock("ytcustomembed", true, ['defaultThumbnail' => get_theme_file_uri( 'assets/images/default-youtube-thumbnail.jpg')] );
new JSXBlock("signupform", true);
new JSXBlock("faq", true);
new JSXBlock("comparisons", true);
new JSXBlock("productstack", true);
new JSXBlock("productrow", true, ['fallbackGraphic' => get_theme_file_uri( 'src/images/blocks/coder-hero.webp')] );


class PlaceholderBlock {
    function __construct($name) {
        $this->name = $name;
        add_action("init", [$this, "onInit"]);
    }
    function renderCallback($attributes, $content) {
        ob_start();
        require get_theme_file_path( "blocks/{$this->name}/index.php" );
        return ob_get_clean();
    }
    function onInit() {
        wp_register_script( $this->name, get_stylesheet_directory_uri() . "/blocks/{$this->name}/scripts.js", array('wp-blocks', 'wp-editor') );
        register_block_type( "themeblocks/{$this->name}", array(
            "editor_script" => $this->name,
            "render_callback" => [$this, "renderCallback"]
        ));
    }
}

new PlaceholderBlock("globalfooter");
new PlaceholderBlock("globalnav");
new PlaceholderBlock("globallogos");
new PlaceholderBlock("upcomingevents");
new PlaceholderBlock("singlepost");
new PlaceholderBlock("indexbody");
new PlaceholderBlock("ourteam");
new PlaceholderBlock("ourinvestors");
new PlaceholderBlock("latestpressreleases");
new PlaceholderBlock("latestnews");
new PlaceholderBlock("latestblogposts");
new PlaceholderBlock("socialicons");
new PlaceholderBlock("breadcrumbs");
new PlaceholderBlock("pricingcards");
new PlaceholderBlock("pricingtable");
new PlaceholderBlock("marketplacelink");
new PlaceholderBlock("homepagerows");
new PlaceholderBlock("productpackaging");
new PlaceholderBlock("resourcecenter");

function register_theme_support() {

    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    add_theme_support("align-wide");
    add_theme_support("wp-block-styles");
    add_theme_support("editor-styles");

    add_editor_style([
        "https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap",
        "./src/css/_fonts.css",
        "./build/index/styles.min.css"
    ]);

    // Disable Core Block Patterns
    remove_theme_support('core-block-patterns');
}

add_action("after_setup_theme", "register_theme_support");

/**
 * Gutenberg scripts and styles
*/
function gutenberg_scripts() {
    // $VERSION = wp_get_environment_type() === "development" ? time() : "2.1.66";
	wp_enqueue_script( 'theme-editor', get_template_directory_uri() . '/src/js/editor.js', array( 'wp-blocks', 'wp-dom', 'wp-editor' ), true );
	wp_enqueue_style( 'index', get_template_directory_uri() . '/build/index/styles.min.css', [], $VERSION );

}
// add_action( 'enqueue_block_editor_assets', 'gutenberg_scripts' );

function unregister_post_tags() {
    unregister_taxonomy_for_object_type("post_tag", "post");
}

add_action("init", "unregister_post_tags");


function comparisonColumn( $arg, $pos ) {
?>
<div class="w-1/2 px-1 md:px-3">
    <div class="bg-[#EFF8FB] w-full h-full text-center flex items-center justify-center <?php echo ($pos ? "rounded-b-xl" : "border-b border-a-blue") ?>">
        <?php  

            if( gettype($arg) === "boolean" ) :
        ?>

            <img class="mx-auto w-8 h-8" width="32" height="32" src="<?php echo get_theme_file_uri( 'assets/icons/') ?>pricing-<?php echo $arg ? "true" : "false"; ?>.png" alt="Comparison <?php echo $arg ? "Check" : "cancel";  ?> icon">

        <?php

            else :
        ?>
            <p class="text-[16px] leading-snug">
        <?php
                echo $arg;
        ?>
            </p>
        <?php

            endif;
        ?>
    </div>
</div>
<?php

}


function register_block_pattern_categories() {
    register_block_pattern_category(
      'custom',
      array( 'label' => __( 'Custom', 'custom-block-patterns' ) )
  );
  }
  
  add_action( 'init', 'register_block_pattern_categories' );

//   if (!defined('PR_DEBUG')) {
//     define('PR_DEBUG', false);
//   }
  
//   if (!defined('PR_PROXY')) {
//     define('PR_PROXY', false);
//   }
  
//   if (!defined('PR_PROXY_KEY')) {
//     define('PR_PROXY_KEY', 'EbEUt6AxCz4FgF8');
//   }

// /**
//  * include partytown in head
//  */
// add_action('wp_head', function () {
//     echo "<script>
//     partytown = {
//       // only relative
//       lib: " . get_theme_file_uri( 'public/~partytown/' ) . ",
//       debug: " .  (PR_DEBUG ? 'true' : 'false') . ",
//       " . (PR_PROXY ? "resolveUrl: function (url, location, type) {
//           // nonce for filter request, set the cache of website to 8h max
//           var pt_nonce = '" . (is_user_logged_in() ? PR_PROXY_KEY : wp_create_nonce('partytown_proxy')) . "';
//           if (type === 'script' || type === 'iframe') {
//              const proxyUrl = new URL('" . get_site_url() . "/wp-json/partytown/pr/getPR');
//             proxyUrl.searchParams.append('url',url.href);
//             proxyUrl.searchParams.append('pt_nonce',pt_nonce);
//             return proxyUrl;
//           }
//           return url;
//         }," : null) . "};
//     </script>";
//     // include code partytown
//     echo '<script>';
//     include(dirname(__FILE__) . '/public/~partytown/partytown.js');
//     echo '</script>';
//   }, 1);

function blog_card($id) {
?>
<div class="shadow hover:shadow-lg group hover:bg-blue-50 transition duration-200 rounded-lg overflow-hidden h-full relative">
    <a href="<?php echo get_permalink(
        $id
    ); ?>" class="absolute w-full h-full inset-0 z-50"></a>
    <div class="relative h-0 hidden" style="padding-bottom: 56.25%">

        <img 
            class="absolute w-full h-full inset-0 object-cover lazy" 
            data-src="<?php if (has_post_thumbnail($id)):
                echo wp_get_attachment_image_src(
                    get_post_thumbnail_id($id),
                    "medium_large",
                    false
                )[0];
            else:
                echo get_template_directory_uri() .
                    "/assets/src/images/generic-thumbnail.jpg";
            endif; ?>" 
            alt="<?php echo get_the_title($id); ?> thumbnail"
        />
    </div>
    <div class="px-3 md:px-6 py-6 bg-white">
        <div class="h-16">
            <h3 class="m-0 text-sm md:text-lg max-lines max-lines-2 leading-none font-bold"><?php echo get_the_title($id); ?></h3>
        </div>
        <div class="text-sm flex items-center mb-2">
            <div class="text-xs md:text-sm"><?php echo get_the_date(
                "M j, Y",
                $id
            ); ?></div>
         
        </div>
        <div class="h-20 mb-6 overflow-hidden">
            <p class="m-0 max-lines max-lines-4 text-sm"><?php echo get_the_excerpt(
                $id
            ); ?></p>
        </div>
        <div class="">
            <p class="m-0 font-bold text-blue-400 text-xs md:text-sm" >Read more <span class="transform inline-block transition-transform group-hover:translate-x-1 text-xs">&#8594;</span></p>
        </div>
    </div>
</div>
<?php
}


function curl_get_contents($url) {
    $ch = curl_init();
    // Set the URL
    curl_setopt($ch, CURLOPT_URL, $url);
    // Removes the headers from the output
    curl_setopt($ch, CURLOPT_HEADER, 0);
    // Return the output instead of displaying it directly
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //set timeout
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
    // Execute the curl session
    $output = curl_exec($ch);
    // Close the curl session
    curl_close($ch);
    // Return the output as a variable
    return $output;
}

function get_uberflip_auth($client_id, $client_secret) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://v2.api.uberflip.com/authorize");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt(
        $ch,
        CURLOPT_POSTFIELDS,
        "{ \n        \"grant_type\": \"client_credentials\", \n        \"client_id\": \"$client_id\", \n        \"client_secret\": \"$client_secret\" }"
    );
    curl_setopt($ch, CURLOPT_POST, 1);

    $headers = [];
    $headers[] = "Content-Type: application/json";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $auth = json_decode(curl_exec($ch));
    if (curl_errno($ch)):
        echo "Error:" . curl_error($ch);
    endif;
    curl_close($ch);

    return $auth;
}

function get_uberflip_stream($stream_id, $auth) {
    $ch = curl_init();

    curl_setopt(
        $ch,
        CURLOPT_URL,
        "https://v2.api.uberflip.com/streams/" .
            $stream_id .
            "/items?sort=ordinal&published=true&limit=5"
    );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

    $headers = [];
    $headers[] =
        "Authorization: " . $auth->token_type . " " . $auth->access_token;
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = json_decode(curl_exec($ch));
    if (curl_errno($ch)) {
        echo "Error:" . curl_error($ch);
    }
    curl_close($ch);

    return $result;
}

function delete_transient_on_save($transient) {
    if (false !== get_transient($transient)):
        delete_transient($transient);
    endif;
}

add_action("save_post", function () {
    delete_transient_on_save("uberflip_stream-7822204");
});

define("THEME_NAME", "armory");

function event_card($id) {
  
    $event_month = date("M", strtotime(get_field("event_date", $id)));
    $event_day = date("j", strtotime(get_field("event_date", $id)));
    $event_day_end = get_field("event_date_end", $id)
        ? date("j", strtotime(get_field("event_date_end", $id)))
        : false;
    $event_month_end = get_field("event_date_end", $id)
        ? date("M", strtotime(get_field("event_date_end", $id)))
        : false;
    $new_month = false;

    if ($event_day_end):
        if ($event_month !== $event_month_end):
            $new_month = true;
        endif;
    endif;
    ?>
    <div class="bg-white shadow hover:shadow-lg group transition duration-200 rounded-r-lg overflow-hidden h-full relative border-l-4 border-blue-100 hover:border-blue-200">
        <a <?php if (get_field("event_external_link", $id)):
            echo 'target="_blank"';
        endif; ?> href="<?php if (get_field("event_external_link", $id)):
     echo get_field("event_external_link", $id);
 else:
     echo get_the_permalink($id);
 endif; ?>" class="absolute w-full h-full inset-0 z-50"></a>
    
        <div class="px-3 md:px-6 py-3 group-hover:bg-blue-50 transition-colors duration-200">
           
            <div class=" h-24">
                <h3 class="m-0 text-sm md:text-lg font-bold leading-tight max-lines max-lines-3"><?php echo get_the_title(
                    $id
                ); ?></h3>
            </div>
            <div class="flex flex-wrap items-end">
                <div class="w-full md:w-3/5 ">
                    <div class="text-sm flex items-center mb-2 -mx-1">
                        <div class="px-1 w-16">
                            <div class="bg-blue-primary text-center text-white rounded-lg py-2">
                                <div class="mb-1">
                                    <p class="text-lg font-bold m-0 leading-none"><?php echo $event_month; ?></p>
                                </div>
                            
                                <p class="m-0 leading-none"><?php
                                echo $event_day;

                                if ($event_day_end && !$new_month):
                                    echo " - " . $event_day_end;
                                endif;
                                ?></p>
                            </div>
                    
                        </div>
                        <?php if ($new_month): ?>
                        <div class="px-1">
                            &#8212;
                        </div>
                        <div class="px-1 w-16">
                            <div class="bg-blue-primary text-center text-white rounded-lg py-2">
                                <div class="mb-1">
                                    <p class="text-lg font-bold m-0 leading-none"><?php echo $event_month_end; ?></p>
                                </div>
                                
                                <p class="m-0 leading-none"><?php echo $event_day_end; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
                <div class="w-full md:w-2/5 lg:w-full xl:w-2/5">
                    <div class="text-right">
                        <p class=" m-0 font-bold text-blue-400 text-xs md:text-sm" >Event details <span class="transform inline-block transition-transform group-hover:translate-x-1 text-xs">&#8594;</span></p>
                    </div>
                </div>
            </div>
            
        </div>
            
    </div>
          
  <?php
}

function add_favicon() {
    ?>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/src/images/icons/favicon.ico?123"/>
        
<?php
}

add_action("wp_head", "add_favicon");

// Custom RSS Feeds
// add_action('init', 'customRSSFeeds');
// function customRSSFeeds() {
//     add_feed('mailchimp-blog', function() {
//         get_template_part('template-parts/rss/mailchimp');
//     });
// }
//
// Armory Functions
// --------------------------------------------------

// Siloed Armory function groups
// ---------------------------------------
// require_once "inc/helpers.php";
// require_once "inc/navigation.php";
// require_once "inc/rogue.php";
// require_once "inc/scripts.php";
// require_once "inc/custom_post_types.php";
// require_once "inc/widgets.php";
// require_once "inc/content.php";
require_once "inc/breadcrumbs.php";

add_action("admin_init", function () {
    // Redirect any user trying to access comments page
    global $pagenow;
    if ($pagenow === "edit-comments.php"):
        wp_redirect(admin_url());
        exit();
    endif;
    // Remove comments metabox from dashboard
    remove_meta_box("dashboard_recent_comments", "dashboard", "normal");
    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type):
        if (post_type_supports($post_type, "comments")):
            remove_post_type_support($post_type, "comments");
            remove_post_type_support($post_type, "trackbacks");
        endif;
    endforeach;
});

// Close comments on the front-end
add_filter("comments_open", "__return_false", 20, 2);
add_filter("pings_open", "__return_false", 20, 2);

// Hide existing comments
add_filter("comments_array", "__return_empty_array", 10, 2);

// Remove comments page in menu
add_action("admin_menu", function () {
    remove_menu_page("edit-comments.php");
});

// Remove comments links from admin bar
// add_action("init", function () {
//     if (is_admin_bar_showing()):
//         remove_action("admin_bar_menu", "wp_admin_bar_comments_menu", 60);
//     endif;
// });

// Enable ACF-created "Options Page"
// ---------------------------------------
// if (function_exists("acf_add_options_page")) {
//     acf_add_options_page();
//     acf_add_options_sub_page([
//         "page_title" => "Post Options",
//         "menu_title" => "Options",
//         "parent_slug" => "edit.php",
//     ]);
// }

// armory theme setup
// ---------------------------------------
add_action("after_setup_theme", "armory_setup");

function armory_setup() {
    add_theme_support("automatic-feed-links");
    add_theme_support("post-thumbnails");
    add_theme_support("align-wide");
    add_theme_support("title-tag");
    add_theme_support("editor-styles");
    add_editor_style(["./build/index/styles.min.css"]);

    register_nav_menus([
        "main-menu" => __("Main Menu", THEME_NAME),
        "utility-menu" => __("Utility Menu", THEME_NAME),
        "footer-menu" => __("Footer Menu", THEME_NAME),
    ]);
}


//  ACF hide label
// ---------------------------------------
// add_action("acf/render_field_settings", "hidelabel_render_field_settings");
// function hidelabel_render_field_settings($field) {
//     acf_render_field_setting(
//         $field,
//         [
//             "label" => __("Hide Label?"),
//             "instructions" => "",
//             "name" => "hide_label",
//             "type" => "true_false",
//             "ui" => 1,
//         ],
//         true
//     );
// }

// add_filter('acf/prepare_field', 'hidelabel_prepare_field');
// function hidelabel_prepare_field( $field )
// {
//print_r(array_keys($field));
//echo $field["label"] . " (" . $field["key"] . ")\n";
// if($field["label"] == "Additional Options") {
//print_r($field);
// }
// $key = array_pop(explode("_", $field["key"]));
// if ($field['hide_label'])
//   echo "
//   <style type=\"text/css\">
//     .acf-field-{$key} > .acf-label {display: none;}
//   </style>";
// return $field;
// }

//  Limit search to blog posts
// ---------------------------------------
// if (!is_admin()) {
//     function wpb_search_filter($query)
//     {
//         if ($query->is_search) {
//             $query->set("post_type", "post");
//         }
//         return $query;
//     }
//     add_filter("pre_get_posts", "wpb_search_filter");
// }

// Lower the Yoast SEO "priority" so its metabox appears below that of Flexible Content in the admin
// ---------------------------------------
// add_filter("wpseo_metabox_prio", function () {
//     return "low";
// });

// Remove the Body / Content Editor for Pages and Content Masters, which rely solely on our ACF Flexible Content sections solution
// ---------------------------------------
function remove_content_editor() {
    //   remove_post_type_support( 'page', 'editor' );
    remove_post_type_support("content_masters", "editor");
}

// Change ACF Admin Styles
// ---------------------------------------
// add_action("init", "remove_content_editor");

function my_acf_admin_head() {
    ?>
<style type="text/css">
    .acf-flexible-content .layout .acf-fc-layout-handle {
      padding: .7em .85em;
      background: linear-gradient(var(--acf-fc-layout-handle-bg, hsla(197, 20%, 93%, 1)), white 75%, white 0);
      font-weight: 600;
      font-size: 1.1em;
      letter-spacing: 0.025em;
    }
    .acf-flexible-content .layout .acf-fc-layout-handle:hover {
      --acf-fc-layout-handle-bg: hsla(185, 27%, 95%, 1);
    }

    .acf-flexible-content .layout {
      margin-top: 25px;
      border-color: #c3c7cb;
    }
    .acf-flexible-content .layout:hover {
      border-color: #acb0b4;
    }

    .acf-flexible-content .layout .acf-fc-layout-order {
      background: #ffffff;
      font-size: 14px;
      box-shadow: inset 0 1px 0 0px rgba(0, 0, 0, 0.2), inset 0 -1px 0 0 hsla(197, 25%, 90%, 1);
      color: #5f5f5f;
      margin-right: .25em;
    }


    .acf-repeater.-row > table > tbody > tr > td,
    .acf-repeater.-block > table > tbody > tr > td {
        border-top: 2px solid #555;
    }

    .acf-repeater .acf-row-handle {
        vertical-align: top !important;
        padding-top: 16px;
    }

    .acf-repeater .acf-row-handle span {
        font-size: 17px;
        font-weight: bold;
        color: #202428;
    }

    /*.imageUpload img {
        width: 75px;
    }*/

    .acf-repeater .acf-row-handle .acf-icon.-minus {
        top: 30px;
    }

</style>
<?php
}

// add_action("acf/input/admin_head", "my_acf_admin_head");

// add_filter(
//     "acf/fields/relationship/query/name=featured_article",
//     "relationship_options_filter",
//     10,
//     3
// );

// function relationship_options_filter($options, $field, $the_post) {
//     $options["post_status"] = ["publish"];
//     return $options;
// }

// remove_action("wp_head", "rest_output_link_wp_head");
// remove_action("wp_head", "wp_oembed_add_discovery_links");
// remove_action("template_redirect", "rest_output_link_header", 11);

function armory_numeric_posts_nav()
{
    if (is_singular()) {
        return;
    }

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1) {
        return;
    }

    $paged = get_query_var("paged") ? absint(get_query_var("paged")) : 1;
    $max = intval($wp_query->max_num_pages);

    /** Add current page to the array */
    if ($paged >= 1) {
        $links[] = $paged;
    }

    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ($paged + 2 <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="pagination-nav"><ul>' . "\n";

    /** Previous Post Link */
    if (get_previous_posts_link()) {
        printf(
            '<li class="pagination-btn__wrapper">%s</li>' . "\n",
            get_previous_posts_link()
        );
    }

    /** Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class =
            1 == $paged
                ? ' class="pagination-number active"'
                : ' class="pagination-number"';

        printf(
            '<li%s><a href="%s">%s</a></li>' . "\n",
            $class,
            esc_url(get_pagenum_link(1)),
            "1"
        );

        if (!in_array(2, $links)) {
            echo "<li>…</li>";
        }
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array) $links as $link) {
        $class =
            $paged == $link
                ? ' class="pagination-number active"'
                : ' class="pagination-number"';
        printf(
            '<li%s><a href="%s">%s</a></li>' . "\n",
            $class,
            esc_url(get_pagenum_link($link)),
            $link
        );
    }

    /** Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links)) {
            echo "<li>…</li>" . "\n";
        }

        $class =
            $paged == $max
                ? ' class="pagination-number active"'
                : ' class="pagination-number"';
        printf(
            '<li%s><a href="%s">%s</a></li>' . "\n",
            $class,
            esc_url(get_pagenum_link($max)),
            $max
        );
    }

    /** Next Post Link */
    if (get_next_posts_link()) {
        printf(
            '<li class="pagination-btn__wrapper">%s</li>' . "\n",
            get_next_posts_link()
        );
    }

    echo "</ul></div>" . "\n";
}

// Disable XML RPC
add_filter("xmlrpc_enabled", "__return_false");
