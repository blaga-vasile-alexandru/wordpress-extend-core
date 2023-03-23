<?php

namespace WordPressExtendCore\Service\Style;

class ClassName
{
    /** @var ClassName[] */
    private static $instances = [];

    /** @var array */
    private array $className = [];

    /**
     * @param string $blockId
     * @return ClassName
     */
    public static function getInstances(string $blockId): ClassName
    {
        $key = md5($blockId);

        if (!isset(self::$instances[$key]) || !self::$instances[$key] instanceof ClassName) {
            self::$instances[$key] = new self();
        }

        return self::$instances[$key];
    }

    /**
     * @return bool
     */
    public function hasClassNames():bool {
        return !empty($this->getClassName());
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return !empty($this->hasClassNames()) ? "class='".join(" ", $this->getClassName())."'" : "";
    }

    /**
     * @return array
     */
    public function getClassName(): array
    {
        return $this->className;
    }

    /**
     * @param array|string $className
     * @return ClassName
     */
    public function setClassName(array|string $className): ClassName
    {
        $this->className = is_array($className) ? array_merge($this->getClassName(), $className) : array_merge($this->getClassName(), explode(' ', $className));
        return $this;
    }
}
