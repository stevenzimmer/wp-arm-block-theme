<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <?php /* Meta Tags */ ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <?php wp_head(); ?>
</head>


<body <?php body_class("overflow-x-hidden"); ?>>
    
<?php 
   require get_theme_file_path( "/partials/navigation/index.php" );
?>
