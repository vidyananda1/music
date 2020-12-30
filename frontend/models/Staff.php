<?php

namespace app\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "staff".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property int $user_id
 * @property int $created_by
 * @property string|null $created_date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property string $record_status
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff';
    }

    public $name;
    public $username;
    public $password;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['staff_name','address', 'phone', 'user_id', 'created_by'], 'required'],
            [['user_id', 'created_by', 'updated_by'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['staff_name'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 10],
            [['record_status'], 'string', 'max' => 1],
            [['name','username','password'],'string'],
            [['username'],'unique','targetClass'=>'\common\models\user','message'=>'User name already taken']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'staff_name' => 'Staff Name',
            'phone' => 'Phone',
            'user_id' => 'User ID',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
            'name' => "Role",
            'username'=> 'User Name',
            'password' => 'Password'
        ];
    }

    public function signup()
    {
       
        $user = new User();
        $rand_id = rand(10,1000);
        if(!User::findOne($rand_id))
            $user->id = $rand_id;
        $user->username = $this->username;

        // $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        // $user->generateEmailVerificationToken();
        if($user->save())
            return  $user->id;
        else {
            print_r($user->errors);
            die;
        }
        return 0;

    }
}
