<?php

$products = new stdClass();
$products->cdaas = new stdClass();
$products->selfhosted = new stdClass();
// $products->managed = new stdClass();
// $products->scaleagent = new stdClass();
// $products->oss = new stdClass();

$products->cdaas->title = "Continuous Deployment-as-a-Service";
// $products->selfhosted->title = "Continuous Deployment Self-Hosted";
// $products->managed->title = "Continuous Deployment Managed";
// $products->scaleagent->title = "Scale Agent for Spinnaker & Kubernetes";
// $products->oss->title = "Open Source Service";

$contactCTA = array(
    "text" => "Contact Us",
    "link" => "/demo-request/"
);

$signupCTALink = "https://go.armory.io/signup";

// $products->oss->cards = array(
//     array(
//         "title" => "Basic",
//         "description" => "Support you can count on, from the leading Continuous Deployment and Spinnaker experts.",   
//         "bullets" => array(
//             "Support for Open Source Spinnaker",
//             "Unlimited Deployments",
//             "LTS Releases",          
//             "Pipelines-as-Code",          
//             "Unlimited Environments"
//         ),
//         "pricing" => "$100.00",
//         "measurement" => "per User per Month <br />Paid Annually<br /><em>based on 25 users</em>",
//         "cta" => $contactCTA
//     )
// );

// $products->scaleagent->cards = array(

//     array(
//         "title" => "Enterprise",
//         "description" => "Everything you need to secure, simplify, and scale your Kubernetes deployments with any Spinnaker instance.",   
//         "bullets" => array(
//             "Unlimited Users",
//             "Unlimited Deployments", 
//             "Unlimited Services (Applications)",
//             "Up to Unlimited Namespaces",
//             "Enterprise Support Included",            
//         ),
       
//         "measurement" => "Up to <strong>Unlimited</strong> Namespaces <br />per Month Paid Annually",
//         "cta" => $contactCTA
//     )
// );

// $products->oss->table = array(
//     array(
//         "header" => "Usage",
//         "rows" => array(
//             array(
//                 "Full access to Armory's Knowledge Base", true, true, true
//             ),
//             array(
//                 "Security, CVE, Product Updates via Critical Notifications List", true, true, true
//             ),
//             array(
//                 "Full Access to Armory's Support Portal for Case Submission", true, true, true
//             ),
//             array(
//                 "Technical Account Manager for Accelerated Onboarding", false, true, true
//             ),
//             array(
//                 "Support Team Hours of Operation (based on US pacific/eastern)", "11-5 EST/PST Mon-Fri", "11-5 EST/PST Mon-Fri", "24/7 for P0 and 24x5 for P1-P3"
//             ),
//             array(
//                 "Support Team Location", "Americas", "Americas", "Global"
//             ),
//             array(
//                 "Reviews", false, "Annual", "Quarterly"
//             ),

//             array(
//                 "Follow the Sun Availability", false,false, true
//             ),
//             array(
//                 "Support Team Monthly Sync", false, false, true
//             ),
          
//         )
//     ),
//     array(
//         "header" => "Response Time",
//         "rows" => array(
//             array(
//                 "P0", "60 mins", "60 mins", "30 mins"
//             ),
//             array(
//                 "P1", "12 hrs", "8 hrs", "4 hrs"
//             ),
//             array(
//                 "P2", "32 hrs", "24 hrs", "12 hrs"
//             ),

//             array(
//                 "P3", "48 hrs", "48 hrs", "24 hrs"
//             ),
         
//         )
//     )
// );

