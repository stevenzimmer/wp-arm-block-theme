// import "./styles.css";
wp.blocks.registerBlockType("themeblocks/homepagerows", {
    title: "Homepage Rows",
    description: "Displays homepage content",
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
            "Homepage Rows"
        );
    },
    save: () => null,
});
