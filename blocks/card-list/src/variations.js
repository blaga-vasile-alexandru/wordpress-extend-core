import {imageDateTitle, titleDate, titleDateExcerpt, titleExcerpt} from "./icons";
import {image} from "@wordpress/icons";

const variations = [
    {
        name: "title-thumb-excerpt",
        title: "Title, thumb & excerpt",
        icon: imageDateTitle,
        innerBlocks: [
            [
                'wp-extend-core/card-template',
                {},
                [
                    ['core/post-title'],
                    ['core/post-excerpt']
                ]
            ]
        ],
        scope: ["block"]
    },
    {
        name: "title-excerpt",
        title: "Title & excerpt",
        icon: titleExcerpt,
        innerBlocks: [
            [
                'wp-extend-core/card-template',
                {},
                [
                    ['core/post-title'],
                    ['core/post-excerpt']
                ]
            ]
        ],
        scope: ["block"]
    },
    {
        name: "thumb",
        title: "Thumb",
        icon: image,
        innerBlocks: [
            [
                'wp-extend-core/card-template',
                {},
                [
                    ['core/post-title'],
                    ['core/post-excerpt']
                ]
            ]
        ],
        scope: ["block"]
    },
    {
        name: "thumb-title",
        title: "Thumb & title",
        icon: image,
        innerBlocks: [
            [
                'wp-extend-core/card-template',
                {},
                [
                    ['core/post-title'],
                    ['core/post-excerpt']
                ]
            ]
        ],
        scope: ["block"]
    }
];

export default variations;
