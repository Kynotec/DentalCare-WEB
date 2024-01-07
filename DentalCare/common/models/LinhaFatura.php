<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "linha_faturas".
 *
 * @property int $id
 * @property int $quantidade
 * @property float $valorunitario
 * @property float $valoriva
 * @property float $valortotal
 * @property int $fatura_id
 * @property int|null $produto_id
 * @property int|null $servico_id
 *
 * @property Faturas $fatura
 * @property Produto $produto
 * @property Servico $servico
 */
class LinhaFatura extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'linha_faturas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return[
            [['quantidade', 'valorunitario', 'valoriva', 'valortotal', 'fatura_id'], 'required'],
            [['quantidade', 'fatura_id', 'produto_id', 'servico_id'], 'integer'],
            [['valorunitario', 'valoriva', 'valortotal'], 'number'],
            [['produto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::class, 'targetAttribute' => ['produto_id' => 'id']],
            [['servico_id'], 'exist', 'skipOnError' => true, 'targetClass' => Servico::class, 'targetAttribute' => ['servico_id' => 'id']],
            [['fatura_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faturas::class, 'targetAttribute' => ['fatura_id' => 'id']],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quantidade' => 'Quantidade',
            'valorunitario' => 'Valorunitario',
            'valoriva' => 'Valoriva',
            'valortotal' => 'Valortotal',
            'fatura_id' => 'Fatura ID',
            'produto_id' => 'Produto ID',
            'servico_id' => 'Servico ID',
        ];
    }

    /**
     * Gets query for [[Fatura]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFatura()
    {
        return $this->hasOne(Faturas::class, ['id' => 'fatura_id']);
    }

    /**
     * Gets query for [[Produto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produto::class, ['id' => 'produto_id']);
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
