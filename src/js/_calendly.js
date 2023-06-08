function isCalendlyEvent(e) {
  return e.origin === "https://calendly.com" && e.data.event && e.data.event.indexOf("calendly.") === 0;
};
 
window.addEventListener("message", function(e) {
  if(isCalendlyEvent(e)) {
    // console.log({e});

    /* Example to get the name of the event */
    // console.log("Event name:", e.data.event);

    if(e.data.event === "calendly.event_scheduled") {
      
      // Fire LinkedIn Tracking
      window.lintrk('track', { conversion_id: 11382796 });

      // Push event to datalayer
      window.dataLayer.push({ 
        event: "generate_lead", 
        isNewsletterForm: false,
        isCalendlyEventScheduled: true
      });

    }
    
    /* Example to get the payload of the event */
    // console.log("Event details:", e.data.payload);
  }
});



// async function ga_test() {

//    // GA4 Event Tag to fire on CDaaS New User Sign Up
//  const GA4_MEASUREMENT_ID = "G-B1P1PXBZX6"; // Doesn't have to be process.env variable. I will provide separately
//  const GA4_SECRET = "1rPYcLqZQsCVpbjOqaVbfA"; // Needs to be process.env variable. I will provide separately


//   await fetch(`https://www.google-analytics.com/mp/collect?measurement_id=${GA4_MEASUREMENT_ID}&api_secret=${GA4_SECRET}`, {
//     method: "POST",
//     headers: {
//       'Content-Type': 'application/json',
//     },
//     body: JSON.stringify({
//       "client_id": get_ga_clientid(),
//       "events": [{
//         "name": "generate_lead",
//         "params": {
//           isCdaasNewUser : true 
//         }
//       }]
//     })
//   });

//   // Helper function to send GA Client ID with POST payload

//   function get_ga_clientid() {
//     var cookie = {};
//     document.cookie.split(';').forEach(function(el) {
//       var splitCookie = el.split('=');
//       var key = splitCookie[0].trim();
//       var value = splitCookie[1];
//       cookie[key] = value;
//     });
//     return cookie["_ga"].substring(6);
//   }


//   console.log(get_ga_clientid());
// }

// ga_test();