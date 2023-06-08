<?php 
print_r($attributes);
?>
<a
    title="Link to <?php echo $attributes['linkObject']['title']; ?> <?php echo $attributes['linkObject']['type']; ?>"
    href="<?php echo $attributes['linkObject']['url']; ?>"
    style="background-color: <?php echo $attributes['bgHex'] ?>;color: <?php echo $attributes['textColor']; ?>"
    class="btn hover:bg-opacity-80 transition-all duration-200 text-center"
>
    <?php echo $attributes["text"] ?>
</a>