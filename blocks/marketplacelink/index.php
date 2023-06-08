<?php 
    $aws = array(
        // array(
            'name' => 'AWS Marketplace',
            'link' => 'https://aws.amazon.com/marketplace/seller-profile?id=8f01205a-7fb2-4758-90e4-cf815510e350&ref=dtl_B089DHBZXM',
            'logo' => 'aws-marketplace'
        // )
    );
?>
<div class="flex justify-center">
    <div class="w-11/12 sm:w-7/12 md:w-11/12">
        <div class="bg-white w-full shadow hover:shadow-lg rounded-lg transition duration-200 transform -translate-y-1 relative group ">
            <a target="_blank" href="<?php echo $aws['link']; ?>" class="absolute w-full h-full inset-0 z-50"></a>
            <div class="flex justify-center">
                <div class="w-11/12 md:w-8/12">
                    <img class="lazy mx-auto" data-src="<?php echo get_template_directory_uri() ?>/assets/src/images/logos/<?php echo $aws['logo'] ?>.jpg" alt="<?php echo $aws['name'] ?> logo">
                </div>
            </div>
            <div class="text-center pb-6">
                <p class="text-sm m-0">Find Armory on the <span class="font-bold block"><?php echo $aws['name']; ?> <span class="transform inline-block transition-transform group-hover:translate-x-0.5">&#8594;</span></span></p>
            </div>
        </div>
    </div>
</div>


