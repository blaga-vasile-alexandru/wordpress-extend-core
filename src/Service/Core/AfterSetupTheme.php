<?php

namespace WordPressExtendCore\Service\Core;

use Exception;
use WordPressExtendCore\Exception\CollectionFileException;
use WordPressExtendCore\Exception\FileException;
use WordPressExtendCore\Service\Hooks\Action;
use WordPressExtendCore\Service\Hooks\Filters;

class AfterSetupTheme
{
    private static ?AfterSetupTheme $instance = null;

    /**
     * @throws Exception
     */
    public function loadStyle(): AfterSetupTheme
    {
        try {
            LoadingFile::getInstance(File::getInstance('style.css'))->styleInject();
        } catch (CollectionFileException|FileException $e) {
            throw new Exception($e->getMessage());
        }
        return $this;
    }

    /**
     * @return AfterSetupTheme|false
     */
    public static function getInstance(): AfterSetupTheme|false
    {
        if (!has_action('after_setup_theme')) {
            return false;
        }

        if (!self::$instance instanceof AfterSetupTheme) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * By default, the color palette offered to blocks allows the user to select a custom color different from the editor or theme default colors.
     * This flag will make sure users are only able to choose colors from the editor-color-palette the theme provided or from the editor default colors if the theme did not provide one.
     */
    public function disableCustomColors(): self
    {
        return $this->addThemeSupport('disable-custom-colors');
    }

    public function addThemeSupport(string $featured): self
    {
        add_action('after_setup_theme', function () use ($featured) {
            add_theme_support($featured);
        });

        return $this;
    }

    /**
     * When set, users will be restricted to the default gradients provided in the block editor or the gradients provided via the editor-gradient-presets theme support setting.
     */
    public function disableCustomGradients(): self
    {
        return $this->addThemeSupport('disable-custom-gradients');
    }

    /**
     * Disabling the default block patterns.
     *
     * WordPress comes with a number of block patterns built-in, themes can opt-out of the bundled patterns.
     */
    public function removeCoreBlockPatterns(): self
    {
        return $this->removeThemeSupport('core-block-patterns');
    }

    public function removeThemeSupport(string $featured): self
    {
        add_action('after_setup_theme', function () use ($featured) {
            remove_theme_support($featured);
        });

        return $this;
    }

    public function addAction(callable $callback): void
    {
        add_action('after_setup_theme', $callback);
    }
}
