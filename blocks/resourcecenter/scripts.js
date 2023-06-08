// import "./styles.css";
wp.blocks.registerBlockType("themeblocks/resourcecenter", {
    title: "Resource Center",
    description: "Resource Center",
    attributes: {
        // eventPostId: { type: "string" },
        // imgURL: { type: "string", default: homepagehero.fallbackImage },
        // imgID: { type: "number", default: 0 },
    },
    edit: () => {
        return wp.element.createElement(
            "div",
            {
                className: "text-center bg-grey-100 text-lg py-12",
            },
            "Resource Center"
        );
    },
    save: () => null,
});
