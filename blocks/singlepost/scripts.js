// import "./styles.css";
wp.blocks.registerBlockType("themeblocks/singlepost", {
    title: "Single Post",
    description: "Single Post Body content",
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
            "Single Post Placeholder"
        );
    },
    save: () => null,
});
