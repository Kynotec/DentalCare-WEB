<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;

class CategoriaCest
{

    public function _before(FunctionalTester $I)
    {
        $user = \common\models\User::findByUsername('admin');
        $I->amLoggedInAs($user);
    }

    // tests
    public function Createcategoria(FunctionalTester $I)
    {
        $I->amOnRoute('categoria/index');
        $I->see('Categorias', 'h1');

        $I->click('Criar Categoria');
        $I->see('Descrição');

        $I->fillField('Categoria[descricao]', '');
        $I->click('Guardar');
        $I->see('Descrição cannot be blank.');

        $I->fillField('Categoria[descricao]', 'ola');
        $I->click('Guardar');
        $I->see('ola','td');
    }


}