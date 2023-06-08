import { registerBlockType } from "@wordpress/blocks";
import { PanelBody, PanelRow, TextControl } from "@wordpress/components";
import { InspectorControls } from "@wordpress/block-editor";

registerBlockType("themeblocks/ytplaylist", {
    title: "YouTube Playlist",
    description: "Embed a YouTube Playlist",
    attributes: {
        playlistID: { type: "string", default: "" },
    },
    edit: EditComponent,
    save: () => null,
});

function EditComponent({ attributes, setAttributes }) {
    function handleIDChange(x) {
        setAttributes({ playlistID: x });
    }

    return (
        <>
            <InspectorControls>
                <PanelBody title="YouTube Playlist ID" initialOpen={true}>
                    <PanelRow>
                        <TextControl
                            placeholder="Enter the YouTube playlist ID"
                            help="Enter the Playlist ID"
                            type="text"
                            value={attributes.playlistID}
                            onChange={handleIDChange}
                        />
                    </PanelRow>
                </PanelBody>
            </InspectorControls>
            <div className="py-12 bg-grey-100 text-center text-lg">
                YouTube Playlist
            </div>
        </>
    );
}
