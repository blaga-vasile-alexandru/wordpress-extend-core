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

namespace WordPressExtendCore\Service;

use Generator;

class Debug
{
    /**
     * @param array|null $array
     * @return bool
     */
    public static function isNotEmptyArray(?array $array): bool
    {
        return (!is_null($array) && is_array($array) && !empty($array));
    }

    /**
     * @param string $className
     * @param string $method
     * @return bool
     */
    public static function methodExists(string $className, string $method): bool
    {
        return self::classExists($className) && method_exists($className, $method);
    }

    /**
     * @param string $className
     * @return bool
     */
    public static function classExists(string $className): bool
    {
        return class_exists($className);
    }

    /**
     * @return string
     */
    public static function uniqId(): string
    {
        return uniqid();
    }

    /**
     * @param array $arr
     * @return string|false
     */
    public static function jsonEncode(array $arr): string|false
    {
        return (function_exists('wp_json_encode')) ? wp_json_encode($arr) : json_encode($arr);
    }

    /**
     * @param mixed $var
     * @param bool $exit
     * @return void
     */
    public static function dump(mixed $var, bool $exit = false): void
    {
        printf("<pre>%s</pre>", print_r($var, true));
        if ($exit) {
            exit();
        }
    }
}