$products->cdaas->cards = array(
    array(
        "title" => "Free",
        "icon" => "pricing-community-icon.png",
        "description" => "Declarative Continuous Deployment to Kubernetes at no cost!",
        "bullets" => array(
            "Up to 25 Application Targets per month*",
            "Up to 1000 Deployments per Month",
            "Multiple Environment Orchestration",
            "Blue/Green and Canary Deployments",
            "Automated Canary Analysis",
            "Automated Rollbacks"
            
        ),
        "cta" => array(
            "text" => "Get Started",
            "link" => $signupCTALink
        ),
        "measurement" => "",
        "pricing" => "FREE",
    ),
    array(
        "title" => "Team",
        "icon" => "pricing-team-icon.png",
        "bullets" => array(
            "<strong>Free+</strong>",
            "Up to Unlimited Application Targets*",
            "Unlimited Deployments",
            "Enterprise Support",
            "SLA 99.5%",
            "",
            ""
        ),
        "description" => "More power and flexibility for you and your teams.",
        "pricing" => "$10.00",
        "measurement" => "per Application Target per Month",
        "tooltip" => "An Application Target is an Application or Service being deployed to a namespace running on a cluster (application x namespace x cluster)",
        "cta" => array(
            "text" => "Try for Free",
            "link" => $signupCTALink
        ),
    ),

    array(
        "title" => "Enterprise",
        "icon" => "pricing-enterprise-icon.png",
        "table_header" => "Armory Agent for Kubernetes",
        "url" => "/armory-enterprise-spinnaker/armory-agent-for-kubernetes/",
        "description" => "The added security and governance that all Enterprises need.",
        "bullets" => array(
            "<strong>Team+</strong>",
            "Traffic Management",
            "Centralized Environment Definition",
            "Role-Based Access Control",
            "Single Sign-on",
            "SLA 99.9%",
            ""
        ),
        "pricing" => "CONTACT SALES",
        "measurement" => "Up to Unlimited Application Targets per Month Paid Anually",
        "tooltip" => "An Application Target is an Application or Service being deployed to a namespace running on a cluster (application x namespace x cluster)",
        "cta" => array(
            "text" => "Try for Free",
            "link" => $signupCTALink
        ),
    )
);

