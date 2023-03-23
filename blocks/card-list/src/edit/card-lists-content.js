import {InnerBlocks, useBlockProps, useInnerBlocksProps} from "@wordpress/block-editor";
import classnames from "classnames";
import {store as $coreStore} from "@wordpress/core-data";
import {useSelect} from "@wordpress/data";

const CardListsContent = ($props) => {
    const $classes = classnames("block-wp-extend-core-card-list", {});
    const $blockProps = useBlockProps({
        className: $classes
    });
    const $useInnerBlocksProps = useInnerBlocksProps($blockProps, {});

    const {$posts, $blocks} = useSelect(($select) => {
        const {getEntityRecords, getTaxonomies} = $select($coreStore);
    });

    return <section {...$useInnerBlocksProps}>
        <InnerBlocks/>
    </section>;
}

export default CardListsContent;
