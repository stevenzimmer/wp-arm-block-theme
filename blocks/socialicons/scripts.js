wp.blocks.registerBlockType("themeblocks/socialicons", {
    title: "Social Icons",
    description: "Social icons component",
    attributes: {
        align: { type: "string", default: "full" },
    },
    edit: () => {
        return wp.element.createElement(
            "div",
            {
                className: "text-center bg-grey-100 text-lg py-12",
            },
            "Social Icons"
        );
    },
    save: () => null,
});
