<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "consultas".
 *
 * @property int $id
 * @property string|null $descricao
 * @property string|null $data
 * @property string $estado
 * @property int|null $profile_id
 * @property int|null $servico_id
 *
 * @property Diagnostico[] $diagnosticos
 * @property Perfil $profile
 * @property Servico $servico
 */
class Consulta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consultas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data'], 'safe'],
            [['estado'], 'required'],
            [['profile_id', 'servico_id'], 'integer'],
            [['descricao'], 'string', 'max' => 45],
            [['estado'], 'string', 'max' => 30],
            [['servico_id'], 'exist', 'skipOnError' => true, 'targetClass' => Servico::class, 'targetAttribute' => ['servico_id' => 'id']],
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
            'descricao' => 'Descricao',
            'data' => 'Data',
            'estado' => 'Estado',
            'profile_id' => 'Profile ID',
            'servico_id' => 'Servico ID',
        ];
    }

    /**
     * Gets query for [[Diagnosticos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiagnosticos()
    {
        return $this->hasMany(Diagnostico::class, ['consulta_id' => 'id']);
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

    /**
     * Gets query for [[Servico]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServico()
    {
        return $this->hasOne(Servico::class, ['id' => 'servico_id']);
    }
}