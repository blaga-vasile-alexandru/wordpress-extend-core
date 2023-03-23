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

namespace WordPressExtendCore\AbstractClass\Block;

use WordPressExtendCore\Service\Debug;
use WordPressExtendCore\Service\Register\Image\Size;
use WP_Block;

abstract class Register
{
    const BLOCK_NAME = "wp-extend-core/default";

    /** @var Register[] */
    private static array $blocks = [];

    /** @var string */
    private string $name;

    /** @var Size[] */
    private array $imageSize = [];

    /** @var bool */
    private bool $callRender = false;
    /** @var string */
    private string $pathLocation;

    public function __construct(string $blockName)
    {
        $this->setName($blockName);
    }

    /**
     * @param string $blockName
     * @param string $Class
     * @return $this
     */
    public static function getRegister(string $blockName = self::BLOCK_NAME, string $Class = __CLASS__): self
    {
        $key = md5($blockName);

        if (!isset(self::$blocks[$key]) || !self::$blocks[$key] instanceof $Class) {
            self::$blocks[$key] = new $Class($blockName);
        }

        return self::$blocks[$key];
    }

    public function register(): void
    {
        if (Debug::isNotEmptyArray($this->getImageSizes())) {
            foreach ($this->getImageSizes() as $ImageSize) {
                /** @var $ImageSize Size */
                $ImageSize->register();
            }
        }

        $args = ["render_callback" => false];

        if ($this->isCallRender()) {
            $args['render_callback'] = [$this, 'renderCallback'];
        }

        register_block_type($this->getPathLocation(), $args);
    }

    /**
     * @return Size[]
     */
    public function getImageSizes(): array
    {
        return $this->imageSize;
    }

    /**
     * @return bool
     */
    public function isCallRender(): bool
    {
        return $this->callRender;
    }

    /**
     * @param bool $callRender
     * @return Register
     */
    public function setCallRender(bool $callRender): Register
    {
        $this->callRender = $callRender;
        return $this;
    }

    /**
     * @return string
     */
    public function getPathLocation(): string
    {
        return $this->pathLocation;
    }

    /**
     * @param string $pathLocation
     * @return Register
     */
    public function setPathLocation(string $pathLocation): Register
    {
        $this->pathLocation = trailingslashit($pathLocation);
        return $this;
    }

    /**
     * @param array $blockAttributes
     * @param string $content
     * @param WP_Block $block
     * @return string
     */
    public function renderCallback(array $blockAttributes, string $content, WP_Block $block): string
    {
        return "<p>Register is not render!</p>";
    }

    /**
     * @param string $name
     * @return Size
     */
    public function getImageSize(string $name): Size
    {
        return $this->imageSize[$name];
    }

    /**
     * @param Size $imageSize
     * @return Register
     */
    public function setImageSize(Size $imageSize): Register
    {
        if (!isset($this->imageSize[$imageSize->getName()])) {
            $this->imageSize[$imageSize->getName()] = $imageSize;
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Register
     */
    public function setName(string $name): Register
    {
        $this->name = $name;
        return $this;
    }

}
