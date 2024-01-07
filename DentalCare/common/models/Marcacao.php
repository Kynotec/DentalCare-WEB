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
class Marcacao extends \yii\db\ActiveRecord
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
            [['data', 'estado'], 'required'],
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
            'id' => 'ID da Marcação',
            'descricao' => 'Breve Descrição',
            'data' => 'Data da Marcação',
            'hora' => 'Hora da Marcação',
            'estado' => 'Estado da Marcação',
            'profile_id' => 'Nome do Utente',
            'servico_id' => 'Serviço a Realizar',
        ];
    }

    public $hoursOptions;

    public function getHoursOptions($horariosIndisponiveis)
    {
        // Lógica para gerar as opções de horas com base na data
        $options = [];
        for ($hour = 10; $hour <= 19; $hour++) {
            if(in_array($hour.':00:00', $horariosIndisponiveis)) {
                continue;
            }
            $options[sprintf('%02d:00:00', $hour)] = $hour.':00';
        }

        return $options;
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
