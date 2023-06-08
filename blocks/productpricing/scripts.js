import { registerBlockType } from "@wordpress/blocks";
import {
    PanelBody,
    PanelRow,
    TextControl,
    SelectControl,
} from "@wordpress/components";
import { InspectorControls } from "@wordpress/block-editor";

registerBlockType("themeblocks/productpricing", {
    title: "Product Pricing",
    description: "Product Pricing",
    attributes: {
        productID: { type: "string", default: "cdaas" },
    },
    edit: EditComponent,
    save: () => null,
});

function EditComponent({ attributes, setAttributes }) {
    function handleIDChange(x) {
        setAttributes({ productID: x });
    }

    return (
        <>
            <InspectorControls>
                <PanelBody title="Product Pricing" initialOpen={true}>
                    <PanelRow>
                        <SelectControl
                            className="w-full"
                            label="Product Pricing"
                            value={attributes.productID}
                            options={[
                                { label: "CDaaS", value: "cdaas" },
                                { label: "Self Hosted", value: "selfhosted" },
                                { label: "Managed", value: "managed" },
                                { label: "Scale Agent", value: "scaleagent" },
                                { label: "OSS", value: "oss" },
                            ]}
                            onChange={handleIDChange}
                        />
                    </PanelRow>
                </PanelBody>
            </InspectorControls>
            <div className="py-6 bg-grey-100 text-center text-lg">
                Selected Product Pricing:{" "}
                <span className="font-bold">{attributes.productID}</span>
            </div>
        </>
    );
}
