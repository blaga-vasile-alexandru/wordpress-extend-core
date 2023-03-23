import "./style.sass";
import "./editor-style.sass";

import $metadata from "./block.json";

import {registerBlockType} from "@wordpress/blocks";
import {addCard as icon} from '@wordpress/icons';
import edit from "./edit/index";
import variations from "./variations";

registerBlockType($metadata, {
    icon,
    edit,
    variations
});
