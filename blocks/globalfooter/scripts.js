wp.blocks.registerBlockType("themeblocks/globalfooter", {
    title: "Global Footer",
    description: "Global Footer component",
    supports: {
        align: ["full"],
    },
    attributes: {
        align: { type: "string", default: "full" },
    },
    edit: () => {
        return wp.element.createElement(
            "div",
            {
                className: "text-center bg-grey-100 text-lg py-12",
            },
            "Global Footer"
        );
    },
    save: () => null,
});
