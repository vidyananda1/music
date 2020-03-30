<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "no_of_voters".
 *
 * @property int $id
 * @property int $election_id
 * @property int $polling_booth_id
 * @property int $no_of_voters
 * @property int $no_of_turnouts
 * @property int $created_by
 * @property int $created_date
 * @property int $record_status
 */
class NoOfVoters extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'no_of_voters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['election_id', 'polling_booth_id', 'no_of_voters', 'no_of_turnouts'], 'required'],
            [[ 'created_by', 'created_date', 'record_status'],'safe'],
            [['election_id', 'polling_booth_id', 'no_of_voters', 'no_of_turnouts'], 'integer'],
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
            'no_of_voters' => 'No Of Voters',
            'no_of_turnouts' => 'No Of Turnouts',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
        ];
    }
}
