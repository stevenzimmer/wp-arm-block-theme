import apiFetch from "@wordpress/api-fetch";
import {
    InnerBlocks,
    useBlockProps,
    InspectorControls,
    MediaUpload,
    MediaUploadCheck,
} from "@wordpress/block-editor";
import {
    PanelBody,
    PanelRow,
    Button,
    Flex,
    FlexBlock,
    FlexItem,
} from "@wordpress/components";
import { registerBlockType } from "@wordpress/blocks";
// import { useSelect } from "@wordpress/data";
import { useEffect } from "@wordpress/element";

registerBlockType("themeblocks/customcolumns", {
    title: "Custom Columns",
    description: "Custom Columns built on custom grid",
    supports: {
        align: ["full"],
    },
    attributes: {
        columns: { type: "number", default: 2 },
    },
    edit: EditComponent,
    save: () => <InnerBlocks.Content />,
});

function EditComponent({ attributes, setAttributes }) {
    const blockProps = useBlockProps({
        className: "flex",
    });
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
        <div {...blockProps}>
            <Flex>
                <InnerBlocks
                    orientation="horizontal"
                    className="px-6"
                    allowedBlocks={["themeblocks/singlecolumn"]}
                />
            </Flex>
        </div>
    );
}
