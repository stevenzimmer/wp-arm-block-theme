<?php 
function dropdownHeader($title = "", $link = "#", $color= "green") {
   
?>
<a href="<?php echo $link; ?>" class="block font-avenirDemi font-semibold hover:opacity-50 text-[12px] dropdown-header <?php 
    

    if($color === "blue") :

        echo "text-blue-navy";

    else :
        echo "text-[#00BAA4]";
    
    endif;
?>"><?php echo $title; ?></a>
<?php
}
// return ob_get_clean();
?>
