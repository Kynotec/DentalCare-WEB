<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Produto;

/**
 * SearchProduto represents the model behind the search form of `common\models\Produto`.
 */
class SearchProduto extends Produto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ativo', 'stock', 'iva_id', 'categoria_id'], 'integer'],
            [['nome', 'descricao'], 'safe'],
            [['precounitario'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Produto::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'ativo' => $this->ativo,
            'precounitario' => $this->precounitario,
            'stock' => $this->stock,
            'iva_id' => $this->iva_id,
            'categoria_id' => $this->categoria_id,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}
