import {store as $blocksStore} from "@wordpress/blocks";
import {useSelect} from "@wordpress/data";
import {useMemo} from "@wordpress/element";

export function useScopedBlockVariations($name, $attributes) {
    const {$activeVariationName, $blockVariations} = useSelect(($select) => {
        const {getActiveBlockVariation, getBlockVariations} = $select($blocksStore);
        return {
            $activeVariationName: getActiveBlockVariation(
                $name,
                $attributes
            )?.name,
            $blockVariations: getBlockVariations($name, 'block'),
        };
    }, [$attributes, $name]);

    return useMemo(() => {
        const isNotConnected = (variation) => !variation.attributes?.namespace;

        if (!$activeVariationName) {
            return $blockVariations.filter(isNotConnected);
        }

        const connectedVariations = $blockVariations.filter((variation) => variation.attributes?.namespace?.includes($activeVariationName));

        if (!!connectedVariations.length) {
            return connectedVariations;
        }

        return $blockVariations.filter(isNotConnected);
    }, [$activeVariationName, $blockVariations]);
}
