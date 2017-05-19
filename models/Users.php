<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "tst_users".
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $login
 * @property string $password
 */
class Users extends \yii\db\ActiveRecord
{
     public $imageFile;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tst_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['auth_key'], 'integer'], // auth_key
            [['name', 'alias', 'login', 'password', 'username', 'access_token', 'userGroup'], 'string', 'max' => 255], //'username', 'access_token'
			[['imageFile'], 'file', 'extensions' => 'png, jpg', 'skipOnEmpty' => false],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'alias' => 'Alias',
            'login' => 'Login',
            'password' => 'Password',
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('runtime/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
