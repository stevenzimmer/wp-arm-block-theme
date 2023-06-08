<?php
$blog_id       = get_option('page_for_posts');
$heroText      = get_field('text', $blog_id);
set_query_var( 'heroText', $heroText );
$customHeading = $heroText['hero_headline'];
$heroCopy      = $heroText['hero_copy'];

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$obj = get_queried_object();
$posts_per_page = 12;
$next_page_index = $paged + 1;
$index_url =  substr($_SERVER["REQUEST_URI"], 0, -1); //home_url( $wp->request );
if(strpos($index_url , '/page') > -1) {
  $index_url = substr($index_url, 0, strpos($index_url, '/page'));
}
$index_url = str_replace("https://", "//", $index_url);
$index_url = str_replace("http://", "//", $index_url);
$posts_count = wp_count_posts("post", "publish");
$posts_count = $posts_count->publish;

if(is_category()) {
  $category = get_category($obj->term_id);
  $term = $category;
  $posts_count = $category->category_count;
}elseif(is_author()) {
  $author_id = get_the_author_meta("ID");
  $posts_count = count_user_posts($author_id, "post", true);
}elseif(is_tag()) {
  $term = get_tag($obj->term_id);
  $posts_count = $term->count;
}

$pages = ceil($posts_count / $posts_per_page);
$last_page_index = $pages;
$posts_page = get_permalink(get_option( 'page_for_posts' ));
$next_page_link = "{$index_url}/page/$next_page_index/";
$pages = ceil($posts_count / $posts_per_page);
$last_page_index = $pages;

$current_category = get_queried_object();

/*  Featured Article */

$featured_article = get_field("featured_article", "option");


/* Taxonomy Fields */
if(is_category() || is_tag()) {
  $tax_headline = get_field("tax_headline", $term);
  $tax_intro = get_field("tax_intro", $term);
  $customHeading = $tax_headline ? $tax_headline : $customHeading;
  $heroCopy = $tax_intro ? $tax_intro : $heroCopy;
}

?>
<?php get_header(); ?>


