<?php
namespace Pattern;

use PHPUnit\Framework\TestCase;

class BillNoteTest extends TestCase
{
    public function testNewBillNotesCreation()
    {
        $expectedBillNote = [
            'account' => 'aurelien.lair@nomail.com',
            'paymentMethodState' => 'PAID',
        ];

        $billNote = new BillNote($expectedBillNote);

        $this->assertEquals(hash('md5', json_encode($expectedBillNote)), $billNote->id());
        $this->assertEquals(
            $expectedBillNote,
            array_slice($billNote->toArray(), 1)
        );
    }    

    public function testBillNoteIdIdempotency()
    {
        $expectedExistingBillNote = [
            'account' => 'aurelien.lair@nomail.com',
            'paymentMethodState' => 'PAID',
        ];

        for ($i=0; $i<2; $i++) {
            $billNote = new BillNote($expectedExistingBillNote);

            $this->assertEquals(
                '21f241f980aff18fa473b81a2d552be4',
                $billNote->id()
            );
        }
    }    
}
