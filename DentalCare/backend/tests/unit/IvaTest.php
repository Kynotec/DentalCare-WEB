<?php


namespace backend\tests\unit;

use backend\tests\UnitTester;
use common\models\Iva;

class IvaTest extends \Codeception\Test\unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests


    public function testCreateIvaUnsuccessfully()
    {
        $ivas = new Iva();
        $ivas->percentagem = 12;
        $this->assertFalse($ivas->validate(['percentagem']));
        $ivas->descricao = 1;
        $this->assertFalse($ivas->validate(['descricao']));
        $ivas->emvigor = 'sim';
        $this->assertFalse($ivas->validate(['emvigor']));

        verify($ivas->save())->false();
    }

    public function testCreateIvaSuccessfully()
    {
        $ivas = new Iva();
        $ivas->percentagem = '12';
        $this->assertTrue($ivas->validate(['percentagem']));
        $ivas->descricao = 'iva de aparelho';
        $this->assertTrue($ivas->validate(['descricao']));
        $ivas->emvigor = 10;
        $this->assertTrue($ivas->validate(['emvigor']));
        verify($ivas->save())->true();
        $this->tester->seeRecord('common\models\Iva', array('percentagem' => '12', 'descricao' => 'iva de aparelho', 'emvigor' => 10));
    }


    public function testIvaUpdate()
    {
        $ivas = $this->tester->grabRecord('common\models\Iva', array('percentagem' => '12', 'descricao' => 'iva de aparelho', 'emvigor' => 10));

        $ivas = new Iva();
        $ivas->percentagem = '12';
        $ivas->descricao = 'iva de aparelho';
        $ivas->emvigor = 10;
        $ivas->save();
        $this->tester->dontSeeRecord('common\models\Iva', array('percentagem' => '20', 'descricao' => 'iva de aparelhoooo', 'emvigor' => 9));
        $this->tester->seeRecord('common\models\Iva', array('percentagem' => '12', 'descricao' => 'iva de aparelho', 'emvigor' => 10));

    }

    public function testIvaDelete()
    {
        $ivas = new Iva();
        $ivas->delete();
        $ivas = Iva::findOne(['percentagem' => '20', 'descricao' => 'iva de aparelhoooo', 'emvigor' => 2]);
        $this->assertNull($ivas);
    }


}
