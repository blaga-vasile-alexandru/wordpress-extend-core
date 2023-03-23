<?php

namespace WordPressExtendCore\Service\Core;

use WordPressExtendCore\Service\Style\Spacing\Margin;
use WordPressExtendCore\Service\Style\Spacing\Padding;
use WordPressExtendCore\Service\Style\Typography\LineHeight;

class StyleAttribute
{
    /** @var StyleAttribute[] */
    private static array $instances = [];
    /** @var string */
    private string $id;
    /** @var Padding|false */
    private Padding|false $padding = false;
    /** @var Margin|false */
    private Margin|false $margin = false;
    /** @var LineHeight|false */
    private LineHeight|false $lineHeight = false;

    /**
     * @param string $id
     * @param array|false $style
     */
    public function __construct(string $id, array|false $style)
    {
        $this->setId($id);

        if ($style) {
            if (isset($style['spacing'])) {
                if (isset($style['spacing']['padding'])) {
                    $this->setPadding(
                        Padding::getInstance($this->getId())
                            ->setPadding(
                                $style['spacing']['padding']['top'] ?? false,
                                $style['spacing']['padding']['right'] ?? false,
                                $style['spacing']['padding']['bottom'] ?? false,
                                $style['spacing']['padding']['left'] ?? false
                            )
                    );
                }

                if (isset($style['spacing']['margin'])) {
                    $this->setMargin(
                        Margin::getInstance($this->getId())
                            ->setMargin(
                                $style['spacing']['margin']['top'] ?? false,
                                $style['spacing']['margin']['right'] ?? false,
                                $style['spacing']['margin']['bottom'] ?? false,
                                $style['spacing']['margin']['left'] ?? false
                            ));
                }
            }

            if (isset($style['typography'])) {
                if (isset($style['typography']['lineHeight'])) {
                    $this->setLineHeight(
                        LineHeight::getInstance($this->getId())
                            ->setLineHeight((int)$style['typography']['lineHeight'])
                    );
                }
            }
        }
    }

    /**
     * @param string $id
     * @return StyleAttribute
     */
    private function setId(string $id): StyleAttribute
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @param array|false $style
     * @return StyleAttribute
     */
    public static function getInstances(string $id, array|false $style): StyleAttribute
    {
        $key = md5("{$id}" . json_encode($style));

        if (!isset(self::$instances[$key]) || !self::$instances[$key] instanceof StyleAttribute) {
            self::$instances[$key] = new self($id, $style);
        }

        return self::$instances[$key];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $styles = [];

        if ($this->getPadding()) {
            $styles[] = $this->getPadding()->__toString();
        }
        if ($this->getMargin()) {
            $styles[] = $this->getMargin()->__toString();
        }
        if ($this->getLineHeight()) {
            $styles[] = $this->getLineHeight()->__toString();
        }
        $style = join(" ", $styles);

        return !empty($style) ? "style='{$style}'" : false;
    }

    /**
     * @return false|Padding
     */
    public function getPadding(): bool|Padding
    {
        return $this->padding;
    }

    /**
     * @param false|Padding $padding
     * @return StyleAttribute
     */
    public function setPadding(bool|Padding $padding): StyleAttribute
    {
        $this->padding = $padding;
        return $this;
    }

    /**
     * @return false|Margin
     */
    public function getMargin(): bool|Margin
    {
        return $this->margin;
    }

    /**
     * @param false|Margin $margin
     * @return StyleAttribute
     */
    public function setMargin(bool|Margin $margin): StyleAttribute
    {
        $this->margin = $margin;
        return $this;
    }

    /**
     * @return false|LineHeight
     */
    public function getLineHeight(): bool|LineHeight
    {
        return $this->lineHeight;
    }

    /**
     * @param false|LineHeight $lineHeight
     * @return StyleAttribute
     */
    public function setLineHeight(bool|LineHeight $lineHeight): StyleAttribute
    {
        $this->lineHeight = $lineHeight;
        return $this;
    }
}
