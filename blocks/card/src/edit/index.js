import classnames from "classnames";
import {InnerBlocks, useBlockProps, useInnerBlocksProps} from "@wordpress/block-editor";

const Card = function ($props) {
    const $classes = classnames("block-wp-extend-core-card", {});
    const $blockProps = useBlockProps({
        className: $classes
    });
    const $useInnerBlocksProps = useInnerBlocksProps($blockProps, {});

    return <article {...$useInnerBlocksProps}>
        <InnerBlocks/>
    </article>
}

export default Card;
