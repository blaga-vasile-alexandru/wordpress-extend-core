/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/@wordpress/icons/build-module/library/add-card.js":
/*!************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/add-card.js ***!
  \************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

const addCard = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__.SVG, {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__.Path, {
  d: "M18.5 5.5V8H20V5.5h2.5V4H20V1.5h-1.5V4H16v1.5h2.5zM12 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-6h-1.5v6a.5.5 0 01-.5.5H6a.5.5 0 01-.5-.5V6a.5.5 0 01.5-.5h6V4z"
}));
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (addCard);
//# sourceMappingURL=add-card.js.map

/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/image.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/image.js ***!
  \*********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

const image = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__.SVG, {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__.Path, {
  d: "M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM5 4.5h14c.3 0 .5.2.5.5v8.4l-3-2.9c-.3-.3-.8-.3-1 0L11.9 14 9 12c-.3-.2-.6-.2-.8 0l-3.6 2.6V5c-.1-.3.1-.5.4-.5zm14 15H5c-.3 0-.5-.2-.5-.5v-2.4l4.1-3 3 1.9c.3.2.7.2.9-.1L16 12l3.5 3.4V19c0 .3-.2.5-.5.5z"
}));
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (image);
//# sourceMappingURL=image.js.map

/***/ }),

/***/ "./src/edit/card-lists-content.js":
/*!****************************************!*\
  !*** ./src/edit/card-lists-content.js ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_core_data__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/core-data */ "@wordpress/core-data");
/* harmony import */ var _wordpress_core_data__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_core_data__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__);





const CardListsContent = $props => {
  const $classes = classnames__WEBPACK_IMPORTED_MODULE_2___default()("block-wp-extend-core-card-list", {});
  const $blockProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.useBlockProps)({
    className: $classes
  });
  const $useInnerBlocksProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.useInnerBlocksProps)($blockProps, {});
  const {
    $posts,
    $blocks
  } = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_4__.useSelect)($select => {
    const {
      getEntityRecords,
      getTaxonomies
    } = $select(_wordpress_core_data__WEBPACK_IMPORTED_MODULE_3__.store);
  });
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("section", $useInnerBlocksProps, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InnerBlocks, null));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (CardListsContent);

/***/ }),

/***/ "./src/edit/card-lists-placeholder.js":
/*!********************************************!*\
  !*** ./src/edit/card-lists-placeholder.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _utils_block_name_for_patterns__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../../utils/block-name-for-patterns */ "../utils/block-name-for-patterns.js");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _utils_scoped_block_variations__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../../../utils/scoped-block-variations */ "../utils/scoped-block-variations.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../block.json */ "./src/block.json");










