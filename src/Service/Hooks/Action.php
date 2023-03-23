<?php

namespace WordPressExtendCore\Service\Hooks;

class Action
{
    /**
     * @param string|object $actionName
     * @param callable $callback
     * @param int $priority
     * @param int $acceptedArgs
     * @return bool
     */
    public static function add(string|object $actionName, callable $callback, int $priority = 10, int $acceptedArgs = 1): bool
    {
        if (function_exists('add_action')) {
            if (is_object($actionName))
                return add_action($actionName->getValue(), $callback, $priority, $acceptedArgs);
            else
                return add_action($actionName, $callback, $priority, $acceptedArgs);
        }

        return false;
    }
}
