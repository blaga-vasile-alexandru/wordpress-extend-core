import React from 'react';
import * as ReactDOM from 'react-dom';
import AppComponent from "./Service/AppComponent";
import './main.sass';

(function ($) {
    window.wordPressCoreExtendReact = function ($element, ...$args) {
        const $documentElement = document.querySelector($element);

        if ($documentElement) {
            const $data = new Map;
            const $text = new Map;
            const $menu = new Map;

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

            ReactDOM.render(<AppComponent data={$data} text={$text} menu={$menu}/>, $documentElement);
        }
    }
})(jQuery);
