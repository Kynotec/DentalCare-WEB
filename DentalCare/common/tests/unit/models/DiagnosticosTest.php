<?php

namespace common\tests\unit\models;

use common\models\Diagnostico;
use common\models\Perfil;
use \Tests\Support\UnitTester;
use Yii;
use common\fixtures\UserFixture;

class DiagnosticosTest extends \Codeception\Test\Unit
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

    public function testcreateDiagnosticoSuccessfully()
    {
        $medico = $this->tester->grabFixture('user', 'user2');
        $diagnostico = new Diagnostico();
        $diagnostico->descricao ="Dente não desce";
        $diagnostico->data = "2022-12-29";
        $diagnostico->hora = "02:10:00";
        $diagnostico->profile_id = $medico->id;
        verify($diagnostico->save())->true();
        $this->assertNotNull(Diagnostico::findOne(['id' =>  $diagnostico->id]));
    }

    public function testcreateDiagnosticoErrado()
    {
        $diagnostico = new Diagnostico();
        $diagnostico->descricao =123;
        $this->assertFalse($diagnostico->validate(['descricao']));
        $diagnostico->data = null;
        $this->assertFalse($diagnostico->validate(['data']));
        $diagnostico->hora = null;
        $this->assertFalse($diagnostico->validate(['hora']));
        $diagnostico->profile_id = 5;
        $this->assertFalse($diagnostico->validate(['profile_id']));

        verify($diagnostico->save())->false();

    }



    public function testDiagnosticoUpdate()
    {
        $medico = $this->tester->grabFixture('user', 'user2');

        $diagnostico = new Diagnostico();
        $diagnostico->descricao ="Dente não desce";
        $diagnostico->data = "2022-12-29";
        $diagnostico->hora = "02:10:00";
        $diagnostico->profile_id = $medico->id;
        $diagnostico->save();

        $model = Diagnostico::findOne(['id' => $diagnostico->id]);

        $model->descricao = 'Descricao Update';
        $model->save();
        $this->assertEquals('Descricao Update', $model->descricao);
    }

    public function testDiagnosticoDelete()
    {
        $medico = $this->tester->grabFixture('user', 'user2');
        $diagnostico = new Diagnostico();

        $diagnostico->descricao ="Destartarização";
        $diagnostico->data = "2022-12-29";
        $diagnostico->hora = "02:10:00";
        $diagnostico->estado = "Pendente";
        $diagnostico->profile_id = $medico->id;
        $diagnostico->save();

        $diagnosticoD = Diagnostico::findOne(['id' => $diagnostico->id]);
        $diagnosticoD->delete();
        $this->assertNull(Diagnostico::findOne(['id' => $diagnostico->id]));

    }


}