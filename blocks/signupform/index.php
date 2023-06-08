<?php

$fields = array(
    array(
        "type" => "text",
        "name" => "userName",
        "placeholder" => "Full name",
        // "value" => "test"
    ),
    array(
        "type" => "email",
        "name" => "userEmail",
        "placeholder" => "Company Email",
        // "value" => "testing_signup_api+" . current_time("His") . "@gmail.com"

    ),
    array(
        "type" => "text",
        "name" => "companyName",
        "placeholder" => "Company Name",
        // "value" => "Armory"
    ),
);

?>
<div class="px-6">
    <div class="signup-form-wrapper">
        <h3 class="text-center text-white mb-6"><strong>Get Started for Free</strong></h3>
        <form class="signup-form" autocomplete="off" >
            <?php 
                foreach ($fields as $i => $field) :
            ?>
            <input autocomplete="off" placeholder="<?php echo $field["placeholder"]; ?>" required type="<?php echo $field["type"] ?>" name="<?php echo $field["name"] ?>" class="w-full p-3 mb-2 border disabled:opacity-75 disabled:bg-slate-200 rounded">
            <?php
                endforeach;
            ?>   
            <div class="signup-form-error text-red-500 hidden mb-2 font-bold"></div>
            <div class="text-white mb-6 text-[12px]">By submitting this form, you agree to Armory's <a class="text-white" href="/privacy-policy/" target="_blank">Privacy Policy</a> &amp; <a class="text-white" href="/terms-and-conditions/" target="_blank">Terms &amp; Conditions</a>.</div>
            <div class="flex items-center btn-wrapper">
                <div>
                    <input type="submit" class="btn btn-mini btn-yellow " value="Sign up">
                </div>
                <div class="px-3 hidden btn-status">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </div>
           
        </form>
    </div>
    
    <div class="signup-form-success text-white hidden text-center">
        <h2 class="text-white">Thank you!</h2>
        <p class="text-[20px]">Please check your email to complete your free trial sign up</p>
    </div>
    
</div>