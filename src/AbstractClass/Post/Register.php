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

namespace WordPressExtendCore\AbstractClass\Post;

abstract class Register
{
    /** @var Register[] */
    private static array $registers = [];

    /** @var string */
    private string $postType;

    /** @var string */
    private string $label;

    /** @var array */
    private array $labels;

    /** @var bool */
    private bool $public = true;

    /** @var string */
    private string $icon = 'dashicons-media-archive';

    /** @var bool */
    private bool $showInRest = true;

    private array $supports = ['title', 'editor', 'thumbnail', 'excerpt'];

    public function __construct(string $postType)
    {
        $this->setPostType($postType);
    }

    /**
     * @param string $postType
     * @param string $class
     * @return Register
     */
    public static function getRegister(string $postType, string $class = __CLASS__): Register
    {
        $key = md5($postType);

        if (!isset(self::$registers[$key]) || !(self::$registers[$key] instanceof $class)) {
            self::$registers[$key] = new $class($postType);
        }

        return self::$registers[$key];
    }

    /**
     * @return array
     */
    public function getSupports(): array
    {
        return $this->supports;
    }

    /**
     * @param array $supports
     * @return Register
     */
    public function setSupports(array $supports): Register
    {
        $this->supports = $supports;
        return $this;
    }

    /**
     * @return void
     */
    public function register(): void
    {
        register_post_type($this->getPostType(), [
            'label' => $this->getLabel(),
            'labels' => $this->getLabels(),
            'public' => $this->isPublic(),
            'menu_icon' => $this->getIcon(),
            'show_in_rest' => $this->isShowInRest(),
            'supports' => $this->getSupports(),
        ]);
    }

    /**
     * @return string
     */
    public function getPostType(): string
    {
        return $this->postType;
    }

    /**
     * @param string $postType
     * @return Register
     */
    public function setPostType(string $postType): Register
    {
        $this->postType = $postType;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return Register
     */
    public function setLabel(string $label): Register
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return array
     */
    public function getLabels(): array
    {
        return $this->labels;
    }

    /**
     * @param array $labels
     * @return Register
     */
    public function setLabels(array $labels): Register
    {
        $this->labels = $labels;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPublic(): bool
    {
        return $this->public;
    }

    /**
     * @param bool $public
     * @return Register
     */
    public function setPublic(bool $public): Register
    {
        $this->public = $public;
        return $this;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     * @return Register
     */
    public function setIcon(string $icon): Register
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @return bool
     */
    public function isShowInRest(): bool
    {
        return $this->showInRest;
    }

    /**
     * @param bool $showInRest
     * @return Register
     */
    public function setShowInRest(bool $showInRest): Register
    {
        $this->showInRest = $showInRest;
        return $this;
    }
}
