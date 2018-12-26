<?php
namespace Pattern;

use PHPUnit\Framework\TestCase;
use DirectoryIterator;

class FileSystemRepositoryTest extends TestCase
{
    private static $path;
    private static $repository;

    public static function setUpBeforeClass()
    {
        self::$path = sys_get_temp_dir() . '/repository';
        mkdir(self::$path);
        self::$repository = new FileSystemRepository(self::$path); 
    }

    public function testRepositoryIsAbleToSaveABillNoteCorrectly()
    {
        $billNote = new BillNote($this->billNoteData());
        self::$repository->save($billNote);
        $savedBillNote = new BillNote(self::$repository->find($billNote)->toArray());
        $this->assertNotNull($savedBillNote, 'The saved bill note is not found');
        $this->assertEquals(
            $billNote,
            $savedBillNote
        );
    }

    public function testRepositoryReturnNullWhenBillNoteIsNotFound()
    {
        $this->assertNull(self::$repository->find(
            new BillNote([
                'id' => -123456789,
                'account' => 'not_at_real_account',
                'paymentMethodState' => 'SOMETHING'
            ])
        ));
    }
    
    public function testRepositoryIsAbleToCheckItsOwnContent()
    {
        $billNote = new BillNote($this->billNoteData());
        self::$repository->save($billNote);
        $this->assertNotNull(self::$repository->contains($billNote));
    }

    public static function tearDownAfterClass()
    {
        foreach (new DirectoryIterator(self::$path) as $fileInfo) {
            if(!$fileInfo->isDot()) {
                unlink($fileInfo->getPathname());
            }
        }
        rmdir(self::$path);
    }

    private function billNoteData()
    {
        return [
            'id' => 42,
            'account' => 'aurelien.lair@nomail.com',
            'paymentMethodState' => 'PAID',
        ];
    }
}
