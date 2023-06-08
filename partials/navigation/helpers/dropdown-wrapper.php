<?php 
    function dropdownWrapper($children, $width = "lg:w-[892px]") {
        ob_start();
?>
<div class="dropdown dropdown-products lg:opacity-0 lg:absolute overflow-hidden left-0 lg:rounded-lg transition-all transform lg:hidden will-change-transform <?php echo $width; ?> ">
<?php echo $children; ?>
</div>
<?php
    return ob_get_clean();
    }
?>