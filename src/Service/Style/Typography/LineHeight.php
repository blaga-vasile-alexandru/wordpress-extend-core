<?php
namespace WordPressExtendCore\Service\Style\Typography;

class LineHeight
{
    /** @var LineHeight[] */
    private static array $instances = [];
    /** @var string */
    private string $id;
    /** @var int|false */
    private int|false $lineHeight = false;

    public function __construct(string $id)
    {
        $this->setId($id);
    }

    /**
     * @param string $id
     * @return LineHeight
     */
    private function setId(string $id): LineHeight
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $id
     * @return LineHeight
     */
    public static function getInstance(string $id): LineHeight
    {
        $key = md5("{$id}");

        if (!isset(self::$instances[$key]) || !self::$instances[$key] instanceof LineHeight) {
            self::$instances[$key] = new self($id);
        }

        return self::$instances[$key];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        // TODO: Implement __toString() method.
        return "line-height: {$this->getLineHeight()};";
    }

    /**
     * @return false|int
     */
    public function getLineHeight(): bool|int
    {
        return $this->lineHeight;
    }

    /**
     * @param false|int $lineHeight
     * @return LineHeight
     */
    public function setLineHeight(bool|int $lineHeight): LineHeight
    {
        $this->lineHeight = $lineHeight;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}
