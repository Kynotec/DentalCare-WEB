<?php


namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class AreautenteCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function UpdateTelefone(FunctionalTester $I)
    {
        //Efetuar login
        $I->amOnRoute('site/login');
        $I->see('Bem Vindo de volta à Dental Care');
        $I->fillField('LoginForm[username]', 'utente1');
        $I->fillField('LoginForm[password]', 'utente111');
        $I->click('login-button');
        $I->see('Logout');

        //Atualizar numero de telefone
        $I->click('AREA UTENTE');
        $I->see('Atualizar Informação');
        $I->click('Atualizar Informação');
        $I->fillField('Perfil[telefone]', '987587413');
        $I->click('Salvar Alterações');
        $I->see('987587413');
    }
}
