<?php
/**
 * WordPress Extend Core is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * WordPress Extend Core is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with WordPress Extend Core. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 */

namespace WordPressExtendCore\AbstractClass\Taxonomy;

abstract class Register
{
    /** @var Register[] */
    private static array $registers = [];

    /** @var string */
    private string $name;

    /** @var array */
    private array $objectType = [];

    /** @var string */
    private string $label;

    /** @var array */
    private array $labels;

    /** @var bool */
    private bool $showInRest = true;

    /**
     * @param string $taxonomyName
     */
    public function __construct(string $taxonomyName)
    {
        $this->setName($taxonomyName);
    }

    /**
     * @param string $taxonomyName
     * @param string $class
     * @return Register
     */
    public static function getRegister(string $taxonomyName, string $class = __CLASS__): Register
    {
        $key = md5($taxonomyName);

        if (!isset(self::$registers[$key]) || !(self::$registers[$key] instanceof $class)) {
            self::$registers[$key] = new $class($taxonomyName);
        }

        return self::$registers[$key];
    }

    /**
     * @return void
     */
    public function register(): void
    {
        register_taxonomy($this->getName(), $this->getObjectType(), [
            'name' => $this->getLabel(),
            'labels' => $this->getLabels(),
            'show_in_rest' => $this->isShowInRest(),
        ]);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Register
     */
    public function setName(string $name): Register
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getObjectType(): array
    {
        return $this->objectType;
    }

    /**
     * @param array $objectType
     * @return Register
     */
    public function setObjectType(array $objectType): Register
    {
        $this->objectType = $objectType;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return Register
     */
    public function setLabel(string $label): Register
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return array
     */
    public function getLabels(): array
    {
        return $this->labels;
    }

    /**
     * @param array $labels
     * @return Register
     */
    public function setLabels(array $labels): Register
    {
        $this->labels = $labels;
        return $this;
    }

    /**
     * @return bool
     */
    public function isShowInRest(): bool
    {
        return $this->showInRest;
    }

    /**
     * @param bool $showInRest
     * @return Register
     */
    public function setShowInRest(bool $showInRest): Register
    {
        $this->showInRest = $showInRest;
        return $this;
    }


}
