<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "produtos".
 *
 * @property int $id
 * @property int|null $ativo
 * @property string $nome
 * @property string|null $descricao
 * @property float|null $precounitario
 * @property int|null $stock
 * @property int|null $iva_id
 * @property int|null $categoria_id
 *
 * @property Categoria $categoria
 * @property Imagem[] $imagens
 * @property Ivas $iva
 * @property LinhaCarrinho[] $linhaCarrinhos
 * @property LinhaFatura[] $linhaFaturas
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produtos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ativo', 'stock', 'iva_id', 'categoria_id'], 'integer'],
            [['nome'], 'required'],
            [['descricao'], 'string'],
            [['precounitario'], 'number'],
            [['nome'], 'string', 'max' => 250],
            [['iva_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ivas::class, 'targetAttribute' => ['iva_id' => 'id']],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::class, 'targetAttribute' => ['categoria_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ativo' => 'Ativo',
            'nome' => 'Nome',
            'descricao' => 'Descricao',
            'precounitario' => 'Precounitario',
            'stock' => 'Stock',
            'iva_id' => 'Iva ID',
            'categoria_id' => 'Categoria ID',
        ];
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::class, ['id' => 'categoria_id']);
    }

    /**
     * Gets query for [[Imagens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImagens()
    {
        return $this->hasMany(Imagem::class, ['produto_id' => 'id']);
    }

    /**
     * Gets query for [[Iva]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIva()
    {
        return $this->hasOne(Ivas::class, ['id' => 'iva_id']);
    }

    /**
     * Gets query for [[LinhaCarrinhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLinhaCarrinhos()
    {
        return $this->hasMany(LinhaCarrinho::class, ['produto_id' => 'id']);
    }

    /**
     * Gets query for [[LinhaFaturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLinhaFaturas()
    {
        return $this->hasMany(LinhaFatura::class, ['produto_id' => 'id']);
    }
}