$products->cdaas->table = array(
    array(
        "header" => "Usage",
        "rows" => array(
            array(
                "Users", "Unlimited", "Unlimited", "Unlimited"
            ),
            array(
                "Services (Applications)", "Unlimited", "Unlimited", "Unlimited"
            ),
            // array(
            //     "Success Pipeline Executions", "Unlimited", "Unlimited", "Unlimited"
            // ),
            array(
                "Application Targets", "Up to 25", "Unlimited", "Unlimited"
            ),
            array(
                "Data Retention", "30 Days", "365 Days", "365 Days"
            ),
 
            array(
                "Starting At", "Free", $products->cdaas->cards[1]["pricing"], "Contact Sales"
            ),
        )
    ),
    array(
        "header" => "Operational Flexibility",
        "rows" => array(
            array(
                "Application Registry", true, true, true
            ),
            array(
                "Multiple Environments", true, true, true
            ),
            array(
                "Multiple K8s Deployments in a Single Manifest", true, true, true
            ),
            array(
                "Kustomize Repos for K8s", true, true, true
            ),
            array(
                "Helm Charts for K8s", true, true, true
            ),
            array(
                "Expose Services", false, true, true
            )
        )
    ),
    array(
        "header" => "Increase Reliability",
        "rows" => array(
            array(
                "Rolling Updates", true, true, true
            ),
            array(
                "Blue/Green", true, true, true
            ),
            array(
                "Canary", true, true, true
            ),
            array(
                "Automated Impact Analysis (Canary Analysis)", true, true, true
            ),
            array(
                "Automated Rollbacks", true, true, true
            ),
            array(
                "Route Traffic with Service Mesh (SMI)",  false, false,true
            ),
            array(
                "Route Traffic with Service Mesh (ISTIO)",  false, false,true
            ),
            // array(
            //     "Maintenance Windows", false, false, "coming soon!"
            // ),

            // array(
            //     "Deployment Freeze", false, false, "coming soon!"
            // ),

            array(
                "Asynchronous Webhooks for Long-running Test Automation", true,true,true
            ),
        )
    ),
    array(
        "header" => "Cloud Providers and Target Services",
        "rows" => array(
            array(
                "Kubernetes", true, true, true
            ),
            array(
                "Amazon Kubernetes Service (EKS)", true, true, true
            ),
            array(
                "Amazon ECS", "Coming soon!", "Coming soon!", "Coming soon!"
            ),
            array(
                "Amazon Lambda", "Coming soon!", "Coming soon!", "Coming soon!"
            ),
            array(
                "Azure Kubernetes Service (AKS)",  true, true, true
            ),
            array(
                "Google Kubernetes Service (GKE)", true, true, true
            ),
            
        )
    ),

    array(
        "header" => "Open Ecosystem Integration",
        "rows" => array(
            // array(
            //     "Atlassian Bitbucket", true, true, true
            // ),
            // array(
            //     "Gitlab", true, true, true
            // ),
            // array(
            //     "CircleCI", true, true,true
            // ),
            // array(
            //     "Atlassian Bamboo", true, true, true
            // ),
            // array(
            //     "Jenkins", true, true, true
            // ),
            array(
                "GitHub Actions",  true, true, true
            ),

            // array(
            //     "Splunk", true, true, true
            // ),
            array(
                "Datadog", true, true, true
            ),
            // array(
            //     "Dynatrace", true, true, true
            // ),
            array(
                "Prometheus", true, true, true
            ),
        
            array(
                "New Relic", true, true,true
            ),
            // array(
            //     "Google Cloud Operations", true, true, true
            // ),
            // array(
            //     "Amazon Cloudwatch", true, true, true
            // ),
            //  array(
            //     "Slack", false, "Coming soon!", "Coming soon!"
            // ),
            array(
                "Custom Webhook Triggers", true, true,true
            ),
            
        )
    ),
    array(
        "header" => "Reduce Administration Complexity",
        "rows" => array(
            array(
                "Command-line Interface (CLI)", true, true, true
            ),
            
            array(
                "Dynamic Account Configuration", true, true,true
            ),
            array(
                "Agent-Based Management for Kubernetes", true, true, true
            ),
            array(
                "User Management", true, true, true
            ),
            // array(
            //     "Provision Users from Google Groups", false,false,false
            // ),
            array(
                "Provision Users from Okta", false,false,true
            ),
            array(
                "Provision Users from OAuth2.0 (OIDC)", false,false,true
            ),
            // array(
            //     "Provision Users from Azure AD", false,false,false
            // ),
            // array(
            //     "Provision Users from OneLogin", false,false,false
            // ),
        )
    ),
    array(
        "header" => "Secured Platform",
        "rows" => array(
            array(
                "Two-factor Authentication", false, true, true, 
            ),
            array(
                "Single Sign-on with OAuth2.0 (OIDC)", false, false, true, 
            ),
            // array(
            //     "Single Sign-on with SAML", false, false, false 
            // ),
            // array(
            //     "Single Sign-on with LDAP (Active Directory)", false, false, false 
            // ),
            // array(
            //     "Single Sign-on with x509", false, false, false 
            // ),
        
            array(
                "Role Based Access Control (Built-in Roles)",  true,true,true
            ),

            array(
                "Role Based Access Control (Custom Roles)",  false, false, true
            ),

            // array(
            //     "Audit Trails", false, "Coming soon!","Coming soon!"
            // ),

        )
    ),
    array(
        "header" => "Assure Availability & Scalability",
        "rows" => array(
            array(
                "Service Level Agreement (SLA)", false, "99.5%", "99.9%"
            )
        )
    ),

    array(
        "header" => "Deployment Expertise",
        "rows" => array(
            array(
                "Community", true, true, true
            ),
            array(
                "Enterprise Support", false, true, true
            ),
            array(
                "Premium Support", false, "Add-on","Add-on"
            ),
            array(
                "Dedicated Onboarding", "Add-on","Add-on", "Add-on"
            ),
            array(
                "Documentation", true, true, true
            ),
            array(
                "Access to Armory's Knowledge Base", true, true, true
            ),
            array(
                "<em>Response Times</em>", "", "", ""
            ),
            array(
                "P0", "60 min","60 min", "30 min"
            ),
            array(
                "P1", "12 hours","8 hours", "4 hours"
            ),
            array(
                "P2", "32 hours","24 hours", "12 hours"
            ),
            array(
                "P3", "48 hours","48 hours", "24 hours"
            ),
            array(
                "Success Manager for Accelerated Onboarding", false,false,true
            ),
            array(
                "Support Hours of Operation", "10-5 est Mon-Friday","9-8 est Mon-Friday", "24/7 for P0 and 24x5 for P1-P3"
            ),
            array(
                "Support Location", "North America","North America", "Global"
            ),
            array(
                "Architecture and Environment Reviews", false,"Annual", "Quarterly"
            ),
        )
    ),
);


// $products->managed->cards = array(
//     array(
//         "title" => "Basic",
//         "description" => "Everything you need to start deploying your software with confidence",
//         "bullets" => array(
//             "",
//             "Unlimited Deployments",
//             "Up to 500 Users", 
//             "LTS Releases", 
//             "Pipelines-as-Code",    
//             "Unlimited Environments (e.g.: dev, stage, prod)",
//             "Enterprise Support"
//         ),
//         "pricing" => "$250.00",
//         "measurement" => "per User per Month Paid Annually",
//         "cta" => $contactCTA
  
//     ),
//     array(
//         "title" => "Team",
//         "description" => "More flexibility and power for you and your teams<br /><br />",
//         "bullets" => array(
//             "",
//             "Basic +",
//             "Up to 1000 Users",
//             "Automated Impact Analysis",
//             "Terraform Integration",
//             "Scale Agent for Spinnaker & Kubernetes",""
//         ),
       
