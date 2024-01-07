<?php


namespace backend\tests\Unit;

use backend\tests\UnitTester;
use common\models\Categoria;


class CategoriaTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
        $categorias = new Categoria();
    }



    // tests


    public function testCreateCategoriaUnsuccessfully()
    {
        $categorias = new Categoria();
        $categorias->descricao = 'HNxM1eZMhUjeNCrLLwQYNRxPwxCfmjDb3E7dCtCRHfRzoLoOyQPL0vadgasdfsa';
        $this->assertFalse($categorias->validate(['descricao']));

        verify($categorias->save())->false();
    }


    public function testCreateCategoriaSuccessfully()
    {
        $categorias = new Categoria();
        $categorias->descricao = 'pasta de dentes';
        $this->assertTrue($categorias->validate(['descricao']));
        verify($categorias->save())->true();
        $this->assertNotNull(Categoria::findOne(['descricao' => $categorias->descricao]));
        $this->tester->seeRecord('common\models\Categoria', array('descricao' => 'pasta de dentes'));
    }

    public function testCategoriaUpdate()
    {
        $categorias = $this->tester->grabRecord('common\models\Categoria', array('descricao' => 'pasta de dentes'));

        $categorias = new Categoria();
        $categorias->descricao = 'pasta de dentes';
        $categorias->save();
        $this->tester->dontSeeRecord('common\models\Categoria', array('descricao' => 'escova'));
        $this->tester->seeRecord('common\models\Categoria', array('descricao' => 'pasta de dentes'));

    }


    public function testCategoriaDelete()
    {
        $categoria = new Categoria();
        $categoria->delete();
        $categorias = Categoria::findOne(['descricao' => 'escova']);
        $this->assertNull($categorias);
    }



}
