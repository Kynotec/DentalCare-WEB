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
        $user = new User();
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
        $this->assertNotNull(Perfil::findOne(['user_id' => $model->user_id]));
        $this->tester->seeRecord('common\models\Perfil', array('nome' => 'user1', 'telefone' => '123456789','morada'=>'Rua das Flores','nif'=>'123456789',
            'codigopostal'=>'4131491'));
    }


    public function testUpdatePerfil()
    {
        $user1 = $this->tester->grabRecord('common\models\Perfil', array('nome' => 'user1', 'telefone' => '123456789','morada'=>'Rua das Flores','nif'=>'123456789',
            'codigopostal'=>'4131491'));

        $user = new User();

        $model = new Perfil();
        $model->user_id = $user->id;
        $model->nome = 'joao';
        $model->telefone = '123452789';
        $model->morada = 'Rua das Floressss';
        $model->nif = '123456389';
        $model->codigopostal = '4111491';

        $model->save();
        $this->tester->dontSeeRecord('common\models\Perfil', array('nome' => 'user1', 'telefone' => '123456789','morada'=>'Rua das Flores','nif'=>'123456789', 'codigopostal'=>'4131491'));
        $this->tester->seeRecord('common\models\Perfil', array('nome' => 'joao','telefone' => '123452789','morada'=>'Rua das Floressss','nif'=>'123456389','codigopostal'=>'4111491'));
    }

    public function testDeletePerfil()
    {
        $user = new User();

        $user1 = $this->tester->grabRecord('common\models\Perfil', array('user_id' => $user->id, 'nome' => 'joao','telefone' => '123452789','morada'=>'Rua das Floressss','nif'=>'123456389','codigopostal'=>'4111491'));
        $user1->delete();
        $this->tester->dontSeeRecord('common\models\Perfil', array('user_id' => $user->id, 'nome' => 'joao','telefone' => '123452789','morada'=>'Rua das Floressss','nif'=>'123456389','codigopostal'=>'4111491'));
    }
}