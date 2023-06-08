<?php 
$comparisons = new stdClass();
$comparisons->argo = array(
  array(
    "header" => "Feature",
    "rows" => array(
        array(
            "Ease of Use", true, true
        ),
        array(
          "SaaS and On-premise", true, "-"
        ),
        array(
          "Declarative deployment with a GitOps experience", true, true
        ),
        array(
          "Automatic environment promotion across multiple clusters", true, false
        ),    
        array(
          "Simple and Intitutive UI", true, true
        ),    
        array(
          "Trigger from a CI tool (simple and intitutive CLI)", true, "-"
        ),    
        array(
          "Multiple independent ReplicaSets/Deployments", true, false
        ),    
        array(
          "Jointly decide to proceed or roll back multiple deployments", true, false
        ),    
        array(
          "Multiple branches per environment", true, false
        ),    
        array(
          "Deploy existing manifests", true, false
        ),    
        array(
          "Does not require CRDs", true, false
        ),    
        array(
          "Easy cluster management", true, false
        ),    

        array(
          "Update all tightly coupled services at once", true, false
        ),    

        array(
          "Deploy and validate any change the same way (configMap, secrets, deployments)", true, false
        ),    
        array(
          "No need to restart pods after deployments", true, "-"
        ),
        array(
          "Webhooks to orchestrate existing automations (e.g.: security testing )", true, false
        ),    

        array(
          "Constraints, approvals, and manual judgements", true, false
        ),    
        array(
          "Progressive deployments (Rolling, Blue/Green, Canary)", true, true
        ),    
        array(
          "Impact analysis throughout deployments", true, "-"
        ),    
        array(
          "Deployment to multiple cloud services", true, false
        ),    
        array(
          "No need to upgrade per cluster with newly released updates", true, false
        ),    
        array(
          "Centralized management", true, false
        ),    
        array(
          "Enterprise RBAC", true, "-"
        ),    
        array(
          "Policy enforcement", true, false
        ),    
        array(
          "Notifications", true, false
        ),    
        array(
          "Deployment windows", true, false
        ),    
      )
    ),
  );

  $comparisons->harness = array(
    array(
      "header" => "Feature",
      "rows" => array(
          array(
              "Ease of Use", true, true
          ),
          array(
            "SaaS and On-premise", "-", true
          ),
          array(
            "Declarative deployment with a GitOps experience", true, "-"
          ),
          array(
            "Automatic environment promotion across multiple clusters", true, true
          ),    
          array(
            "Simple and Intitutive UI", true, true
          ),    
          array(
            "Maintain 99.9% uptime SLA or better", true, false
          ),    
          array(
            "Impact analysis and verification throughout pre-prod and prod environments", true, false
          ),  
          array(
            "Multiple independent ReplicaSets/Deployments", true, "-"
          ),    
          array(
            "Jointly decide to proceed or roll back multiple deployments", true, true
          ),    
          array(
            "Multiple branches per environment", true, true
          ),    
          array(
            "Deploy existing manifests", true, "-"
          ),    
          array(
            "Does not require CRDs", true, "-"
          ),    
          array(
            "Easy cluster management", true, false
          ),    
  
          array(
            "Update all tightly coupled services at once", true, true
          ),    
  
          array(
            "Deploy and validate any change the same way (configMap, secrets, deployments)", true, false
          ),    
          array(
            "No need to restart pods after deployments", true, "-"
          ),
          array(
            "Webhooks to orchestrate existing automations (e.g.: security testing )", true, true
          ),    
  
          array(
            "Constraints, approvals, and manual judgements", true, true
          ),    
          array(
            "Progressive deployments (Rolling, Blue/Green, Canary)", true, true
          ),    
       
          array(
            "Deployment to multiple cloud services", false, true
          ),    
          array(
            "No need to upgrade per cluster with newly released updates", true, false
          ),    
          array(
            "Centralized management", true, true
          ),    
          array(
            "Enterprise RBAC", true, true
          ),    
          array(
            "Policy enforcement", true, true
          ),    
          array(
            "Notifications", true, true
          ),    
          array(
            "Out-of-the-box metric and reporting", false, true
          ),    
        )
      ),
    );

    $comparisons->octopus = array(
      array(
        "header" => "Feature",
        "rows" => array(
            array(
                "World-class support team", true, true
            ),
            array(
              "Availability", "99.9% uptime", "99.54% uptime"
            ),
            array(
              "Declarative Deployment Options", true, "Not out of the box"
            ),
            array(
              "Multi-Environment", true, "Not out of the box"
            ),    
            array(
              "Manages the Promotion Lifecycle", true, "Not out of the box"
            ),    
            array(
              "Production-Ready Deployment Strategies (Canary, Blue/Green)", true, "Not out of the box"
            ),    
            array(
              "Tooling for Maturing Development Teams", true, true
            ),  
            array(
              "Tooling for Elite Development Teams", true, false
            ),    
            array(
              "Automated Canary Analysis", true, "Not out of the box"
            ),    
            array(
              "Simple, Automated Rollbacks", true, true
            ),    
            array(
              "Easily Trigger from your existing tooling", true, "Not out of the box"
            ),    
            array(
              "Leverage existing automation", true, true
            ),    
            array(
              "GitOps experience", true, true
            ),    
    
            array(
              "Dynamic Accounts", true, true
            ),    
    
            array(
              "Multi-Cloud", true, true
            ),    
            array(
              "YAML support", true, false
            ),
            array(
              "Simultaneous automated deployment of tightly coupled services", true, "Not out of the box"
            ),    
    
            array(
              "Easy automated rollback of tightly coupled services", true, "Not out of the box"
            ),    
            array(
              "Traffic Management Integration (SMI, Istio)", true, true
            ),    
         
            array(
              "Centrally-defined environments", true, true
            ),    
      
          )
        ),
      );
?>