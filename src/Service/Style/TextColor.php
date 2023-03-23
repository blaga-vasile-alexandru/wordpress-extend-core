<?php

namespace WordPressExtendCore\Service\Style;

class TextColor
{
    /** @var TextColor[] */
    private static array $instances = [];

    private string $textColor;

    private string $className;

    private string $prefix = 'has-';

    private string $suffix = '-color';

    private string $classDelegate = 'has-text-color';

    public function __construct(string $backgroundColor)
    {
        $this->setTextColor($backgroundColor)
            ->setClassName();
    }

    /**
     * @param string $backgroundColor
     * @return TextColor
     */
    public static function getInstance(string $backgroundColor): TextColor
    {
        $key = md5($backgroundColor);

        if (!isset(self::$instances[$key]) || !self::$instances[$key] instanceof TextColor) {
            self::$instances[$key] = new self($backgroundColor);
        }

        return self::$instances[$key];
    }

    /**
     * @return string
     */
    public function getClassName(): string
    {
        return $this->className;
    }

    /**
     * @param string|null $className
     * @return TextColor
     */
    public function setClassName(?string $className = null): TextColor
    {
        $this->className = is_null($className) ? join(" ", ["{$this->getPrefix()}{$this->getTextColor()}{$this->getSuffix()}", $this->getClassDelegate()]) : join(" ", [$className, $this->getClassDelegate()]);
        return $this;
    }

    /**
     * @return string
     */
    public function getPrefix(): string
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     * @return TextColor
     */
    public function setPrefix(string $prefix): TextColor
    {
        $this->prefix = $prefix;
        return $this;
    }

    /**
     * @return string
     */
    public function getTextColor(): string
    {
        return $this->textColor;
    }

    /**
     * @param string $textColor
     * @return TextColor
     */
    protected function setTextColor(string $textColor): TextColor
    {
        $this->textColor = $textColor;
        return $this;
    }

    /**
     * @return string
     */
    public function getSuffix(): string
    {
        return $this->suffix;
    }

    /**
     * @param string $suffix
     * @return TextColor
     */
    public function setSuffix(string $suffix): TextColor
    {
        $this->suffix = $suffix;
        return $this;
    }

    /**
     * @return string
     */
    public function getClassDelegate(): string
    {
        return $this->classDelegate;
    }

    /**
     * @param string $classDelegate
     * @return TextColor
     */
    public function setClassDelegate(string $classDelegate): TextColor
    {
        $this->classDelegate = $classDelegate;
        return $this;
    }
}
