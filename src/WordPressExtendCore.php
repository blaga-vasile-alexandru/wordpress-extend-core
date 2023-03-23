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

namespace WordPressExtendCore;

use WordPressExtendCore\Enum\Filters\WordPressExtendCore as FiltersWordPressExtendCore;
use WordPressExtendCore\InterfaceClass\RootLocation;
use WordPressExtendCore\Service\Debug;
use WordPressExtendCore\Service\Hooks\Action;
use WordPressExtendCore\Service\Hooks\Filters;

class WordPressExtendCore implements RootLocation
{
    const DEFINE_FILE = 'extend-core';
    const HOOK_NAME = 'wp-extend-core/';

    private static ?WordPressExtendCore $instance = null;

    private static ?string $url = null;

    private static ?string $path = null;

    public function __construct()
    {
        register_activation_hook(self::DEFINE_FILE, [$this, 'activate']);

        if (function_exists('register_deactivation_hook')) {
            register_deactivation_hook(self::DEFINE_FILE, [$this, 'deactivation']);
        }

        Action::add('init', [$this, 'init']);
    }

    /**
     * @return ?WordPressExtendCore
     */
    public static function getInstance(): ?WordPressExtendCore
    {
        if (!(self::$instance instanceof WordPressExtendCore) && function_exists('register_activation_hook')) {
            if (function_exists('plugin_dir_path')) {
                self::setPath(plugin_dir_path(__DIR__));
            }

            if (function_exists('plugin_dir_url')) {
                self::setUrl(plugin_dir_url(__DIR__));
            }

            self::$instance = new self;
        }
        return self::$instance ?? null;
    }

    public static function getUrl(): string
    {
        // TODO: Implement getUrl() method.
        return self::$url;
    }

    /**
     * @param string|null $url
     */
    public static function setUrl(?string $url): void
    {
        self::$url = $url;
    }

    /**
     * @return void
     */
    public function init(): void
    {
        $this->launcherConfig();
    }

    /**
     * @return void
     */
    public function launcherConfig(): void
    {
        $config = require_once self::getPath() . "/config.php";
        $filterConfig = Filters::apply(FiltersWordPressExtendCore::LAUNCHER_CONFIG, $config, $this);

        if (Debug::isNotEmptyArray($filterConfig)) {
            foreach ($filterConfig as $key => $value) {
                $callable = false;

                if (is_int($key)) {
                    $className = $value;
                } else {
                    $className = $key;
                    $callable = $value;
                }

                if (!$callable && Debug::classExists($className)) {
                    new $className;
                } else {
                    if (Debug::methodExists($className, $callable)) {
                        call_user_func([$className, $callable]);
                    }
                }
            }
        }
    }

    public static function getPath(): string
    {
        // TODO: Implement getPath() method.
        return self::$path;
    }

    /**
     * @param array|string $path
     * @return string
     */
    public static function path(array|string $path = []):string {
        if(is_array($path)) {
            $path = join(DIRECTORY_SEPARATOR, $path);
        }

        return self::getPath() . $path;
    }

    /**
     * @param string|null $path
     */
    public static function setPath(?string $path): void
    {
        self::$path = trailingslashit($path);
    }

    /**
     * @return void
     */
    public function activate(): void
    {
        self::flushRewriteRules();
    }

    /**
     * @return void
     */
    public static function flushRewriteRules(): void
    {
        if (function_exists('flush_rewrite_rules')) {
            flush_rewrite_rules();
        }
    }

    /**
     * @return void
     */
    public function deactivation(): void
    {
        self::flushRewriteRules();
    }
}
