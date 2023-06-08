<div class="mb-12">
<?php 
    while(have_posts()) :
        the_post();
        $excerpt  = get_the_excerpt(get_the_id());
?>
<div class="py-6 border-b">
    <div>
        <div class="post-meta">
            <div class="post-date"><?php print get_the_date("M j, Y"); ?></div>
            <?php
                $authors = get_coauthors( get_the_ID() );
            ?>
            <div class="post-author">by <?php 
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
            </div>
        </div>
        <div class="mb-3">
        <a href="<?php the_permalink() ?>" class="no-underline block hover:no-underline ">
            <h3 class="text-blue-lighter font-asBold hover:text-opacity-70 duration-200 transition-all"><?php the_title() ?></h3>
        </a>
        </div>
    
        <?php
           
            if(strlen($excerpt)):
        ?>
        <div  class="mb-3 prose max-w-none"><?php print $excerpt; ?></div>
    
        <?php 
            endif;
        ?>
        <div class="">
            <a class="text-blue-lighter no-underline" href="<?php the_permalink() ?>">Read more</a>
        </div>
    </div>
</div>
<?php
    endwhile;
?>
</div>
<div class="flex justify-center">

    <div class="px-6 w-1/2">
        <div class="nav-next text-right"><?php previous_posts_link( 'Previous page' ); ?></div>
    </div>
    <div class="px-6 w-1/2">
        <div class=""><?php next_posts_link( 'Next page' ); ?></div>
    </div>
</div>

 
