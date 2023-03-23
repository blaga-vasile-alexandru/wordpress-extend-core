<?php

namespace WordPressExtendCore\Service\Style;

class AlignClassName
{
    /** @var AlignClassName[] */
    private static array $instances = [];

    private string $align;

    private string $className;

    private string $prefix = 'align';

    private string $suffix = '';

    private string $classDelegate = '';

    public function __construct(string $backgroundColor)
    {
        $this->setAlignClassName($backgroundColor)
            ->setClassName();
    }

    /**
     * @param string $align
     * @return AlignClassName
     */
    public static function getInstance(string $align): AlignClassName
    {
        $key = md5($align);

        if (!isset(self::$instances[$key]) || !self::$instances[$key] instanceof AlignClassName) {
            self::$instances[$key] = new self($align);
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
     * @return AlignClassName
     */
    public function setClassName(?string $className = null): AlignClassName
    {
        $this->className = is_null($className) ? join(" ", ["{$this->getPrefix()}{$this->getAlignClassName()}{$this->getSuffix()}", $this->getClassDelegate()]) : join(" ", [$className, $this->getClassDelegate()]);
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
     * @return AlignClassName
     */
    public function setPrefix(string $prefix): AlignClassName
    {
        $this->prefix = $prefix;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlignClassName(): string
    {
        return $this->align;
    }

    /**
     * @param string $backgroundColor
     * @return AlignClassName
     */
    protected function setAlignClassName(string $backgroundColor): AlignClassName
    {
        $this->align = $backgroundColor;
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
     * @return AlignClassName
     */
    public function setSuffix(string $suffix): AlignClassName
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
     * @return AlignClassName
     */
    public function setClassDelegate(string $classDelegate): AlignClassName
    {
        $this->classDelegate = $classDelegate;
        return $this;
    }
}
