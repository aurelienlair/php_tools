<?php
namespace Pattern;

interface Repository
{
    /**
     * Method that allows to save on a repository a Note instance
     */
    public function save(Note $note): void;

    /**
     * Method that allows to find from a repository 
     * a Note and returns a Json object representation
     */
    public function find(Note $note): ?Json;

    /**
     * Method that must check whether a Note is present
     * within the repository 
     */
    public function contains(Note $note): bool;
}
