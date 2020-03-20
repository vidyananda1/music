<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "polling_booth_assign".
 *
 * @property int $id
 * @property int $agent_id
 * @property int $polling_booth_id
 * @property string $record_status
 */
class PollingBoothAssign extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'polling_booth_assign';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['agent_id', 'polling_booth_id'], 'required'],
            [['agent_id', 'polling_booth_id'], 'safe'],
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
            'agent_id' => 'Agent ID',
            'polling_booth_id' => 'Polling Booth ID',
            'record_status' => 'Record Status',
        ];
    }
}