//         "pricing" => "$300.00",
//         "measurement" => "per User per Month Paid Annually",
//         "cta" => $contactCTA
//     ),

//     array(
//         "title" => "Enterprise",
//         "description" => "Added governance and deployment expertise to keep you compliant and running quickly",   
//         "bullets" => array(
//             "Team +",
//             "Up to Unlimited Users",
//             "Dedicated Onboarding Included", 
//             "Pipeline Policies","",""
    
//         ),
//         "measurement" => "Up to <strong>Unlimited</strong> Users <br />per Month Paid Annually",
//         "cta" => $contactCTA
//     )
// );


// $products->managed->table = array(
//     array(
//         "header" => "Usage",
//         "rows" => array(
//             array(
//                 "Users", "Up to 500", "Up to 1000", "Up to Unlimited"
//             ),
//             array(
//                 "Services (Applications)", "Unlimited", "Unlimited", "Unlimited"
//             ),
//             array(
//                 "Deployments", "Unlimited", "Unlimited", "Unlimited"
//             ),
//             array(
//                 "Application Targets", "Unlimited", "Unlimited", "Unlimited"
//             ),
//             array(
//                 "Starting At", $products->managed->cards[0]["pricing"], $products->managed->cards[1]["pricing"], "Contact Sales"
//             ),
             
//         )
//     ),
//     array(
//         "header" => "Operational Flexibility",
//         "rows" => array(
//             array(
//                 "Application Registry", true, true, true
//             ),
//             array(
//                 "Multiple Environments", true, true, true
//             ),
//             array(
//                 "Multiple K8s Deployments in a Single Manifest", false, true, true
//             ),
//             array(
//                 "Kustomize Repos for K8s", false, true, true
//             ),
//             array(
//                 "Helm Charts for K8s", true, true, true
//             ),
//             array(
//                 "Traffic Management for Amazon AppMesh", false, true, true
//             ),
//             array(
//                 "The Git Experience for Deployments (YAML)", true, true, true
//             ),

//             array(
//                 "Deployment Stages", true, true, true
//             ),
//             array(
//                 "Deployment Stages incl. Custom Stages", false, true, true
//             ),
//             array(
//                 "Intelligent Pipeline Triggers and Real-time Actions", false, true, true
//             ),
//             array(
//                 "Pipeline Policies (Policy Engine)", false, false, true
//             ),
      
//             array(
//                 "Baking Machine Images (AWS, Azure, GCP)", true, true, true
//             ),
//             array(
//                 "Notifications", true, true, true
//             ),
//             array(
//                 "Scale Agent (infrastructure mode)", true, true, true
//             ),
//             array(
//                 "Scale Agent (agent mode)", false, false, true
//             ),
     
//             array(
//                 "Spinnaker Stage for Armory Continuous Deployment-as-a-Service", true, true, true
//             )
//         )
//     ),
//     array(
//         "header" => "Increase Reliability",
//         "rows" => array(
//             array(
//                 "Rolling Updates", true, true, true
//             ),
//             array(
//                 "Blue/Green", true, true, true
//             ),
//             array(
//                 "Canary", true, true, true
//             ),
//             array(
//                 "Automated Impact Analysis (Canary Analysis)", true, true, true
//             ),
//             array(
//                 "Automated Rollbacks", true, true, true
//             ),
//             array(
//                 "Route Traffic with Service Mesh",  true, true, true
//             ),


//         )
//     ),
//     array(
//         "header" => "Cloud Providers and Target Services",
//         "rows" => array(
//             array(
//                 "Kubernetes", true, true, true
//             ),
//             array(
//                 "Amazon Kubernetes Service (EKS)", true, true, true
//             ),
//             array(
//                 "Amazon EC2", true, true, true
//             ),
//             array(
//                 "Amazon ECS", true, true, true
//             ),
//             array(
//                 "Amazon Lambda", true, true,  true
//             ),
//             array(
//                 "Azure Kubernetes Service (AKS)",  true, true, true
//             ),
//             array(
//                 "Azure VMs",true,true,true
//             ),

//             array(
//                 "Google Kubernetes Service (GKE)", true, true, true
//             ),
//             array(
//                 "Custom", true, true, true
//             )
//         )
//     ),
   
