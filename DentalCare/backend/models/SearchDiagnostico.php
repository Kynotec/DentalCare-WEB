<?php

namespace backend\models;

use common\models\Perfil;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Diagnostico;

/**
 * SearchDiagnostico represents the model behind the search form of `common\models\Diagnostico`.
 */
class SearchDiagnostico extends Diagnostico
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'consulta_id', 'profile_id'], 'integer'],
            [['descricao', 'data', 'hora', 'nome'], 'safe'],
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
        $query = Diagnostico::find();


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
            'consulta_id' => $this->consulta_id,
        ]);

        $query->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}
