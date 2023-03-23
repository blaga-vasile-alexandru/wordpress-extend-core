<?php

namespace WordPressExtendCore\Service;

use WordPressExtendCore\Enum\Actions\Defaults as DefaultActions;
use WordPressExtendCore\Enum\Filters\Defaults as DefaultFilters;
use WordPressExtendCore\InterfaceClass\RootLocation;
use WordPressExtendCore\Service\Hooks\Action;
use WordPressExtendCore\Service\Hooks\Filters;

class Theme implements RootLocation
{
    /** @var string */
    private static string $url;
    /** @var string */
    private static string $path;

    public static function getUrl(): string
    {
        // TODO: Implement getUrl() method.
        return self::$url;
    }

    /**
     * @param string $url
     */
    public static function setUrl(string $url): void
    {
        self::$url = $url;
    }

    public static function path(array|string $path = []): string
    {
        // TODO: Implement path() method.
        if (is_array($path)) {
            $path = join(DIRECTORY_SEPARATOR, $path);
        }

        return self::getPath() . $path;
    }

    public static function getPath(): string
    {
        // TODO: Implement getPath() method.
        return self::$path;
    }

    /**
     * @param string $path
     */
    public static function setPath(string $path): void
    {
        self::$path = $path;
    }

    /**
     * @param string $extension
     * @param string $mime
     * @param callable|false $fix
     * @return void
     */
    public static function addMimeType(string $extension, string $mime, callable|false $fix = false): void
    {
        if (!defined('ALLOW_UNFILTERED_UPLOADS')) {
            define('ALLOW_UNFILTERED_UPLOADS', true);
        }

        Filters::add(DefaultFilters::CHECK_FILE_TYPE_AND_EXT, function ($data, $file, $filename, $mimes) {

            global $wp_version;
            if ($wp_version !== '4.7.1') {
                return $data;
            }

            $filetype = wp_check_filetype($filename, $mimes);

            return [
                'ext' => $filetype['ext'],
                'type' => $filetype['type'],
                'proper_filename' => $data['proper_filename']
            ];

        }, 10, 4);

        Filters::add(DefaultFilters::UPLOAD_MIMES, function ($mimes) use ($extension, $mime) {
            $mimes[$extension] = $mime;
            return $mimes;
        });

        if ($fix) {
            Action::add(DefaultActions::ADMIN_HEAD, $fix);
        }
    }
}
