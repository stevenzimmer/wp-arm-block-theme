wp.blocks.registerBlockType("themeblocks/latestblogposts", {
    title: "Latest Blog Posts",
    description: "Latest Blog Posts component",
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
            "Latest Blog Posts"
        );
    },
    save: () => null,
});
