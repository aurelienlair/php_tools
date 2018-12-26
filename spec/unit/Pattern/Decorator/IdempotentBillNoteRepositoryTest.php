<?php
namespace Pattern;

use PHPUnit\Framework\TestCase;
use DirectoryIterator;

class IdempotentBillNoteRepositoryTest extends TestCase
{
    private static $path;
    private static $repository;

    public static function setUpBeforeClass()
    {
        self::$path = sys_get_temp_dir() . '/idempotent-repository';
        mkdir(self::$path);
    }

    public function testCanNotSaveABillNoteAlreadySaved()
    {
        $billNote = new BillNote($this->billNoteData());
        $fileSystemRepositoryMock = $this->createMock(Repository::class);
        $fileSystemRepositoryMock->expects($this->once())
            ->method('save')
            ->with($billNote);
        $fileSystemRepositoryMock->expects($this->exactly(2))
            ->method('contains')
            ->with($billNote)
            ->will($this->onConsecutiveCalls(false, true));
        $repository = new IdempotentBillNoteRepository($fileSystemRepositoryMock); 
        $repository->save($billNote);
        $repository->save($billNote);
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
