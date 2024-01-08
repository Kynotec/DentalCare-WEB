<?php


namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class MarcacaoCest
{
    // tests
    public function adicionarmarcacaoedesmarcar(AcceptanceTester $I)
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

        //Marcação
        $I->click('SERVIÇOS');
        $I->wait(4);
        //Escolhe o servico a adicionar
        $I->click('.add-to-cart','a[href*="create?servico_id=5"]');
        $I->wait(3);
        //Cria um servico
        $I->see('Criar Marcação');
        $I->fillField('Marcacao[descricao]', 'Branqueamento');
        $I->fillField('Marcacao[data]', '2024-01-27');
        $I->wait(1);
        $I->click('');
        $I->wait(3);
        $I->click('Guardar e Selecionar Hora');
        $I->amOnPage('marcacao/create-time?id=23');//VER ISTOS
        $I->wait(3);
        $I->selectOption('select[name="Marcacao[hora]"]', '11:00');
        $I->wait(3);
        $I->click('Guardar');
        $I->wait(3);
        $I->see('Desmarcar Consulta');
        $I->click('Desmarcar Consulta');
        $I->see('As Minhas Marcações');

    }
}
