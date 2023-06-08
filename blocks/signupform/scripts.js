import { registerBlockType } from "@wordpress/blocks";

registerBlockType("themeblocks/signupform", {
    title: "Sign Up Form",
    description: "Sign up form",
    keywords: ["sign up", "cdaas"],
    edit: EditComponent,
    save: () => null,
});

function EditComponent({ attributes, setAttributes }) {
    return (
        <>
            <div className="py-12 bg-grey-100 text-center text-lg">
                Sign up Form
            </div>
        </>
    );
}
