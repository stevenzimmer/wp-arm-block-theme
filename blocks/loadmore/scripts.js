import { registerBlockType } from "@wordpress/blocks";
import { ToolbarGroup, ToolbarButton } from "@wordpress/components";
import { InnerBlocks, BlockControls } from "@wordpress/block-editor";

registerBlockType("themeblocks/loadmore", {
    title: "Load More",
    description: "Section Container",
    attributes: {
        width: { type: "string", default: "container" },
    },
    edit: EditComponent,
    save: SaveComponent,
});
//
function EditComponent({ attributes, setAttributes }) {
    return (
        <>
            <div className={`mx-auto border-2 p-1`}>
                <div className="bg-indigo-50 py-3 text-lg mb-6 text-center ">
                    <p>Load More Content</p>
                </div>
                <InnerBlocks />
            </div>
        </>
    );
}

function SaveComponent({ attributes }) {
    return (
        <>
            <InnerBlocks.Content />
        </>
    );
}
