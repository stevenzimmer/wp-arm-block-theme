import { registerBlockType } from "@wordpress/blocks";

import {
    PanelBody,
    PanelRow,
    TextControl,
    SelectControl,
    PanelHeader,
    ColorPalette,
} from "@wordpress/components";
import { InspectorControls, useBlockProps, InnerBlocks } from "@wordpress/block-editor";
import { customColors } from "../../inc/colors";

registerBlockType("themeblocks/logoscarousel", {
    title: "Logos Carousel",
    description: "Logos Carousel",
    supports: {
        align: ["full"],
    },
    attributes: {
        logoColor: { type: "string", default: "white" },
        bgHex: { type: "string", default: "#263D5C" },
        align: { type: "string", default: "full" },
    },
    edit: EditComponent,
    save: () => null,
});

function EditComponent({ attributes, setAttributes }) {
    function handleLogoColorChange(x) {
        setAttributes({ logoColor: x });
    }

    // const blockProps = useBlockProps();

    function handleBgColorChange(hex) {
        setAttributes({ bgHex: hex });
    }

    return (
        <>
            <InspectorControls>
                <PanelBody title="Logo Color" initialOpen={true}>
                    <PanelRow className="w-full">
                        <SelectControl
                            className="w-full"
                            value={attributes.logoColor}
                            options={[
                                { label: "White", value: "white" },
                                { label: "Brand", value: "brand" },
                            ]}
                            onChange={handleLogoColorChange}
                        />
                    </PanelRow>
                </PanelBody>
                <PanelBody title="Background Color" initialOpen={true}>
                    <PanelRow>
                        <ColorPalette
                            colors={customColors}
                            value={attributes.bgHex}
                            onChange={handleBgColorChange}
                        />
                    </PanelRow>
                </PanelBody>
            </InspectorControls>

            <div
                className={`py-6 text-center text-lg alignfull ${
                    attributes.logoColor === "white" ? "text-white" : ""
                }`}
                style={{ backgroundColor: `${attributes.bgHex}` }}
            >
                Logo Color:{" "}
                <span className="font-bold">{attributes.logoColor}</span>
            </div>
        </>
    );
}
