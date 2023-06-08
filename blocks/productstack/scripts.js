import { InnerBlocks } from "@wordpress/block-editor";
import { registerBlockType } from "@wordpress/blocks";

registerBlockType("themeblocks/productstack", {
    title: "Product Stack",
    description: "Product Stack",
    edit: EditComponent,
    save: SaveComponent,
});

function EditComponent({ attributes, setAttributes }) {
    return (           
            <div className="">
                <p className="text-center text-2xl mb-6 font-semibold">
                    Product Stack
                </p>
                <InnerBlocks allowedBlocks={["core/spacer","themeblocks/productrow"]} />
            </div>
        
    );
}

function SaveComponent() {
    return <InnerBlocks.Content />;
}