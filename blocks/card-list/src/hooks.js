import {createHigherOrderComponent} from "@wordpress/compose";

import $metadata from "./block.json";
import {InspectorControls} from "@wordpress/block-editor";

const cardListInspectorControls = createHigherOrderComponent((BlockEdit) => ($props) => {
    const $key = "edit-card-list";

    const {name: $name, isSelected: $isSelected} = $props;

    if ($name !== $metadata.name || !$isSelected) {
        return <BlockEdit key={$key} {...$props}/>;
    }

    return <>
        <InspectorControls>
        </InspectorControls>
        <BlockEdit key={$key} {...$props}/>
    </>;
});

export default cardListInspectorControls;
