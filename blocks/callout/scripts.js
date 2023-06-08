import "./styles.css";
import { registerBlockType } from "@wordpress/blocks";
import { useSelect } from "@wordpress/data";

registerBlockType("themeblocks/callout", {
    title: "Callout",
    description: "Callout your favorite information",
    icon: "welcome-learn-more",
    category: "common",
    supports: {
        align: "full-width",
    },
    attributes: {
        eventPostId: { type: "string" },
    },
    edit: EditComponent,
    save: function () {
        return null;
    },
});

function EditComponent({ attributes, setAttributes }) {
    const allEvents = useSelect((select) => {
        return select("core").getEntityRecords("postType", "cpt_events", {
            per_page: -1,
        });
    });
    console.log({ allEvents });

    if (allEvents === null) {
        return <div>Loading all Events...</div>;
    }
    return (
        <>
            <div>
                <h2 className="text-6xl">Select an event to feature</h2>
            </div>
            <div>
                <select
                    value={attributes.eventPostId}
                    onChange={(e) =>
                        setAttributes({ eventPostId: e.target.value })
                    }
                >
                    <option value="">Select an event to feature</option>
                    {allEvents.map((event) => {
                        return (
                            <option
                                value={event.id}
                                selected={attributes.eventPostId === event.id}
                            >
                                {event.title.raw}
                            </option>
                        );
                    })}
                </select>
            </div>
            {console.log(attributes.eventPostId)}
            {attributes.eventPostId && <div>An event is ready for preview</div>}
        </>
    );
}
