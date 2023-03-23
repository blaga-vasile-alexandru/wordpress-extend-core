<?php

namespace WordPressExtendCore\Enum\Filters;

use WordPressExtendCore\WordPressExtendCore as Main;

enum WordPressExtendCore: string
{
    case LAUNCHER_CONFIG = "launcher-config";

    /**
     * @return string
     */
    public function getValue(): string
    {
        return Main::HOOK_NAME . $this->value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
