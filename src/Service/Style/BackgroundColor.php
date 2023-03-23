<?php

namespace WordPressExtendCore\Service\Style;

class BackgroundColor
{
    /** @var BackgroundColor[] */
    private static array $instances = [];

    private string $backgroundColor;

    private string $className;

    private string $prefix = 'has-';

    private string $suffix = '-background-color';

    private string $classDelegate = 'has-background';

    public function __construct(string $backgroundColor)
    {
        $this->setBackgroundColor($backgroundColor)
            ->setClassName();
    }

    /**
     * @param string $backgroundColor
     * @return BackgroundColor
     */
    public static function getInstance(string $backgroundColor): BackgroundColor
    {
        $key = md5($backgroundColor);

        if (!isset(self::$instances[$key]) || !self::$instances[$key] instanceof BackgroundColor) {
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
     * @return BackgroundColor
     */
    public function setClassName(?string $className = null): BackgroundColor
    {
        $this->className = is_null($className) ? join(" ", ["{$this->getPrefix()}{$this->getBackgroundColor()}{$this->getSuffix()}", $this->getClassDelegate()]) : join(" ", [$className, $this->getClassDelegate()]);
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
     * @return BackgroundColor
     */
    public function setPrefix(string $prefix): BackgroundColor
    {
        $this->prefix = $prefix;
        return $this;
    }

    /**
     * @return string
     */
    public function getBackgroundColor(): string
    {
        return $this->backgroundColor;
    }

    /**
     * @param string $backgroundColor
     * @return BackgroundColor
     */
    protected function setBackgroundColor(string $backgroundColor): BackgroundColor
    {
        $this->backgroundColor = $backgroundColor;
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
     * @return BackgroundColor
     */
    public function setSuffix(string $suffix): BackgroundColor
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
     * @return BackgroundColor
     */
    public function setClassDelegate(string $classDelegate): BackgroundColor
    {
        $this->classDelegate = $classDelegate;
        return $this;
    }
}
