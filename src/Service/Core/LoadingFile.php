<?php

namespace WordPressExtendCore\Service\Core;

class LoadingFile
{
    static private array $instances = [];

    private File $file;

    /**
     * @param File $file
     */
    public function __construct(File $file)
    {
        $this->setFile($file);
    }

    /**
     * @param File $file
     * @return LoadingFile|null
     */
    public static function getInstance(File $file): ?LoadingFile
    {
        $key = md5($file->getFilePath());

        if (!isset(self::$instances[$key]) || !self::$instances[$key] instanceof LoadingFile) {
            self::$instances[$key] = new self($file);
        }

        return self::$instances[$key];
    }

    public function styleInject(string $media = "all"): self
    {
        /** @var File $file */
        $file = $this->getFile();

        add_action('after_setup_theme', function () use ($file, $media) {
            wp_enqueue_style($file->getHandle(), $file->getFileUri(), $file->getDepends(), $file->getVersion(), $media);
        });

        return $this;
    }

    /**
     * @return File
     */
    public function getFile(): File
    {
        return $this->file;
    }

    /**
     * @param File $file
     * @return LoadingFile
     */
    public function setFile(File $file): LoadingFile
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @param bool $inFooter
     * @param string|false $action
     * @return $this
     */
    public function scriptInject(bool $inFooter = true, string|false $action = "after_setup_theme"): self
    {
        /** @var File $file */
        $file = $this->getFile();

        if ($action) {
            add_action($action, function () use ($file, $inFooter) {
                wp_enqueue_script($file->getHandle(), $file->getFileUri(), $file->getDepends(), $file->getVersion(), $inFooter);
            });
        } else {
            wp_enqueue_script($file->getHandle(), $file->getFileUri(), $file->getDepends(), $file->getVersion(), $inFooter);
        }

        return $this;
    }
}
