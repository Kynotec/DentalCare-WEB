<?php
namespace backend\tests;

use common\models\Perfil;
use common\models\User;

class PerfilTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testCreatePerfilUnsuccessfully()
    {
        $user= new User();
        $user->email = 'digoo@gmail.com';
        $user->username = 'diogodiogo';
        $user->setPassword('12345678d');
        $user->generateAuthKey();
        $user->generatePasswordResetToken();
        $user->save();
        // $user1 = $this->tester->grabFixture('user', 'user1');
        $model = new Perfil();
        $model->user_id = $user->id;
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
        $model->codigopostal = null;
        $this->assertFalse($model->validate(['codigopostal']));

        verify($model->save())->false();

    }

    public function testCreatePerfilSuccessfully()
    {
        $user= new User();
        $user->email = 'digoo@gmail.com';
        $user->username = 'diogodiogo';
        $user->setPassword('12345678d');
        $user->generateAuthKey();
        $user->generatePasswordResetToken();
        $user->save();
        //$user1 = $this->tester->grabFixture('user', 'user1');
        $model = new Perfil();
        $model->user_id = $user->id;
        $model->nome = 'user1';
        $this->assertTrue($model->validate(['nome']));
        $model->telefone = '123456789';
        $this->assertTrue($model->validate(['telefone']));
        $model->morada = 'Rua das Flores';
        $this->assertTrue($model->validate(['morada']));
        $model->nif = '123456789';
        $this->assertTrue($model->validate(['nif']));
        $model->codigopostal = '4131491';
        $this->assertTrue($model->validate(['codigopostal']));

        verify($model->save())->true();
        $this->assertNotNull( Perfil::findOne(['user_id' =>  $model->user_id]));
        $this->tester->seeRecord('common\models\Perfil', array('nome' => 'user1','telefone' => '123456789'));
    /*}


    public function testUpdatePerfil()
    {*/
//fazer com find
        $user1 = $this->tester->grabRecord('common\models\Perfil', array('nome' => 'user1','telefone' => '123456789'));
        //$user1 = $this->tester->grabEntryFromDatabase('profiles', ['nome' => 'user1']);
        //$user1 = Perfil::find()->where(['nome'=>'user1','telefone'=>'123456789'])->one();
        $model = new Perfil();
        $model->user_id = $user1->id;
        $model->nome = 'joao';
        $model->telefone = '123452789';
        $model->morada = 'Rua das Floressss';
        $model->nif = '123456389';
        $model->codigopostal = '4111491';

        $model->save();
        $this->tester->dontSeeRecord('common\models\Perfil', array('nome' => 'user1','telefone' => '123456789'));
        $this->tester->seeRecord('common\models\Perfil', array('nome' => 'joao','telefone' => '123452789'));
    }

    public function testDeletePerfil()
    {
        $user1 = $this->tester->grabRecord('common\models\Perfil', array('nome' => 'joao','telefone' => '123452789'));
        $user1 -> delete();
        $this->tester->dontSeeRecord('common\models\Perfil', array('nome' => 'joao','telefone' => '123452789'));


    }
}