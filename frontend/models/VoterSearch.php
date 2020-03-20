<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Voter;

/**
 * VoterSearch represents the model behind the search form of `app\models\Voter`.
 */
class VoterSearch extends Voter
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'polling_booth_id', 'social_status_id', 'last_party_id', 'interest_party_ticket_id', 'created_by', 'updated_by'], 'integer'],
            [['name', 'house_no', 'address', 'gender', 'phone', 'interest', 'employee_status', 'created_date', 'updated_date', 'record_status'], 'safe'],
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
        $query = Voter::find();

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
            'polling_booth_id' => $this->polling_booth_id,
            'social_status_id' => $this->social_status_id,
            'last_party_id' => $this->last_party_id,
            'interest_party_ticket_id' => $this->interest_party_ticket_id,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'updated_by' => $this->updated_by,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'house_no', $this->house_no])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'interest', $this->interest])
            ->andFilterWhere(['like', 'employee_status', $this->employee_status])
            ->andFilterWhere(['like', 'record_status', $this->record_status]);

        return $dataProvider;
    }
}
