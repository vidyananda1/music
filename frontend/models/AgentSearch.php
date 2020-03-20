<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Agent;

/**
 * AgentSearch represents the model behind the search form of `app\models\Agent`.
 */
class AgentSearch extends Agent
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'agent_id', 'created_by'], 'integer'],
            [['name', 'phone', 'agent_type', 'created_date', 'record_status'], 'safe'],
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
        $query = Agent::find();

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
            'agent_id' => $this->agent_id,
            'created_date' => $this->created_date,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'agent_type', $this->agent_type])
            ->andFilterWhere(['like', 'record_status', $this->record_status]);

        return $dataProvider;
    }
}
