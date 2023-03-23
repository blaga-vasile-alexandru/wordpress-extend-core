<?php

namespace WordPressExtendCore\InterfaceClass\Taxonomy;

use WP_Term;

interface CustomField
{
    /**
     * @param string $name
     * @return $this
     */
    public static function getInstance(string $name): self;

    /**
     * @return int
     */
    public function getObjectId(): int;

    /**
     * @param int $objectId
     * @return $this
     */
    public function setObjectId(int $objectId): self;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self;

    /**
     * @return mixed
     */
    public function getValue(): mixed;

    /**
     * @param mixed $value
     * @return $this
     */
    public function setValue(mixed $value): self;

    /**
     * @param int $termId
     * @param int $taxonomyId
     * @return void
     */
    public function created(int $termId, int $taxonomyId): void;

    /**
     * @param int $termId
     * @param int $taxonomyId
     * @return void
     */
    public function updated(int $termId, int $taxonomyId): void;

    /**
     * @return void
     */
    public function renderAdd(): void;

    /**
     * @param WP_Term $term
     * @return void
     */
    public function renderEdit(WP_Term $term): void;
}
