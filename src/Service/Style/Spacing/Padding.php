<?php

namespace WordPressExtendCore\Service\Style\Spacing;

class Padding
{
    /** @var Padding[] */
    private static array $instances = [];
    /** @var string */
    private string $id;
    /** @var string|false */
    private string|false $top = false;
    /** @var string|false */
    private string|false $right = false;
    /** @var string|false */
    private string|false $bottom = false;
    /** @var string|false */
    private string|false $left = false;
    /** @var array|false|null */
    private array|false|null $padding = null;

    public function __construct(string $id)
    {
        $this->setId($id);
    }

    /**
     * @param string $id
     * @return Padding
     */
    private function setId(string $id): Padding
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $id
     * @return Padding
     */
    public static function getInstance(string $id): Padding
    {
        $key = md5("{$id}");

        if (!isset(self::$instances[$key]) || !self::$instances[$key] instanceof Padding) {
            self::$instances[$key] = new self($id);
        }

        return self::$instances[$key];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    public function __toString(): string
    {
        // TODO: Implement __toString() method.
        return join(" ", $this->getPadding());
    }

    /**
     * @return false|array
     */
    public function getPadding(): bool|array
    {
        if (is_null($this->padding)) {
            $this->setPadding(
                $this->getTop(),
                $this->getRight(),
                $this->getBottom(),
                $this->getLeft()
            );
        }

        return $this->padding;
    }

    /**
     * @param string|false $top
     * @param string|false $right
     * @param string|false $bottom
     * @param string|false $left
     * @return $this
     */
    public function setPadding(string|false $top, string|false $right, string|false $bottom, string|false $left): Padding
    {
        if ($this->getTop() !== $top) {
            $this->setTop($top);
        }
        if ($this->getRight() !== $right) {
            $this->setRight($right);
        }
        if ($this->getBottom() !== $bottom) {
            $this->setBottom($bottom);
        }
        if ($this->getLeft() !== $left) {
            $this->setLeft($left);
        }

        /** @var array|false $padding */
        $padding = [];

        if ($top && $bottom && $right && $left && $top === $bottom && $right === $left) {
            $padding['xy'] = sprintf("padding: %s;", join(" ", [$top ?? $bottom, $right ?? $left]));
        } else if ($top || $bottom || $right || $left) {
            if ($top) {
                $padding['top'] = "padding-top: {$top};";
            }

            if ($right) {
                $padding['right'] = "padding-right: {$right};";
            }

            if ($bottom) {
                $padding['bottom'] = "padding-bottom: {$bottom};";
            }

            if ($left) {
                $padding['left'] = "padding-left: {$left};";
            }
        } else {
            $padding = false;
        }

        $this->padding = $padding;

        return $this;
    }

    /**
     * @return false|string
     */
    public function getTop(): bool|string
    {
        return $this->top;
    }

    /**
     * @param false|string $top
     * @return Padding
     */
    public function setTop(bool|string $top): Padding
    {
        $this->getValue($top);
        $this->top = $top;
        return $this;
    }

    /**
     * @return false|string
     */
    public function getRight(): bool|string
    {
        return $this->right;
    }

    /**
     * @param false|string $right
     * @return Padding
     */
    public function setRight(bool|string $right): Padding
    {
        $this->getValue($right);
        $this->right = $right;
        return $this;
    }

    /**
     * @return false|string
     */
    public function getBottom(): bool|string
    {
        return $this->bottom;
    }

    /**
     * @param false|string $bottom
     * @return Padding
     */
    public function setBottom(bool|string $bottom): Padding
    {
        $this->getValue($bottom);
        $this->bottom = $bottom;
        return $this;
    }

    /**
     * @return false|string
     */
    public function getLeft(): bool|string
    {
        return $this->left;
    }

    /**
     * @param false|string $left
     * @return Padding
     */
    public function setLeft(bool|string $left): Padding
    {
        $this->getValue($left);
        $this->left = $left;
        return $this;
    }

    /**
     * @param string|false $value
     * @return void
     */
    protected function getValue(string|false &$value)
    {
        if (($value && str_contains($value, 'var:'))) {
            $value = "var(" . str_replace(['var:', '|'], ['--wp--', '--'], $value) . ")";
        }
    }
}
