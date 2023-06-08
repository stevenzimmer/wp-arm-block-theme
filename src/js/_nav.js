import { createCookie } from "./_create-cookie";
import { readCookie } from "./_read-cookies";
const triggers = Array.prototype.slice.call(
    document.querySelectorAll(".main-nav > .has-dropdown")
);

if (document.getElementById("announcement-banner")) {
    const announcementBanner = document.getElementById("announcement-banner");
    const closeAnnouncement = document.getElementById("close-announcement");

    closeAnnouncement.addEventListener("click", () => {
        announcementBanner.classList.remove("active");
        createCookie("banner_closed", 1, 1);
    });

    window.addEventListener("load", function () {
        if (!readCookie("banner_closed")) {
            announcementBanner.classList.add("active");
        }
    });
}

function handleEnter() {
    this.classList.add("trigger-enter");
    setTimeout(() => {
        if (this.classList.contains("trigger-enter")) {
            this.classList.add("trigger-enter-active");
        }
    }, 100);
}
function handleLeave() {
    this.classList.remove("trigger-enter", "trigger-enter-active");
}
triggers.forEach((trigger) =>
    trigger.addEventListener("mouseenter", handleEnter)
);
triggers.forEach((trigger) =>
    trigger.addEventListener("mouseleave", handleLeave)
);
const mobileMenuWrapper = document.querySelector(".mobile-menu-wrapper");
const mobileBackdrop = document.querySelector(".mobile-backdrop");
const mobileToggles = Array.prototype.slice.call(
    document.querySelectorAll(".mobile-toggle")
);
const mobileMenuItems = Array.prototype.slice.call(
    document.querySelectorAll(".mobile-menu-item.has-dropdown")
);
mobileMenuItems.forEach((item) => {
    item.addEventListener("click", function () {
        item.classList.toggle("active");
    });
});
mobileToggles.forEach((toggle) => {
    toggle.addEventListener("click", function () {
        document.body.classList.toggle("freeze");
        mobileMenuWrapper.classList.toggle("active");
        mobileBackdrop.classList.toggle("active");
        this.classList.toggle("close-x");
    });
});


window.addEventListener("scroll", function(e) {
   
    scrollState();
});

const mainNav = 
    document.getElementById("main-nav");

const blocksWrapper = document.querySelector('.entry-content');



function scrollState() {

    if(document.getElementById("main-nav")) {
        
        if (window.pageYOffset > mainNav.offsetTop) {

            mainNav.classList.add("scrolled");
            blocksWrapper.style.setProperty("padding-top",mainNav.offsetHeight + "px");

        } else {

            mainNav.classList.remove("scrolled");
            blocksWrapper.style.setProperty("padding-top",0);
        }
    }
}

// Initialize scroll state
scrollState();