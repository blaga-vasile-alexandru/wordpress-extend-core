<?php

namespace WordPressExtendCore\Enum\Actions;

enum Defaults: string
{
    case ADMIN_HEAD = "admin_head";
    case REST_API_INIT = "rest_api_init";

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
