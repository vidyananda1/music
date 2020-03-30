<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "result".
 *
 * @property int $id
 * @property int $election_id
 * @property int $polling_booth_id
 * @property int $party_id
 * @property int $no_of_votes
 * @property int $created_by
 * @property string $created_date
 * @property string $record_status
 */
class Result extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['election_id', 'polling_booth_id', 'party_id', 'no_of_votes', 'created_by'], 'required'],
            [['election_id', 'polling_booth_id', 'party_id', 'no_of_votes', 'created_by'], 'integer'],
            [['created_date'], 'safe'],
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
            'election_id' => 'Election ID',
            'polling_booth_id' => 'Polling Booth ID',
            'party_id' => 'Party ID',
            'no_of_votes' => 'No Of Votes',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
        ];
    }
}
