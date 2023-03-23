export interface MenuInterface {
    active: boolean,
    label: string,
    slug: string,
    url?: string,
    endpoint: string,
    app: string,
}

interface NavigationProps {
    menu: Map<string, MenuInterface>
}

export default function Navigation($props: NavigationProps) {
    const {menu: $menu} = $props;
    const $liElement = [];

    if ($menu) {
        // @ts-ignore
        for (let $m of $menu.keys()) {
            if (!$menu.has($m)) {
                continue;
            }
            const $li = $menu.get($m);

            $liElement.push(<li><a href={$li.url} title={$li.label}>{$li.label}</a></li>);
        }
    }

    return <>
        {$liElement.length > 0 && <nav className={'wp-extend-core-nav'}>
            <ul>
                {$liElement}
            </ul>
        </nav>}
    </>
}