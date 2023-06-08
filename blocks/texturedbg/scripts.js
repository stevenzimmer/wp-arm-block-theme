import { InnerBlocks, InspectorControls } from "@wordpress/block-editor";

import {
    PanelBody,
    PanelRow,
    ColorPalette,
    SelectControl,
} from "@wordpress/components";
import { registerBlockType } from "@wordpress/blocks";
import { customColors } from "../../inc/colors";

registerBlockType("themeblocks/texturedbg", {
    title: "Textured Background",
    description: "Textured Background",
    supports: {
        align: ["full"],
    },
    attributes: {
        bgColor: { type: "string", default: "#4AC1E0" },
        textureColor: { type: "string", default: "#ffffff" },
        texture: { type: "string", default: "sides" },
        align: { type: "string", default: "full" },
    },
    edit: EditComponent,
    save: () => <InnerBlocks.Content />,
});

function EditComponent({ attributes, setAttributes }) {
    function handleColorChange(hex) {
        // console.log({ hex });
        setAttributes({ bgColor: hex });
    }

    function handleTextureColorChange(hex) {
        // console.log({ hex });
        setAttributes({ textureColor: hex });
    }

    function handleTextureChange(x) {
        setAttributes({ texture: x });
    }

    return (
        <>
            <InspectorControls>
                <PanelBody title="Background Color" initialOpen={true}>
                    <PanelRow>
                        <ColorPalette
                            colors={customColors}
                            value={attributes.bgColor}
                            onChange={handleColorChange}
                        />
                    </PanelRow>
                </PanelBody>

                <PanelBody title="Texture Color" initialOpen={true}>
                    <PanelRow>
                        <ColorPalette
                            colors={customColors}
                            value={attributes.textureColor}
                            onChange={handleTextureColorChange}
                        />
                    </PanelRow>
                </PanelBody>
                <PanelBody title="Texture style" initialOpen={true}>
                    <PanelRow>
                        <SelectControl
                            className="w-full"
                            label="Texture Style"
                            value={attributes.texture}
                            options={[
                                { label: "Sides", value: "sides" },
                                { label: "Bottom", value: "bottom" },
                            ]}
                            onChange={handleTextureChange}
                        />
                    </PanelRow>
                </PanelBody>
            </InspectorControls>
            <section
                className="relative"
                style={{ backgroundColor: attributes.bgColor }}
            >
                {attributes.texture === "sides" && (
                    <>
                        <TexturedBlocks
                            pos="left-0"
                            rotate=""
                            textureColor={attributes.textureColor}
                        />
                        <TexturedBlocks
                            pos="right-0"
                            rotate="rotate-180"
                            textureColor={attributes.textureColor}
                        />
                    </>
                )}
                {attributes.texture === "bottom" && (
                    <>
                        <div className="absolute w-full bottom-0 left-0 right-0 bg-blue-primary h-20"></div>
                        <div className="absolute w-full h-40 bottom-0 left-0 right-0">
                            <img
                                className="w-full"
                                src={texturedbg.texture_3}
                                alt="Texture 3 graphic"
                            />
                        </div>
                    </>
                )}

                <InnerBlocks />
            </section>
        </>
    );
}

function TexturedBlocks({ pos, rotate, textureColor }) {
    return (
        <div
            className={`absolute ${pos} ${rotate} transform top-0 bottom-0 lg:w-48 h-full z-0`}
        >
            <div className="w-6 h-6 absolute top-8 left-8">
                <div
                    style={{
                        backgroundColor: textureColor,
                        borderColor: textureColor,
                    }}
                    className="border w-3 h-3 absolute top-0 left-0"
                ></div>
                <div
                    style={{
                        backgroundColor: textureColor,
                        borderColor: textureColor,
                    }}
                    className="border w-3 h-3 absolute bottom-0 right-0"
                ></div>
            </div>
            <div className="w-9 h-6 absolute top-2 right-8">
                <div
                    style={{
                        backgroundColor: textureColor,
                        borderColor: textureColor,
                    }}
                    className="border w-3 h-3 absolute top-0 left-0"
                ></div>
                <div
                    style={{
                        backgroundColor: textureColor,
                        borderColor: textureColor,
                    }}
                    className="border w-3 h-3 absolute bottom-0 right-3"
                ></div>
                <div
                    style={{
                        backgroundColor: textureColor,
                        borderColor: textureColor,
                    }}
                    className="border w-3 h-3 absolute top-0 right-0"
                ></div>
            </div>
            <div className="w-3 h-3 absolute bottom-8 right-8">
                <div
                    style={{
                        borderColor: textureColor,
                    }}
                    className="border w-full h-full absolute bottom-0 right-0"
                ></div>
            </div>
            <div className="w-3 h-3 absolute bottom-48 right-0">
                <div
                    style={{
                        backgroundColor: textureColor,
                        borderColor: textureColor,
                    }}
                    className="border w-full h-full absolute bottom-0 right-0"
                ></div>
            </div>
            <div className="w-3 h-3 absolute bottom-1 left-1">
                <div
                    style={{
                        backgroundColor: textureColor,
                        borderColor: textureColor,
                    }}
                    className=" border w-full h-full absolute bottom-0 right-0"
                ></div>
            </div>
            <div className="w-6 h-6 absolute top-32 left-24">
                <div
                    style={{
                        borderColor: textureColor,
                    }}
                    className="bg-transparent border w-3 h-3 absolute top-0 right-0"
                ></div>
                <div
                    style={{
                        borderColor: textureColor,
                    }}
                    className="bg-transparent border w-3 h-3 absolute bottom-0 left-0"
                ></div>
            </div>
            <div className="w-9 h-6 absolute bottom-20 left-8 transform rotate-180">
                <div
                    style={{
                        backgroundColor: textureColor,
                        borderColor: textureColor,
                    }}
                    className="border w-3 h-3 absolute top-0 left-0"
                ></div>
                <div
                    style={{
                        backgroundColor: textureColor,
                        borderColor: textureColor,
                    }}
                    className="border w-3 h-3 absolute bottom-0 right-3"
                ></div>
                <div
                    style={{
                        backgroundColor: textureColor,
                        borderColor: textureColor,
                    }}
                    className="border w-3 h-3 absolute top-0 right-0"
                ></div>
            </div>
        </div>
    );
}
