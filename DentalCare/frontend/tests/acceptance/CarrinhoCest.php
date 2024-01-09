<?php

namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class CarrinhoCest
{
    public function adicionareremovercarrinho(AcceptanceTester $I)
    {
        //Efetuar login
        $I->amOnPage('site/login');
        $I->see('Bem Vindo de volta à Dental Care');
        $I->wait(3);
        $I->fillField('LoginForm[username]', 'utente1');
        $I->fillField('LoginForm[password]', 'utente111');
        $I->click('login-button');
        $I->wait(3);
        $I->see('Logout');

        //Entra na página do produto
        $I->click('PRODUTOS');
        $I->wait(4);
        //Escolhe o produto a adicionar ao carrinho
        $I->click('.add-to-cart','a[href*="adicionar-ao-carrinho?produtoId=4"]');
        $I->wait(3);
        //Clica no botão do carrinho
        $I->click('.bi-cart-fill.me-1','.btn.btn-outline-dark');
        $I->see('Total do Carrinho:');
        $I->see('Listerine - Elixir Bucal');
        $I->wait(3);
        //Remove Produto ao Carrinho
        $I->click('Remover');
        $I->see('Carrinho');


    }
}
