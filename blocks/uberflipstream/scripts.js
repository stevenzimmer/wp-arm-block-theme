import { registerBlockType } from "@wordpress/blocks";
import { PanelBody, PanelRow, TextControl } from "@wordpress/components";
import { InspectorControls } from "@wordpress/block-editor";

registerBlockType("themeblocks/uberflipstream", {
    title: "Uberflip Stream Link",
    description: "Stream from Uberflip",
    attributes: {
        streamID: { type: "string", default: "" },
    },
    edit: EditComponent,
    save: () => null,
});

function EditComponent({ attributes, setAttributes }) {
    function handleIDChange(x) {
        setAttributes({ streamID: x });
    }

    return (
        <>
            <InspectorControls>
                <PanelBody title="Stream ID" initialOpen={true}>
                    <PanelRow>
                        <TextControl
                            placeholder="Enter the uberflip Stream ID"
                            help="Enter the uberflip stream ID"
                            type="text"
                            value={attributes.streamID}
                            onChange={handleIDChange}
                        />
                    </PanelRow>
                </PanelBody>
            </InspectorControls>
            <div className="py-12 bg-grey-100 text-center text-lg">
                Uberflip Stream
            </div>
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
                    color: attributes.textColor,
                    textAlign: attributes.textAlign,
                }}
                className="group block m-0 no-underline hover:no-underline hover:opacity-80 transition-all duration-200 font-bold"
            >
                {attributes.text}{" "}
                <span className="transform inline-block transition-transform group-hover:translate-x-0.5 text-xs">
                    &#8594;
                </span>
            </a>
        </>
    );
}