const CardListsPicker = $props => {
  const $scopeVariations = (0,_utils_scoped_block_variations__WEBPACK_IMPORTED_MODULE_7__.useScopedBlockVariations)(_block_json__WEBPACK_IMPORTED_MODULE_8__.name, $props.attributes);
  const {
    replaceInnerBlocks
  } = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_3__.useDispatch)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.store);
  const $blockProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.useBlockProps)();
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("section", $blockProps, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.__experimentalBlockVariationPicker, {
    icon: $props.icon,
    label: $props.label,
    variations: $scopeVariations,
    onSelect: $variation => {
      $props.setAttributes({
        ...$variation.attributes,
        namespace: $props.attributes.namespace
      });
      if ($variation.innerBlocks) {
        replaceInnerBlocks($props.clientId, (0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_6__.createBlocksFromInnerBlocksTemplate)($variation.innerBlocks), false);
      }
    }
  }));
};
const CardListsPlaceholder = $props => {
  const [$isStartingBlank, setIsStartingBlank] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.useState)(false);
  const $classes = classnames__WEBPACK_IMPORTED_MODULE_1___default()("block-wp-extend-core-cards", {});
  const $blockProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.useBlockProps)({
    className: $classes
  });
  const $blockNameForPatterns = (0,_utils_block_name_for_patterns__WEBPACK_IMPORTED_MODULE_5__.useBlockNameForPatterns)(_block_json__WEBPACK_IMPORTED_MODULE_8__.name, $props.clientId, $props.attributes);
  const {
    $blockType,
    $allVariations,
    $hasPatterns
  } = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_3__.useSelect)($select => {
    const {
      getBlockVariations,
      getBlockType
    } = $select(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_6__.store);
    const {
      getBlockRootClientId,
      __experimentalGetPatternsByBlockTypes
    } = $select(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.store);
    const $rootClientId = getBlockRootClientId($props.clientId);
    return {
      $blockType: getBlockType($props.name),
      $allVariations: getBlockVariations($props.name),
      $hasPatterns: !!__experimentalGetPatternsByBlockTypes($blockNameForPatterns, $rootClientId)
    };
  }, [$props.name, $blockNameForPatterns, $props.clientId]);
  const $matchingVariation = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.__experimentalGetMatchingVariation)($props.attributes, $allVariations);
  const $icon = $matchingVariation?.icon?.src || $matchingVariation?.icon || $blockType?.icon?.src;
  const $label = $matchingVariation?.title || $blockType?.title;
  if ($isStartingBlank) {
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(CardListsPicker, {
      icon: $icon,
      label: $label,
      clientId: $props.clientId,
      attributes: $props.attributes,
      setAttributes: $props.setAttributes
    }));
  }
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("section", $blockProps, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__.Placeholder, {
    icon: $icon,
    label: $label,
    instructions: 'Choose a pattern for the card list or start blank.'
  }, !!$hasPatterns && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__.Button, {
    variant: "primary",
    onClick: $props.openPatternSelectionModal
  }, "Choose"), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__.Button, {
    variant: "secondary",
    onClick: () => {
      setIsStartingBlank(true);
    }
  }, "Start blank")));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (CardListsPlaceholder);

/***/ }),

/***/ "./src/edit/index.js":
/*!***************************!*\
  !*** ./src/edit/index.js ***!
  \***************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ "./node_modules/@babel/runtime/helpers/esm/extends.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _card_lists_content__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./card-lists-content */ "./src/edit/card-lists-content.js");
/* harmony import */ var _card_lists_placeholder__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./card-lists-placeholder */ "./src/edit/card-lists-placeholder.js");
/* harmony import */ var _utils_pattern_selection_modal__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../../../utils/pattern-selection-modal */ "../utils/pattern-selection-modal.js");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__);









const CardLists = $props => {
  const [$isPatternSelectionModalOpen, setIsPatternSelectionModalOpen] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.useState)(false);
  const {
    removeBlocks
  } = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_3__.useDispatch)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.store);
  const {
    clientId: $clientId,
    attributes: $attributes
  } = $props;
  const {
    $hasInnerBlocks,
    $blocks
  } = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_3__.useSelect)($select => {
    const $getBlocks = $select(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.store)?.getBlocks($clientId);
    return {
      $blocks: $getBlocks,
      $hasInnerBlocks: !!$getBlocks.length
    };
  }, [$clientId]);
  const Component = $props.attributes?.queryLoop ? $hasInnerBlocks ? _card_lists_content__WEBPACK_IMPORTED_MODULE_4__["default"] : _card_lists_placeholder__WEBPACK_IMPORTED_MODULE_5__["default"] : _card_lists_content__WEBPACK_IMPORTED_MODULE_4__["default"];
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, {
    group: "advance-settings"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__.PanelBody, {
    title: "Advance Setting"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__.ToggleControl, {
    label: "Dynamic data retrieval from the database.",
    help: $props.attributes?.queryLoop ? "Automatic retrieval from database after setting." : "Create your own cards manually.",
    checked: $props.attributes?.queryLoop,
    onChange: $queryLoop => {
      $props.setAttributes({
        queryLoop: $queryLoop
      });
      if ($hasInnerBlocks) {
        $blocks.map($block => removeBlocks($block.clientId));
      }
    }
  }), $props.attributes?.queryLoop && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__.RangeControl, {
    label: "Number of loop",
    value: $props.attributes?.loopNumber,
    onChange: $loopNumber => $props.setAttributes({
      loopNumber: $loopNumber
    }),
    min: 1,
    max: 360
  }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(Component, (0,_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, $props, {
    openPatternSelectionModal: () => setIsPatternSelectionModalOpen(true)
  })), $isPatternSelectionModalOpen && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_utils_pattern_selection_modal__WEBPACK_IMPORTED_MODULE_6__["default"], {
    clientId: $clientId,
    attributes: $attributes,
    setIsPatternSelectionModalOpen: setIsPatternSelectionModalOpen
  }));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (CardLists);

