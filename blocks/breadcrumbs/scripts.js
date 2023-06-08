// import "./styles.css";
wp.blocks.registerBlockType("themeblocks/breadcrumbs", {
    title: "Breadcrumbs",
    description: "Displays page breadcrumbs",
    attributes: {
        // eventPostId: { type: "string" },
        // imgURL: { type: "string", default: homepagehero.fallbackImage },
        // imgID: { type: "number", default: 0 },
    },
    edit: () => {
        return wp.element.createElement(
            "div",
            {
                className: "text-center bg-grey-100 text-lg py-3",
            },
            "Breadcrumbs"
        );
    },
    save: () => null,
});
