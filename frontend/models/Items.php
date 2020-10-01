<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "items".
 *
 * @property int $id
 * @property string $name
 * @property int $category
 * @property string $quantity
 * @property float $price
 * @property string $created_date
 * @property int $created_by
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'category', 'quantity', 'price', 'created_by'], 'required'],
            [['category', 'created_by'], 'integer'],
            [['quantity'], 'string'],
            [['price'], 'number'],
            [['created_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'category' => 'Category',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
        ];
    }
}
