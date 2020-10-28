<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string $cus_name
 * @property string $address
 * @property string $phone
 * @property int $created_by
 * @property string $created_date
 * @property string $record_status
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cus_name', 'address', 'phone', 'created_by'], 'required'],
            [['created_by'], 'integer'],
            [['created_date'], 'safe'],
            [['cus_name', 'address'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 10],
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
            'cus_name' => 'Cus Name',
            'address' => 'Address',
            'phone' => 'Phone',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
        ];
    }
}
