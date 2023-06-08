<?php get_header(); ?>
<?php /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ end header */ ?>

<?php the_post(); ?>

<div id="page-<?php the_ID(); ?>" <?php post_class("page-wrapper"); ?>>

    <?php
        // The hero for each page
        get_template_part( 'template-parts/acf/hero' );
    ?>

    <?php
        // The actual flexible content template logic has been abstracted to this file:
        get_template_part( 'template-parts/template', 'flexible-content' );
    ?>

</div><!-- #page-<?php the_ID(); ?> -->


<?php /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ begin footer */ ?>
<?php get_footer(); ?>
