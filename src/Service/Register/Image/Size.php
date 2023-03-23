<?php

namespace WordPressExtendCore\Service\Register\Image;

class Size
{
    /** @var Size[] */
    private static array $registers = [];
    /** @var string */
    private string $name;
    /** @var int|false */
    private int|false $width = 0;
    /** @var int|false */
    private int|false $height = 0;
    /** @var bool */
    private bool $crop = false;

    public function __construct(string $name, int|false $width = false, int|bool $height = 0, bool $crop = false)
    {
        $this->setName($name)
            ->setWidth($width)
            ->setHeight($height)
            ->setCrop($crop);
    }

    /**
     * @param string $name
     * @param int|false $width
     * @param int|bool $height
     * @param bool $crop
     * @param string $Class
     * @return Size
     */
    public static function getRegister(string $name, int|false $width = false, int|bool $height = 0, bool $crop = false, string $Class = __CLASS__): Size
    {
        $key = md5("{$name}-{$width}-{$height}-{$crop}");

        if (!isset(self::$registers[$key]) || !self::$registers[$key] instanceof Size) {
            self::$registers[$key] = new $Class($name, $width, $height, $crop);
        }

        return self::$registers[$key];
    }

    /**
     * @return void
     */
    public function register(): void
    {
        add_image_size($this->getName(), $this->getWidth(), $this->getHeight(), $this->isCrop());
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
     * @return Size
     */
    public function setName(string $name): Size
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return false|int
     */
    public function getWidth(): bool|int
    {
        return $this->width;
    }

    /**
     * @param false|int $width
     * @return Size
     */
    public function setWidth(bool|int $width): Size
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return false|int
     */
    public function getHeight(): bool|int
    {
        return $this->height;
    }

    /**
     * @param false|int $height
     * @return Size
     */
    public function setHeight(bool|int $height): Size
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCrop(): bool
    {
        return $this->crop;
    }

    /**
     * @param bool $crop
     * @return Size
     */
    public function setCrop(bool $crop): Size
    {
        $this->crop = $crop;
        return $this;
    }
}
