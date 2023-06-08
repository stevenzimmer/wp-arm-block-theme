import "./main.css";
// import "./css/_fonts.css";
import "aos/dist/aos.css";
import "./css/_site-blocks.css";
import "./css/_wp-blocks.css";
import "./css/_editor-styles-override.css";
import "./css/_btn.css";
import "./css/_content-body.css";
import "./css/_footer.css";
import "./css/_forms.css";
import "./css/_global.css";
import "./css/_nav.css";
import "./css/_ourteam.css";
// import "./css/_core-columns.css";
import "./css/_core-buttons.css";
import "./css/_flickity.css";
import "./css/_custom-box.css";
import "./css/_pricing.css";
import "./css/_faq.css";
import "./css/_packaging.css";


import "./../assets/src/index";

import React from "react";
import ReactDOM from "react-dom";
import Search from "./components/Search";

if (document.querySelector("#search")) {
    const searchContainer = document.getElementById("search");
    const root = ReactDOM.createRoot(searchContainer);
    root.render(<Search />);
}


import "./js/_forms";
import "./js/_nav";
import "./js/_ourteam";
import "./js/_carousel";
import "./js/_pricing";
import "./js/_observer";
import "./js/_load-more";
import "./js/_scroll-animate";
import "./js/_custom-yt-embed";
import "./js/_signup-form";
import "./js/_faq";
import "./js/_comparisons";
import "./js/_packaging";
import "./js/_anchor-click-tracking";
import "./js/_calendly";



