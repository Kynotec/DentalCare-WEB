<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ivas".
 *
 * @property int $id
 * @property string|null $percentagem
 * @property string|null $descricao
 * @property int $emvigor
 *
 * @property Produto[] $produtos
 * @property Servico[] $servicos
 */
class Iva extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    public function getStatusLabel()
    {
        switch ($this->emvigor)
        {
            case self::STATUS_ACTIVE:
                return '<span class="badge badge-success">Ativo</span>';

            case self::STATUS_INACTIVE:
                return '<span class="badge badge-danger">Desativado</span>';

            default:
                return '<span class="badge badge-info">' . $this->emvigor . '</span>';
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ivas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['percentagem'], 'string', 'max' => 2],
            [['descricao'], 'string', 'max' => 20],
            ['emvigor', 'default', 'value' => self::STATUS_ACTIVE],
            ['emvigor', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'percentagem' => 'Percentagem',
            'descricao' => 'Descrição',
            'emvigor' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Produtos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::class, ['iva_id' => 'id']);
    }

    /**
     * Gets query for [[Servicos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServicos()
    {
        return $this->hasMany(Servico::class, ['iva_id' => 'id']);
    }
}
