const loadMoreContainers = Array.prototype.slice.call(
    document.querySelectorAll(".load-more-container")
);
// console.dir({ loadMoreContainers });
loadMoreContainers.forEach((container) => {
    // console.log({ container });

    container.querySelector(".load-more-btn").addEventListener("click", (e) => {
        e.preventDefault();
        console.log("btn click");
        container
            .querySelector(".load-more-content")
            .classList.remove("hidden");
        e.target.parentElement.classList.add("hidden");
    });
});
