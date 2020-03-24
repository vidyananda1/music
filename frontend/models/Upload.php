<?php

namespace app\models;
use yii\base\Model;
use Yii;

/**
 * This is the model class for table "setting".
 *
 * @property int $id
 * @property string $url
 * @property string $token
 */
class Upload extends Model
{
    /**
     * {@inheritdoc}
     */
    public $file;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file','option'], 'required'],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'csv'],
        ];
    }

    /**
     * {@inheritdoc}
     */
}
