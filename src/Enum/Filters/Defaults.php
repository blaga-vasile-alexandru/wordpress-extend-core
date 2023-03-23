<?php

namespace WordPressExtendCore\Enum\Filters;

enum Defaults: string
{
    case CHECK_FILE_TYPE_AND_EXT = "wp_check_filetype_and_ext";
    case UPLOAD_MIMES = "upload_mimes";

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
