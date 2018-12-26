<?php
namespace Pattern;

class FileSystemRepository implements Repository
{
    private $path;

    public function __construct($repositoryPath)
    {
        $this->path = $repositoryPath . '/';
    }

    public function save(Note $note): void
    {
        file_put_contents(
            $this->path . $note->id() . '.json',
            json_encode($note->toArray()),
            LOCK_EX
        );
    }

    public function find(Note $note): ?Json
    {
        if  ($this->fileExists($note->id())) {
            return Json::fromString(
                file_get_contents($this->path . $note->id() . '.json')
            );
        }

        return null;
    }

    public function contains(Note $note): bool
    {
        return $this->fileExists($note->id()); 
    }

    private function fileExists(string $id)
    {
        return file_exists($this->path . $id . '.json');
    }
}
