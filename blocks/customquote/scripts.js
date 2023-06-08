import { registerBlockType } from "@wordpress/blocks";
import {
    ToolbarGroup,
    ToolbarButton,
    Popover,
    Button,
    PanelBody,
    PanelRow,
    ColorPalette,
    PanelHeader,
    TextareaControl,
    TextControl,
} from "@wordpress/components";
import { InnerBlocks, BlockControls } from "@wordpress/block-editor";
import { link } from "@wordpress/icons";
import { useState } from "@wordpress/element";
import { customColors } from "../../inc/colors";
// import { fontSizes } from "../../inc/typographynpm";
// import { useSelect } from "@wordpress/data";

registerBlockType("themeblocks/customquote", {
    title: "Custom Quote",
    description: "Custom Quote",
    attributes: {
        quoteCitation: { type: "string" },
        quoteSource: { type: "string" },
    },
    edit: EditComponent,
    save: () => <InnerBlocks.Content />,
});

function EditComponent({ attributes, setAttributes }) {
    function handleQuoteSourceChange(x) {
        setAttributes({ quoteSource: x });
    }
    function handleQuoteCitationChange(x) {
        setAttributes({ quoteCitation: x });
    }

    return (
        <div className="p-3">
            <div className="py-1 bg-white mb-2">
                <p className="text-center text-xl font-semibold">
                    Insert Quote text
                </p>
            </div>
            <InnerBlocks
                allowedBlocks={["core/spacer", "core/paragraph", "core/list"]}
            />
        </div>
    );
}
