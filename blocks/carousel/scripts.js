import { InnerBlocks } from "@wordpress/block-editor";
import { registerBlockType } from "@wordpress/blocks";

registerBlockType("themeblocks/carousel", {
    title: "Carousel",
    description: "Carousel",
    edit: EditComponent,
    save: SaveComponent,
});

function EditComponent({ attributes, setAttributes }) {
    return (
        <div className="p-3 bg-indigo-50">
            <div className="container">
                <p className="text-center text-2xl mb-6 font-semibold">
                    Carousel slides
                </p>
                <InnerBlocks allowedBlocks={["themeblocks/quoteslide"]} />
            </div>
        </div>
    );
}

function SaveComponent() {
    return <InnerBlocks.Content />;
}