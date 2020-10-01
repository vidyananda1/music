<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_detail".
 *
 * @property int $id
 * @property string|null $customer_name
 * @property string $customer_id
 * @property string|null $customer_address
 * @property string|null $customer_phone
 * @property int $item_id
 * @property int $category_id
 * @property int $no_of_items
 * @property float $price
 * @property int|null $discount
 * @property int|null $tax_id
 * @property float $total
 * @property int $updated_by
 * @property string $updated_date
 * @property string $record_status
 */
class OrderDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id','price', 'total', 'updated_by'], 'required'],
            [['customer_address'], 'string'],
            [['discount', 'tax_id', 'updated_by'], 'integer'],
            [['price', 'total'], 'number'],
            [['updated_date'], 'safe'],
            [['customer_name'], 'string', 'max' => 255],
            [['customer_id'], 'string', 'max' => 200],
            [['customer_phone'], 'string', 'max' => 10],
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
            'customer_name' => 'Customer Name',
            'customer_id' => 'Customer ID',
            'customer_address' => 'Customer Address',
            'customer_phone' => 'Customer Phone',
            'price' => 'Price',
            'discount' => 'Discount',
            'tax_id' => 'Tax ID',
            'total' => 'Total',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
        ];
    }
}
