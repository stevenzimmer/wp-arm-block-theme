wp.blocks.registerBlockType("themeblocks/upcomingevents", {
    title: "Upcoming Events",
    description: "The upcoming events",
    edit: () => {
        return wp.element.createElement(
            "div",
            {
                className: "text-center bg-grey-100 text-lg py-20",
            },
            "Upcoming events"
        );
    },
    save: () => null,
});
