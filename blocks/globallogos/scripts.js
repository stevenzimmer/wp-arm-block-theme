wp.blocks.registerBlockType("themeblocks/globallogos", {
    title: "Global Logos",
    description: "Global Logos component",

    edit: () => {
        return wp.element.createElement(
            "div",
            {
                className: "text-center bg-grey-100 text-lg py-12",
            },
            "Global Customer Logos"
        );
    },
    save: () => null,
});
