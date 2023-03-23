import classnames from "classnames";
import {useState} from "@wordpress/element";
import {
    useBlockProps,
    store as $blockEditorStore,
    __experimentalGetMatchingVariation as getMatchingVariation,
    __experimentalBlockVariationPicker
} from "@wordpress/block-editor";
import {useDispatch, useSelect} from "@wordpress/data";
import {Button, Placeholder} from "@wordpress/components";
import {useBlockNameForPatterns} from "../../../utils/block-name-for-patterns";
import {store as $blockStore, createBlocksFromInnerBlocksTemplate} from "@wordpress/blocks";
import {useScopedBlockVariations} from "../../../utils/scoped-block-variations";

import $metablock from "../block.json";

const CardListsPicker = ($props) => {
    const $scopeVariations = useScopedBlockVariations($metablock.name, $props.attributes);
    const {replaceInnerBlocks} = useDispatch($blockEditorStore);
    const $blockProps = useBlockProps();

    return <section {...$blockProps}>
        <__experimentalBlockVariationPicker icon={$props.icon}
                                            label={$props.label}
                                            variations={$scopeVariations}
                                            onSelect={($variation) => {
                                                $props.setAttributes({
                                                    ...$variation.attributes,
                                                    namespace: $props.attributes.namespace
                                                });

                                                if ($variation.innerBlocks) {
                                                    replaceInnerBlocks(
                                                        $props.clientId,
                                                        createBlocksFromInnerBlocksTemplate(
                                                            $variation.innerBlocks
                                                        ),
                                                        false
                                                    );
                                                }
                                            }}
        />
    </section>;
}

const CardListsPlaceholder = ($props) => {
    const [$isStartingBlank, setIsStartingBlank] = useState(false);
    const $classes = classnames("block-wp-extend-core-cards", {});
    const $blockProps = useBlockProps({
        className: $classes
    });
    const $blockNameForPatterns = useBlockNameForPatterns(
        $metablock.name,
        $props.clientId,
        $props.attributes
    );
    const {$blockType, $allVariations, $hasPatterns} = useSelect(($select) => {
        const {getBlockVariations, getBlockType} = $select($blockStore);
        const {getBlockRootClientId, __experimentalGetPatternsByBlockTypes} = $select($blockEditorStore);
        const $rootClientId = getBlockRootClientId($props.clientId);

        return {
            $blockType: getBlockType($props.name),
            $allVariations: getBlockVariations($props.name),
            $hasPatterns: !!__experimentalGetPatternsByBlockTypes($blockNameForPatterns, $rootClientId),
        }
    }, [$props.name, $blockNameForPatterns, $props.clientId]);

    const $matchingVariation = getMatchingVariation($props.attributes, $allVariations);
    const $icon = $matchingVariation?.icon?.src || $matchingVariation?.icon || $blockType?.icon?.src;
    const $label = $matchingVariation?.title || $blockType?.title;

    if ($isStartingBlank) {
        return <>
            <CardListsPicker icon={$icon}
                             label={$label}
                             clientId={$props.clientId}
                             attributes={$props.attributes}
                             setAttributes={$props.setAttributes}
            />
        </>
    }

    return <section {...$blockProps}>
        <Placeholder icon={$icon}
                     label={$label}
                     instructions={'Choose a pattern for the card list or start blank.'}
        >
            {!!$hasPatterns && (<Button variant={"primary"} onClick={$props.openPatternSelectionModal}>Choose</Button>)}
            <Button variant={"secondary"} onClick={() => {
                setIsStartingBlank(true);
            }}>Start blank</Button>
        </Placeholder>
    </section>
}

export default CardListsPlaceholder;
