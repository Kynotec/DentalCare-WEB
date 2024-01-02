<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "consultas".
 *
 * @property int $id
 * @property string|null $descricao
 * @property string $data
 * @property string $hora
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
            [['data', 'hora', 'estado'], 'required'],
            [['data', 'hora'], 'safe'],
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
            'hora' => 'Hora',
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

    public $hoursOptions;
    public function getHoursOptions()
    {
        // Lógica para gerar as opções de horas com base na data
        $options = [];
        for ($hour = 9; $hour <= 18; $hour++) {
            $options[sprintf('%02d:00:00', $hour)] = $hour;
        }

        return $options;
    }

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