<?php

namespace app\models;

use Yii;

class PollingBooth extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'polling_booth';
    }

    public function rules()
    {
        return [
            [['name', 'created_by'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 255],
            [['record_status'], 'string', 'max' => 1],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'address' => 'Address',
        ];
    }
}
