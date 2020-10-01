<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OrderItem;

/**
 * OrderItemSearch represents the model behind the search form of `app\models\OrderItem`.
 */
class OrderItemSearch extends OrderItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'order_detail_id', 'item_id', 'category_id', 'no_of_items', 'updated_by'], 'integer'],
            [['item_price'], 'number'],
            [['updated_date', 'record_status'], 'safe'],
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
        $query = OrderItem::find();

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
            'order_detail_id' => $this->order_detail_id,
            'item_id' => $this->item_id,
            'category_id' => $this->category_id,
            'no_of_items' => $this->no_of_items,
            'item_price' => $this->item_price,
            'updated_by' => $this->updated_by,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'record_status', $this->record_status]);

        return $dataProvider;
    }
}