//     array(
//         "header" => "Open Ecosystem Integration",
//         "rows" => array(
//             array(
//                 "Atlassian Bitbucket", true, true, true
//             ),
//             array(
//                 "Gitlab", true, true, true
//             ),
//             array(
//                 "CircleCI", true, true,true
//             ),
//             array(
//                 "Atlassian Bamboo", true, true, true
//             ),
//             array(
//                 "Jenkins", true, true, true
//             ),
//             array(
//                 "GitHub Actions",  true, true, true
//             ),
//             array(
//                 "Terraform", false, true, true
//             ),

//             array(
//                 "Splunk", true, true, true
//             ),
//             array(
//                 "Datadog", true, true, true
//             ),
//             array(
//                 "Dynatrace", true, true, true
//             ),
//             array(
//                 "Prometheus", true, true, true
//             ),
//             array(
//                 "Graphite", true, true, true
//             ),
//             array(
//                 "New Relic", true, true,true
//             ),
//             array(
//                 "Google Cloud Operations", true, true, true
//             ),
//             array(
//                 "Amazon Cloudwatch", true, true, true
//             ),
//             array(
//                 "Email Notifications", true, true, true
//             ),
//             array(
//                 "Slack", true, true,  true
//             ),
//             array(
//                 "GitHub Notifications", true, true, true
//             ),
//             array(
//                 "PagerDuty", true, true, true
//             ),
//             array(
//                 "Microsoft Teams", true, true,true
//             ),
//             array(
//                 "Hashicorp Vault", true, true,true
//             ),
//             array(
//                 "Atlassian Jira", true, true,true
//             ),
//             array(
//                 "Amazon Cloud Formation", true, true,true
//             ),
//             array(
//                 "Gremlin", true, true,true
//             ),
//             array(
//                 "Custom Webhook Triggers", true, true,true
//             )
//         )
//     ),
//     array(
//         "header" => "Reduce Administration Complexity",
//         "rows" => array(
//             array(
//                 "Command-line Interface (CLI)", true, true, true
//             ),
//             array(
//                 "REST APIs", true, true, true
//             ),
//             array(
//                 "Dynamic Account Configuration", true, true,true
//             ),
//             array(
//                 "Agent-Based Management for Kubernetes", true, true, true
//             ),
//             array(
//                 "User Management", true, true, true
//             ),
//             array(
//                 "Provision Users with GitHub Teams", false, true, true, 
//             ),
//             array(
//                 "Provision Users with Google Groups", false, true, true, 
//             ),
//             array(
//                 "Provision Users with Okta", false, true, true, 
//             ),
//             array(
//                 "Provision Users with Azure AD",false, true, true, 
//             ),
//             array(
//                 "Provision Users with OneLogin", false, true, true, 
//             ),
//             array(
//                 "Installation, Configuration and Upgrade Automation (Operator)", true,true,true
//             ),
//             array(
//                 "Long-term Support Releases", true,  true, true
//             )
//         )
//     ),
//     array(
//         "header" => "Secured Platform",
//         "rows" => array(
//             array(
//                 "Two-factor Authentication", false, true, true, 
//             ),
//             array(
//                 "Single Sign-on with OAuth2.0 (OIDC)", false, true, true, 
//             ),
//             array(
//                 "Single Sign-on with SAML", false, true, true, 
//             ),
//             array(
//                 "Single Sign-on with LDAP (Active Directory)", false, true, true, 
//             ),
//             array(
//                 "Single Sign-on with x509", false, true, true, 
//             ),
//             array(
//                 "Role Based Access Control (Built-in Roles)",  true, true, true
//             ),
//             array(
//                 "Secret Management (Secret Stores)", true, true, true
//             ),
//             array(
//                 "Audit Trails", true, true,true
//             ),
//             array(
//                 "IP Address SafeList Management", true, true, true
//             ),
//         )
//     ),
//     array(
//         "header" => "Assure Availability & Scalability",
//         "rows" => array(
//             array(
//                 "Service Level Agreement (SLA)", "99.9%", "Up to 99.99%", "Up to 99.999%"
//             ),
//             array(
//                 "Active High-Availability (HA)", "Add-on", "Add-on", "Add-on"
//             ),
//             array(
//                 "Disaster Recovery (DR)", "Add-on", "Add-on","Add-on"
//             )
//         )
//     ),

//     array(
//         "header" => "Deployment Expertise",
//         "rows" => array(
//             array(
//                 "Community", true, true, true
//             ),
//             array(
//                 "Enterprise Support", true, true, true
//             ),
//             array(
//                 "Global Premium Support", "Add-on", "Add-on","Add-on"
//             ),
//             array(
//                 "Dedicated Onboarding", "Add-on", "Add-on", true
//             ),
           
//         )
//     ),
// );


