<?php 
require get_theme_file_path( "/partials/navigation/inc/company.php" );
require get_theme_file_path( "/partials/navigation/inc/learn-more.php" );

?>

<div class="flex justify-center flex-wrap">
    <div class="w-11/12 lg:w-1/2">
        <div class="flex justify-center flex-wrap">
        <?php 
            foreach( $companys as $i => $company ) :
        ?>
            <div class="w-full">
                <?php 
                    echo dropdownCol($company);
                ?>
            </div>
        <?php 
            endforeach;
        ?>
        </div>
    </div>
    <div class="w-full lg:w-1/2">
        <?php  echo learn_more_col($learn_more) ?>

    </div>
</div>
