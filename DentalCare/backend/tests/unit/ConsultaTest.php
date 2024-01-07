<?php
namespace backend\tests;

use common\models\Marcacao;
use common\models\Perfil;



class ConsultaTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests

    public function testcreateConsultaUnsuccessfully()
    {
        $perfil = new Perfil();
        $perfil->nome = 'mini';
        $perfil->telefone= '123456789';
        $perfil->morada= 'Rua das Flores';
        $perfil->nif= '123456789';
        $perfil->codigopostal= '4131491';
        $perfil->save();

        $consulta = new Marcacao();
        $consulta->descricao =123;
        $this->assertFalse($consulta->validate(['descricao']));
        $consulta->data = null;
        $this->assertFalse($consulta->validate(['data']));
        $consulta->hora = null;
        $this->assertFalse($consulta->validate(['hora']));
        $consulta->estado = 1;
        $this->assertFalse($consulta->validate(['estado']));

        verify($consulta->save())->false();

    }


    public function testcreateConsultaSuccessfully()
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
        $this->assertTrue($consulta->validate(['descricao']));
        $consulta->data = '2022-12-29';
        $this->assertTrue($consulta->validate(['data']));
        $consulta->hora = '02:10:00';
        $this->assertTrue($consulta->validate(['hora']));
        $consulta->estado = 'Pendente';
        $this->assertTrue($consulta->validate(['estado']));
        $consulta->profile_id = $perfil->id;

        verify($consulta->save())->true();
        $this->assertNotNull(Marcacao::findOne(['id' =>  $consulta->id]));
        $this->tester->seeRecord('common\models\Marcacao', array('descricao' => 'Destartarização', 'data' => '2022-12-29','hora'=>'02:10:00','estado'=>'Pendente'));
    }





    public function testConsultaUpdate()
    {


        $perfil = new Perfil();

        $consulta = new Marcacao();
        $consulta->descricao ="Destartarização";
        $consulta->data = "2022-12-29";
        $consulta->hora = "02:10:00";
        $consulta->estado = "Pendente";
        $consulta->profile_id = $perfil->id;
        $consulta->save();

        $this->tester->dontSeeRecord('common\models\Marcacao', array('descricao' => 'Branqueamento', 'data' => '2022-10-21','hora'=>'03:42:01','estado'=>'Terminado'));
        $this->tester->seeRecord('common\models\Marcacao', array('descricao' => 'Destartarização', 'data' => '2022-12-29','hora'=>'02:10:00','estado'=>'Pendente'));
    }

    public function testConsultaDelete()
    {
        $consulta = new Marcacao();
        $consulta->delete();
        $consulta = Marcacao::findOne(['descricao' => 'Branqueamento', 'data' => '2022-10-21','hora'=>'03:42:01','estado'=>'Terminado']);
        $this->assertNull($consulta);

    }


}
