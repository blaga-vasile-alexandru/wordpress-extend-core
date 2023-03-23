<?php

namespace WordPressExtendCore\Service\React\Menu;

use WordPressExtendCore\Service\Debug;
use WordPressExtendCore\Service\React\Menu\Typography as RegisterReactMenu;

class Register
{
    /**
     * @var RegisterReactMenu[]
     */
    private array $menus;

    public function __construct(RegisterReactMenu ...$menu)
    {
        $this->setMenus($menu);
    }

    /**
     * @param array $menus
     * @return Register
     */
    private function setMenus(array $menus): Register
    {
        $this->menus = $menus;
        return $this;
    }

    /**
     * @param RegisterReactMenu $menu
     * @return Register
     */
    public function add(RegisterReactMenu $menu): Register
    {
        $this->setMenus([...$this->getMenus(), $menu]);

        return $this;
    }

    /**
     * @return array
     */
    private function getMenus(): array
    {
        return $this->menus;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return ($this->list() && !Debug::isNotEmptyArray($this->list()));
    }

    /**
     * @return RegisterReactMenu[]
     */
    public function list(): array
    {
        return $this->getMenus();
    }

    /**
     * @return array
     */
    public function __toArray(): array
    {
        $array = [];
        foreach ($this->list() as $menu) {
            $array[$menu->getSlug()] = [
                'slug' => $menu->getSlug(),
                'app' => $menu->getApp(),
                'label' => $menu->getLabel(),
                'url' => $menu->getUrl(),
                'endpoint' => $menu->getEndpoint(),
                'active' => $menu->isActive(),
            ];
        }

        return $array;
    }
}
