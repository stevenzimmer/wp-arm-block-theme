const tabItems = Array.prototype.slice.call(
    document.querySelectorAll(".tab-item")
);

const tabPanels = Array.prototype.slice.call(
    document.querySelectorAll(".tab-panel")
);

tabItems.forEach((tab, i, all) => {
    tab.addEventListener("click", (e) => {
        const { parentElement } = e.target;
        const siloedItems = Array.prototype.slice.call(
            parentElement.querySelectorAll(".tab-item")
        );
        const siloedPanels = Array.prototype.slice.call(
            document
                .getElementById(`tab-panel-${e.target.dataset.tab}`)
                .parentElement.querySelectorAll(".tab-panel")
        );
        siloedItems.forEach((item) => {
            item.classList.remove("active");
        });
        document
            .getElementById(`tab-item-${e.target.dataset.tab}`)
            .classList.add("active");

        siloedPanels.forEach((item) => {
            // console.dir(item.parentElement.querySelectorAll(".tab-item"));
            item.classList.remove("active");
        });

        document
            .getElementById(`tab-panel-${e.target.dataset.tab}`)
            .classList.add("active");
    });
});
