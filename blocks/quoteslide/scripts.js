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

registerBlockType("themeblocks/quoteslide", {
    title: "Quote slide",
    description: "Quote slide",
    supports: {
        align: ["full"],
    },
    attributes: {
        align: { type: "string", default: "full" },
        imgURL: { type: "string", default: quoteslide.fallbackLogo },
        imgID: { type: "number", default: 0 },
    },
    edit: EditComponent,
    save: SaveComponent,
});
function SaveComponent() {
    return <InnerBlocks.Content />;
}
function EditComponent({ attributes, setAttributes }) {
    function handleFileSelect(x) {
        setAttributes({ imgID: x.id });
    }
    function removeMedia() {
        setAttributes({ imgID: 0, imgURL: quoteslide.fallbackLogo });
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
    const QUOTE_TEMPLATE = [
        [
            "core/paragraph",
            {
                placeholder: "Quote text",
            },
        ],
        [
            "core/spacer",
            {
                height: 10,
            },
        ],
        [
            "core/paragraph",
            {
                placeholder: "Quote citation",
            },
        ],
    ];
    return (
        <>
            <InspectorControls>
                <PanelBody title="Quote logo">
                    <PanelRow>
                        <MediaUploadCheck>
                            {attributes.imgID !== 0 && (
                                <>
                                    <MediaUpload
                                        title={"Replace logo"}
                                        value={attributes.imgID}
                                        onSelect={handleFileSelect}
                                        allowedTypes={["image"]}
                                        render={({ open }) => (
                                            <Button
                                                onClick={open}
                                                variant="secondary"
                                            >
                                                {"Replace logo"}
                                            </Button>
                                        )}
                                    />

                                    <Button
                                        onClick={removeMedia}
                                        isLink
                                        isDestructive
                                    >
                                        Remove logo
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
                                                    Choose Logo
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
            <div className="flex items-center w-full bg-white mb-6">
                <div className="w-1/4 px-6 bg-grey-100">
                    <img
                        className="w-full h-full object-cover"
                        src={attributes["imgURL"]}
                    />
                </div>
                <div className="w-3/4 p-3">
                    <InnerBlocks
                        template={QUOTE_TEMPLATE}
                        allowedBlocks={[
                            "core/paragraph",
                            "core/spacer",
                            "themeblocks/heading",
                            "themeblocks/sectionlink",
                        ]}
                    />
                </div>
            </div>
        </>
    );
}
