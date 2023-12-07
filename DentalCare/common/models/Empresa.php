<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "empresas".
 *
 * @property int $id
 * @property string|null $designacaosocial
 * @property string|null $email
 * @property string|null $telefone
 * @property string|null $nif
 * @property string|null $morada
 * @property string|null $codigopostal
 * @property string|null $localidade
 * @property float|null $capitalsocial
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['capitalsocial'], 'number'],
            [['designacaosocial'], 'string', 'max' => 30],
            [['email', 'morada', 'localidade'], 'string', 'max' => 40],
            [['telefone', 'nif'], 'string', 'max' => 9],
            [['codigopostal'], 'string', 'max' => 8],
            [['capitalsocial', 'designacaosocial', 'email', 'morada', 'localidade','telefone','nif','codigopostal'], 'required']

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'designacaosocial' => 'Designacão Social',
            'email' => 'Email',
            'telefone' => 'Telefone',
            'nif' => 'NIF',
            'morada' => 'Morada',
            'codigopostal' => 'Codigo-Postal',
            'localidade' => 'Localidade',
            'capitalsocial' => 'Capitalsocial',
        ];
    }
}
