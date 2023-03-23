<?php
/**
 * @package WordPressExtendCore
 * @author Vasile-Alexandru Blaga
 * @copyright Vasile-Alexandru Blaga
 * @license GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: WordPress Extend Core
 * Author: Vasile-Alexandru Blaga
 * Author URI: https://www.blaga.ro
 * Version: 1.0.0
 * Requires at least: 6.1.1
 * Requires PHP: 8.1
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI: https://www.blaga.ro
 * Text Domain: wordpress-extend-core
 * Description: WordPress extend source core.
 *
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

use WordPressExtendCore\WordPressExtendCore;

require "vendor/autoload.php";

if (has_action('plugins_loaded') && class_exists(WordPressExtendCore::class)) {
    add_action('plugins_loaded', [WordPressExtendCore::class, 'getInstance']);
}
