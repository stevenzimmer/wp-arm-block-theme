import { registerBlockType } from "@wordpress/blocks";
import {
    ToolbarGroup,
    ToolbarButton,
    Dropdown,
    PanelBody,
    PanelRow,
    ColorPalette,
} from "@wordpress/components";
import {
    AlignmentControl,
    RichText,
    BlockControls,
    useBlockProps,
    InspectorControls,
    // FontSizePicker,
} from "@wordpress/block-editor";
import { FontSizePicker } from "@wordpress/components";
import { useState } from "@wordpress/element";
import { __ } from "@wordpress/i18n";
// import { fontSizes } from "../../inc/typography";
import { customColors } from "../../inc/colors";
import { useSelect } from "@wordpress/data";

registerBlockType("themeblocks/heading", {
    title: "Heading",
    description: "Heading used as section headers",
    attributes: {
        textAlign: { type: "string" },
        text: { type: "string" },
        tag: { type: "string", default: "h1" },
        textColor: { type: "string", default: "#000" },
        fontStyle: { type: "string", default: "font-asBold" },
        textSize: { type: "string", default: "30" },
    },
    edit: EditComponent,
    save: SaveComponent,
});

function EditComponent({ attributes, setAttributes }) {
    function handleTextChange(x) {
        setAttributes({ text: x });
    }
    function handleTextSizeChange(x) {
        setAttributes({ textSize: x });
    }
    function handleColorChange(hex) {
        // console.log({ hex });
        setAttributes({ textColor: hex });
    }

    return (
        <>
            <BlockControls>
                <ToolbarGroup>
                    <AlignmentControl
                        value={attributes.textAlign}
                        onChange={(nextAlign) => {
                            // console.log({ nextAlign });
                            setAttributes({ textAlign: nextAlign });
                        }}
                    />
                </ToolbarGroup>

                <ToolbarGroup>
                    <ToolbarButton
                        isPressed={attributes.tag === "h1"}
                        onClick={() => setAttributes({ tag: "h1" })}
                    >
                        H1
                    </ToolbarButton>
                    <ToolbarButton
                        isPressed={attributes.tag === "h2"}
                        onClick={() => setAttributes({ tag: "h2" })}
                    >
                        H2
                    </ToolbarButton>

                    <ToolbarButton
                        isPressed={attributes.tag === "h3"}
                        onClick={() => setAttributes({ tag: "h3" })}
                    >
                        H3
                    </ToolbarButton>
                </ToolbarGroup>
            </BlockControls>
            <InspectorControls>
                <PanelBody title="Heading Color" initialOpen={true}>
                    <PanelRow>
                        <ColorPalette
                            colors={customColors}
                            value={attributes.textColor}
                            onChange={handleColorChange}
                        />
                    </PanelRow>
                </PanelBody>
                <PanelBody title="Heading Size" initialOpen={true}>
                    <PanelRow>
                        <FontSizePicker
                            value={attributes.textSize}
                            fallbackFontSize={30}
                            onChange={handleTextSizeChange}
                        />
                    </PanelRow>
                </PanelBody>
            </InspectorControls>
            <RichText
                tagName={attributes.tag}
                value={attributes.text}
                onChange={handleTextChange}
                placeholder={"Heading..."}
                style={{
                    color: attributes.textColor,
                    textAlign: attributes.textAlign,
                    fontSize: attributes.textSize,
                }}
                textAlign={attributes.textAlign}
            />
        </>
    );
}

function SaveComponent({ attributes }) {
    return (
        <>
            <RichText.Content
                tagName={attributes.tag}
                value={attributes.text}
                style={{
                    color: attributes.textColor,
                    textAlign: attributes.textAlign,
                    fontSize: attributes.textSize,
                }}
            />
        </>
    );
}
