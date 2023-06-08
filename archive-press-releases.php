<?php

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$posts_per_page = 12;
$next_page_index = $paged + 1;
$index_url =  substr($_SERVER["REQUEST_URI"], 0, -1); //home_url( $wp->request );
if(strpos($index_url , '/page') > -1) {
  $index_url = substr($index_url, 0, strpos($index_url, '/page'));
}
$index_url = str_replace("https://", "//", $index_url);
$index_url = str_replace("http://", "//", $index_url);
$posts_count = wp_count_posts("press-releases", "publish");
$posts_count = $posts_count->publish;
$posts_page = get_permalink(get_option( 'page_for_posts' ));
$next_page_link = "{$index_url}/page/$next_page_index/";
$pages = ceil($posts_count / $posts_per_page);
$last_page_index = $pages;


?>
<?php get_header(); ?>



<section class="bg-grey-100">
  <div class="container">
    <div class="section-content">
      <div class="row">
        <div class="column"><h1>Press Releases</h1></div>
    
      </div>
    </div>
  </div>
</section>

<?php if ( have_posts() ): ?>

<section class="main-content-wrapper">
  <div class="blog-list">
    <div class="blog-group">
    <?php while ( have_posts() ) : the_post(); ?>

      <div class="main-content-container container">
          <div id="post-<?php the_ID(); ?>" <?php post_class("post-content-wrapper"); ?>>
              <div class="post-meta">
                <div class="post-date"><?php print get_the_date("M j, Y"); ?></div>
                <!--<div class="post-author">by <?php the_author(); ?></div>-->
              </div>
              <h4 class="post-title post-title--preview"><a href="<?php print get_permalink(); ?>"><?php the_title(); ?></a></h4>
              <div class="entry-content">
                  <?php
                  // Show the featured image at top _with a caption_ if it exists.
                  // Will defer to the usage of the featured-image shortcode if present.
                  if ( has_post_thumbnail() && !has_shortcode(get_the_content(), 'featured-image') ) {
                      echo "<figure class='featured-image figure-feature'>";
                      the_post_thumbnail();
                      $caption = get_the_post_thumbnail_caption();
                      if (!empty($caption)) {
                          echo "<figcaption class='wp-figcaption-text'>";
                          echo $caption;
                          echo "</figcaption>";
                      }
                      echo "</figure>";
                  }
                  ?>

              </div>
          </div>
      </div>

<?php endwhile; ?>
    </div>
  </div>

  <?php
  armory_numeric_posts_nav();
  ?>



  
</section>

<?php endif; ?>


<?php get_footer(); ?>
