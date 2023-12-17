<?php

namespace common\models;

use Yii;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "imagens".
 *
 * @property int $id
 * @property string $filename
 * @property int $produto_id
 * @property int $servico_id
 * @property int $diagnostico_id
 *
 * @property Diagnostico $diagnostico
 * @property Produto $produto
 * @property Servico $servico
 */
class Imagem extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'imagens';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filename'], 'required'],
            [['produto_id', 'servico_id', 'diagnostico_id'], 'integer'],
            [['filename'], 'string', 'max' => 2000],
            [['produto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::class, 'targetAttribute' => ['produto_id' => 'id']],
            [['servico_id'], 'exist', 'skipOnError' => true, 'targetClass' => Servico::class, 'targetAttribute' => ['servico_id' => 'id']],
            [['diagnostico_id'], 'exist', 'skipOnError' => true, 'targetClass' => Diagnostico::class, 'targetAttribute' => ['diagnostico_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filename' => 'Imagem',
            'produto_id' => 'Produto ID',
            'servico_id' => 'Servico ID',
            'diagnostico_id' => 'Diagnostico ID',
        ];
    }

    /**
     * Gets query for [[Diagnostico]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiagnostico()
    {
        return $this->hasOne(Diagnostico::class, ['id' => 'diagnostico_id']);
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
