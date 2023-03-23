/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/Controller/Block.js":
/*!*********************************!*\
  !*** ./src/Controller/Block.js ***!
  \*********************************/
/***/ (() => {



/***/ }),

/***/ "./src/Controller/CustomField.js":
/*!***************************************!*\
  !*** ./src/Controller/CustomField.js ***!
  \***************************************/
/***/ (() => {



/***/ }),

/***/ "./src/Controller/Dashboard.js":
/*!*************************************!*\
  !*** ./src/Controller/Dashboard.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Dashboard)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

function Dashboard($props) {
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("h1", null, "Dashboard");
}

/***/ }),

/***/ "./src/Controller/Page.js":
/*!********************************!*\
  !*** ./src/Controller/Page.js ***!
  \********************************/
/***/ (() => {



/***/ }),

/***/ "./src/Controller/Posts.js":
/*!*********************************!*\
  !*** ./src/Controller/Posts.js ***!
  \*********************************/
/***/ (() => {



/***/ }),

/***/ "./src/Controller/Taxonomy.js":
/*!************************************!*\
  !*** ./src/Controller/Taxonomy.js ***!
  \************************************/
/***/ (() => {



/***/ }),

/***/ "./src/Controller/Theme.js":
/*!*********************************!*\
  !*** ./src/Controller/Theme.js ***!
  \*********************************/
/***/ (() => {



/***/ }),

/***/ "./src/Helper/Navigation.tsx":
/*!***********************************!*\
  !*** ./src/Helper/Navigation.tsx ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Navigation)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

function Navigation($props) {
  const {
    menu: $menu
  } = $props;
  const $liElement = [];
  if ($menu) {
    // @ts-ignore
    for (let $m of $menu.keys()) {
      if (!$menu.has($m)) {
        continue;
      }
      const $li = $menu.get($m);
      $liElement.push((0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("li", null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
        href: $li.url,
        title: $li.label
      }, $li.label)));
    }
  }
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, $liElement.length > 0 && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("nav", {
    className: 'wp-extend-core-nav'
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("ul", null, $liElement)));
}

/***/ }),

/***/ "./src/Service/AppComponent.tsx":
/*!**************************************!*\
  !*** ./src/Service/AppComponent.tsx ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ AppComponent)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _Helper_Navigation__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../Helper/Navigation */ "./src/Helper/Navigation.tsx");



function AppComponent($props) {
  const {
    data: $data,
    text: $text,
    menu: $menu
  } = $props;
  const [$activeMenu, setActiveMenu] = (0,react__WEBPACK_IMPORTED_MODULE_1__.useState)();
  let Element;
  (0,react__WEBPACK_IMPORTED_MODULE_1__.useEffect)(() => {
    $menu.forEach($m => {
      if ($m.active) {
        setActiveMenu($m.slug);
      }
    });
  });
  if ($activeMenu) {
    try {
      Element = __webpack_require__("./src/Controller sync recursive ^\\.\\/.*$")(`./${$menu.get($activeMenu).app}`);
      Element = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Element.default, null);
    } catch (e) {
      console.warn(e);
    }
  }
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, $menu && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_Helper_Navigation__WEBPACK_IMPORTED_MODULE_2__["default"], {
    menu: $menu
  }), Element);
}

/***/ }),

/***/ "./src/main.sass":
/*!***********************!*\
  !*** ./src/main.sass ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/Controller sync recursive ^\\.\\/.*$":
/*!***************************************!*\
  !*** ./src/Controller/ sync ^\.\/.*$ ***!
  \***************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var map = {
	"./Block": "./src/Controller/Block.js",
	"./Block.js": "./src/Controller/Block.js",
	"./CustomField": "./src/Controller/CustomField.js",
	"./CustomField.js": "./src/Controller/CustomField.js",
	"./Dashboard": "./src/Controller/Dashboard.js",
	"./Dashboard.js": "./src/Controller/Dashboard.js",
	"./Page": "./src/Controller/Page.js",
	"./Page.js": "./src/Controller/Page.js",
	"./Posts": "./src/Controller/Posts.js",
	"./Posts.js": "./src/Controller/Posts.js",
	"./Taxonomy": "./src/Controller/Taxonomy.js",
	"./Taxonomy.js": "./src/Controller/Taxonomy.js",
	"./Theme": "./src/Controller/Theme.js",
	"./Theme.js": "./src/Controller/Theme.js"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./src/Controller sync recursive ^\\.\\/.*$";

/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

"use strict";
module.exports = window["React"];

/***/ }),

/***/ "react-dom":
/*!***************************!*\
  !*** external "ReactDOM" ***!
  \***************************/
/***/ ((module) => {

"use strict";
module.exports = window["ReactDOM"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["element"];

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
/************************************************************************/
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
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-dom */ "react-dom");
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react_dom__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _Service_AppComponent__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./Service/AppComponent */ "./src/Service/AppComponent.tsx");
/* harmony import */ var _main_sass__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./main.sass */ "./src/main.sass");





(function ($) {
  window.wordPressCoreExtendReact = function ($element) {
    const $documentElement = document.querySelector($element);
    if ($documentElement) {
      const $data = new Map();
      const $text = new Map();
      const $menu = new Map();
      for (var _len = arguments.length, $args = new Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
        $args[_key - 1] = arguments[_key];
      }
      if ($args.length > 0) {
        for (let $arg of $args) {
          if (!$arg.hasOwnProperty('defined') || !$arg.hasOwnProperty('define')) {
            continue;
          }
          for (let $key in $arg.define) {
            switch ($arg.defined) {
              case 'menu':
                $menu.set($key, $arg.define[$key]);
                break;
              case 'text':
                $text.set($key, $arg.define[$key]);
                break;
              default:
                $data.set($key, $arg.define[$key]);
                break;
            }
          }
        }
      }
      react_dom__WEBPACK_IMPORTED_MODULE_2__.render((0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_Service_AppComponent__WEBPACK_IMPORTED_MODULE_3__["default"], {
        data: $data,
        text: $text,
        menu: $menu
      }), $documentElement);
    }
  };
})(jQuery);
})();

/******/ })()
;
//# sourceMappingURL=index.js.map