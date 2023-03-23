import {
    InspectorControls,
    store as $blockEditorStore
} from "@wordpress/block-editor";
import {useDispatch, useSelect} from "@wordpress/data";
import CardListsContent from "./card-lists-content";
import CardListsPlaceholder from "./card-lists-placeholder";
import {useState} from "@wordpress/element";
import PatternSelectionModal from "../../../utils/pattern-selection-modal";
import {PanelBody, RangeControl, ToggleControl} from "@wordpress/components";

const CardLists = ($props) => {
    const [$isPatternSelectionModalOpen, setIsPatternSelectionModalOpen] = useState(false);
    const {removeBlocks} = useDispatch($blockEditorStore);

    const {clientId: $clientId, attributes: $attributes} = $props;
    const {$hasInnerBlocks, $blocks} = useSelect(($select) => {
        const $getBlocks = $select($blockEditorStore)?.getBlocks($clientId);

        return {
            $blocks: $getBlocks,
            $hasInnerBlocks: !!$getBlocks.length
        };
    }, [$clientId]);
    const Component = $props.attributes?.queryLoop ? ($hasInnerBlocks ? CardListsContent : CardListsPlaceholder) : CardListsContent;

    return <>
        <InspectorControls group={"advance-settings"}>
            <PanelBody title={"Advance Setting"}>
                <ToggleControl
                    label={"Dynamic data retrieval from the database."}
                    help={$props.attributes?.queryLoop ? "Automatic retrieval from database after setting." : "Create your own cards manually."}
                    checked={$props.attributes?.queryLoop}
                    onChange={($queryLoop) => {
                        $props.setAttributes({queryLoop: $queryLoop});

                        if ($hasInnerBlocks) {
                            $blocks.map($block => removeBlocks($block.clientId));
                        }
                    }}
                />
                {($props.attributes?.queryLoop) && <RangeControl
                    label={"Number of loop"}
                    value={$props.attributes?.loopNumber}
                    onChange={($loopNumber) => $props.setAttributes({loopNumber: $loopNumber})}
                    min={1}
                    max={360}
                />}
            </PanelBody>
        </InspectorControls>

        <Component {...$props} openPatternSelectionModal={() => setIsPatternSelectionModalOpen(true)}/>
        {$isPatternSelectionModalOpen && (<PatternSelectionModal clientId={$clientId}
                                                                 attributes={$attributes}
                                                                 setIsPatternSelectionModalOpen={setIsPatternSelectionModalOpen}
        />)}
    </>
}

export default CardLists;
