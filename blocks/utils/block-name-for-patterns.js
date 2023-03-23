import {useSelect} from "@wordpress/data";
import {store as $blockEditorStore} from "@wordpress/block-editor";
import {store as $blockStore} from "@wordpress/blocks";

export function useBlockNameForPatterns($name, $clientId, $attributes) {
    const $activeVariationName = useSelect(($select) => $select($blockStore)?.getActiveBlockVariation(
        $name,
        $attributes
    )?.name, [$name, $attributes]);

    const $blockName = `${$name}/${$activeVariationName}`;
    const $activeVariationPatterns = useSelect(($select) => {
        if (!$activeVariationName) {
            return;
        }

        const {getBlockRootClientId, getPatternsByBlockTypes} = $select($blockEditorStore);
        const $rootClientId = getBlockRootClientId($clientId);

        return getPatternsByBlockTypes($blockName, $rootClientId);
    }, [$activeVariationName, $clientId]);

    return $activeVariationPatterns?.length ? $blockName : $name;
}
