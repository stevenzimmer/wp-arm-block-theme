<?php 
function learn_more_col($learn_more) {
    ob_start();
?>
<div class="hidden h-full lg:block bg-grey-100  w-full">
        <?php 
            foreach( $learn_more as $i => $learn ) :
        
                echo dropdownCol($learn);
            
            endforeach;
        ?>
        </div>
<?php
return ob_get_clean();
}
?>