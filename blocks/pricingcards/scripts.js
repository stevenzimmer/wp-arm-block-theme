// import "./styles.css";
wp.blocks.registerBlockType("themeblocks/pricingcards", {
    title: "Pricing Cards",
    description: "Displays CDaaS pricing cards",
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
            "CDaaS Pricing Cards"
        );
    },
    save: () => null,
});
