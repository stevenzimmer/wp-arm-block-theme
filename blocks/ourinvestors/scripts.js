wp.blocks.registerBlockType("themeblocks/ourinvestors", {
    title: "Our Investors",
    description: "Our Investors component",
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
            "Our Investors"
        );
    },
    save: () => null,
});
