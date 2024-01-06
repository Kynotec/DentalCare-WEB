<?php

namespace common\tests\unit\models;

use common\models\Marcacao;
use common\models\Perfil;
use \Tests\Support\UnitTester;
use Yii;
use common\fixtures\UserFixture;

class ConsultaTest extends \Codeception\Test\Unit
{

    protected $tester;

    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ];
    }

    public function testcreateConsultaSuccessfully()
    {
        $utente = $this->tester->grabFixture('user', 'user1');
        $consulta = new Marcacao();
        $consulta->descricao ="Destartarização";
        $consulta->data = "2022-12-29";
        $consulta->hora = "02:10:00";
        $consulta->estado = "Pendente";
        $consulta->profile_id = $utente->id;
        verify($consulta->save())->true();
        $this->assertNotNull(Marcacao::findOne(['id' =>  $consulta->id]));
    }

    public function testcreateConsultaErrado()
    {
        $consulta = new Marcacao();
        $consulta->descricao =123;
        $this->assertFalse($consulta->validate(['descricao']));
        $consulta->data = null;
        $this->assertFalse($consulta->validate(['data']));
        $consulta->hora = null;
        $this->assertFalse($consulta->validate(['hora']));
        $consulta->estado = 1;
        $this->assertFalse($consulta->validate(['estado']));
        $consulta->profile_id = 5;
        $this->assertFalse($consulta->validate(['profile_id']));

        verify($consulta->save())->false();

    }



    public function testConsultaUpdate()
    {
        $utente = $this->tester->grabFixture('user', 'user1');

        $consulta = new Marcacao();
        $consulta->descricao ="Destartarização";
        $consulta->data = "2022-12-29";
        $consulta->hora = "02:10:00";
        $consulta->estado = "Pendente";
        $consulta->profile_id = $utente->id;
        $consulta->save();

        $model = Marcacao::findOne(['id' => $consulta->id]);

        $model->descricao = 'Descricao Update';
        $model->save();
        $this->assertEquals('Descricao Update', $model->descricao);
    }

    public function testConsultaDelete()
    {
        $utente = $this->tester->grabFixture('user', 'user1');
        $consulta = new Marcacao();

        $consulta->descricao ="Destartarização";
        $consulta->data = "2022-12-29";
        $consulta->hora = "02:10:00";
        $consulta->estado = "Pendente";
        $consulta->profile_id = $utente->id;
        $consulta->save();

        $consultaD = Marcacao::findOne(['id' => $consulta->id]);
        $consultaD->delete();
        $this->assertNull(Marcacao::findOne(['id' => $consulta->id]));

    }


}