/***/ }),

/***/ "./src/icons.js":
/*!**********************!*\
  !*** ./src/icons.js ***!
  \**********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "imageDateTitle": () => (/* binding */ imageDateTitle),
/* harmony export */   "titleDate": () => (/* binding */ titleDate),
/* harmony export */   "titleDateExcerpt": () => (/* binding */ titleDateExcerpt),
/* harmony export */   "titleExcerpt": () => (/* binding */ titleExcerpt)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);


const titleDate = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.SVG, {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 48 48"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Path, {
  d: "M41 9H7v3h34V9zm-22 5H7v1h12v-1zM7 26h12v1H7v-1zm34-5H7v3h34v-3zM7 38h12v1H7v-1zm34-5H7v3h34v-3z"
}));
const titleExcerpt = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.SVG, {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 48 48"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Path, {
  d: "M41 9H7v3h34V9zm-4 5H7v1h30v-1zm4 3H7v1h34v-1zM7 20h30v1H7v-1zm0 12h30v1H7v-1zm34 3H7v1h34v-1zM7 38h30v1H7v-1zm34-11H7v3h34v-3z"
}));
const titleDateExcerpt = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.SVG, {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 48 48"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Path, {
  d: "M41 9H7v3h34V9zm-22 5H7v1h12v-1zm22 3H7v1h34v-1zM7 20h34v1H7v-1zm0 12h12v1H7v-1zm34 3H7v1h34v-1zM7 38h34v1H7v-1zm34-11H7v3h34v-3z"
}));
const imageDateTitle = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.SVG, {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 48 48"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Path, {
  d: "M7 9h34v6H7V9zm12 8H7v1h12v-1zm18 3H7v1h30v-1zm0 18H7v1h30v-1zM7 35h12v1H7v-1zm34-8H7v6h34v-6z"
}));

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _style_sass__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./style.sass */ "./src/style.sass");
/* harmony import */ var _editor_style_sass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./editor-style.sass */ "./src/editor-style.sass");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./block.json */ "./src/block.json");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_icons__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/icons */ "./node_modules/@wordpress/icons/build-module/library/add-card.js");
/* harmony import */ var _edit_index__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./edit/index */ "./src/edit/index.js");
/* harmony import */ var _variations__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./variations */ "./src/variations.js");







(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_3__.registerBlockType)(_block_json__WEBPACK_IMPORTED_MODULE_2__, {
  icon: _wordpress_icons__WEBPACK_IMPORTED_MODULE_6__["default"],
  edit: _edit_index__WEBPACK_IMPORTED_MODULE_4__["default"],
  variations: _variations__WEBPACK_IMPORTED_MODULE_5__["default"]
});

/***/ }),

/***/ "./src/variations.js":
/*!***************************!*\
  !*** ./src/variations.js ***!
  \***************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _icons__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./icons */ "./src/icons.js");
/* harmony import */ var _wordpress_icons__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/icons */ "./node_modules/@wordpress/icons/build-module/library/image.js");


