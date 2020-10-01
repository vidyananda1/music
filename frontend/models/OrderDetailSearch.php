<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OrderDetail;

/**
 * OrderDetailSearch represents the model behind the search form of `app\models\OrderDetail`.
 */
class OrderDetailSearch extends OrderDetail
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','discount', 'tax_id', 'updated_by'], 'integer'],
            [['customer_name', 'customer_id', 'customer_address', 'customer_phone', 'updated_date', 'record_status'], 'safe'],
            [['price', 'total'], 'number'],
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
        $query = OrderDetail::find();

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
            'price' => $this->price,
            'discount' => $this->discount,
            'tax_id' => $this->tax_id,
            'total' => $this->total,
            'updated_by' => $this->updated_by,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'customer_id', $this->customer_id])
            ->andFilterWhere(['like', 'customer_address', $this->customer_address])
            ->andFilterWhere(['like', 'customer_phone', $this->customer_phone])
            ->andFilterWhere(['like', 'record_status', $this->record_status]);

        return $dataProvider;
    }
}
