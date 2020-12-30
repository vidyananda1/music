<?php

namespace app\models;

use Yii;
use app\models\Employee;
/**
 * This is the model class for table "auth_assignment".
 *
 * @property string $item_name
 * @property string $user_id
 * @property int|null $created_at
 *
 * @property AuthItem $itemName
 */
class AuthAssignment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auth_assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_name', 'user_id'], 'required'],
            [['created_at'], 'integer'],
            [['item_name', 'user_id'], 'string', 'max' => 64],
            [['item_name', 'user_id'], 'unique', 'targetAttribute' => ['item_name', 'user_id']],
            [['item_name'], 'exist', 'skipOnError' => true, 'targetClass' => AuthItem::className(), 'targetAttribute' => ['item_name' => 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'item_name' => 'Item Name',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[ItemName]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemName()
    {
        return $this->hasOne(AuthItem::className(), ['name' => 'item_name']);
    }

    public function getRole() {
        $user_id = Yii::$app->user->id;
        $employee = Staff::find()->where(['user_id'=>$user_id])->one();
        $authAssignment = AuthAssignment::find()->where(['user_id'=>$user_id])->one();
        return $authAssignment->item_name;
    }

    public static function Role() {
        $user_id = Yii::$app->user->id;
        $employee = Staff::find()->where(['user_id'=>$user_id])->one();
        $authAssignment = AuthAssignment::find()->where(['user_id'=>$user_id])->one();
        return $authAssignment->item_name;
    }
}
