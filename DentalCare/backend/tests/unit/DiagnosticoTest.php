<?php
namespace backend\tests;

use common\models\Diagnostico;
use common\models\Perfil;
use common\models\Marcacao;

class DiagnosticoTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests

    public function testcreateDiagnosticoUnsuccessfully()
    {
        $perfil = new Perfil();
        $perfil->nome = 'mini';
        $perfil->telefone= '123456789';
        $perfil->morada= 'Rua das Flores';
        $perfil->nif= '123456789';
        $perfil->codigopostal= '4131491';
        $perfil->save();

        $diagnostico = new Diagnostico();
        $diagnostico->descricao =123;
        $this->assertFalse($diagnostico->validate(['descricao']));
        $diagnostico->data = null;
        $this->assertFalse($diagnostico->validate(['data']));
        $diagnostico->hora = null;
        $this->assertFalse($diagnostico->validate(['hora']));

        verify($diagnostico->save())->false();

    }


    public function testcreateDiagnosticoSuccessfully()
    {
        $perfil = new Perfil();
        $perfil->nome = 'mini';
        $perfil->telefone= '123456789';
        $perfil->morada= 'Rua das Flores';
        $perfil->nif= '123456789';
        $perfil->codigopostal= '4131491';
        $perfil->save();

        $consulta = new Marcacao();
        $consulta->descricao ='Destartarização';
        $consulta->data = '2022-12-29';
        $consulta->hora = '02:10:00';
        $consulta->estado = 'Pendente';
        $consulta->save();

        $diagnostico = new Diagnostico();
        $diagnostico->descricao ='Dente nao desce';
        $this->assertTrue($diagnostico->validate(['descricao']));
        $diagnostico->data = '2022-12-29';
        $this->assertTrue($diagnostico->validate(['data']));
        $diagnostico->hora = '02:10:00';
        $this->assertTrue($diagnostico->validate(['hora']));
        $diagnostico->profile_id = $perfil->id;
        $diagnostico->consulta_id = $consulta->id;

        verify($diagnostico->save())->true();
        $this->assertNotNull(Diagnostico::findOne(['id' =>  $diagnostico->id]));
        $this->tester->seeRecord('common\models\Diagnostico', array('descricao' => 'Dente não desce', 'data' => '2022-12-29','hora'=>'02:10:00'));
    }



    public function testDiagnosticoUpdate()
    {
        $perfil = new Perfil();

        $diagnostico = new Diagnostico();
        $diagnostico->descricao ='Dente nao desce';
        $diagnostico->data = '2022-12-29';
        $diagnostico->hora = '02:10:00';
        $diagnostico->profile_id = $perfil->id;

        $diagnostico->save();
        $this->tester->dontSeeRecord('common\models\Diagnostico', array('descricao' => 'Carie Dentaria', 'data' => '2022-10-21','hora'=>'03:42:00'));
        $this->tester->seeRecord('common\models\Diagnostico', array('descricao' => 'Dente nao desce', 'data' => '2022-12-29','hora'=>'02:10:00'));
    }


    public function testDiagnosticoDelete()
    {
        $diagnostico = new Diagnostico();
        $diagnostico->delete();
        $diagnostico = Marcacao::findOne(['descricao' => 'Carie Dentaria', 'data' => '2022-10-21','hora'=>'03:42:01']);
        $this->assertNull($diagnostico);
    }
}
