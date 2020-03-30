<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NoOfVoters;

/**
 * NoOfVotersSearch represents the model behind the search form of `app\models\NoOfVoters`.
 */
class NoOfVotersSearch extends NoOfVoters
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'election_id', 'polling_booth_id', 'no_of_voters', 'no_of_turnouts', 'created_by', 'created_date', 'record_status'], 'integer'],
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
        $query = NoOfVoters::find();

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
            'election_id' => $this->election_id,
            'polling_booth_id' => $this->polling_booth_id,
            'no_of_voters' => $this->no_of_voters,
            'no_of_turnouts' => $this->no_of_turnouts,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'record_status' => $this->record_status,
        ]);

        return $dataProvider;
    }
}
