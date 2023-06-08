// import "./styles.css";
wp.blocks.registerBlockType("themeblocks/pricingtable", {
    title: "Pricing Table",
    description: "Displays CDaaS pricing Table",
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
            "Pricing Table"
        );
    },
    save: () => null,
});
