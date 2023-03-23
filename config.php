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

use WordPressExtendCore\Controller\Admin;
use WordPressExtendCore\Block\Register;
use WordPressExtendCore\RestRoute;

return [
    /**
     * @required Pages
     */
    Admin\SettingPage::class,

    /**
     * @required Blocks
     */
    Register\Card\CardList::class => 'getRegister',
    Register\Card\Item::class => 'getRegister',
    Register\Card\Template::class => 'getRegister',

    /**
     * @required RestRoute
     */
    RestRoute\Articles::class => 'getInstance',
];
