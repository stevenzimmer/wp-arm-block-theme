const sectionAnimates = Array.prototype.slice.call(
    document.querySelectorAll(".animateOnScroll")
);
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        // console.log({ entry });
        // const square = entry.target.querySelector(".square");

        if (entry.isIntersecting) {
            // square.classList.add("square-animation");
            console.log("is intersecting");
            return; // if we added the class, exit the function
        }

        // We're not intersecting, so remove the class!
        // square.classList.remove("square-animation");
    });
});
sectionAnimates.forEach((section) => {
    observer.observe(section);
});
