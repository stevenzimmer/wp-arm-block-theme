const modifyDefaultAlignment = (settings, name) => {
    // if (name !== "core/separator") {
    //     return settings;
    // }

    const newSettings = {
        ...settings,
        attributes: {
            ...settings.attributes,
            supports: {
                align: ["full"],
            },
            align: { type: "string", default: "full" },
        },
    };
    return newSettings;
};
wp.hooks.addFilter(
    "blocks.registerBlockType",
    "textdomain/change-media-text-default-alignment"
    // modifyDefaultAlignment
);

wp.domReady(() => {
    // wp.blocks.unregisterBlockType("core/heading");
    // wp.blocks.unregisterBlockType("core/template-part");
});
