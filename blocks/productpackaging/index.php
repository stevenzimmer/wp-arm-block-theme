<?php 
include get_template_directory() . "/inc/pricing-meta.php";

$packages = array(
    "community" => array(
        "icon" => "pricing-community-icon.png",
        "description" => "Free declarative deployments to Kubernetes with GitOps best practices using <strong>CD-as-a-Service</strong> or open source <span class='text-a-blue font-bold'>Spinnaker</span> contributions, all from the leading Continuous Deployment and Spinnaker experts.",
        
        "cards" => array(
            array(
                "id" => "cdaas",
                "title" => "CD-as-a-Service",
                "description" => "Experience hassle-free Continuous Deployment at no cost.",
                "bullets" => array(
                    "Up to 25 Application Targets  per Month*",
                    "Up to 1000 Deployments per Month",
                    "Multiple Environment Orchestration",
                    "Blue/Green and Canary Deployments",
                    "Automated Canary Analysis",
                    "Automated Rollbacks"
                ),
                "button" => array(
                    "style" => "bg-a-yellow", 
                    "link" => "/products/continuous-deployment-as-a-service/",
                    "text" => "Get Started"
                ),
                "table_title" => "CD-as-a-Service",
                
                "table" => $products->cdaas->table,
                "pricing" => "FREE",
                // "measurement" => "per User per Month Paid Annually",
            ),
            array(
                "id" => "selfhosted",
                "title" => "Open Source Spinnaker",
                "description" => "Armory Contributed to OSS Spinnaker",
                "bullets" => array(
                    "Flexible and Powerful Pipelines",
                    "Custom Deployment Stages",
                    "Support for Multiple Environments",
                    "Multiple Deployment Targets (EC2, K8s, Lambda, ECS, etc.)",
                    "Blue/Green and Canary Deployments",
                    "Automated Canary Analysis",
                    "Automated Rollbacks",
                ),
                "button" => array(
                    "style" => "bg-white", 
                    "link" => "https://spinnaker.io/",
                    "text" => "Learn More"
                ),
                "table_title" => "CD Self-Hosted Powered by Spinnaker",
                "table" => $products->selfhosted->table,
                // "pricing" => "$250.00",
                // "measurement" => "per User per Month Paid Annually",

            )
        ),
    ),
    "team" => array(
        "icon" => "pricing-team-icon.png",
        "description" => "Declarative deployments to Kubernetes with GitOps best practices using <strong>CD-as-a-Service</strong> or Essential <span class='text-a-blue font-bold'>Spinnaker</span> support and powerful plugins.",
        "subparagraph" => "Continuous Deployment solutions with more flexibility and power for you and your organizations.",
        "cards" => array(
            array(
                "id" => "cdaas",
                "title" => "CD-as-a-Service",
                "description" => "More power and flexibility for you and your teams.",
                "bullets" => array(
                    "<strong>Free+</strong>",
                    "Up to Unlimited Application Targets*",
                    "Unlimited Deployments",
                    "Enterprise Support",
                    "SLA 99.5%"
                ),
                "button" => array(
                    "style" => "bg-a-yellow", 
                    "link" => "https://go.armory.io/signup",
                    "text" => "Try for Free"
                ),
                "table_title" => "CD-as-a-Service",
                "table" => $products->cdaas->table,
                "tooltip" => "An Application Target is an Application or Service being deployed to a namespace running on a cluster (application x namespace x cluster)",
                "pricing" => "$10.00",
                "measurement" => "per Application Target per Month",
            ),
            array(
                "id" => "selfhosted",
                "title" => "ESSENTIALS",
                "subtitle" => "Powered by Spinnaker",
                "description" => "Expert support and everything you need to get started deploying with Spinnaker",
                "bullets" => array(
                    "<strong>Open Source +</strong>",
                    "1 Premium Plugin",
                    "Optimized Base Configs",
                    "Support: 8x5, 60 min P0, 12 hr P1
                    ",
                    "Secrets Management"
                    
                ),
                "button" => array(
                    "style" => "bg-white", 
                    "link" => "/contact-us/",
                    "text" => "Contact Us"
                ),
                "table_title" => "CD Self-Hosted Powered by Spinnaker",
                "table" => $products->selfhosted->table,
                "pricing" => "$2.50",
                "tooltip" => "Successful Pipeline Executions are any pipeline that executes with a status of 'succeeded'",
                "measurement" => "per Successful Pipeline Execution per Month Paid Annually",
            )
        ),
    ),
    "enterprise" => array(
        "icon" => "pricing-enterprise-icon.png",
        "description" => "<strong>CD-as-a-Service</strong> or fully managed <span class='text-a-blue font-bold'>Spinnaker</span> solutions with more flexibility and capability for you and your organizations.",
        "subparagraph" => "The added governance and deployment expertise to keep you efficient and running smoothly.",
        "cards" => array(
            array(
                "id" => "cdaas",
                "title" => "CD-as-a-Service",
                "description" => "The added security and governance that all Enterprises need.",
                "bullets" => array(
                    "<strong>Team+</strong>",
                    "Traffic Management",
                    "Centralized Environment Definition",
                    "Role-Based Access Control",
                    "Single Sign-on",
                    "SLA 99.9%"
                ),
                "button" => array(
                    "style" => "bg-a-yellow", 
                    "link" => "https://go.armory.io/signup",
                    "text" => "Try for Free"
                ),
                "table" => $products->cdaas->table,
                "pricing"=> "CONTACT SALES",
                "table_title" => "CD-as-a-Service",
                "tooltip" => "An Application Target is an Application or Service being deployed to a namespace running on a cluster (application x namespace x cluster)",
                "measurement" => "Up to Unlimited Application Targets per Month Paid Annually",
                
            ),
            array(
                "id" => "selfhosted",
                "title" => "ENTERPRISE",
                "subtitle" => "Powered by Spinnaker",
                "description" => "The added security and governance that all Enterprises need.",
                "bullets" => array(
                    "<strong>Essentials+</strong>",
                    "3 Premium Plugins",
                    "Support: 11x5, 60 min P0, 8 hr P1",
                    "Solutions Architect and Success Manager",
                    "Annual SRE Ops and Business Review"
                ),
                "button" => array(
                    "style" => "bg-white", 
                    "link" => "/contact-us/",
                    "text" => "Contact Us"
                ),
                "table_title" => "CD Self-Hosted Powered by Spinnaker",
                "table" => $products->selfhosted->table,
                "pricing" => "$3.75",
                "tooltip" => "Successful Pipeline Executions are any pipeline that executes with a status of 'succeeded'",
                "measurement" => "per Successful Pipeline Execution per Month Paid Annually",
            ),
            array(
                "id" => "selfhosted",
                "title" => "PREMIUM",
                "subtitle" => "Powered by Spinnaker",
                "description" => "Fully managed Spinnaker in your cloud.",
                "bullets" => array(
                    "<strong>Enterprise +</strong>",
                    "All Premium Plugins",
                    "Support: 24x7 P0, 24x5 P1-3 30 min P0, 4 hr P1",
                    "Fully Managed Spinnaker in Your cloud (optional)",
                ),
                "button" => array(
                    "style" => "bg-white", 
                    "link" => "/contact-us/",
                    "text" => "Contact Us"
                ),
                "table_title" => "CD Self-Hosted Powered by Spinnaker",
                "tooltip" => "Successful Pipeline Executions are any pipeline that executes with a status of 'succeeded'",
                "table" => $products->selfhosted->table,
                "pricing"=> "CUSTOM",
                "measurement" => "Up to Unlimited Successful Pipeline Execution per Month Paid Annually",
            ),
        ),
    )
);

