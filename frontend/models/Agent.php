<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agent".
 *
 * @property int $id
 * @property string $name
 * @property string|null $phone
 * @property string $agent_type 1-agent; 2-sub-agent
 * @property int|null $agent_id
 * @property string $created_date
 * @property int $created_by
 * @property string $record_status
 *
 * @property Agent $agent
 * @property Agent[] $agents
 * @property VoterAssign[] $voterAssigns
 */
class Agent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
   
    
    public static function tableName()
    {
        return 'agent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_by'], 'required'],
            [['agent_id', 'created_by'], 'integer'],
            [['created_date','polling_booth_id'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 10],
            [['agent_type', 'record_status'], 'string', 'max' => 1],
            [['agent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Agent::className(), 'targetAttribute' => ['agent_id' => 'id']],
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
            'phone' => 'Phone',
            'agent_type' => 'Agent Type',
            'agent_id' => 'Agent ID',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'record_status' => 'Record Status',
        ];
    }

    /**
     * Gets query for [[Agent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgent()
    {
        return $this->hasOne(Agent::className(), ['id' => 'agent_id']);
    }

    /**
     * Gets query for [[Agents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgents()
    {
        return $this->hasMany(Agent::className(), ['agent_id' => 'id']);
    }

    /**
     * Gets query for [[VoterAssigns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVoterAssigns()
    {
        return $this->hasMany(VoterAssign::className(), ['agent_id' => 'id']);
    }
}
