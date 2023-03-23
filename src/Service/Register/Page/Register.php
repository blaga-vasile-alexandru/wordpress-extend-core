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

namespace WordPressExtendCore\Service\Register\Page;

use WordPressExtendCore\Service\Hooks\Action;

class Register
{
    /**
     * @param string $title
     * @param string $menuTitle
     * @param string $capability
     * @param string $menuSlug
     * @param callable $callback
     * @param string $iconUrl
     * @param int|float|null $position
     * @return string|false
     */
    public static function addMenuPage(string $title, string $menuTitle, string $capability, string $menuSlug, callable $callback, string $iconUrl = '', int|float $position = null): string|false
    {
        return Action::add('admin_menu', function () use ($title, $menuTitle, $capability, $menuSlug, $callback, $iconUrl, $position) {
            return function_exists('add_menu_page') ? add_menu_page($title, $menuTitle, $capability, $menuSlug, $callback, $iconUrl, $position) : false;
        });
    }
}
