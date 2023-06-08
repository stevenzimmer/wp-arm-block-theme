import { registerBlockType } from "@wordpress/blocks";
import { PanelBody, PanelRow, SelectControl } from "@wordpress/components";
import { InspectorControls } from "@wordpress/block-editor";

registerBlockType("themeblocks/comparisons", {
    title: "Comparisons",
    description: "Comparison",
    attributes: {
        comparisonID: { type: "string", default: "argo" },
    },
    edit: EditComponent,
    save: () => null,
});

function EditComponent({ attributes, setAttributes }) {
    function handleIDChange(x) {
        setAttributes({ comparisonID: x });
    }

    return (
        <>
            <InspectorControls>
                <PanelBody title="Comparison Table" initialOpen={true}>
                    <PanelRow>
                        <SelectControl
                            className="w-full"
                            label="Comprison Table"
                            value={attributes.comparisonID}
                            options={[{ label: "Argo", value: "argo" },{ label: "Harness", value: "harness" }, { label: "Octopus Deploy", value: "octopus" }]}
                            onChange={handleIDChange}
                        />
                    </PanelRow>
                </PanelBody>
            </InspectorControls>
            <div className="py-6 bg-grey-100 text-center text-lg">
                Selected Comparison:{" "}
                <span className="font-bold">{attributes.comparisonID}</span>
            </div>
        </>
    );
}