<main class="entry-content">
  <section class="bg-light-gray">
    <div class="container">
      <div class="section-content">
        <div class="row">
          <div class="column">
            <h1 class="main-heading entry-title">
                <?= ($customHeading) ? $customHeading : the_title(); ?>
            </h1>
            <?php if($heroCopy) : ?>
            <div class="hero-block-copy copy content-block">
                <?= $heroCopy; ?>
            </div>
            <?php endif; ?>
          </div>
          <div class="column column--search-form"><?php get_search_form(); ?></div>
        </div>
      </div>
    </div>
  </section>

  <?php
  if ( have_posts() ):
    $post_count = 0;
  ?>

  <section class="main-content-wrapper">
    <div class="container">
      <div class="row">
        <div class="column column--articles">

          <?php if(is_tag()): ?>
            <div class="meta meta--tag">Showing articles tagged <strong><?php echo single_tag_title(); ?></strong></div>
            <div><a href="<?php print $posts_page; ?>">Return to blog</a></div>
          <?php endif; ?>

          <?php if(is_category() && 1==2): ?>
            <div class="meta meta--tag">
              <div>Showing articles in the <strong><?php echo single_cat_title(); ?></strong> category</div>
            </div>
          <?php endif; ?>

          <?php if(is_author()): ?>
            <?php
              $author_id = get_the_author_meta("ID");
              $author_firstname = get_the_author_meta("first_name", $resource->post_author);
              $author_lastname = get_the_author_meta("last_name", $resource->post_author);
              $author   = !empty($author_firstname) || !empty($author_lastname) ? $author_firstname . " " . $author_lastname : null;
            ?>
            <div class="meta meta--tag">
              <span>Showing articles authored by <strong><?php print $author; ?></strong></span><br>
              <a href="<?php print $posts_page; ?>">Return to blog</a>
            </div>
            <br>
          <?php endif; ?>

          <div class="blog-list">
        <div class="blog-group">
          <?php if($featured_article && count($featured_article) && $paged==1 && !is_author() && !is_category()): ?>
          <?php $featured_article = $featured_article[0]; ?>
          <div class="main-content-container container">
              <div id="post-<?php print $featured_article->ID; ?>" <?php post_class("post-content-wrapper featured-article-wrapper"); ?>>
                <div class="post-text-wrapper">
                  <div class="post-meta">
                    <div class="post-date"><?php print get_the_date("M j, Y", $featured_article->ID); ?></div>
                      <?php
                        $author_id = $featured_article->post_author;
                        $author_firstname = get_the_author_meta("first_name", $author_id);
                        $author_lastname = get_the_author_meta("last_name", $author_id);
                        $author_url = get_author_posts_url($author_id);
                        $author   = !empty($author_firstname) || !empty($author_lastname) ? $author_firstname . " " . $author_lastname : null;
                      ?>
                    <div class="post-author">by <a href="<?php print $author_url;?>"><?php print $author ?></a></div>
                  </div>
                  <h4 class="post-title post-title--preview"><a href="<?php print get_permalink($featured_article->ID); ?>"><?php print $featured_article->post_title; ?></a></h4>
                  <div class="entry-content">
                      <?php
                      // Show the featured image at top _with a caption_ if it exists.
                      // Will defer to the usage of the featured-image shortcode if present.
                      if ( $post_count == 0 && has_post_thumbnail($featured_article->ID) && !has_shortcode(get_the_content($featured_article->ID), 'featured-image') ) {
                          echo "<figure class='featured-image figure-feature'>";
                          print get_the_post_thumbnail($featured_article->ID);
                          $caption = get_the_post_thumbnail_caption();
                          if (!empty($caption)) {
                              echo "<figcaption class='wp-figcaption-text'>";
                              echo $caption;
                              echo "</figcaption>";
                          }
                          echo "</figure>";
                      }
                      ?>

                      <?php //the_content(); ?>
                  </div>
                  <?php
                  $excerpt  = get_the_excerpt($featured_article->ID);
                  if(strlen($excerpt)):
                  ?>
                  <div class='post-excerpt'><?php print $excerpt; ?></div>
                  <br>
                  <?php
                  endif;
                  ?>
                  <a href="<?php print get_the_permalink($featured_article->ID); ?>">Read more</a>
              </div>
            </div>
          </div>
          <?php endif; ?>
        <?php while ( have_posts() ) : the_post(); ?>

          <div class="main-content-container container">
              <div id="post-<?php the_ID(); ?>" <?php post_class("post-content-wrapper"); ?>>
                <?php
                // Show the featured image at top _with a caption_ if it exists.
                // Will defer to the usage of the featured-image shortcode if present.
                if (has_post_thumbnail() && !has_shortcode(get_the_content(), 'featured-image') ) {
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
                <div class="post-text-wrapper">
                  <div class="post-meta">
                    <div class="post-date"><?php print get_the_date("M j, Y"); ?></div>
                      <?php
                        $author_id = get_the_author_meta("ID");
                        $author_firstname = get_the_author_meta("first_name", $author_id);
                        $author_lastname = get_the_author_meta("last_name", $author_id);
                        $author_url = get_author_posts_url($author_id);
                        $author   = !empty($author_firstname) || !empty($author_lastname) ? $author_firstname . " " . $author_lastname : null;
                      ?>
                    <div class="post-author">by <a href="<?php print $author_url;?>"><?php print $author ?></a></div>
                  </div>
                  <h4 class="post-title post-title--preview"><a href="<?php print get_permalink(); ?>"><?php the_title(); ?></a></h4>
                  <div class="entry-content">

                  </div>
                  <?php
                  $excerpt  = get_the_excerpt(get_the_id());
                  if(strlen($excerpt)):
                  ?>
                  <div style="margin-bottom: 20px;" class="post-excerpt"><?php print $excerpt; ?></div>
                
                  <?php
                  endif;
                  ?>
                  <div style="display:flex; justify-content:space-between; align-items:center">
                    <div>
                      <a href="<?php print get_the_permalink(); ?>">Read more</a>
                    </div>
                  
                  </div>
                  
                </div>
              </div>
          </div>

    <?php
      $post_count++;
      endwhile;

      ?>
        </div>
      </div>

      <?php
      armory_numeric_posts_nav();
      ?>

      </div>
      <div class="column column--tags">
        <?php
        if(function_exists("mailchimpSF_signup_form")):
        ?>
        <h5>Subscribe</h5>
        <?php
          mailchimpSF_signup_form();
        endif;
        ?>

      <?php
      $tags = get_categories(array("exclude"=>1));
      if($tags && count($tags)):
      ?>
      <h5>Categories</h5>
      <nav class="tag-list">
        <?php if(is_category() && 1==2): ?>
          <div class="box">
            <a href="<?php print $posts_page; ?>">Return to blog</a>
          </div>
        <?php endif; ?>
        <ul>
          <?php if(is_category() || is_author() || is_tag()): ?>
            <li><a href="<?php print $posts_page; ?>">All posts</a></li>
          <?php endif; ?>
        <?php
          foreach($tags as $tag):
            $tag_url = get_term_link($tag);
            print "<li>";
            print "<a href='{$tag_url}'>{$tag->name}</a>";
            print "</li>";
          endforeach;
        ?>
        </ul>
      </nav>
      <?php
      endif;
      ?>
      </div>
    </div>
  </section>

  <?php endif; ?>
    </main>

<?php /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ begin footer */ ?>
<?php get_footer(); ?>
