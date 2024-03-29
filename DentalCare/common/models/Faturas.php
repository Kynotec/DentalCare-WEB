<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "faturas".
 *
 * @property int $id
 * @property string $data
 * @property float $valortotal
 * @property float $ivatotal
 * @property float $subtotal
 * @property string $estado
 * @property int $profile_id
 *
 * @property LinhaFatura[] $linhaFaturas
 * @property Perfil $profile
 */
class Faturas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faturas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'valortotal', 'ivatotal', 'subtotal', 'estado', 'profile_id'], 'required'],
            [['data'], 'safe'],
            [['valortotal', 'ivatotal', 'subtotal'], 'number'],
            [['profile_id'], 'integer'],
            [['estado'], 'string', 'max' => 30],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::class, 'targetAttribute' => ['profile_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data' => 'Data',
            'valortotal' => 'Valor Total',
            'ivatotal' => 'Iva Total',
            'subtotal' => 'Sub-Total',
            'estado' => 'Estado',
            'profile_id' => 'Profile ID',
        ];
    }

    /**
     * Gets query for [[LinhaFaturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLinhaFaturas()
    {
        return $this->hasMany(LinhaFatura::class, ['fatura_id' => 'id']);
    }

    /**
     * Gets query for [[Profile]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Perfil::class, ['id' => 'profile_id']);
    }
}
