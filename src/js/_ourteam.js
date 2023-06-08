const groupNavs = Array.prototype.slice.call(
    document.querySelectorAll(".group-nav")
);

const groupWrappers = Array.prototype.slice.call(
    document.querySelectorAll(".group-wrapper")
);

groupNavs.forEach((nav, i, all) => {
    nav.addEventListener("click", (e) => {
        all.forEach((item) => {
            item.classList.remove("active");
        });

        e.target.classList.add("active");

        document
            .querySelector(
                ".group-nav[data-group='" + e.target.dataset.group + "']"
            )
            .classList.add("active");

        groupWrappers.forEach((item) => {
            item.classList.remove("active");
        });

        document
            .querySelector(
                ".group-wrapper[data-group='" + e.target.dataset.group + "']"
            )
            .classList.add("active");
    });
});

const leadership_bio_triggers = Array.prototype.slice.call(
    document.querySelectorAll(".trigger-bio")
);

const leadership_bios = Array.prototype.slice.call(
    document.querySelectorAll(".leadership-bio")
);

leadership_bio_triggers.forEach((trigger, all) => {
    trigger.addEventListener("click", function (e) {
        // leadership_bios.forEach((item) => {
        //     item.classList.remove("active");
        // });

        document
            .querySelector(
                ".leadership-bio[data-bio='" + e.target.dataset.bio + "']"
            )
            .classList.toggle("active");

        document
            .querySelector(
                ".arrow-shield[data-bio='" + e.target.dataset.bio + "']"
            )
            .classList.toggle("active");
    });
});
