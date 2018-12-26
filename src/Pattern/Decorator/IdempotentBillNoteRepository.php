<?php
namespace Pattern;

class IdempotentBillNoteRepository
{
    private $fileSystemRepository;

    public function __construct($fileSystemRepository)
    {
        $this->fileSystemRepository = $fileSystemRepository;
    }

    public function save(Note $note): void
    {
        if (!$this->fileSystemRepository->contains($note)) {
            $this->fileSystemRepository->save($note);
        }
    }
}
