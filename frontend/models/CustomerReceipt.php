<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_receipt".
 *
 * @property int $id
 * @property string $receipt_no
 * @property string $customer_id
 * @property string $created_date
 */
class CustomerReceipt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer_receipt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['receipt_no', 'customer_id'], 'required'],
            [['created_date'], 'safe'],
            [['receipt_no'], 'string', 'max' => 255],
            [['customer_id'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'receipt_no' => 'Receipt No',
            'customer_id' => 'Customer ID',
            'created_date' => 'Created Date',
        ];
    }
}
