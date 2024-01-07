<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;
use common\models\User;
use Yii;


/**
 * Class LoginCest
 */
class LoginCest
{
    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @return array
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @see \Codeception\Module\Yii2::_before()
     */
    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('/');
        $I->see('Inicie sessão para continuar', 'p');
    }


    public function loginwithnodata(FunctionalTester $I)
    {
        $I->click('Iniciar Sessão');
        $I->see('Username cannot be blank.');
        $I->see('Password cannot be blank.');
    }


    public function loginwithwrongpasswordorusername(FunctionalTester $I)
    {
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', '123456789');
        $I->click('Iniciar Sessão');
        $I->see('Incorrect username or password.');
    }

    public function loginwithrightpasswordandusername(FunctionalTester $I)
    {
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin123');
        $I->click('Iniciar Sessão');
        $I->see('admin');
    }


}
