import {useEffect, useState} from "react";
import Navigation, {MenuInterface} from "../Helper/Navigation";

interface AppComponentProps {
    data: Map<any, any>,
    text?: Map<any, any>,
    menu?: Map<string, MenuInterface>,
}

export default function AppComponent($props: AppComponentProps) {
    const {data: $data, text: $text, menu: $menu} = $props;
    const [$activeMenu, setActiveMenu] = useState<string>();
    let Element;

    useEffect(() => {
        $menu.forEach(($m) => {
            if ($m.active) {
                setActiveMenu($m.slug);
            }
        });
    });

    if ($activeMenu) {
        try {
            Element = require(`../Controller/${$menu.get($activeMenu).app}`);
            Element = <Element.default/>;
        } catch (e) {
            console.warn(e);
        }
    }

    return <>
        {$menu && <Navigation menu={$menu}/>}
        {Element}
    </>;
}
