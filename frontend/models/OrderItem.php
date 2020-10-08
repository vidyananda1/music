<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_item".
 *
 * @property int $id
 * @property int $order_detail_id
 * @property int $item_id
 * @property int $category_id
 * @property int $no_of_items
 * @property float $item_price
 * @property int $updated_by
 * @property string $updated_date
 * @property string $record_status
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_detail_id', 'item_id','no_of_items', 'updated_by'], 'required'],
            [['order_detail_id', 'item_id','no_of_items', 'updated_by'], 'integer'],
            [[ 'item_price','updated_date'], 'safe'],
            [['record_status'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_detail_id' => 'Order Detail ID',
            'item_id' => 'Item ID',
            'no_of_items' => 'No Of Items',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
        ];
    }

    public function getCus()
        {
            return $this->hasOne(OrderDetail::className(), ['id' => 'order_detail_id']);
        }

}