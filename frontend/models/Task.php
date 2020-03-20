<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property int $voter_id
 * @property int $agent_id
 * @property string $meeting_schedule
 * @property string $actual_meeting_date
 * @property string $outcome
 * @property string|null $remark
 * @property int $created_by
 * @property string $created_date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property string $record_status
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['voter_id', 'agent_id', 'meeting_schedule', 'created_by'], 'required'],
            [['voter_id', 'agent_id', 'created_by', 'updated_by'], 'integer'],
            [['meeting_schedule', 'actual_meeting_date','actual_meeting_date', 'created_date', 'updated_date', 'outcome'], 'safe'],
            [['outcome'], 'string'],
            [['remark'], 'string', 'max' => 255],
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
            'voter_id' => 'Voter ID',
            'agent_id' => 'Agent ID',
            'meeting_schedule' => 'Meeting Schedule',
            'actual_meeting_date' => 'Actual Meeting Date',
            'outcome' => 'Outcome',
            'remark' => 'Remark',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
        ];
    }
}
