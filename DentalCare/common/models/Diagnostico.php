<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "diagnosticos".
 *
 * @property int $id
 * @property string|null $descricao
 * @property string|null $data
 * @property string $hora
 * @property int|null $profile_id
 * @property int $consulta_id
 *
 * @property Marcacao $consulta
 * @property Imagem[] $imagens
 * @property Perfil $profile
 */
class Diagnostico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diagnosticos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'hora'], 'safe'],
            [['hora', 'consulta_id'], 'required'],
            [['profile_id', 'consulta_id'], 'integer'],
            [['descricao'], 'string', 'max' => 45],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::class, 'targetAttribute' => ['profile_id' => 'id']],
            [['consulta_id'], 'exist', 'skipOnError' => true, 'targetClass' => Marcacao::class, 'targetAttribute' => ['consulta_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descricao' => 'Descrição',
            'data' => 'Data do Diagnóstico',
            'hora' => 'Hora do Diagnóstico',
            'profile_id' => 'Nome do Utente',
            'consulta_id' => 'Consulta ID',
        ];
    }

    /**
     * Gets query for [[Consulta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConsulta()
    {
        return $this->hasOne(Marcacao::class, ['id' => 'consulta_id']);
    }

    /**
     * Gets query for [[Imagens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImagens()
    {
        return $this->hasMany(Imagem::class, ['diagnostico_id' => 'id']);
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
