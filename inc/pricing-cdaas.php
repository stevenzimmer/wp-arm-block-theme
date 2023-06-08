<?php 
$tiers = array(
    array(
        "title" => "Free",
        "description" => "Experience hassle-free Continuous Deployment at no cost",
        "bullets" => array(
            "Up to 25 Application Targets per Month",
            "Up to 1000 Deployments per Month", 
            "Blue/Green and Canary Deployments", 
            "Automated Impact Analysis",    
            "Automated Rollbacks"
        ),
        // "pricing" => "$250.00",
        // "measurement" => "User",
    ),
    array(
        "title" => "Team",
        "bullets" => array(
            "Free+",
            "Up to Unlimited Application Targets",
            "Unlimited Deployments",
            "Enterprise Support",
            "SLA 99.5%"
        ),
        "description" => "More power and flexibility for you and your teams",
        "pricing" => "$10.00",
        "measurement" => "per Application Target per Month"
    ),
    // array(
    //     "title" => "Project Borealis",
    //     "table_header" => "Project Borealis",
    //     "url" => "/armory-design-partners/",
    //     "description" => "Focus on building great code, not deploying it.",
    //     "icon" => "project-borealis.png",
    //     "pricing" => "$10.00",
    //     "measurement" => "Application Target",
        
    // ),
    array(
        "title" => "Enterprise",
        "table_header" => "Armory Agent for Kubernetes",
        "url" => "/armory-enterprise-spinnaker/armory-agent-for-kubernetes/",
        "description" => "The added security and governance that all Enterprises need",
        "bullets" => array(
            "Team+",

            "Traffic Management", 
            "Centralized Environment Definition",
            "Role Based Access Control",
            "Single Sign-on",
            "SLA 99.9%"
        ),
        "measurement" => "Up to <strong>Unlimited</strong><br />Application Targets per Month<br />Paid annually"
    )
);

?>