// $products->selfhosted->cards = array(
//     array(
//         "title" => "Essentials",
//         "description" => "Expert Support and everything you need to get started deploying.",
//         "subtitle" => "Powered by Spinnaker",
//         "bullets" => array(
//             "<strong>Open Source +</strong>",
//             "1 Premium Plugin",
//             "Optimized Base Configs",
//             "Support: 8x5, 60 min P0, 12 hr P1",
//             "Secrets Management",""
//         ),
//         "pricing" => "$2.50",
//         "tooltip" => "Successful Pipeline Executions are any pipeline that executes with a status of 'succeeded'",
//         "measurement" => "per Successful Pipeline Execution per Month Paid annually",
//         "cta" => $contactCTA
//     ),
//     array(
//         "title" => "Enterprise",
//         "description" => "The added security and governance that all Enterprises need.",
//         "subtitle" => "Powered by Spinnaker",
//         "bullets" => array(
//             "<strong>Essentials +</strong>",
//             "3 Premium Plugins",
//             "Support: 11x5, 60 min P0, 8 hr P1",
//             "Solutions Architect and Success Manager",
//             "Annual SRE Ops and Business Review"
//         ),
//         "tooltip" => "Successful Pipeline Executions are any pipeline that executes with a status of 'succeeded'",
//         "pricing" => "$3.75",
//         "measurement" => "per Successful Pipeline Execution per Month Paid annually",
//         "cta" => $contactCTA
//     ),

//     array(
//         "title" => "Premium",
//         "description" => "Fully managed Spinnaker in your cloud.",
//         "subtitle" => "Powered by Spinnaker",
//         "bullets" => array(
//             "",
//             "<strong>Enterprise +</strong>",
//             "All Premium Plugins",
//            "Support: 24x7 P0, 24x5 P1-3 30 min P0, 4 hr P1",
//             "Fully Managed Spinnaker in Your cloud (optional)",""
//         ),
//         "pricing" => "CUSTOM",
//         "tooltip" => "Successful Pipeline Executions are any pipeline that executes with a status of 'succeeded'",
//         "measurement" => "per Successful Pipeline Execution per Month Paid annually",
//         "cta" => $contactCTA
//     )
// );


