// import "./styles.css";
wp.blocks.registerBlockType("themeblocks/marketplacelink", {
    title: "AWS Marketplace Link",
    description: "Displays AWS Marketplace Link cards",
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
            "AWS Marketplace Link"
        );
    },
    save: () => null,
});
