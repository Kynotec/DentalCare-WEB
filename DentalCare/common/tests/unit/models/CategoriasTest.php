<?php

namespace common\tests\Unit;

use common\tests\UnitTester;
use common\models\Categoria;
use common\fixtures\CategoriasFixture;

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

    public function testCreateCategoriaSuccessfully()
    {
        $categorias = new Categoria();
        $categorias->descricao = 'pasta de dentes';
        verify($categorias->save())->true();
    }

    public function testCreateCategoriaUnsuccessfully()
    {
        $categorias = new Categoria();
        $categorias->descricao = 'HNxM1eZMhUjeNCrLLwQYNRxPwxCfmjDb3E7dCtCRHfRzoLoOyQPL0vadgasdfsa';
        verify($categorias->save())->false();
    }

    public function testCategoriaUpdate()
    {
        $categorias = new Categoria();
        $categorias->descricao = 'pasta de dentes';
        $categorias->save();


        $model=  Categoria::findOne(['id' => $categorias->id]);
        $model->nome = 'Goteira';
        verify($model->save())->true();
    }

    public function testCategoriaDelete()
    {
        $categorias = new Categoria();
        $categorias->descricao = 'pasta de dentes';
        $categorias->save();

        $model=  Categoria::findOne(['id' => $categorias->id]);
        verify($model->delete());
    }

}