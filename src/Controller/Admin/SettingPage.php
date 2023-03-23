<?php
/**
 * WordPress Extend Core is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * WordPress Extend Core is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with WordPress Extend Core. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 */
declare(strict_types=1);

namespace WordPressExtendCore\Controller\Admin;

use WordPressExtendCore\Service\Debug;
use WordPressExtendCore\Service\Hooks\Action;
use WordPressExtendCore\Service\React\EnqueueReactScript;
use WordPressExtendCore\Service\React\Menu\Typography as RegisterReactMenu;
use WordPressExtendCore\Service\React\Menu\Register;
use WordPressExtendCore\WordPressExtendCore;
use WordPressExtendCore\Service\Register\Page\Register as PageRegister;

class SettingPage
{
    const MENU_SLUG = 'wordpress-extend-core';

    private string $elementId;

    public function __construct()
    {

        $this->setElementId("wordpress-extend-core-" . Debug::uniqId());

        $id = $this->getElementId();

        $indexJs = WordPressExtendCore::getUrl() . "react/build/index.js";
        $indexCss = WordPressExtendCore::getUrl() . "react/build/index.css";
        $assetPhp = WordPressExtendCore::getPath() . "react/build/index.asset.php";

        PageRegister::addMenuPage('WordPress Extend Core', 'WordPress Extend Core', 'manage_options', 'wordpress-extend-core', function () use ($id, $indexJs, $assetPhp) {
            EnqueueReactScript::getInstance($id, $indexJs, $assetPhp)->render();
        });

        Action::add('admin_enqueue_scripts', function () use ($id, $indexJs, $assetPhp, $indexCss) {
            /** @var Register $ReactMenu */
            $ReactMenu = new Register();
            $ReactMenu
                ->add(
                    (new RegisterReactMenu('dashboard'))->setLabel('Dashboard')->setApp('Dashboard')->setUrl('')->setEndpoint('')->setActive(true)
                )
                ->add(
                    (new RegisterReactMenu('theme'))->setLabel('Theme')->setApp('Theme')->setUrl('')->setEndpoint('')->setActive(false)
                )
                ->add(
                    (new RegisterReactMenu('block'))->setLabel('Blocks')->setApp('Block')->setUrl('')->setEndpoint('')->setActive(false)
                )
                ->add(
                    (new RegisterReactMenu('custom-field'))->setLabel('Custom Fields')->setApp('CustomField')->setUrl('')->setEndpoint('')->setActive(false)
                )
                ->add(
                    (new RegisterReactMenu('page'))->setLabel('Pages')->setApp('Page')->setUrl('')->setEndpoint('')->setActive(false)
                )
                ->add(
                    (new RegisterReactMenu('post'))->setLabel('Posts')->setApp('Post')->setUrl('')->setEndpoint('')->setActive(false)
                )
                ->add(
                    (new RegisterReactMenu('taxonomy'))->setLabel('Taxonomies')->setApp('Taxonomy')->setUrl('')->setEndpoint('')->setActive(false)
                );

            EnqueueReactScript::getInstance($id, $indexJs, $assetPhp)
                ->setMenu($ReactMenu)
                ->addData('test', true)
                ->addText('add text for the test')
                ->addText('testKey', 'add text for the test')
                ->injectScript();
            EnqueueReactScript::getInstance($id, $indexJs, $assetPhp)
                ->setIndexCss($indexCss)
                ->injectStyle();
        });
    }

    /**
     * @return string
     */
    public function getElementId(): string
    {
        return $this->elementId;
    }

    /**
     * @param string $elementId
     */
    public function setElementId(string $elementId): void
    {
        $this->elementId = $elementId;
    }
}
