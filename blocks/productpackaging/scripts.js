// import "./styles.css";
wp.blocks.registerBlockType("themeblocks/productpackaging", {
    title: "Product Packaging",
    description: "Product Packaging",
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
            "Product Packaging"
        );
    },
    save: () => null,
});
