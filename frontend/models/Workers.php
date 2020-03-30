<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workers".
 *
 * @property int $id
 * @property int $election_id
 * @property int $party_id
 * @property int $no_of_workers
 * @property int $created_by
 * @property string $created_date
 * @property string $record_status
 */
class Workers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['election_id', 'party_id', 'no_of_workers', 'created_by'], 'required'],
            [['election_id', 'party_id', 'no_of_workers', 'created_by'], 'integer'],
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
            'party_id' => 'Party ID',
            'no_of_workers' => 'No Of Workers',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
        ];
    }
}
