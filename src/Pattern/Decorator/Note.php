<?php
namespace Pattern;

interface Note 
{
    /**
     * An array representation of a Note instance
     */
    public function toArray(): array;

    /**
     * The identifier of the note 
     */
    public function id(): string;
}