const variations = [{
  name: "title-thumb-excerpt",
  title: "Title, thumb & excerpt",
  icon: _icons__WEBPACK_IMPORTED_MODULE_0__.imageDateTitle,
  innerBlocks: [['wp-extend-core/card-template', {}, [['core/post-title'], ['core/post-excerpt']]]],
  scope: ["block"]
}, {
  name: "title-excerpt",
  title: "Title & excerpt",
  icon: _icons__WEBPACK_IMPORTED_MODULE_0__.titleExcerpt,
  innerBlocks: [['wp-extend-core/card-template', {}, [['core/post-title'], ['core/post-excerpt']]]],
  scope: ["block"]
}, {
  name: "thumb",
  title: "Thumb",
  icon: _wordpress_icons__WEBPACK_IMPORTED_MODULE_1__["default"],
  innerBlocks: [['wp-extend-core/card-template', {}, [['core/post-title'], ['core/post-excerpt']]]],
  scope: ["block"]
}, {
  name: "thumb-title",
  title: "Thumb & title",
  icon: _wordpress_icons__WEBPACK_IMPORTED_MODULE_1__["default"],
  innerBlocks: [['wp-extend-core/card-template', {}, [['core/post-title'], ['core/post-excerpt']]]],
  scope: ["block"]
}];
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (variations);

/***/ }),

/***/ "../utils/block-name-for-patterns.js":
/*!*******************************************!*\
  !*** ../utils/block-name-for-patterns.js ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "useBlockNameForPatterns": () => (/* binding */ useBlockNameForPatterns)
/* harmony export */ });
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__);



function useBlockNameForPatterns($name, $clientId, $attributes) {
  const $activeVariationName = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_0__.useSelect)($select => $select(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__.store)?.getActiveBlockVariation($name, $attributes)?.name, [$name, $attributes]);
  const $blockName = `${$name}/${$activeVariationName}`;
  const $activeVariationPatterns = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_0__.useSelect)($select => {
    if (!$activeVariationName) {
      return;
    }
    const {
      getBlockRootClientId,
      getPatternsByBlockTypes
    } = $select(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.store);
    const $rootClientId = getBlockRootClientId($clientId);
    return getPatternsByBlockTypes($blockName, $rootClientId);
  }, [$activeVariationName, $clientId]);
  return $activeVariationPatterns?.length ? $blockName : $name;
}

/***/ }),

/***/ "../utils/pattern-selection-modal.js":
/*!*******************************************!*\
  !*** ../utils/pattern-selection-modal.js ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__);





const PatternSelectionModal = _ref => {
  let {
    clientId: $clientId,
    attributes: $attributes,
    setIsPatternSelectionModalOpen
  } = _ref;
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Modal, {
    overlayClassName: `block-library-${$clientId}-pattern__selection-modal`,
    title: 'Choose a pattern',
    onRequestClose: () => setIsPatternSelectionModalOpen(false)
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: `block-library-${$clientId}-pattern__selection-content`
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: `block-library-${$clientId}-pattern__selection-search`
  })));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (PatternSelectionModal);

/***/ }),

/***/ "../utils/scoped-block-variations.js":
/*!*******************************************!*\
  !*** ../utils/scoped-block-variations.js ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "useScopedBlockVariations": () => (/* binding */ useScopedBlockVariations)
/* harmony export */ });
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);



function useScopedBlockVariations($name, $attributes) {
  const {
    $activeVariationName,
    $blockVariations
  } = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_1__.useSelect)($select => {
    const {
      getActiveBlockVariation,
      getBlockVariations
    } = $select(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.store);
    return {
      $activeVariationName: getActiveBlockVariation($name, $attributes)?.name,
      $blockVariations: getBlockVariations($name, 'block')
    };
  }, [$attributes, $name]);
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useMemo)(() => {
    const isNotConnected = variation => !variation.attributes?.namespace;
    if (!$activeVariationName) {
      return $blockVariations.filter(isNotConnected);
    }
    const connectedVariations = $blockVariations.filter(variation => variation.attributes?.namespace?.includes($activeVariationName));
    if (!!connectedVariations.length) {
      return connectedVariations;
    }
    return $blockVariations.filter(isNotConnected);
  }, [$activeVariationName, $blockVariations]);
}

