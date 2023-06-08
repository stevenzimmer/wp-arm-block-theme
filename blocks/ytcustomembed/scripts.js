import apiFetch from "@wordpress/api-fetch";
import { useEffect } from "@wordpress/element";
import { registerBlockType } from "@wordpress/blocks";
import { TextControl, Button, CheckboxControl } from "@wordpress/components";
import { MediaUpload, MediaUploadCheck } from "@wordpress/block-editor";

registerBlockType("themeblocks/ytcustomembed", {
    title: "YouTube Custom Embed",
    description: "Embed a YouTube Video with custom thumbnail",
    attributes: {
        videoID: { type: "string", default: "" },
        imgURL: { type: "string", default: ytcustomembed.defaultThumbnail },
        imgID: { type: "number", default: 0 },
        thumbnailText: { type: "string", default: "" },
        overlay: { type: "boolean", default: false },
    },
    edit: EditComponent,
    save: () => null,
});

function EditComponent({ attributes, setAttributes }) {
    function handleIDChange(x) {
        setAttributes({ videoID: x });
    }

    function handleTextChange(x) {
        setAttributes({ thumbnailText: x });
    }

    function handleFileSelect(x) {
        setAttributes({ imgID: x.id });
    }
    function removeMedia() {
        setAttributes({ imgID: 0, imgURL: ytcustomembed.defaultThumbnail });
    }
    function toggleOverlay(x) {
        setAttributes({ overlay: x });
    }

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
            <div className="p-6 bg-white">
                <div className="py-6 bg-grey-50">
                    <div className="text-center text-lg mb-6">
                        YouTube Custom Embed
                    </div>
                    <div className="px-12">
                        {attributes.imgID === 0 && (
                            <>
                                <div className="mb-6 px-6">
                                    <div className="mb-6 relative">
                                        <img
                                            src={attributes.imgURL}
                                            alt="Default Thumbnail graphic"
                                            className="w-full"
                                        />
                                        <div className="absolute w-full h-full inset-0 flex justify-center items-center">
                                            <div className="text-white text-lg text-center font-bold">
                                                Default Thumbnail graphic
                                            </div>
                                        </div>
                                    </div>
                                    <MediaUploadCheck>
                                        <MediaUpload
                                            onSelect={handleFileSelect}
                                            value={attributes.imgID}
                                            render={({ open }) => {
                                                return (
                                                    <Button
                                                        variant="primary"
                                                        className="bg-[#263D5C]"
                                                        onClick={open}
                                                    >
                                                        Set New Thumbnail
                                                    </Button>
                                                );
                                            }}
                                        />
                                    </MediaUploadCheck>
                                </div>
                            </>
                        )}
                        {attributes.imgID !== 0 && (
                            <>
                                <div className="mb-6 px-6">
                                    <div className="mb-6 relative">
                                        <img
                                            src={attributes.imgURL}
                                            alt="Thumbnail graphic"
                                            className="w-full"
                                        />
                                        {attributes.overlay && (
                                            <div className="absolute w-full h-full inset-0 bg-[#21344C] opacity-50"></div>
                                        )}
                                    </div>
                                    <div className="flex items-center">
                                        <div className="w-1/2">
                                            <MediaUploadCheck>
                                                <MediaUpload
                                                    title={"Replace thumbnail"}
                                                    value={attributes.imgID}
                                                    onSelect={handleFileSelect}
                                                    allowedTypes={["image"]}
                                                    render={({ open }) => (
                                                        <Button
                                                            onClick={open}
                                                            variant="secondary"
                                                        >
                                                            {
                                                                "Replace thumbnail"
                                                            }
                                                        </Button>
                                                    )}
                                                />
                                            </MediaUploadCheck>
                                            <Button
                                                onClick={removeMedia}
                                                isLink
                                                isDestructive
                                            >
                                                Remove Thumbnail
                                            </Button>
                                        </div>
                                        <div className="w-1/2 flex justify-end">
                                            <div className="">
                                                <CheckboxControl
                                                    label="Add overlay?"
                                                    checked={attributes.overlay}
                                                    onChange={toggleOverlay}
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </>
                        )}

                        <div className="flex justify-center">
                            <div className="w-1/2 px-6">
                                <TextControl
                                    placeholder="Enter the YouTube Video ID"
                                    help="YouTube Video ID"
                                    type="text"
                                    value={attributes.videoID}
                                    onChange={handleIDChange}
                                />
                            </div>
                            <div className="w-1/2 px-6">
                                <TextControl
                                    placeholder="Overlay Text"
                                    help="Overlay Text"
                                    type="text"
                                    value={attributes.thumbnailText}
                                    onChange={handleTextChange}
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