?>
<section class="mb-3">
    <div class="grid lg:grid-cols-3 gap-x-2 ">

    <?php 
        foreach ($packages as $i => $package) :
         
            $first = $i === "community";
         
    ?>
    <div class="bg-white rounded-b-2xl lg:rounded-b-none rounded-t-2xl package-card px-3 <?php if($first) : echo "active"; endif; ?> relative pb-3 lg:pb-0" id="<?php echo $i; ?>">
        <div class="py-2"></div>
        <div class="package-card-inner border p-6 bg-white rounded-2xl shadow">
            <div class="mb-6">
                <img class="mx-auto h-20 block" src="<?php echo get_theme_file_uri( 'src/images/icons/' . $package["icon"]) ?>" alt="<?php echo $i; ?> icon">
            </div>
            <div class="text-center mb-6">
                <h3 class="font-asBold "><?php echo ucfirst($i); ?></h3>
            </div>
            <div class="text-center lg:h-48">
                <p class="text-[18px] text-a-primary">
                    <?php echo $package["description"]; ?>
                </p>
            </div>
            <div class="text-center lg:h-20 mb-12">
                <?php 
                    if( isset($package["subparagraph"])) :
                ?>
                <p class="text-[14px] text-a-primary">
                    <?php echo $package["subparagraph"]; ?>
                </p>
                <?php endif; ?>
            </div>
            <div class="mx-auto w-12 h-12 package-toggle-btn flex items-center justify-center border border-a-yellow rounded-full bg-a-yellow cursor-pointer relative">
                <!-- <a class="absolute w-full h-full inset-0" href="#package-<?php echo $i; ?>"></a> -->
                 
                <div class="close hidden">
                    <svg width="12" height="4" viewBox="0 0 12 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 2H12" stroke="#263D5C" stroke-width="2.5"/>
                    </svg>
                </div>
                <div class="open">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.26562 4.76172H11.8008V7.32812H7.26562V11.8398H4.69922V7.32812H0.164062V4.76172H4.69922V0.191406H7.26562V4.76172Z" fill="#263D5C"/>
                    </svg>
                </div>
            </div>
        </div>
      
        <div class="tile-floater absolute w-full h-12 z-10 -bottom-6 right-0 left-0 px-3 hidden bg-a-yellow ">
            <div class="bg-white w-full h-full ">

            </div>
        </div>
    </div>

    <?php

    endforeach;
