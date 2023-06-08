import apiFetch from "@wordpress/api-fetch";
import { InnerBlocks, InspectorControls } from "@wordpress/block-editor";
import { registerBlockType } from "@wordpress/blocks";
import { PanelBody, PanelRow, TextControl } from "@wordpress/components";

const kebabCase = (string) =>
    string
        .replace(/([a-z])([A-Z])/g, "$1-$2")
        .replace(/[\s_]+/g, "-")
        .toLowerCase();
registerBlockType("themeblocks/tabspanel", {
    title: "Tabs Panel",
    description: "Tabs Panel",
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
                    Placeholder="Tab title..."
                    help={`ID: ${attributes.tabID}`}
                    type="text"
                    value={attributes.text}
                    onChange={handleTextChange}
                />
            </div>
            {attributes.text && (
                <>
                    <div className="py-1 mb-3 bg-grey-100">
                        <div className="">
                            <p className="text-center">
                                Tab content for{" "}
                                <span className="font-semibold">
                                    {attributes.text}
                                </span>
                            </p>
                        </div>
                    </div>
                    <InnerBlocks />
                </>
            )}
        </div>
    );
}
