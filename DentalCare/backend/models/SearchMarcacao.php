<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Consulta;

/**
 * SearchMarcacao represents the model behind the search form of `common\models\Consulta`.
 */
class SearchMarcacao extends Consulta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'profile_id', 'servico_id'], 'integer'],
            [['descricao', 'data', 'hora', 'estado'], 'safe'],
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
        $query = Consulta::find();

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
            'data' => $this->data,
            'hora' => $this->hora,
            'profile_id' => $this->profile_id,
            'servico_id' => $this->servico_id,
        ]);

        $query->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}