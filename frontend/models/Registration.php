<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "registration".
 *
 * @property int $id
 * @property int $producer_name_id
 * @property int $registration_id
 * @property int $no_of_songs
 * @property int $price_per_song
 * @property float $to_be_paid
 * @property int|null $discount
 * @property float|null $discount_amount
 * @property float $total_amount
 * @property string $payment_status
 * @property string $delivery_status
 * @property string|null $cancel_reason
 * @property float|null $refund_amount
 * @property int $created_by
 * @property string $created_date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property string $record_status
 */
class Registration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'registration';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['producer_name_id', 'registration_id', 'no_of_songs', 'price_per_song', 'to_be_paid', 'total_amount', 'payment_status', 'delivery_status', 'created_by','date','singer_name'], 'required'],
            [['producer_name_id',  'no_of_songs', 'price_per_song', 'discount', 'created_by', 'updated_by'], 'integer'],
            [['to_be_paid', 'discount_amount', 'total_amount', 'refund_amount'], 'number'],
            [['payment_status','registration_id', 'delivery_status','singer_name'], 'string'],
            [['created_date', 'updated_date','date','paid_amount','balance_amount'], 'safe'],
            [['cancel_reason'], 'string', 'max' => 255],
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
            'producer_name_id' => 'Producer Name ID',
            'registration_id' => 'Registration ID',
            'no_of_songs' => 'No Of Songs',
            'price_per_song' => 'Price Per Song',
            'to_be_paid' => 'To Be Paid',
            'discount' => 'Discount',
            'discount_amount' => 'Discount Amount',
            'total_amount' => 'Total Amount',
            'payment_status' => 'Payment Status',
            'delivery_status' => 'Delivery Status',
            'cancel_reason' => 'Cancel Reason',
            'refund_amount' => 'Refund Amount',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
            'date' => 'Date',
            'paid_amount'=>'Amount Received',
            'balance_amount'=>'Due Amount',
            'singer_name'=>'Singer',
        ];
    }
}
