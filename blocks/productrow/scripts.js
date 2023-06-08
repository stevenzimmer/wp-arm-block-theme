import apiFetch from "@wordpress/api-fetch";
import {
    InnerBlocks,
    InspectorControls,
    MediaUpload,
    MediaUploadCheck,
} from "@wordpress/block-editor";
import { PanelBody, PanelRow, Button } from "@wordpress/components";
import { registerBlockType } from "@wordpress/blocks";
// import { useSelect } from "@wordpress/data";
import { useEffect } from "@wordpress/element";

registerBlockType("themeblocks/productrow", {
    title: "Product Row",
    description: "Product row",
    supports: {
        align: ["full"],
    },
    attributes: {
        align: { type: "string", default: "full" },
        imgURL: { type: "string", default: productrow.fallbackGraphic },
        imgID: { type: "number", default: 0 },
    },
    edit: EditComponent,
    save: SaveComponent,
});

function EditComponent({ attributes, setAttributes }) {
    function handleFileSelect(x) {
        setAttributes({ imgID: x.id });
    }
    function removeMedia() {
        setAttributes({ imgID: 0, imgURL: productrow.fallbackGraphic });
    }
    //
    useEffect(() => {
        if (attributes.imgID) {
            async function go() {
                const response = await apiFetch({
                    path: `/wp/v2/media/${attributes.imgID}`,
                    method: "GET",
                });

                setAttributes({
                    imgURL: response.source_url,
                });
            }

            go();
        }
    }, [attributes.imgID]);
    const PRODUCT_ROW_TEMPLATE = [
        
        [
            "core/heading",
            {
                placeholder: "Product Title / Heading",
            },
        ],
        [
            "core/paragraph",
            {
                placeholder: "Product description text",
            },
        ],
     
    ];
    return (
        <>
            <InspectorControls>
                <PanelBody title="Product Graphic">
                    <PanelRow>
                        <MediaUploadCheck>
                            {attributes.imgID !== 0 && (
                                <>
                                    <MediaUpload
                                        title={"Replace Graphic"}
                                        value={attributes.imgID}
                                        onSelect={handleFileSelect}
                                        allowedTypes={["image"]}
                                        render={({ open }) => (
                                            <Button
                                                onClick={open}
                                                variant="secondary"
                                            >
                                                {"Replace Graphic"}
                                            </Button>
                                        )}
                                    />

                                    <Button
                                        onClick={removeMedia}
                                        isLink
                                        isDestructive
                                    >
                                        Remove Graphic
                                    </Button>
                                </>
                            )}
                        </MediaUploadCheck>
                        <MediaUploadCheck>
                            {attributes.imgID === 0 && (
                                <>
                                    <MediaUpload
                                        onSelect={handleFileSelect}
                                        value={attributes.imgID}
                                        render={({ open }) => {
                                            return (
                                                <Button
                                                    variant="primary"
                                                    onClick={open}
                                                >
                                                    Choose Graphic
                                                </Button>
                                            );
                                        }}
                                    />
                                </>
                            )}
                        </MediaUploadCheck>
                    </PanelRow>
                </PanelBody>
            </InspectorControls>
            <div className="flex w-full">
                <div className="w-1/2 px-6">
                    <div className="flex justify-end w-10/12">
                    <img
                        className="w-full h-full object-cover"
                        src={attributes["imgURL"]}
                    />
                    </div>
                    
                </div>
                <div className="w-1/2 px-6 prose">
                    <InnerBlocks
                        template={PRODUCT_ROW_TEMPLATE}
                        allowedBlocks={[
                            "core/heading",
                            "core/paragraph",
                            "core/spacer",
                            "themeblocks/sectionlink",
                        ]}
                    />
                </div>
            </div>
        </>
    );
}



function SaveComponent() {
    return <InnerBlocks.Content />;
}