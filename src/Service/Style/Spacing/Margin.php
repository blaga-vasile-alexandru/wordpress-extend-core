<?php

namespace WordPressExtendCore\Service\Style\Spacing;

class Margin
{
    /** @var Margin[] */
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
    /** @var array */
    private array|null $margin = [];

    public function __construct(string $id)
    {
        $this->setId($id);
    }

    /**
     * @param string $id
     * @return Margin
     */
    private function setId(string $id): Margin
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $id
     * @return Margin
     */
    public static function getInstance(string $id): Margin
    {
        $key = md5("{$id}");

        if (!isset(self::$instances[$key]) || !self::$instances[$key] instanceof Margin) {
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

    /**
     * @return string
     */
    public function __toString(): string
    {
        // TODO: Implement __toString() method.
        return join(" ", $this->getMargin());
    }

    /**
     * @return array
     */
    public function getMargin(): array
    {
        if (is_null($this->margin)) {
            $this->setMargin(
                $this->getTop(),
                $this->getRight(),
                $this->getBottom(),
                $this->getLeft()
            );
        }

        return $this->margin;
    }

    /**
     * @param string|false $top
     * @param string|false $right
     * @param string|false $bottom
     * @param string|false $left
     * @return $this
     */
    public function setMargin(string|false $top, string|false $right, string|false $bottom, string|false $left): Margin
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

        /** @var array|false $margin */
        $margin = [];

        if ($top && $bottom && $right && $left && $top === $bottom && $right === $left) {
            $margin['xy'] = sprintf("margin: %s;", join(" ", [$top ?? $bottom, $right ?? $left]));
        } else if ($top || $bottom || $right || $left) {
            if ($top) {
                $margin['top'] = "margin-top: {$top};";
            }

            if ($right) {
                $margin['right'] = "margin-right: {$right};";
            }

            if ($bottom) {
                $margin['bottom'] = "margin-bottom: {$bottom};";
            }

            if ($left) {
                $margin['left'] = "margin-left: {$left};";
            }
        } else {
            $margin = false;
        }

        $this->margin = $margin;

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
     * @return Margin
     */
    public function setTop(bool|string $top): Margin
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
     * @return Margin
     */
    public function setRight(bool|string $right): Margin
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
     * @return Margin
     */
    public function setBottom(bool|string $bottom): Margin
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
     * @return Margin
     */
    public function setLeft(bool|string $left): Margin
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
