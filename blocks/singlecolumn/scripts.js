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

registerBlockType("themeblocks/singlecolumn", {
    title: "Single Column",
    description: "Used within the Custom Columns block",
    supports: {
        align: ["full"],
    },
    attributes: {},
    edit: EditComponent,
    save: () => <InnerBlocks.Content />,
});

function EditComponent({ attributes, setAttributes }) {
    const blockProps = useBlockProps({
        className: "bg-blue-50 p-1",
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
        <FlexItem {...blockProps}>
            <InnerBlocks orientation="horizontal" />
        </FlexItem>
    );
}