$products->selfhosted->table = array(
    array(
        "header" => "Usage",
        "rows" => array(
            array(
                "Users", "Unlimited", "Unlimited", "Unlimited","Unlimited"
            ),
            array(
                "Services (Applications)", "Unlimited", "Unlimited", "Unlimited", "Unlimited"
            ),
            array(
                "Success Pipeline Executions**", "Unlimited","Up to 1M per month", "Up to 1M per month", "Up to 1M per month"
            ),
            array(
                "Application Targets", "Unlimited", "Unlimited", "Unlimited", "Unlimited"
            ),
            array(
                "Community Features", "All Included", "All Included", "All Included", "All Included"
            ),
            array(
                "Armory Essential Plugins", false, "All Included", "All Included", "All Included"
            ),
            array(
                "Armory Premium Plugins", false, "1 of Your Choice", "3 of Your Choice", "All Included"
            ),
         
            array(
                "Starting At", "","$2.50","$3.75","Contact Sales" 
            ),
        )
    ),

    array(
        "header" => "Operational Flexibility",
        "rows" => array(
            array(
                "Application Registry", true, true, true, true
            ),
            array(
                "Multiple Environments", true, true, true, true
            ),
            array(
                "Multiple K8s Deployments in a Single Manifest", true,true, true, true
            ),
            array(
                "Kustomize Repos for K8s", true,true, true, true
            ),
            array(
                "Helm Charts for K8s", true, true, true, true
            ),
    
            array(
                "Deployment Stages incl. Custom Stages", true, true, true, true
            ),
   
            array(
                "Intelligent Pipeline Triggers and Real-time Actions", true, true, true, true
            ),
       
            array(
                "Baking Machine Images (AWS, Azure, GCP)", true, true, true, true
            ),
            array(
                "Notifications", true, true, true, true
            ),
        )
    ),
    array(
        "header" => "Increase Reliability",
        "rows" => array(
            array(
                "Rolling Updates", true, true, true, true
            ),
            array(
                "Blue/Green", true, true, true, true
            ),
            array(
                "Canary", true, true, true, true
            ),
            array(
                "Automated Impact Analysis (Canary Analysis)", true, true, true, true
            ),
            array(
                "Automated Rollbacks", true, true, true, true
            ),
            array(
                "Maintenance Windows", true, true, true, true
            ),
            array(
                "Deployment Freeze", true, true, true, true
            ),
            array(
                "Asynchronouse Webhooks for Long-running Test Automation", true, true, true, true
            ),

        )
    ),
    array(
        "header" => "Cloud Providers and Target Services",
        "rows" => array(
            array(
                "Kubernetes", true, true, true, true
            ),
            array(
                "Amazon Kubernetes Service (EKS)", true,true, true, true
            ),
            array(
                "Amazon EC2", true, true, true, true
            ),
            array(
                "Amazon ECS", true, true, true, true
            ),
            array(
                "Amazon Lambda", true, true, true,  true
            ),
            array(
                "Azure Kubernetes Service (AKS)",  true, true, true, true
            ),
            array(
                "Azure VMs", true, true,true,true
            ),

            array(
                "Google Kubernetes Service (GKE)", true, true, true, true
            ),
            array(
                "Custom", true, true, true, true
            )
        )
    ),

    array(
        "header" => "Deployable Resources",
        "rows" => array(
            array(
                "Docker Hub", true, true, true, true
            ),
            array(
                "Bitbucket", true,true, true, true
            ),
            array(
                "Helm", true, true, true, true
            ),
            array(
                "GitHub", true, true, true, true
            ),
            array(
                "Git Repo", true, true, true,  true
            ),
            array(
                "Maven",  true, true, true, true
            ),
            array(
                "Amazon S3", true, true,true,true
            ),

            array(
                "Amazon Container Registry", true, true,true,true
            ),

            array(
                "Google Container Registry", true, true,true,true
            ),

            array(
                "JFrog Artifactory", true, true, true, true
            ),
            array(
                "HTTP", true, true, true, true
            ),

            array(
                "Google Cloud Storage", true, true, true, true
            ),
        )
    ),
 

    array(
        "header" => "Open Ecosystem Integration",
        "rows" => array(
            array(
                "Atlassian Bitbucket", true, true, true, true
            ),
            array(
                "Gitlab", true, true, true, true
            ),
            array(
                "CircleCI",true, true, true,true
            ),
            array(
                "Atlassian Bamboo",true, true, true, true
            ),
            array(
                "Jenkins",true, true, true, true
            ),
            array(
                "GitHub Actions", true, true, true, true
            ),
            // array(
            //     "Terraform", true, false, true, true
            // ),

            array(
                "Splunk", true,true, true, true
            ),
            array(
                "Datadog", true,true, true, true
            ),
            array(
                "Dynatrace",true, true, true, true
            ),
            array(
                "Prometheus",true, true, true, true
            ),
            array(
                "Graphite", true,true, true, true
            ),
            array(
                "New Relic",true, true, true,true
            ),
            array(
                "Google Cloud Operations",true, true, true, true
            ),
            array(
                "Amazon Cloudwatch",true, true, true, true
            ),
            // array(
            //     "Email Notifications",true, true, true, true
            // ),
            array(
                "Slack", true,true, true,  true
            ),
            array(
                "GitHub Notifications", true,true, true, true
            ),
            array(
                "PagerDuty", true,true, true, true
            ),
            array(
                "Microsoft Teams",true, true, true,true
            ),
            array(
                "Hashicorp Vault",true, true, true,true
            ),
            array(
                "Atlassian Jira",true, true, true,true
            ),
            array(
                "Amazon Cloud Formation",true, true, true,true
            ),
            array(
                "Gremlin", true,true, true,true
            ),
            array(
                "Custom Webhook Triggers", true,true, true,true
            )
        )
    ),
    array(
        "header" => "Reduce Administration Complexity",
        "rows" => array(
            array(
                "Command-line Interface (CLI)", true, true, true, true
            ),
            array(
                "REST APIs",true, true, true, true
            ),
            array(
                "Dynamic Account Configuration",true, true, true,true
            ),
            array(
                "Agent-Based Management for Kubernetes",false, true, true, true
            ),
            array(
                "User Management",true, true, true, true
            ),
            array(
                "Provision Users with GitHub Teams", true,true, true, true, 
            ),
            array(
                "Provision Users with Google Groups", true,true, true, true, 
            ),

            array(
                "Provision Users with Okta",true, true, true, true, 
            ),
            array(
                "Provision Users with OAuth2.0 (OIDC)",true, true, true, true, 
            ),
            array(
                "Provision Users with Azure AD",true,true, true, true, 
            ),
            array(
                "Provision Users with OneLogin",true, true, true, true, 
            ),
            array(
                "Installation, Configuration and Upgrade Automation (Operator)",true, true,true,true
            ),
            array(
                "Long-term Support Releases",false, true,  true, true
            )
        )
    ),
    array(
        "header" => "Secured Platform",
        "rows" => array(
            array(
                "Two-factor Authentication",true, true, true, true, 
            ),
            array(
                "Single Sign-on with OAuth2.0 (OIDC)",true, true, true, true, 
            ),
            array(
                "Single Sign-on with SAML",true, true, true, true, 
            ),
            array(
                "Single Sign-on with LDAP (Active Directory)", true,true, true, true, 
            ),
            array(
                "Single Sign-on with x509",true, true, true, true, 
            ),
            array(
                "Role Based Access Control (Built-in Roles)", true, true, true, true
            ),
            array(
                "Role Based Access Control (Custom Roles)", true, true, true, true
            ),
            // array(
            //     "Secret Management (Secret Stores)", true, true, true
            // ),
            array(
                "Audit Trails",true, true, true,true
            ),
            // array(
            //     "IP Address SafeList Management", true, true, true
            // )
        )
    ),

    array(
        "header" => "Assure Availability & Scalability",
        "rows" => array(
            array(
                "Service Level Agreement (SLA)",false, "99.9", "99.99*", "99.999*"
            ),
            array(
                "Active High-Availability (HA)",false, false, true, "Add-on", 
            ),
            array(
                "Disaster Recovery",false, false, false, "Add-on", 
            )
        )
    ),

    array(
        "header" => "Deployment Expertise",
        "rows" => array(
            array(
                "Community", true, true, true, true
            ),
            array(
                "Essential Support", false, true, false, false
            ),
            array(
                "Enterprise Support", false, false, true, false
            ),
            array(
                "Premium Support", false, false, false, true
            ),
            array(
                "Dedicated Onboarding", false, "Add-on","Add-on",true
            ),
            array(
                "Documentation", true, true, true, true
            ),
            array(
                "Access to Armory's Knowledge Base", false, true, true, true
            ),
            array(
                "<em>Response Times</em>","", "", "", ""
            ),
            array(
                "P0", false, "60 min","60 min", "30 min"
            ),
            array(
                "P1",false, "12 hours","8 hours", "4 hours"
            ),
            array(
                "P2", false,"32 hours","24 hours", "12 hours"
            ),
            array(
                "P3",false, "48 hours","48 hours", "24 hours"
            ),
            array(
                "Success Manager for Accelerated Onboarding",false, false,true,true
            ),
            array(
                "Support Hours of Operation", false, "10-5 est Mon-Friday","9-8 est Mon-Friday", "24/7 for P0 and 24x5 for P1-P3"
            ),
            array(
                "Support Location", false,"North America","North America", "Global"
            ),
            array(
                "Architecture and Environment Reviews", false,false,"Annual", "Quarterly"
            ),
          
        )
    )
);


