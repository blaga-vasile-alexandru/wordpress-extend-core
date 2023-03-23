<?php

namespace WordPressExtendCore\InterfaceClass;

interface RootLocation
{

    /**
     * @return string
     */
    public static function getUrl(): string;

    /**
     * @return string
     */
    public static function getPath(): string;

    /**
     * @param array|string $path
     * @return string
     */
    public static function path(array|string $path = []): string;
}
