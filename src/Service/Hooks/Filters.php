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

namespace WordPressExtendCore\Service\Hooks;

class Filters
{
    /**
     * @param string|object $hookName
     * @param mixed $value
     * @param mixed ...$args
     * @return mixed
     */
    public static function apply(string|object $hookName, mixed $value, mixed ...$args): mixed
    {
        if (function_exists('apply_filters'))
            if (is_object($hookName))
                return apply_filters($hookName->getValue(), $value, ...$args);
            else
                return apply_filters($hookName, $value, ...$args);


        return $value;
    }


    /**
     * @param string|object $hookName
     * @param callable $callback
     * @param int $priority
     * @param int $acceptArgs
     * @return bool
     */
    public static function add(string|object $hookName, callable $callback, int $priority = 10, int $acceptArgs = 1): bool
    {
        if (function_exists('add_filter'))
            if (is_object($hookName))
                return add_filter($hookName->getValue(), $callback, $priority, $acceptArgs);
            else
                return add_filter($hookName, $callback, $priority, $acceptArgs);

        return false;
    }
}
