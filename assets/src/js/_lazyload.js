import Lazyload from "vanilla-lazyload";

const armoryLazyLoad = new Lazyload({
    elements_selector: ".lazy",
    load_delay: 0,
    callback_reveal: function (e) {
        if (e.dataset.bg) {
            e.classList.add("loaded");
        }
    },
});

export default armoryLazyLoad;
