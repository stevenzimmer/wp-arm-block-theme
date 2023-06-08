<?php 
function menuItem($item) {
    ob_start();
?>
<li class="relative menu-item m-0  <?php echo isset($item["dropdown"]) && $item["dropdown"] ? "has-dropdown" : "" ?>">
    <a <?php 
        if( isset( $item["link"] ) ) :
    ?>
        href="<?php echo $item["link"]; ?>"

    <?php
        endif;
    ?> class="text-white no-underline hover:no-underline hover:text-[#4AC1E0] py-5 px-2 lg:px-3 xl:px-4 cursor-pointer  font-semibold block select-none lg:text-[12px] xl:text-[14px]"><?php echo $item["title"]; ?> <?php 
        if (isset($item["dropdown"]) && $item["dropdown"]) :
    ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline dropdown-pointer origin-center transform rotate-180 transition-transform" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
        </svg>
    <?php 
        endif;
    ?>
    
    </a>
    <?php 
        if( isset($item["dropdown"])) :
            $file_path = strtolower($item["title"]);
    ?>
    <div class="dropdown shadow-lg bg-white lg:opacity-0 lg:absolute overflow-hidden left-0 transition-all transform  lg:hidden will-change-transform  dropdown-<?php echo $file_path; ?> <?php echo $item["dropdown_width"]; ?>">
    <?php
            require get_theme_file_path( "/partials/navigation/dropdowns/{$file_path}.php" );
    ?>
    </div>
    <?php
        endif;
    ?>
</li>
<?php
return ob_get_clean();
}
?>