/***/ }),

/***/ "./node_modules/classnames/index.js":
/*!******************************************!*\
  !*** ./node_modules/classnames/index.js ***!
  \******************************************/
/***/ ((module, exports) => {

var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/*!
	Copyright (c) 2018 Jed Watson.
	Licensed under the MIT License (MIT), see
	http://jedwatson.github.io/classnames
*/
/* global define */

(function () {
	'use strict';

	var hasOwn = {}.hasOwnProperty;
	var nativeCodeString = '[native code]';

	function classNames() {
		var classes = [];

		for (var i = 0; i < arguments.length; i++) {
			var arg = arguments[i];
			if (!arg) continue;

			var argType = typeof arg;

			if (argType === 'string' || argType === 'number') {
				classes.push(arg);
			} else if (Array.isArray(arg)) {
				if (arg.length) {
					var inner = classNames.apply(null, arg);
					if (inner) {
						classes.push(inner);
					}
				}
			} else if (argType === 'object') {
				if (arg.toString !== Object.prototype.toString && !arg.toString.toString().includes('[native code]')) {
					classes.push(arg.toString());
					continue;
				}

				for (var key in arg) {
					if (hasOwn.call(arg, key) && arg[key]) {
						classes.push(key);
					}
				}
			}
		}

		return classes.join(' ');
	}

	if ( true && module.exports) {
		classNames.default = classNames;
		module.exports = classNames;
	} else if (true) {
		// register as 'classnames', consistent with npm package name
		!(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function () {
			return classNames;
		}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
	} else {}
}());


/***/ }),

/***/ "./src/editor-style.sass":
/*!*******************************!*\
  !*** ./src/editor-style.sass ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/style.sass":
/*!************************!*\
  !*** ./src/style.sass ***!
  \************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/core-data":
/*!**********************************!*\
  !*** external ["wp","coreData"] ***!
  \**********************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["coreData"];

/***/ }),

/***/ "@wordpress/data":
/*!******************************!*\
  !*** external ["wp","data"] ***!
  \******************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["data"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["element"];

/***/ }),

/***/ "@wordpress/primitives":
/*!************************************!*\
  !*** external ["wp","primitives"] ***!
  \************************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["primitives"];

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/extends.js":
/*!************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/extends.js ***!
  \************************************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ _extends)
/* harmony export */ });
function _extends() {
  _extends = Object.assign ? Object.assign.bind() : function (target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i];
      for (var key in source) {
        if (Object.prototype.hasOwnProperty.call(source, key)) {
          target[key] = source[key];
        }
      }
    }
    return target;
  };
  return _extends.apply(this, arguments);
}

/***/ }),

/***/ "./src/block.json":
/*!************************!*\
  !*** ./src/block.json ***!
  \************************/
/***/ ((module) => {

"use strict";
module.exports = JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"title":"Card List","version":"0.1.0","name":"wp-extend-core/card-list","category":"design","icon":"cover-image","textdomain":"card-list","editorScript":"file:./index.js","style":"file:./style-index.css","editorStyle":"file:./index.css","attributes":{"queryLoop":{"type":"boolean","default":false},"namespace":{"type":"string"},"loopNumber":{"type":"number","default":3}},"providesContext":{"loopNumber":"loopNumber"},"supports":{"defaultStylePicker":true,"anchor":true,"color":{"background":true,"text":false},"spacing":{"margin":true,"padding":true},"align":false,"alignWide":false,"typography":{"fontSize":true,"lineHeight":true},"className":true}}');

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"index": 0,
/******/ 			"./style-index": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = globalThis["webpackChunkcard_list"] = globalThis["webpackChunkcard_list"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["./style-index"], () => (__webpack_require__("./src/index.js")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=index.js.map