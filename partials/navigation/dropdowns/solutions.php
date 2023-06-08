<?php 
require get_theme_file_path( "/partials/navigation/inc/solutions.php" );
require get_theme_file_path( "/partials/navigation/inc/learn-more.php" );



?>
<div class="flex justify-center flex-wrap">
    <div class="w-11/12 lg:w-3/4">
        <div class="flex justify-center flex-wrap">
        <?php 
            foreach( $solutions as $i => $solution ) :
        ?>
            <div class="w-full lg:w-1/3">
                <?php 
                    echo dropdownCol($solution);
                ?>
            </div>
        <?php 
            endforeach;
        ?>
        </div>
    </div>
    <div class="w-full lg:w-1/4">
        <?php  echo learn_more_col($learn_more) ?>

    </div>
</div>
