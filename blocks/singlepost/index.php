<?php 
    while( have_posts() ) :
        the_post();
?>
<article class="prose max-w-none">
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
</article>
<?php 
    endwhile;
?>