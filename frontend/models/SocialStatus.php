<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "social_status".
 *
 * @property int $id
 * @property string $name
 * @property string $record_status
 */
class SocialStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'social_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
