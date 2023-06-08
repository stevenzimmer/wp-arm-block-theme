import { registerBlockType } from "@wordpress/blocks";

import { InnerBlocks } from "@wordpress/block-editor";

registerBlockType("themeblocks/custombox", {
    title: "Custom Box",
    description: "Custom Box",
    edit: EditComponent,
    save: () => <InnerBlocks.Content />,
});

function EditComponent({ attributes, setAttributes }) {
    return (
        <div className="border p-6 rounded-lg h-full">
            <InnerBlocks
                allowedBlocks={[
                    "core/spacer",
                    "core/heading",
                    "core/paragraph",
                    "core/list",
                    "core/image",
                    "core/buttons",
                ]}
            />
        </div>
    );
}
