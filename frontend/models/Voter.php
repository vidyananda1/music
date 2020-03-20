<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "voter".
 *
 * @property int $id
 * @property string $name
 * @property int $polling_booth_id
 * @property string|null $house_no
 * @property string|null $address
 * @property string|null $gender
 * @property string|null $phone
 * @property int $social_status_id
 * @property int $last_party_id
 * @property string|null $interest
 * @property int $interest_party_ticket_id
 * @property string|null $employee_status
 * @property int $created_by
 * @property string $created_date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property string $record_status
 *
 * @property VoterAssign[] $voterAssigns
 */
class Voter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'voter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'polling_booth_id', 'social_status_id', 'last_party_id', 'interest_party_ticket_id', 'created_by'], 'required'],
            [['polling_booth_id', 'social_status_id', 'last_party_id', 'interest_party_ticket_id', 'created_by', 'updated_by'], 'integer'],
            [['gender', 'employee_status'], 'string'],
            [['created_date', 'updated_date'], 'safe'],
            [['name', 'house_no', 'address', 'interest'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 10],
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
            'polling_booth_id' => 'Polling Booth ID',
            'house_no' => 'House No',
            'address' => 'Address',
            'gender' => 'Gender',
            'phone' => 'Phone',
            'social_status_id' => 'Social Status ID',
            'last_party_id' => 'Last Party ID',
            'interest' => 'Interest',
            'interest_party_ticket_id' => 'Interest Party Ticket ID',
            'employee_status' => 'Employee Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
        ];
    }

    /**
     * Gets query for [[VoterAssigns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVoterAssigns()
    {
        return $this->hasMany(VoterAssign::className(), ['voter_id' => 'id']);
    }
}
