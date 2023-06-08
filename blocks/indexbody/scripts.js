// import "./styles.css";
wp.blocks.registerBlockType("themeblocks/indexbody", {
    title: "Index Body",
    description: "Index Body component",
    edit: () => {
        return wp.element.createElement(
            "div",
            {
                className: "text-center bg-grey-100 text-lg py-12",
            },
            "Index Body"
        );
    },
    save: () => null,
});
