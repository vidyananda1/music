<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stock_in".
 *
 * @property int $id
 * @property string $item_name
 * @property int $no_of_item
 * @property float $price
 * @property string $date
 * @property int $created_by
 * @property string $created_date
 * @property string $record_status
 */
class StockIn extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock_in';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_name', 'no_of_item', 'price', 'date', 'created_by'], 'required'],
            [[ 'created_by'], 'integer'],
            [['price'], 'number'],
            [['date', 'created_date'], 'safe'],
            [['no_of_item','item_name'], 'string', 'max' => 255],
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
            'item_name' => 'Item Name',
            'no_of_item' => 'No Of Item',
            'price' => 'Price',
            'date' => 'Date',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
        ];
    }
}
