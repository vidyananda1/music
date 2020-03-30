<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "election_type".
 *
 * @property int $id
 * @property string $name
 * @property string $record_status
 */
class ElectionType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'election_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['record_status'],'safe'],
            [['name'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'record_status' => 'Record Status',
        ];
    }
}
