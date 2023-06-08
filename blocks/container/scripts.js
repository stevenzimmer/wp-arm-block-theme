import { registerBlockType } from "@wordpress/blocks";
import { ToolbarGroup, ToolbarButton } from "@wordpress/components";
import { InnerBlocks, BlockControls } from "@wordpress/block-editor";

registerBlockType("themeblocks/container", {
    title: "Container",
    description: "Section Container",
    supports: {
        align: ["full"],
    },
    attributes: {
        width: { type: "string", default: "container" },
        align: { type: "string", default: "full" },
    },
    edit: EditComponent,
    save: SaveComponent,
});

function EditComponent({ attributes, setAttributes }) {
    return (
        <>
            <BlockControls>
                <ToolbarGroup>
                    <ToolbarButton
                        isPressed={attributes.width === "lg:w-[800px]"}
                        onClick={() => setAttributes({ width: "lg:w-[800px]" })}
                    >
                        Narrow
                    </ToolbarButton>
                    <ToolbarButton
                        isPressed={attributes.width === "lg:w-[1010px]"}
                        onClick={() =>
                            setAttributes({ width: "lg:w-[1010px]" })
                        }
                    >
                        Medium
                    </ToolbarButton>
                    <ToolbarButton
                        isPressed={attributes.width === "container"}
                        onClick={() => setAttributes({ width: "container" })}
                    >
                        Default
                    </ToolbarButton>
                </ToolbarGroup>
            </BlockControls>
            <div className={`mx-auto ${attributes.width} border p-1`}>
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
