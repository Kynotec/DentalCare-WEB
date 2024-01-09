<?php


namespace backend\tests\functional;

use backend\tests\FunctionalTester;

class MarcacaoCest
{
    public function _before(FunctionalTester $I)
    {
        $user = \common\models\User::findByUsername('admin');
        $I->amLoggedInAs($user);
    }

    // tests
    public function CreateMarcacao(FunctionalTester $I)
    {
        $I->amOnRoute('marcacao/index');
        $I->see('Marcações', 'h1');
        $I->click('Criar Marcação');
        $I->fillField('Marcacao[descricao]', 'Dente partido');
        $I->fillField('Marcacao[data]', '2024-02-10');
        $I->selectOption('select[name="Marcacao[profile_id]"]', 'João Pereira');
        $I->selectOption('select[name="Marcacao[servico_id]"]', 'Branqueamento');
        $I->click('Guardar e Continuar');
        $I->see('Hora da Marcação');
        $I->selectOption('select[name="Marcacao[hora]"]', '16:00');
        $I->click('Guardar');
        $I->see('2024-02-10 | 16:00:00 | João Pereira');
    }
}
