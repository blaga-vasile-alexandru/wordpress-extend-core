<?php

namespace WordPressExtendCore\AbstractClass\Taxonomy;

use WordPressExtendCore\Service\Hooks\Action;
use WP_Term;

abstract class AddCustomField
{
    const NAME = '';

    /** @var AddCustomField[] */
    private static array $registers = [];

    /** @var string */
    private string $taxonomyName;
    /** @var string */
    private string $name;
    /** @var string */
    private string $type;
    /** @var object */
    private object $instanceType;

    /**
     * @param string $taxonomyName
     * @param string $name
     */
    public function __construct(string $taxonomyName, string $name = self::NAME)
    {
        $this->setTaxonomyName($taxonomyName)
            ->setName($name)
            ->register();
    }

    /**
     * @return void
     */
    public function register(): void
    {
        Action::add("{$this->getTaxonomyName()}_add_form_fields", [$this, 'addForm']);
        Action::add("{$this->getTaxonomyName()}_edit_form_fields", [$this, 'editForm']);

        Action::add("created_{$this->getTaxonomyName()}", [$this, 'add'], acceptedArgs: 2);
        Action::add("edited_{$this->getTaxonomyName()}", [$this, 'edit'], acceptedArgs: 2);
    }

    public function add(int $termId, int $taxonomyId): void
    {
        call_user_func([$this->getInstanceType(), 'created'], $termId, $taxonomyId);
    }

    /**
     * @return object
     */
    public function getInstanceType(): object
    {
        return $this->instanceType;
    }

    /**
     * @param object $instanceType
     * @return $this
     */
    public function setInstanceType(object $instanceType): self
    {
        $this->instanceType = $instanceType;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaxonomyName(): string
    {
        return $this->taxonomyName;
    }

    /**
     * @param string $taxonomyName
     * @return $this
     */
    public function setTaxonomyName(string $taxonomyName): self
    {
        $this->taxonomyName = $taxonomyName;
        return $this;
    }

    /**
     * @param string $taxonomyName
     * @param string $name
     * @param string $className
     * @return self
     */
    public static function getRegister(string $taxonomyName, string $name = self::NAME, string $className = __CLASS__): self
    {
        $key = md5("{$taxonomyName}-{$name}");

        if (!isset(self::$registers[$key]) || !self::$registers[$key] instanceof $className) {
            self::setRegister($key, $taxonomyName, $name, $className);
        }

        return self::$registers[$key];
    }

    /**
     * @param string $key
     * @param string $taxonomyName
     * @param string $name
     * @param string $className
     * @return void
     */
    private static function setRegister(string $key, string $taxonomyName, string $name, string $className): void
    {
        self::$registers[$key] = new $className($taxonomyName, $name);
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return AddCustomField
     */
    public function setType(string $type): AddCustomField
    {
        $this->type = $type;
        $this->setInstanceType(call_user_func("{$type}::getInstance", $this->getName()));
        return $this;
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
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function edit(int $termId, int $taxonomyId): void
    {
        // TODO: Implement edit() method.
        call_user_func([$this->getInstanceType(), 'updated'], $termId, $taxonomyId);
    }

    public function addForm(): void
    {
        call_user_func([$this->getInstanceType(), 'renderAdd']);
    }

    public function editForm(WP_Term $term): void
    {
        call_user_func([$this->getInstanceType(), 'renderEdit'], $term);
    }
}
