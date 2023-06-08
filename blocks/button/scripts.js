import "./styles.css";
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
} from "@wordpress/components";
import {
    RichText,
    InspectorControls,
    BlockControls,
    __experimentalLinkControl as LinkControl,
} from "@wordpress/block-editor";
import { link } from "@wordpress/icons";
import { useState } from "@wordpress/element";
import { customColors } from "../../inc/colors";
// import { fontSizes } from "../../inc/typographynpm";
// import { useSelect } from "@wordpress/data";

registerBlockType("themeblocks/button", {
    title: "Button",
    description: "Custom Theme Button",
    attributes: {
        text: { type: "string" },
        linkObject: { type: "object", default: { url: "" } },
        bgHex: { type: "string", default: customColors[0].color },
        textColor: { type: "string", default: customColors[1].color },
    },
    edit: EditComponent,
    save: () => null,
});

function EditComponent({ attributes, setAttributes }) {
    function handleTextChange(x) {
        setAttributes({ text: x });
    }

    function buttonHandler() {
        setIsLinkPickerVisible((prev) => !prev);
    }

    function handleLinkChange(newLink) {
        setAttributes({ linkObject: newLink });
    }

    function handleBgColorChange(hex) {
        // console.log({ hex });
        setAttributes({ bgHex: hex });
    }

    function handleTextColorChange(hex) {
        // console.log({ hex });
        setAttributes({ textColor: hex });
    }

    const [isLinkPickerVisible, setIsLinkPickerVisible] = useState(false);

    return (
        <>
            <BlockControls>
                <ToolbarGroup>
                    <ToolbarButton icon={link} onClick={buttonHandler} />
                </ToolbarGroup>
            </BlockControls>
            <InspectorControls>
                <PanelBody title="Button Colors" initialOpen={true}>
                    <PanelRow>
                        <PanelHeader>Background Color</PanelHeader>
                        <ColorPalette
                            colors={customColors}
                            value={attributes.bgHex}
                            onChange={handleBgColorChange}
                        />
                    </PanelRow>
                    <PanelRow>
                        <PanelHeader>Text Color</PanelHeader>
                        <ColorPalette
                            colors={customColors}
                            value={attributes.textColor}
                            onChange={handleTextColorChange}
                        />
                    </PanelRow>
                </PanelBody>
            </InspectorControls>
            <RichText
                allowedFormats={[]}
                tagName={"a"}
                className={`btn hover:bg-opacity-80 transition-all duration-200 text-center`}
                style={{
                    backgroundColor: attributes.bgHex,
                    color: attributes.textColor,
                }}
                value={attributes.text}
                onChange={handleTextChange}
                placeholder={"Button text..."}
            />
            {isLinkPickerVisible && (
                <Popover
                    poster="middle center"
                    nFocusOutside={() => setIsLinkPickerVisible(false)}
                >
                    <LinkControl
                        settings={[]}
                        value={attributes.linkObject}
                        onChange={handleLinkChange}
                    />
                    <Button
                        variant="primary"
                        onClick={() => setIsLinkPickerVisible(false)}
                        className="w-full block"
                    >
                        Confirm Link
                    </Button>
                </Popover>
            )}
        </>
    );
}

function SaveComponent({ attributes }) {
    return (
        <>
            <a
                title={`Link to ${attributes.linkObject.title} ${attributes.linkObject.type}`}
                href={attributes.linkObject.url}
                style={{
                    backgroundColor: attributes.bgHex,
                    color: attributes.textColor,
                }}
                className={`btn hover:bg-opacity-80 transition-all duration-200 text-center`}
            >
                {attributes.text}
            </a>
        </>
    );
}
