import apiFetch from "@wordpress/api-fetch";
import { InnerBlocks, InspectorControls } from "@wordpress/block-editor";
import { registerBlockType } from "@wordpress/blocks";
import { PanelBody, PanelRow, TextControl } from "@wordpress/components";
// import { useSelect } from "@wordpress/data";import { useEffect } from "@wordpress/element";

const kebabCase = (string) =>
    string
        .replace(/([a-z])([A-Z])/g, "$1-$2")
        .replace(/[\s_]+/g, "-")
        .toLowerCase();
registerBlockType("themeblocks/tabsitem", {
    title: "Tabs Item",
    description: "Tabs Item",
    supports: {
        align: ["full"],
    },
    attributes: {
        align: { type: "string", default: "full" },
        tabID: { type: "string" },
        text: { type: "string" },
    },
    edit: EditComponent,
    save: SaveComponent,
});
function SaveComponent() {
    return <InnerBlocks.Content />;
}

function EditComponent({ attributes, setAttributes }) {
    function handleTextChange(x) {
        setAttributes({ text: x });
        setAttributes({ tabID: kebabCase(x) });
    }
    return (
        <div className="mb-6">
            <div className="p-1 bg-white border mb-3">
                <TextControl
                    Placeholder="Tab text..."
                    help={`ID: ${attributes.tabID}`}
                    type="text"
                    value={attributes.text}
                    onChange={handleTextChange}
                />
            </div>
        </div>
    );
}
