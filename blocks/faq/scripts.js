import { registerBlockType } from "@wordpress/blocks";
import {
    ToolbarGroup,
    ToolbarButton,
    TextControl,
} from "@wordpress/components";
import { InnerBlocks, useBlockProps } from "@wordpress/block-editor";

registerBlockType("themeblocks/faq", {
    title: "FAQ",
    description: "Product FAQ",
    supports: {
        align: ["full"],
    },
    attributes: {
        align: { type: "string", default: "full" },
        question: { type: "string", default: "" },
    },
    edit: EditComponent,
    save: SaveComponent,
});
//
function EditComponent({ attributes, setAttributes }) {
    function handleQuestionChange(x) {
        setAttributes({ question: x });
    }
    return (
        <>
            <div className="bg-grey-100 p-3 mb-6">
                <div className="mb-2">
                    <p className="font-bold mb-2">FAQ Question / Header</p>
                    <TextControl
                        placeholder="Enter the Question / Header"
                        type="text"
                        value={attributes.question}
                        onChange={handleQuestionChange}
                        className="font-asMedium text-[20px]"
                    />
                </div>
                <div
                    {...useBlockProps}
                    className={` bg-white p-2 prose max-w-full`}
                >
                    <InnerBlocks />
                </div>
            </div>
        </>
    );
}
function SaveComponent() {
    return (
        <div {...useBlockProps}>
            <InnerBlocks.Content />
        </div>
    );
}
