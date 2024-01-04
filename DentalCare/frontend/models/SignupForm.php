<?php

namespace frontend\models;

use common\models\Perfil;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $status;

    public $nome;
    public $telefone;
    public $morada;
    public $nif;
    public $codigopostal;
    public $user_id;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required', 'message' => 'Insira um username.'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este username já foi escolhido.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required', 'message' => 'Insira um email.'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Já existe um email com este nome.'],

            ['password', 'required', 'message' => 'Insira uma password.'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            ['nome', 'trim'],
            ['nome', 'required', 'message' => 'Insira um nome.'],

            ['telefone', 'trim'],
            ['telefone', 'required', 'message' => 'Insira um número de telefone.'],

            ['morada', 'trim'],
            ['morada', 'required', 'message' => 'Insira uma morada.'],

            ['nif', 'trim'],
            ['nif', 'required', 'message' => 'Insira o NIF.'],

            ['codigopostal', 'trim'],
            ['codigopostal', 'required', 'message' => 'Insira um código postal.'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $perfil = new Perfil();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save();

        $perfil->nome = $this->nome;
        $perfil->telefone = $this->telefone;
        $perfil->morada = $this->morada;
        $perfil->nif = $this->nif;
        $perfil->codigopostal = $this->codigopostal;
        $perfil->user_id = $user->id;


        $auth = \Yii::$app->authManager;
        $utenteRole = $auth->getRole('utente');
        $auth->assign($utenteRole, $user->getId());

        return $perfil->save();
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}