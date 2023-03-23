<?php

namespace WordPressExtendCore\Service\React\Menu;

class Typography
{
    private static array $instances = [];

    private string $slug;

    private string $label;

    private string $url;

    private string $endpoint;

    private string $app;

    private bool $active;

    /**
     * @param string $slug
     */
    public function __construct(string $slug)
    {
        $this->setSlug($slug);
    }

    /**
     * @param string $slug
     * @return Typography
     */
    public static function getInstance(string $slug): Typography
    {
        $key = md5($slug);

        if (!isset(self::$instances[$key]) || !self::$instances[$key] instanceof Typography) {
            self::$instances[$key] = new self($slug);
        }

        return self::$instances[$slug];
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return Typography
     */
    public function setActive(bool $active): Typography
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Typography
     */
    public function setUrl(string $url): Typography
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * @param string $endpoint
     * @return Typography
     */
    public function setEndpoint(string $endpoint): Typography
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * @return string
     */
    public function getApp(): string
    {
        return $this->app;
    }

    /**
     * @param string $app
     * @return Typography
     */
    public function setApp(string $app): Typography
    {
        $this->app = $app;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return Typography
     */
    public function setLabel(string $label): Typography
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return Typography
     */
    public function setSlug(string $slug): Typography
    {
        $this->slug = $slug;
        return $this;
    }
}
