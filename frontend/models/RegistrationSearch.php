<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Registration;

/**
 * RegistrationSearch represents the model behind the search form of `app\models\Registration`.
 */
class RegistrationSearch extends Registration
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'producer_name_id',  'no_of_songs', 'price_per_song', 'discount', 'created_by', 'updated_by'], 'integer'],
            [['to_be_paid', 'discount_amount', 'total_amount', 'refund_amount'], 'number'],
            [['payment_status', 'delivery_status', 'cancel_reason', 'created_date', 'updated_date', 'record_status','registration_id','date','singer_name'], 'safe'],
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
        $query = Registration::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]]
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
            'producer_name_id' => $this->producer_name_id,
            'registration_id' => $this->registration_id,
            'no_of_songs' => $this->no_of_songs,
            'price_per_song' => $this->price_per_song,
            'to_be_paid' => $this->to_be_paid,
            'discount' => $this->discount,
            'discount_amount' => $this->discount_amount,
            'total_amount' => $this->total_amount,
            'refund_amount' => $this->refund_amount,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'updated_by' => $this->updated_by,
            'updated_date' => $this->updated_date,
            'singer_name'=>$this->singer_name,
        ]);

        $query->andFilterWhere(['like', 'payment_status', $this->payment_status])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'delivery_status', $this->delivery_status])
            ->andFilterWhere(['like', 'cancel_reason', $this->cancel_reason])
            ->andFilterWhere(['like', 'record_status', $this->record_status]);

        return $dataProvider;
    }
}
