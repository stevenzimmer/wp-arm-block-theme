<?php
    $marketo_form_id = isset($attributes["marketoFormID"]) ? $attributes["marketoFormID"] : "";
?>
<div class="bg-blue-primary p-6 text-white rounded-lg">
    <?php 
        if( !isset($_GET["aliId"]) ) :
    ?>
    <form class="mktoForm" data-formid="<?php echo $marketo_form_id; ?>"></form>
    <?php
    
        else :
    ?>
    <div class="text-center text-white">
        <h2 class="text-white">Thank you for contacting us.</h2>
        <p>We will get back to you shortly.</p>
    </div>

    <?php 
        endif;
    ?>
</div>