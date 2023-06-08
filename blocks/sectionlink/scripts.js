import { registerBlockType } from "@wordpress/blocks";
import {
    ToolbarGroup,
    ToolbarButton,
    Popover,
    Button,
    PanelBody,
    PanelRow,
    ColorPalette,
    Flex,
    FlexItem,
} from "@wordpress/components";
import {
    RichText,
    InspectorControls,
    BlockControls,
    __experimentalLinkControl as LinkControl,
} from "@wordpress/block-editor";
import { link, alignLeft, alignRight, alignCenter } from "@wordpress/icons";
import { useState } from "@wordpress/element";
import { customColors } from "../../inc/colors";
// import { useSelect } from "@wordpress/data";

registerBlockType("themeblocks/sectionlink", {
    title: "Section Link",
    description: "Custom Link for sections",
    attributes: {
        text: { type: "string" },
        linkObject: { type: "object", default: { url: "" } },
        textColor: { type: "string", default: "#000000" },
        textAlign: { type: "string", default: "right" },
        flexJustify: { type: "string", default: "flex-end" },
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

    function handleColorChange(hex) {
        setAttributes({ textColor: hex });
    }

    const [isLinkPickerVisible, setIsLinkPickerVisible] = useState(false);

    return (
        <>
            <BlockControls>
                <ToolbarGroup>
                    <ToolbarButton icon={link} onClick={buttonHandler} />
                </ToolbarGroup>
                <ToolbarGroup>
                    <ToolbarButton
                        isPressed={attributes.textAlign === "left"}
                        icon={alignLeft}
                        onClick={() => {
                            setAttributes({ textAlign: "left" });
                            setAttributes({ flexJustify: "flex-start" });
                        }}
                    />
                    <ToolbarButton
                        isPressed={attributes.textAlign === "center"}
                        icon={alignCenter}
                        onClick={() => {
                            setAttributes({ textAlign: "center" });
                            setAttributes({ flexJustify: "center" });
                        }}
                    />
                    <ToolbarButton
                        isPressed={attributes.textAlign === "right"}
                        icon={alignRight}
                        onClick={() => {
                            setAttributes({ textAlign: "right" });
                            setAttributes({ flexJustify: "flex-end" });
                        }}
                    />
                </ToolbarGroup>
            </BlockControls>
            <InspectorControls>
                <PanelBody title="Text Color" initialOpen={true}>
                    <PanelRow>
                        <ColorPalette
                            colors={customColors}
                            value={attributes.textColor}
                            onChange={handleColorChange}
                        />
                    </PanelRow>
                </PanelBody>
            </InspectorControls>

            <Flex
                justify={attributes.flexJustify}
                gap={2}
                className={`group`}
                align={`center`}
                style={{ color: attributes.textColor }}
            >
                <FlexItem>
                    <RichText
                        allowedFormats={[]}
                        tagName={"a"}
                        className={` no-underline hover:no-underline hover:opacity-80 transition-all duration-200 font-bold text-[14px]`}
                        value={attributes.text}
                        onChange={handleTextChange}
                        placeholder={"Link text..."}
                        style={{ color: attributes.textColor }}
                    />
                </FlexItem>
                <FlexItem>
                    <span className="transform inline-block transition-transform group-hover:translate-x-0.5 text-xs">
                        &#8594;
                    </span>
                </FlexItem>
            </Flex>
            {isLinkPickerVisible && (
                <Popover
                    poster="middle center"
                    onFocusOutside={() => setIsLinkPickerVisible(false)}
                >
                    <LinkControl
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
