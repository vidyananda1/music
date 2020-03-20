<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "voter_assign".
 *
 * @property int $id
 * @property int $voter_id
 * @property int $agent_id
 * @property string $record_status
 *
 * @property Voter $voter
 * @property Agent $agent
 */
class VoterAssign extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'voter_assign';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['voter_id', 'agent_id'], 'required'],
            [['voter_id', 'agent_id'], 'safe'],
            [['record_status'], 'string', 'max' => 1],
            [['voter_id'], 'exist', 'skipOnError' => true, 'targetClass' => Voter::className(), 'targetAttribute' => ['voter_id' => 'id']],
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
            'voter_id' => 'Voter ID',
            'agent_id' => 'Agent ID',
            'record_status' => 'Record Status',
        ];
    }

    /**
     * Gets query for [[Voter]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVoter()
    {
        return $this->hasOne(Voter::className(), ['id' => 'voter_id']);
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
}
