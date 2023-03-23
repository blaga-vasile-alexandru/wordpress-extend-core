<?php

namespace WordPressExtendCore\Block\Register\Card;

use WordPressExtendCore\Service\Register\Block\Register;
use WordPressExtendCore\WordPressExtendCore;

class Template extends Register
{
    const BLOCK_NAME = "wp-extend-core/card-template";

    public function __construct(string $blockName)
    {
        parent::__construct($blockName);
        $this->setPathLocation(WordPressExtendCore::path(["blocks", "card-template", "build"]))
            ->register();
    }

    /**
     * @param string $blockName
     * @param string $Class
     * @return static
     */
    public static function getRegister(string $blockName = self::BLOCK_NAME, string $Class = __CLASS__): self
    {
        return parent::getRegister($blockName, $Class); // TODO: Change the autogenerated stub
    }
}
