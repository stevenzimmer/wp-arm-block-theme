wp.blocks.registerBlockType("themeblocks/globalnav", {
    title: "Global Nav",
    description: "Global Navigation component",
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
            "Global Navigation"
        );
    },
    save: () => null,
});
