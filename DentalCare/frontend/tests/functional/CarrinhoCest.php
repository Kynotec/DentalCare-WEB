<?php


namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;
use common\models\Perfil;
use common\models\User;

class CarrinhoCest
{
    public function _before(FunctionalTester $I)
    {

    }

    // tests
    public function checkValidBuy(FunctionalTester $I)
    {
        //Efetuar login
        $I->amOnRoute('site/login');
        $I->see('Bem Vindo de volta à Dental Care');
        $I->fillField('LoginForm[username]', 'utente1');
        $I->fillField('LoginForm[password]', 'utente111');
        $I->click('login-button');
        $I->see('Logout');

        //Entra na página do produto
        $I->click('PRODUTOS');
        $I->click('.cart a[href*="adicionar-ao-carrinho?produtoId=9"]');
        $I->click('Carrinho');
        $I->see('Total do Carrinho:');
        $I->see('dada');

        //Remover Produto Carrinho
        $I->click('Remover');
        $I->see('Carrinho');
    }
}
