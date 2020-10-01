<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tax".
 *
 * @property int $id
 * @property string $tax_name
 * @property float $tax_percent
 * @property int $created_by
 * @property string $created_date
 * @property string $record_status 1-active,0-inactive
 */
class Tax extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tax';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tax_name', 'tax_percent', 'created_by'], 'required'],
            [['tax_percent'], 'number'],
            [['created_by'], 'integer'],
            [['created_date'], 'safe'],
            [['tax_name'], 'string', 'max' => 255],
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
            'tax_name' => 'Tax Name',
            'tax_percent' => 'Tax Percent',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
        ];
    }
}
