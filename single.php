<?php 
  get_header(); 
  $post_type = get_queried_object()->post_type;
  $post_type_label = get_post_type_object( $post_type )->label;

  if ( have_posts() ) : 
    while ( have_posts() ) : 
      the_post();
      $authors = get_coauthors( get_the_ID() );
          
?>

<section class="entry-content">
  <div class="container pt-32">
    <div class="mb-6">
      <a class="breadcrumb text-sm" href="<?php echo get_post_type_archive_link($post_type) ?>">
        &#8592; Back to <?php echo strtolower( $post_type_label ); ?>
      </a>
    </div>

    
    <?php 
      if( has_post_thumbnail() ) :
    ?>
    <div class="mb-6">
      <img class="block mx-auto" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title() ?> hero graphic">
    </div>
    <?php 
      endif;
    ?>
    <div class="flex justify-center">
      <div class="w-full md:w-11/12 lg:w-9/12">
        <div class="mb-6">
          <h1 class="text-3xl md:text-5xl"><?php the_title(); ?></h1>
        </div>
        <?php 
            if( $post_type === 'post' ) : 
        ?>
        <div class="flex justify-between flex-wrap items-center mb-6">
          <div>
            <p class="m-0"><span class="font-bold"><?php echo get_the_date("M j, Y"); ?></span> by 
            
            <?php 
              foreach ($authors as $i => $author ) :
            ?>

            <a href="<?php echo get_author_posts_url( $author->ID ); ?>"><?php echo $author->display_name; ?></a><?php
                if( $i + 1 === count( $authors ) ) : 
                  echo "";
              
                elseif($i < count( $authors ) ) :
                
                  echo ", "; 

                endif;
              
              endforeach;
            ?>
           </p>
           
          </div>
         
        </div>
        <?php 
          endif;
        ?>
           
      </div>
    </div>
    
  </div>
  <div class="prose max-w-none blog-post">
      <?php the_content(); ?>
    </div>
</section>

<?php 
      if( $post_type === 'post' ) : 
?>
<section class="pt-20">
    <div class="container">
      <div class="text-center mb-12">
          <h2 class="font-asBold">Recently Published Posts</h2>
      </div>
      <div class="flex flex-wrap justify-center lg:justify-start -mx-6 mb-6">

      <?php 
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 3,
          'post_status' => array('publish'),
          'post__not_in' => array( get_the_id() )
        );
        $related_posts = new WP_Query( $args );
        if( $related_posts->have_posts() ) :
          while( $related_posts->have_posts() ) :
            $related_posts->the_post();
      ?>
        <div class="w-11/12 sm:w-7/12 lg:w-1/3 px-6">
        <?php 
          blog_card( get_the_id() );
        ?>
        
        </div>

      <?php 
            endwhile;
            wp_reset_postdata();
          
        endif;
        
    ?>

    </div>
  </div>
</section>

<?php
      endif;
    endwhile; 

  endif; 

  get_footer(); 
?>
