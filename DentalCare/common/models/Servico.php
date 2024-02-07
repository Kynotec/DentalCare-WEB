<?php

namespace common\models;

use Yii;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "servicos".
 *
 * @property int $id
 * @property string|null $referencia
 * @property string $nome
 * @property string|null $descricao
 * @property float|null $preco
 * @property int|null $ativo
 * @property int|null $iva_id
 *
 * @property Marcacao[] $consultas
 * @property Imagem[] $imagens
 * @property Iva $iva
 * @property LinhaFatura[] $linhaFaturas
 */
class Servico extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servicos';
    }

    public function getStatusLabel()
    {
        switch ($this->ativo)
        {
            case self::STATUS_ACTIVE:
                return '<span class="badge badge-success">Ativo</span>';

            case self::STATUS_INACTIVE:
                return '<span class="badge badge-danger">Desativado</span>';

            default:
                return '<span class="badge badge-info">' . $this->ativo . '</span>';
        }
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'string', 'max' => 50],
            [['nome'], 'required'],
            [['descricao'], 'string'],
            [['preco'], 'number'],
            [['ativo', 'iva_id'], 'integer'],
            [['referencia'], 'string', 'max' => 45],
            [['iva_id','descricao','preco'], 'required'],
            [['iva_id'], 'exist', 'skipOnError' => true, 'targetClass' => Iva::class, 'targetAttribute' => ['iva_id' => 'id']],
            ['ativo', 'default', 'value' => self::STATUS_ACTIVE],
            ['ativo', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'referencia' => 'Referência',
            'descricao' => 'Descrição',
            'preco' => 'Preço',
            'ativo' => 'Ativo',
            'iva_id' => 'Taxa IVA',
        ];
    }

    /**
     * Gets query for [[Consultas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Marcacao::class, ['servico_id' => 'id']);
    }

    /**
     * Gets query for [[Imagens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImagens()
    {
        return $this->hasMany(Imagem::class, ['servico_id' => 'id']);
    }


    public function getShortDescription()
    {
        return \yii\helpers\StringHelper::truncateWords(strip_tags($this->descricao), 20);
    }

    /**
     * Gets query for [[Iva]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIva()
    {
        return $this->hasOne(Iva::class, ['id' => 'iva_id']);
    }

    /**
     * Gets query for [[LinhaFaturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLinhaFaturas()
    {
        return $this->hasMany(LinhaFatura::class, ['servico_id' => 'id']);
    }
}
