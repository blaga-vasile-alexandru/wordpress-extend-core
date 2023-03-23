<?php

namespace WordPressExtendCore\AbstractClass\RestRoute;

use WordPressExtendCore\Enum\Actions\Defaults;
use WordPressExtendCore\Service\Hooks\Action;
use WP_REST_Request;
use WP_REST_Server;

abstract class Register
{
    /** @var self[] */
    private static array $instances = [];
    /** @var string */
    private string $namespace;
    /** @var string */
    private string $route;
    /** @var int */
    private int $version;
    /** @var string */
    private string $methods = WP_REST_Server::READABLE;
    /** @var bool */
    private bool $permissionCallback = false;

    public function __construct(string $namespace, string $route, int $version = 2)
    {
        $this->setNamespace($namespace)
            ->setRoute($route)
            ->setVersion($version);
    }

    /**
     * @param string $namespace
     * @param string $route
     * @param string $className
     * @param int $version
     * @return mixed
     */
    public static function getInstance(string $namespace, string $route, string $className = __CLASS__, int $version = 2): self
    {
        $keyVersion = md5("v{$version}");

        if (!isset(self::$instances[$keyVersion])) {
            self::$instances[$keyVersion] = [];
        }

        $key = md5("{$namespace}-{$route}");

        if (!isset(self::$instances[$keyVersion][$key]) || self::$instances[$keyVersion][$key] instanceof $className) {
            self::$instances[$keyVersion][$key] = new $className($namespace, $route, $version);
        }

        return self::$instances[$keyVersion][$key];
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $self = $this;

        $namespace = untrailingslashit($this->getNamespace());
        $version = "v{$this->getVersion()}";
        $route = $this->getRoute();
        $args = [
            'methods' => $this->getMethods(),
            'callback' => function (WP_REST_Request $request) use ($self) {
                return $self->response($request);
            },
            'permission_callback' => $this->isPermissionCallback() ? function (WP_REST_Request $request) use ($self) {
                return $this->permissionCallback($request);
            } : '__return_true',
        ];

        Action::add(Defaults::REST_API_INIT, function () use ($namespace, $version, $route, $args) {
            register_rest_route("{$namespace}{$version}", $route, $args);
        });
    }

    /**
     * @return string
     */
    public function getNamespace(): string
    {
        return $this->namespace;
    }

    /**
     * @param string $namespace
     * @return Register
     */
    public function setNamespace(string $namespace): Register
    {
        $this->namespace = $namespace;
        return $this;
    }

    /**
     * @return int
     */
    public function getVersion(): int
    {
        return $this->version;
    }

    /**
     * @param int $version
     * @return Register
     */
    public function setVersion(int $version): Register
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoute(): string
    {
        return $this->route;
    }

    /**
     * @param string $route
     * @return Register
     */
    public function setRoute(string $route): Register
    {
        $this->route = $route;
        return $this;
    }

    /**
     * @return string
     */
    public function getMethods(): string
    {
        return $this->methods;
    }

    /**
     * @param string $methods
     * @return Register
     */
    public function setMethods(string $methods): Register
    {
        $this->methods = $methods;
        return $this;
    }

    /**
     * @param WP_REST_Request $Request
     * @return mixed
     */
    abstract public function response(WP_REST_Request $Request): mixed;

    /**
     * @return bool
     */
    public function isPermissionCallback(): bool
    {
        return $this->permissionCallback;
    }

    /**
     * @param bool $permissionCallback
     * @return Register
     */
    public function setPermissionCallback(bool $permissionCallback): Register
    {
        $this->permissionCallback = $permissionCallback;
        return $this;
    }

    /**
     * @param WP_REST_Request $request
     * @return bool
     */
    public function permissionCallback(WP_REST_Request $request): bool
    {
        return true;
    }
}
