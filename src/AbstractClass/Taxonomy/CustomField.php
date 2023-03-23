<?php

namespace WordPressExtendCore\AbstractClass\Taxonomy;

use WordPressExtendCore\InterfaceClass\Taxonomy\CustomField as CustomFieldInterface;
use WP_Term;

abstract class CustomField implements CustomFieldInterface
{
    /** @var int */
    private int $objectId;
    /** @var string */
    private string $name;
    /** @var mixed|null */
    private mixed $value = null;

    public function created(int $termId, int $taxonomyId): void
    {
        $this->setObjectId($termId);

        // TODO: Implement created() method.
        if (isset($_POST[$this->getName()])) {
            update_term_meta($this->getObjectId(), $this->getName(), esc_sql($_POST[$this->getName()]));
        }
    }

    public function getName(): string
    {
        // TODO: Implement getName() method.
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

    /**
     * @return int
     */
    public function getObjectId(): int
    {
        // TODO: Implement getObjectId() method.
        return $this->objectId;
    }

    /**
     * @param int $objectId
     * @return $this
     */
    public function setObjectId(int $objectId): self
    {
        // TODO: Implement setObjectId() method.
        $this->objectId = $objectId;

        return $this;
    }

    public function updated(int $termId, int $taxonomyId): void
    {
        $this->setObjectId($termId);

        if (isset($_POST[$this->getName()])) {
            // TODO: Implement updated() method.
            update_term_meta($this->getObjectId(), $this->getName(), esc_sql($_POST[$this->getName()]));
        }
    }

    public function renderAdd(): void
    {
        // TODO: Implement renderAdd() method.
        $this->setValue(false);
    }

    public function renderEdit(WP_Term $term): void
    {
        // TODO: Implement renderEdit() method.
        $this->setObjectId($term->term_id);
        if (is_null($this->getValue())) {
            $this->setValue(get_term_meta($this->getObjectId(), $this->getName(), true));
        }
    }

    /**
     * @return mixed
     */
    public function getValue(): mixed
    {
        // TODO: Implement getValue() method.
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function setValue(mixed $value): self
    {
        $this->value = $value;
        return $this;
    }
}
