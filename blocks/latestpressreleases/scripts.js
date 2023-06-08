wp.blocks.registerBlockType("themeblocks/latestpressreleases", {
    title: "Latest Press Releases",
    description: "Latest Press Releases component",
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
            "Latest Press Releases"
        );
    },
    save: () => null,
});