?>
        
    </div>
</section>
<?php 
    foreach ($packages as $i => $package) :
        $first = $i === "community";

        $column_count = count($package["cards"]);

?>
<section class="package-product hidden scroll-my-20 rounded-b-2xl relative <?php if($first) : echo "active"; endif; ?> " id="package-<?php echo $i; ?>">
    <div class="bg-a-yellow p-3 rounded-b-2xl package-product-wrapper-<?php echo $i; ?>">
        <div class="grid  bg-white <?php 
            if( $column_count > 2 ) : 
                echo "md:grid-cols-3";
            else : 
                echo "md:grid-cols-2 ";
            endif;
        ?>">

        <?php
            
            foreach ($package["cards"] as $j => $card) :
                $table_id = str_replace(" ", "-", strtolower($card["title"]));
                
        ?>
            <div class="package-product-inner py-12 bg-white relative border-b-2 border-a-yellow md:border-transparent md:rounded-2xl <?php 
                    if( $column_count > 2 ) : 
                        echo "px-6";
                    else : 
                        echo "px-12";
                    endif;
                ?>" id="package-product-inner-<?php echo $i . "-" .  $table_id; ?>">
                
                <div class="text-center mb-6">
                    <h3 class="font-asBold mb-2 text-a-primary text-[24px] lg:text-[32px]"><?php echo $card["title"]; ?></h3>
                   
                    <div class="lg:h-6 mb-2">
                    <?php 
                        if( isset( $card["subtitle"] ) ) :
                    ?>
                        <p class="font-bold text-a-primary text-[14px]"><?php echo $card["subtitle"]; ?></p>
                        <?php 
                        endif;
                    ?>
                    </div>
                   
                    <div class="lg:h-20">
                        <p class="text-[18px] lg:text-[22px] text-[#2A5B9D] font-asMedium">
                            <?php echo $card["description"]; ?>
                        </p>
                    </div>
                            
                </div>
                <div class="mb-12 lg:h-48 <?php 
                    if( $column_count > 2 ) : 
                        echo "px-6";
                    else : 
                        echo "px-12";
                    endif;
                ?>">
                    <?php
                        foreach ($card["bullets"] as $k => $bullet) :
                    ?>
                    <div class="flex mb-2 last:mb-0">
                        <div class="mt-1">
                            <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 5.5L3.31818 10L6.79546 1" stroke="#0E6027" stroke-width="2" stroke-linecap="round"/>
                            </svg>

                        </div>
                        <div class="px-2 w-full">
                            <p class="text-[14px] lg:text-[16px] text-a-primary">
                            <?php echo $bullet; ?>
                            </p>
                        </div>
                    </div>
                    <?php
                        endforeach;
                    ?>
            
                </div>
                <div class="text-center h-24 flex items-end justify-center mb-6">
                    <?php 
                        if(isset($card["pricing"])) :
                    ?>
                    <div class="">
                        <?php 
                            if( $card["pricing"] !== "FREE" && $card["pricing"] !== "CUSTOM" && $card["pricing"] !== "CONTACT SALES" ) : 
                        ?>
                        <p class="m-0 text-[12px] text-[#263D5C]">Starting at</p>
                        <?php 
                            endif; 
                        ?>
                        <p class="m-0 text-[26px] font-os font-bold text-[#263D5C] "><?php echo $card["pricing"]; ?></p>

                       
                        <div class="relative flex ">
                            <?php 
                                if( isset($card["tooltip"]) ) :
                            ?>
                            <div class="group cursor-default w-8">
                                <span class="text-[12px] inline-block ">&#9432;</span>
                       
                                <div class="absolute z-20 w-full h-full left-0 right-0 bottom-12 opacity-0 invisible group-hover:visible  group-hover:opacity-100 transition-opacity duration-200">
                                    <div class="bg-white shadow-lg p-3 rounded-lg w-full">
                                        <p class="m-0 text-[12px] text-left"><?php echo $card["tooltip"]; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                                endif;
                    
                            ?>
                            <?php 
                                if( isset($card["measurement"]) ) :
                            ?>
                            <p class="m-0 text-[12px] text-[#263D5C] w-full text-left"><?php echo $card["measurement"]; ?></p>
                            <?php 
                                endif;
                            ?>
                        </div>
                 
                       
                    </div>

                    <?php
                  
                        endif;
                    ?>
                </div>
                <div class="text-center mb-12">
                    <a href="<?php echo $card["button"]['link']; ?>" class="btn btn-sm border border-a-yellow text-a-primary <?php echo $card["button"]["style"]; ?>"><?php echo $card["button"]["text"]; ?></a>
                </div>
                <div class="flex items-center justify-center cursor-pointer group toggle-features packaging relative" id="<?php echo $i . "-" . $table_id; ?>">
                    <!-- <a href="#package-table-<?php // echo $i . "-" . $table_id ?>" class="absolute w-full h-full inset-0"></a> -->
                    <div class="px-3 toggle-features-caret origin-center rotate-180 transition-transform duration-200">
                        <svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.4845 0.413278L9.56253 5.34775C9.54437 5.36596 9.53524 5.37507 9.51708 5.38417C9.48984 5.41149 9.45353 5.4388 9.4172 5.46611C9.38996 5.48432 9.36275 5.50252 9.3355 5.52073C9.29918 5.54805 9.27184 5.56625 9.23551 5.58446C9.20827 5.60267 9.18105 5.61178 9.14472 5.62999C9.11748 5.63909 9.09935 5.6573 9.07211 5.6664C9.05395 5.6755 9.04482 5.67551 9.02666 5.67551C8.99942 5.68461 8.96311 5.69371 8.93587 5.70282C8.89955 5.71192 8.85414 5.73013 8.81781 5.73924C8.78149 5.74834 8.75426 5.74834 8.72702 5.75744C8.68162 5.75744 8.64528 5.76655 8.59987 5.76655C8.56355 5.76655 8.53632 5.76655 8.49999 5.76655C8.46367 5.76655 8.41826 5.76655 8.38193 5.76655C8.34561 5.76655 8.31838 5.75744 8.28205 5.75744C8.24573 5.74834 8.2094 5.74834 8.16399 5.73924C8.12767 5.73013 8.10044 5.72103 8.06411 5.71192C8.02779 5.70282 7.98238 5.68461 7.94605 5.67551C7.93697 5.67551 7.92785 5.6664 7.90969 5.6664C7.89153 5.6573 7.87342 5.64819 7.85526 5.63909C7.81894 5.62088 7.78262 5.60267 7.74629 5.58446C7.70997 5.56625 7.68263 5.54805 7.65539 5.52073C7.62815 5.50252 7.60093 5.48432 7.57369 5.457C7.53737 5.42969 7.51014 5.40238 7.4829 5.37507C7.46474 5.35686 7.44653 5.34775 7.43745 5.33865L2.50642 0.395072C1.91614 -0.142075 1.008 -0.132974 0.43588 0.431486C0.145281 0.722821 0 1.1052 0 1.49668C0 1.87906 0.145281 2.26143 0.43588 2.55277L7.43745 9.5721C7.45561 9.59031 7.47382 9.59942 7.4829 9.60852C7.51014 9.63583 7.54645 9.66314 7.57369 9.69046C7.60093 9.70867 7.62815 9.72687 7.65539 9.75419C7.68263 9.7724 7.71905 9.7906 7.74629 9.81792C7.78262 9.83612 7.81894 9.85433 7.85526 9.87254C7.87342 9.88165 7.89153 9.89075 7.90969 9.89985C7.91877 9.90896 7.92789 9.90896 7.94605 9.90896C7.98238 9.92716 8.01871 9.93627 8.06411 9.94537C8.10044 9.95448 8.12767 9.96358 8.16399 9.97268C8.20032 9.98179 8.23665 9.99089 8.28205 9.99089C8.31838 10 8.34561 10 8.38193 10C8.41826 10 8.46367 10 8.49999 10C8.52724 10 8.56355 10 8.59987 10C8.64528 10 8.68162 9.99089 8.72702 9.99089C8.75426 9.98179 8.79057 9.98179 8.81781 9.97268C8.85414 9.96358 8.89955 9.95448 8.93587 9.93627C8.96311 9.92717 8.99942 9.91806 9.02666 9.90896C9.04482 9.89985 9.05395 9.89985 9.07211 9.89985C9.09935 9.89075 9.11748 9.87254 9.14472 9.86344C9.17196 9.84523 9.20827 9.83612 9.23551 9.81792C9.27184 9.79971 9.30826 9.7724 9.3355 9.75419C9.36275 9.73598 9.38996 9.71777 9.4172 9.69956C9.45353 9.67225 9.48076 9.64493 9.51708 9.61762C9.53524 9.60852 9.54437 9.59031 9.56253 9.58121L16.5641 2.56187C17.1453 1.9701 17.1453 1.02326 16.5641 0.440593C15.992 -0.132972 15.0657 -0.142079 14.4845 0.413278Z" fill="#263D5C"/>
                        </svg>

                    </div>
                    <div>
                        <p class="font-as text-blue-primary text-[18px] lg:text-[24px]">Features Comparison</p>
                    </div>
                </div>
                <?php 
             
                    if($j !== $column_count - 1 ) :
                ?>
                <div class="absolute w-[2px] h-full right-0 top-0 bottom-0 py-12 hidden md:block">
                    <div class="h-full w-full bg-a-yellow"></div>
                </div>
                <?php endif; ?>
            </div>
        <?php
            endforeach;
    ?>
        </div>
    </div>
</section>
<?php
    endforeach;

?>
<div class="px-6 mt-3">
<p>* An Application Target is an Application or Service being deployed to a namespace running on a cluster (application x namespace x cluster)</p>
<p>** Successful Pipeline Executions are any pipeline that executes with a status of 'succeeded'</p>
</div>


<section class="py-6">
<?php 
    foreach ($packages as $i => $package) :
        
        foreach ($package["cards"] as $j => $card) :

            $table_id = str_replace(" ", "-", strtolower($card["title"]));
    ?>
    <div class="package-table hidden scroll-my-20 " id="package-table-<?php echo $i . "-" . $table_id ?>">
        
        <div class="text-center">
            <h3 class="font-asBold mb-6"><?php echo $card["table_title"]; ?> Features Comparison</h3>    
        </div>
        <?php pricing_table($card["id"], $card["table"]); ?>
        
    </div>

          
    <?php
            endforeach;
        endforeach;

?>

</section>