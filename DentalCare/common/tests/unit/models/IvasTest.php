<?php

namespace common\tests\Unit;

use common\tests\UnitTester;
use common\models\Iva;
use common\fixtures\IvasFixture;

class CategoriasTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function testSomeFeature()
    {

    }

    public function testCreateIvaSuccessfully()
    {
        $ivas = new Iva();
        $ivas->percentagem = '12%';
        $ivas->descricao = 'iva de aparelho';
        $ivas->emvigor = 1;
        verify($ivas->save())->true();
    }

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

    public function testIvaUpdate()
    {
        $ivas = new Iva();
        $ivas->percentagem = '12%';
        $ivas->descricao = 'iva de aparelho';
        $ivas->emvigor = 1;
        $ivas->save();


        $model=  Iva::findOne(['id' => $ivas->id]);
        $model->descricao = 'iva de aparelho';
        verify($model->save())->true();
    }

    public function testIvaDelete()
    {
        $ivas = new Iva();
        $ivas->percentagem = '12%';
        $ivas->descricao = 'iva de aparelho';
        $ivas->emvigor = 1;

        $ivas->save();

        $model=  Iva::findOne(['id' => $ivas->id]);
        verify($model->delete());
    }

}