<?php
declare(strict_types=1);

namespace WordPressExtendCore\Service\React;

use WordPressExtendCore\Service\Debug;
use WordPressExtendCore\Service\React\Menu\Register;

class EnqueueReactScript
{
    private static array $instances = [];

    private static array $loadedFile = [];

    private string $handle;

    private string $index;

    private string|false $indexCss = false;

    private string $phpAsset;

    private array $dependencies = [];

    private string $version = '';

    private array $data = [];

    private array $text = [];

    private ?Register $menu = null;

    /**
     * @param string $handle
     * @param string $index
     * @param string|false $phpAsset
     */
    public function __construct(string $handle, string $index, string|false $phpAsset = false)
    {
        $this->setHandle($handle)
            ->setIndex($index)
            ->setPhpAsset($phpAsset)
            ->loadPhpAsset();
    }

    /**
     * @return $this
     */
    public function loadPhpAsset(): EnqueueReactScript
    {
        if (!empty($this->getPhpAsset())) {
            $data = require_once $this->getPhpAsset();
            $this->setVersion($data['version'])
                ->setDependencies($data['dependencies']);
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getPhpAsset(): string
    {
        return $this->phpAsset;
    }

    /**
     * @param string $phpAsset
     * @return EnqueueReactScript
     */
    public function setPhpAsset(string $phpAsset): EnqueueReactScript
    {
        $this->phpAsset = file_exists($phpAsset) ? $phpAsset : false;
        return $this;
    }

    /**
     * @param string $handle
     * @param string $index
     * @param string|false $phpAsset
     * @return EnqueueReactScript
     */
    public static function getInstance(string $handle, string $index, string|false $phpAsset = false): EnqueueReactScript
    {
        $key = md5("{$handle}-{$index}-{$phpAsset}");

        if (!self::$instances || !isset(self::$instances[$key]) || !(self::$instances[$key] instanceof EnqueueReactScript)) {
            self::$instances[$key] = new self($handle, $index, $phpAsset);
        }

        return self::$instances[$key];
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return EnqueueReactScript
     */
    public function addData(string $key, mixed $value = null): EnqueueReactScript
    {
        $data = $this->getData();

        if (is_null($value)) {
            $data[$key] = $key;
        } else {
            $data[$key] = $value;
        }

        $this->setData($data);

        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return EnqueueReactScript
     */
    public function setData(array $data): EnqueueReactScript
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @param string $key
     * @param string|null $text
     * @return EnqueueReactScript
     */
    public function addText(string $key, ?string $text = null): EnqueueReactScript
    {
        $Text = $this->getText();

        if (is_null($text)) {
            $Text[$key] = $key;
        } else {
            $Text[$key] = $text;
        }

        $this->setText($Text);

        return $this;
    }

    /**
     * @return array
     */
    public function getText(): array
    {
        return $this->text;
    }

    /**
     * @param array $text
     * @return EnqueueReactScript
     */
    public function setText(array $text): EnqueueReactScript
    {
        $this->text = $text;
        return $this;
    }

    public function injectScript()
    {
        if (!self::isLoadedFile($this->getIndex())) {
            wp_enqueue_script("react-{$this->getHandle()}", $this->getIndex(), $this->getDependencies(), $this->getVersion(), true);
            self::setLoadedFile($this->getIndex());
        }
    }

    /**
     * @param string $file
     * @return bool
     */
    public static function isLoadedFile(string $file): bool
    {
        $key = md5($file);
        return (isset(self::$loadedFile[$key]) && self::$loadedFile[$key]);
    }

    /**
     * @return string
     */
    public function getIndex(): string
    {
        return $this->index;
    }

    /**
     * @param string $index
     * @return EnqueueReactScript
     */
    public function setIndex(string $index): EnqueueReactScript
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @return string
     */
    public function getHandle(): string
    {
        return $this->handle;
    }

    /**
     * @param string $handle
     * @return EnqueueReactScript
     */
    public function setHandle(string $handle): EnqueueReactScript
    {
        $this->handle = $handle;
        return $this;
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return $this->dependencies;
    }

    /**
     * @param array $dependencies
     * @return EnqueueReactScript
     */
    public function setDependencies(array $dependencies): EnqueueReactScript
    {
        $this->dependencies = Debug::isNotEmptyArray($dependencies) ? $dependencies : [];
        return $this;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return EnqueueReactScript
     */
    public function setVersion(string $version): EnqueueReactScript
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @param mixed $loadedFile
     */
    public static function setLoadedFile(string $loadedFile): void
    {
        self::$loadedFile[md5($loadedFile)] = true;
    }

    public function injectStyle()
    {
        if (!self::isLoadedFile($this->getIndexCss())) {
            wp_enqueue_style("react-{$this->getHandle()}", $this->getIndexCss(), [], $this->getVersion());
            self::setLoadedFile($this->getIndexCss());
        }
    }

    /**
     * @return false|string
     */
    public function getIndexCss(): bool|string
    {
        return $this->indexCss;
    }

    /**
     * @param false|string $indexCss
     * @return EnqueueReactScript
     */
    public function setIndexCss(bool|string $indexCss): EnqueueReactScript
    {
        $this->indexCss = $indexCss;
        return $this;
    }

    /**
     * @return void
     */
    public function render(): void
    {
        if (self::isLoadedFile($this->getIndex())) {
            $handle = $this->getHandle();
            $reactArgs = [];

            if (Debug::isNotEmptyArray($this->getData())) {
                $reactArgs[] = Debug::jsonEncode(['defined' => 'data', 'define' => $this->getData()]);
            }

            if (Debug::isNotEmptyArray($this->getText())) {
                $reactArgs[] = Debug::jsonEncode(['defined' => 'text', 'define' => $this->getText()]);
            }

            if ($this->getMenu() && !$this->getMenu()->isEmpty()) {
                $reactArgs[] = Debug::jsonEncode(['defined' => 'menu', 'define' => $this->getMenu()->__toArray()]);
            }

            $reactArgs = Debug::isNotEmptyArray($reactArgs) ? ", " . join(", ", $reactArgs) : "";

            wp_add_inline_script("react-{$this->getHandle()}", "if(window.wordPressCoreExtendReact) window.wordPressCoreExtendReact('#react-{$this->getHandle()}'{$reactArgs})");

            echo <<<HTML
<main id="react-$handle"/>
HTML;
        }
    }

    /**
     * @return Register|null
     */
    public function getMenu(): ?Register
    {
        return $this->menu;
    }

    /**
     * @param Register|null $menu
     * @return EnqueueReactScript
     */
    public function setMenu(?Register $menu): EnqueueReactScript
    {
        $this->menu = $menu;
        return $this;
    }
}
