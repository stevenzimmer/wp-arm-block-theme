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

registerBlockType("themeblocks/homepagehero", {
    title: "Top Page Hero Section",
    description: "Hero component for top level pages",
    supports: {
        align: ["full"],
    },
    attributes: {
        eventPostId: { type: "string" },
        imgURL: { type: "string", default: homepagehero.fallbackImage },
        imgID: { type: "number", default: 0 },
    },
    edit: EditComponent,
    save: () => <InnerBlocks.Content />,
});

function EditComponent({ attributes, setAttributes }) {
    function handleFileSelect(x) {
        setAttributes({ imgID: x.id });
    }
    function removeMedia() {
        setAttributes({ imgID: 0, imgURL: homepagehero.fallbackImage });
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
    return (
        <>
            <InspectorControls>
                <PanelBody title="Background Image">
                    <PanelRow>
                        <MediaUploadCheck>
                            {attributes.imgID !== 0 && (
                                <>
                                    <MediaUpload
                                        title={"Replace image"}
                                        value={attributes.imgID}
                                        onSelect={handleFileSelect}
                                        allowedTypes={["image"]}
                                        render={({ open }) => (
                                            <Button
                                                onClick={open}
                                                variant="secondary"
                                            >
                                                {"Replace image"}
                                            </Button>
                                        )}
                                    />

                                    <Button
                                        onClick={removeMedia}
                                        isLink
                                        isDestructive
                                    >
                                        Remove Image
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
                                                    Choose Image
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
            <header className="relative">
                <div className="container relative z-10 py-12 lg:py-20">
                    <InnerBlocks />
                </div>
                <div className="absolute w-full sm:w-3/5 right-0 top-0 h-full ">
                    <img
                        className="w-full h-full object-cover"
                        src={attributes["imgURL"]}
                    />
                </div>
                <div className="absolute w-4/5 sm:w-4/5 h-full inset-0 bg-gradient-to-r from-white via-white to-transparent "></div>
            </header>
        </>
    );
}
