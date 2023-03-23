<?php

namespace WordPressExtendCore\Service\Style;

class FontSize
{
    /** @var FontSize[] */
    private static array $instances = [];

    private string $fontSize;

    private string $className;

    private string $prefix = 'has-';

    private string $suffix = '-font-size';

    private string $classDelegate = 'has-font-size';

    public function __construct(string $fontSize)
    {
        $this->setFontSize($fontSize)
            ->setClassName();
    }

    /**
     * @param string $fontSize
     * @return FontSize
     */
    public static function getInstance(string $fontSize): FontSize
    {
        $key = md5($fontSize);

        if (!isset(self::$instances[$key]) || !self::$instances[$key] instanceof FontSize) {
            self::$instances[$key] = new self($fontSize);
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
     * @return FontSize
     */
    public function setClassName(?string $className = null): FontSize
    {
        $this->className = is_null($className) ? join(" ", ["{$this->getPrefix()}{$this->getFontSize()}{$this->getSuffix()}", $this->getClassDelegate()]) : join(" ", [$className, $this->getClassDelegate()]);
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
     * @return FontSize
     */
    public function setPrefix(string $prefix): FontSize
    {
        $this->prefix = $prefix;
        return $this;
    }

    /**
     * @return string
     */
    public function getFontSize(): string
    {
        return $this->fontSize;
    }

    /**
     * @param string $fontSize
     * @return FontSize
     */
    protected function setFontSize(string $fontSize): FontSize
    {
        $this->fontSize = $fontSize;
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
     * @return FontSize
     */
    public function setSuffix(string $suffix): FontSize
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
     * @return FontSize
     */
    public function setClassDelegate(string $classDelegate): FontSize
    {
        $this->classDelegate = $classDelegate;
        return $this;
    }
}
