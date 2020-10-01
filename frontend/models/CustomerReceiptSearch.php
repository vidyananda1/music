<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CustomerReceipt;

/**
 * CustomerReceiptSearch represents the model behind the search form of `app\models\CustomerReceipt`.
 */
class CustomerReceiptSearch extends CustomerReceipt
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['receipt_no', 'customer_id', 'created_date'], 'safe'],
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
        $query = CustomerReceipt::find();

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
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'receipt_no', $this->receipt_no])
            ->andFilterWhere(['like', 'customer_id', $this->customer_id]);

        return $dataProvider;
    }
}
