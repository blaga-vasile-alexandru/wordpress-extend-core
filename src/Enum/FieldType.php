<?php

namespace WordPressExtendCore\Enum;

enum FieldType: string
{
    case MEDIA_IMAGE = "MediaImage";

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
