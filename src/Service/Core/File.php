<?php

namespace WordPressExtendCore\Service\Core;

use WordPressExtendCore\Exception\CollectionFileException;
use WordPressExtendCore\Exception\FileException;
use WordPressExtendCore\Service\Theme as ThemeService;

class File
{
    /**
     * @var File[]
     */
    static private array $instances = [];
    private string $loadingClass;
    private string $file = '';

    private string $path;

    private string $handle;

    private string $filePath;
    private string $fileUri;
    private string $extension;
    private array $depends = [];
    private string $version = '1';

    /**
     * @throws FileException
     */
    public function __construct(string $file, string|false $path = false, string|false $handle = false, string $loadingClass = ThemeService::class)
    {
        $this->setLoadingClass($loadingClass)
            ->setPath($path)
            ->setFile($file)
            ->setFilePath()
            ->setHandle($handle)
            ->setExtension()
            ->setFileUri()
            ->getPhpAssetFile();
    }

    /**
     * @return File
     */
    public function getPhpAssetFile(): File
    {
        $posiblePhpAssets = str_replace($this->getExtension(), "asset.php", $this->getFilePath());
        if (file_exists($posiblePhpAssets)) {
            $config = require($posiblePhpAssets);

            if ($this->getExtension() !== 'css' && isset($config['dependencies'])) {
                $this->setDepends($config['dependencies']);
            }
            if (isset($config['version'])) {
                $this->setVersion($config['version']);
            }
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getExtension(): string
    {
        return $this->extension;
    }

    /**
     * @param string|false $extension
     * @return File
     */
    public function setExtension(string|false $extension = false): File
    {
        $this->extension = $extension ?: pathinfo($this->getFile(), PATHINFO_EXTENSION);
        return $this;
    }

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    /**
     * @param string|false $filePath
     * @return File
     */
    public function setFilePath(string|false $filePath = false): File
    {
        if (!$filePath) {
            $pathLocation = call_user_func([$this->getLoadingClass(), "getPath"]);
            $filePath = str_contains($this->getPath(), $pathLocation) ? $this->getPath() : join(DIRECTORY_SEPARATOR, [$pathLocation, $this->getPath()]);
        }
        $filePath = realpath($filePath);

        $realpath = $filePath . DIRECTORY_SEPARATOR . $this->getFile();
        if (!file_exists($realpath)) {
            throw new FileException("[{$realpath}] File not found!");
        }
        $this->filePath = $realpath;
        return $this;
    }

    /**
     * @param string $file
     * @param string|false $path
     * @param string $loadingClass
     * @return File
     * @throws FileException
     * @throws CollectionFileException
     */
    public static function getInstance(string $file, string|false $path = false, string $loadingClass = ThemeService::class): File
    {
        $handle = md5("{$path}/{$file}");
        if (!isset(self::$instances[$handle]) || !self::$instances[$handle] instanceof File) {
            self::$instances[$handle] = new self($file, $path, $handle, $loadingClass);
            CollectionFile::getInstance()->append(self::$instances[$handle]);
        }

        return self::$instances[$handle];
    }

    /**
     * @return string
     */
    public function getLoadingClass(): string
    {
        return $this->loadingClass;
    }

    /**
     * @param string $loadingClass
     * @return File
     */
    public function setLoadingClass(string $loadingClass): File
    {
        $this->loadingClass = $loadingClass;
        return $this;
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * @param string $file
     * @return File
     */
    public function setFile(string $file): File
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return array
     */
    public function getDepends(): array
    {
        return $this->depends;
    }

    /**
     * @param array $depends
     * @return File
     */
    public function setDepends(array $depends): File
    {
        $this->depends = $depends;
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
     * @return File
     */
    public function setVersion(string $version): File
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileUri(): string
    {
        return $this->fileUri;
    }

    /**
     * @param string|false $fileUri
     * @return File
     */
    public function setFileUri(string|false $fileUri = false): File
    {
        $pathLocation = call_user_func([$this->getLoadingClass(), "getUrl"]);
        $this->fileUri = $fileUri ? $fileUri: rtrim($pathLocation . "{$this->getPath()}", "/") . "/{$this->getFile()}";
        return $this;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string|false $path
     * @return File
     * @throws FileException
     */
    public function setPath(string|false $path = false): File
    {
        $pathLocation = call_user_func([$this->getLoadingClass(), "getPath"]);
        $realpath = $path ? realpath(str_contains($path, $pathLocation) ? $path : join(DIRECTORY_SEPARATOR, [$pathLocation, $path])) : $pathLocation;
        if (!is_dir($realpath)) {
            throw new FileException("Invalid path file!");
        }

        $this->path = $path;
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
     * @return File
     */
    public function setHandle(string $handle): File
    {
        $this->handle = $handle ?? filemtime($this->getFilePath());
        return $this;
    }
}
