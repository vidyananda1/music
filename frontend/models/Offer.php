<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "offer".
 *
 * @property int $id
 * @property string $dis_name
 * @property int $dis_percent
 * @property int $created_by
 * @property string $created_date
 * @property string $record_status
 */
class Offer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'offer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dis_name', 'dis_percent', 'created_by'], 'required'],
            [['dis_percent', 'created_by'], 'integer'],
            [['created_date'], 'safe'],
            [['dis_name'], 'string', 'max' => 255],
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
            'dis_name' => 'Dis Name',
            'dis_percent' => 'Dis Percent',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
        ];
    }
}
