<?php

namespace WordPressExtendCore\AbstractClass\Block;

use WordPressExtendCore\Service\Style\AlignClassName;
use WordPressExtendCore\Service\Style\BackgroundColor;
use WordPressExtendCore\Service\Style\ClassName;
use WordPressExtendCore\Service\Style\FontSize;
use WordPressExtendCore\Service\Style\TextColor;
use WordPressExtendCore\Service\Core\StyleAttribute;
use WP_Block;

abstract class Render
{
    /**
     * @var Render[]
     */
    private static array $instances = [];
    /** @var string */
    private string $id;
    /** @var WP_Block */
    private WP_Block $block;
    /** @var string */
    private string $content;

    /** @var string|null */
    private ?string $idAttr = null;
    /** @var ClassName */
    private ClassName $className;
    /** @var StyleAttribute */
    private StyleAttribute $styleAttributes;
    /** @var BackgroundColor|false */
    private BackgroundColor|false $backgroundColor = false;
    /** @var TextColor|false */
    private TextColor|false $textColor = false;
    /** @var FontSize|false */
    private FontSize|false $fontSize = false;
    /** @var AlignClassName|false */
    private AlignClassName|false $alignClassName = false;

    /**
     * @param string $id
     * @param array $blockAttributes
     * @param string $content
     * @param WP_Block|null $block
     */
    public function __construct(string $id, array $blockAttributes = [], string $content = "", ?WP_Block $block = null)
    {
        $this->setId($id)
            ->setContent($content)
            ->setIdAttr($blockAttributes['anchor'] ?? $this->getId())
            ->setClassName(ClassName::getInstances($this->getId()))
            ->setStyleAttributes(StyleAttribute::getInstances($this->getId(), $blockAttributes['style'] ?? false));

        if (isset($blockAttributes['backgroundColor'])) {
            $this->setBackgroundColor(BackgroundColor::getInstance($blockAttributes['backgroundColor']))
                ->getClassName()
                ->setClassName($this->getBackgroundColor()->getClassName());
        }

        if (isset($blockAttributes['textColor'])) {
            $this->setTextColor(TextColor::getInstance($blockAttributes['textColor']))
                ->getClassName()
                ->setClassName($this->getTextColor()->getClassName());
        }

        if (isset($blockAttributes['fontSize'])) {
            $this->setFontSize(FontSize::getInstance($blockAttributes['fontSize']))
                ->getClassName()->setClassName($this->getFontSize()->getClassName());
        }

        if (isset($blockAttributes['align'])) {
            $this->setAlignClassName(AlignClassName::getInstance($blockAttributes['align']))
                ->getClassName()->setClassName($this->getAlignClassName()->getClassName());
        }

        if (isset($blockAttributes['className'])) {
            $this->getClassName()->setClassName($blockAttributes['className']);
        }

        if ($block instanceof WP_Block) {
            $this->setBlock($block);
        }
    }

    /**
     * @param string $id
     * @return $this
     */
    private function setId(string $id): self
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
     * @return ClassName
     */
    public function getClassName(): ClassName
    {
        return $this->className;
    }

    /**
     * @param ClassName $className
     * @return Render
     */
    public function setClassName(ClassName $className): Render
    {
        $this->className = $className;
        return $this;
    }

    /**
     * @return false|BackgroundColor
     */
    public function getBackgroundColor(): BackgroundColor|bool
    {
        return $this->backgroundColor;
    }

    /**
     * @param false|BackgroundColor $backgroundColor
     * @return Render
     */
    public function setBackgroundColor(BackgroundColor|bool $backgroundColor): Render
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    /**
     * @return false|TextColor
     */
    public function getTextColor(): TextColor|bool
    {
        return $this->textColor;
    }

    /**
     * @param false|TextColor $textColor
     * @return Render
     */
    public function setTextColor(TextColor|bool $textColor): Render
    {
        $this->textColor = $textColor;
        return $this;
    }

    /**
     * @return false|FontSize
     */
    public function getFontSize(): FontSize|bool
    {
        return $this->fontSize;
    }

    /**
     * @param false|FontSize $fontSize
     * @return Render
     */
    public function setFontSize(FontSize|bool $fontSize): Render
    {
        $this->fontSize = $fontSize;
        return $this;
    }

    /**
     * @return false|AlignClassName
     */
    public function getAlignClassName(): bool|AlignClassName
    {
        return $this->alignClassName;
    }

    /**
     * @param false|AlignClassName $alignClassName
     * @return Render
     */
    public function setAlignClassName(bool|AlignClassName $alignClassName): Render
    {
        $this->alignClassName = $alignClassName;
        return $this;
    }

    /**
     * @param string $id
     * @param array $blockAttributes
     * @param string $content
     * @param WP_Block|null $block
     * @param string $className
     * @return $this
     */
    public static function getRendering(string $id, array $blockAttributes = [], string $content = "", ?WP_Block $block = null, string $className = __CLASS__): self
    {
        $key = md5("{$id}-{$className}");

        if (!isset(self::$instances[$key]) || !self::$instances[$key] instanceof $className) {
            self::$instances[$key] = new $className($id, $blockAttributes, $content, $block);
        }

        return self::$instances[$key];
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Render
     */
    public function setContent(string $content): Render
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return WP_Block
     */
    public function getBlock(): WP_Block
    {
        return $this->block;
    }

    /**
     * @param WP_Block $block
     * @return $this
     */
    public function setBlock(WP_Block $block): self
    {
        $this->block = $block;
        return $this;
    }

    /**
     * @return string
     */
    public function __propsToString(): string
    {
        return join(" ", $this->getProps());
    }

    /**
     * @return array
     */
    public function getProps(): array
    {
        $props = [];
        $props['style'] = $this->getStyleAttributes()->__toString();
        $props['class'] = $this->getClassName()->__toString();
        $props['id'] = "id='{$this->getIdAttr()}'";

        return $props;
    }

    /**
     * @return StyleAttribute
     */
    public function getStyleAttributes(): StyleAttribute
    {
        return $this->styleAttributes;
    }

    /**
     * @param StyleAttribute $styleAttributes
     * @return Render
     */
    public function setStyleAttributes(StyleAttribute $styleAttributes): Render
    {
        $this->styleAttributes = $styleAttributes;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIdAttr(): ?string
    {
        return $this->idAttr;
    }

    /**
     * @param string|null $idAttr
     * @return Render
     */
    public function setIdAttr(?string $idAttr): Render
    {
        $this->idAttr = $idAttr;
        return $this;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return <<<HTML
    <p>Render html block!</p>
HTML;
    }
}
