<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OrderItem;
use app\models\OrderDetail;

/**
 * OrderItemSearch represents the model behind the search form of `app\models\OrderItem`.
 */
class OrderItemSearch extends OrderItem
{
    /**
     * {@inheritdoc}
     */
    public $customer_id;
    public $customer_name;
    public function rules()
    {
        return [
            [['id', 'order_detail_id', 'item_id','no_of_items', 'updated_by'], 'integer'],
            [['updated_date', 'record_status','customer_id','customer_name'], 'safe'],
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
        $query = OrderItem::find()
                ->leftjoin('order_detail','order_item.order_detail_id=order_detail.id');

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
            'order_detail_id' => $this->order_detail_id,
            'item_id' => $this->item_id,
            'no_of_items' => $this->no_of_items,
            'updated_by' => $this->updated_by,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'record_status', $this->record_status])
              ->andFilterWhere(['like', 'order_detail.customer_id', $this->customer_id])
              ->andFilterWhere(['like', 'order_detail.customer_name', $this->customer_name]);

        return $dataProvider;
    }
}
