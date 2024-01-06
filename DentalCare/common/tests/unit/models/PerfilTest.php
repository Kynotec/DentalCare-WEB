<?php

namespace common\tests\Unit\models;

use backend\tests\UnitTester;
use Codeception\Test\Unit;
use common\fixtures\UserFixture;
use common\models\LoginForm;
use common\models\Perfil;
use common\models\User;
use Yii;

class PerfilTest extends \Codeception\Test\Unit
{

    /**
     * @var \common\tests\UnitTester
     */
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

    public function testCreatePerfilUnsuccessfully()
    {
        $user1 = $this->tester->grabFixture('user', 'user1');
        $model = new Perfil();
        $model->user_id = $user1->id;
        $model->nome = 'tooooooooooooooooooooooooolooooooooooooooooooooongnomeeeeeeeeeeeeeeeee';
        $this->assertFalse($model->validate(['nome']));
        $model->telefone = 123456789999;
        $this->assertFalse($model->validate(['telefone']));
        $model->morada = 123213;
        $this->assertFalse($model->validate(['morada']));
        $model->nif = 1234567893123;
        $this->assertFalse($model->validate(['nif']));
        $model->codigopostal = 2080640123123;
        $this->assertFalse($model->validate(['codigopostal']));

        verify($model->save())->false();
    }

    public function testCreatePerfilSuccessfully()
    {
        $user1 = $this->tester->grabFixture('user', 'user1');
        $model = new Perfil();
        $model->user_id = $user1->id;
        $model->nome = 'user1';
        $this->assertFalse($model->validate(['nome']));
        $model->telefone = '123456789';
        $this->assertFalse($model->validate(['telefone']));
        $model->morada = 'Rua das Flores';
        $this->assertFalse($model->validate(['morada']));
        $model->nif = '123456789';
        $this->assertFalse($model->validate(['nif']));
        $model->codigopostal = '4131491';
        $this->assertFalse($model->validate(['codigopostal']));

        verify($model->save())->true();
        $this->assertNotNull( Perfil::findOne(['user_id' =>  $model->user_id]));
    }


    public function testUpdatePerfil()
    {
        $user1 = $this->tester->grabFixture('user', 'user1');

        $model = new Perfil();
        $model->user_id = $user1->id;
        $model->nome = 'user1';
        $model->telefone = '123456789';
        $model->morada = 'Rua das Flores';
        $model->nif = '123456789';
        $model->codigopostal = '4131491';

        $model->save();
    }

    public function testDeletePerfil()
    {
        $user1 = $this->tester->grabFixture('user', 'user1');

        $model = new Perfil();
        $model->user_id = $user1->id;
        $model->nome = 'user1';
        $model->telefone = '123456789';
        $model->morada = 'Rua das Flores';
        $model->nif = '123456789';
        $model->codigopostal = '4131491';

        $model->save();

        $perfil = Perfil::findOne(['user_id' => $model->user_id]);
        $perfil->delete();

        $deletedPerfil = Perfil::findOne(['user_id' => $perfil->user_id]);
        $this->assertNull($deletedPerfil);
    }


}