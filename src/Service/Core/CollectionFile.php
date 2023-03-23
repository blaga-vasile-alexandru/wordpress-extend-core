<?php

namespace WordPressExtendCore\Service\Core;

use ArrayObject;
use WordPressExtendCore\Exception\CollectionFileException;

class CollectionFile extends ArrayObject
{
    static private ?CollectionFile $instance = null;

    /**
     * @throws CollectionFileException
     */
    public function __construct(object|array $array = [], int $flags = 0, string $iteratorClass = "ArrayIterator")
    {
        foreach ($array as $item) {
            $this->validate($item);
        }

        parent::__construct($array, $flags, $iteratorClass);
    }

    /**
     * @return self|null
     */
    public static function getInstance(): ?self
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @throws CollectionFileException
     */
    public function append(mixed $value): void
    {
        $this->validate($value);
        parent::append($value); // TODO: Change the autogenerated stub
    }

    /**
     * @throws CollectionFileException
     */
    public function offsetSet(mixed $key, mixed $value): void
    {
        $this->validate($value);
        parent::offsetSet($key, $value); // TODO: Change the autogenerated stub
    }

    /**
     * @throws CollectionFileException
     */
    public function validate($value): void
    {
        if (!$value instanceof File) {
            throw new CollectionFileException('Not an instance of ' . File::class);
        }
    }
}
