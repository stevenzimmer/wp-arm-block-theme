<?php 
    if(!isset($attributes["textAlign"])) :
        $attributes["textAlign"] = "right";
    endif;
    if(!isset($attributes["textColor"])) :
        $attributes["textColor"] = "black";
    endif;
    if(!isset($attributes["text"])) :
        $attributes["text"] = "Add link text...";
    endif;
    if(!isset($attributes["linkObject"])) :
        $attributes["linkObject"]["url"] = "#";
        $attributes["linkObject"]["title"] = "";
        $attributes["linkObject"]["type"] = "";

    endif;
    // print_r($attributes);
?>
<a 
    class="group block m-0 no-underline hover:no-underline hover:opacity-80 transition-all duration-200 font-bold text-[16px]" 
    style="color: <?php echo $attributes["textColor"]; ?>; text-align: <?php echo $attributes["textAlign"]; ?>" 
    href="<?php echo $attributes['linkObject']['url']; ?>"
>
        <?php echo $attributes['text']; ?>
    <span class="transform inline-block transition-transform group-hover:translate-x-0.5 text-xs">&#8594;</span>
</a>
