import classnames from "classnames";
import {InnerBlocks, useBlockProps, useInnerBlocksProps} from "@wordpress/block-editor";

const CardTemplate = ($props) => {
    console.info($props);

    const $classes = classnames($props.__unstableLayoutClassNames, {
        "block-wp-extend-core-card": true
    });
    const $blockProps = useBlockProps({
        className: $classes
    });
    const $useInnerBlocksProps = useInnerBlocksProps($blockProps, {});

    return <article {...$useInnerBlocksProps}>
        <InnerBlocks/>
    </article>
}

export default CardTemplate;
