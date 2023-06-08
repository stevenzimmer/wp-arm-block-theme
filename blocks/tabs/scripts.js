import apiFetch from "@wordpress/api-fetch";
import { InnerBlocks } from "@wordpress/block-editor";
import { registerBlockType } from "@wordpress/blocks";
// import { useSelect } from "@wordpress/data";import { useEffect } from "@wordpress/element";

registerBlockType("themeblocks/tabs", {
    title: "Tabs",
    description: "Tabs",
    supports: {
        align: ["full"],
    },
    attributes: {
        align: { type: "string", default: "full" },
    },
    edit: EditComponent,
    save: SaveComponent,
});
function SaveComponent() {
    return <InnerBlocks.Content />;
}

function EditComponent({ attributes, setAttributes }) {
    return (
        <div className="p-3 bg-grey-200">
            <div className="container">
                <p className="text-center text-2xl mb-6 font-semibold">
                    Tab nav
                </p>
                <InnerBlocks
                    orientation="horizontal"
                    allowedBlocks={["themeblocks/tabsitem"]}
                />
            </div>
        </div>
    );
}
