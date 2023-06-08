wp.blocks.registerBlockType("themeblocks/ourteam", {
    title: "Our Team",
    description: "Our Team component",
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
            "Our Team"
        );
    },
    save: () => null,
});