// $products->scaleagent->table = array(
//     array(
//         "header" => "Usage",
//         "rows" => array(
//             array(
//                 "Users", "Unlimited", 
//             ),
//             array(
//                 "Services (Applications)", "Unlimited",
//             ),
//             array(
//                 "Deployments", "Unlimited",
//             ),
//             array(
//                 "Application Targets",  "Up to Unlimited"
//             ),
//             array(
//                 "Starting At",  "Contact sales",
//             ),
//         )
//     ),
   
//     array(
//         "header" => "Cloud Providers and Target Services",
//         "rows" => array(
//             array(
//                 "Kubernetes", true,
//             ),
//             array(
//                 "Amazon Kubernetes Service (EKS)", true, 
//             ),

//             array(
//                 "Azure Kubernetes Service (AKS)",  true
//             ),
  

//             array(
//                 "Google Kubernetes Service (GKE)", true,
//             ),
     
//         )
//     ),
  
//     array(
//         "header" => "Reduce Administration Complexity",
//         "rows" => array(
//             array(
//                 "Command-line Interface (CLI)", true,
//             ),
//             array(
//                 "REST APIs", true
//             ),

//             array(
//                 "Installation, Configuration and Upgrade Automation (Operator)",true
//             ),
      
//         )
//     ),

//     array(
//         "header" => "Deployment Expertise",
//         "rows" => array(
//             array(
//                 "Community", true
//             ),
//             array(
//                 "Enterprise Support", true
//             ),
//             array(
//                 "Global Premium Support","Add-on"
//             ),
//             array(
//                 "Dedicated Onboarding",  "Add-on"
//             ),
         
//         )
//     ),
// );


?>