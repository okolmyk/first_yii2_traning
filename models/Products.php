<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

use app\components\MyBehaviors;

/**
 * This is the model class for table "tst_products".
 *
 * @property integer $id
 * @property string $name_product
 * @property string $product_category
 * @property string $sex_category
 * @property string $pictures
 */
class Products extends \yii\db\ActiveRecord
{
    public $imageFile; /*добавленный для аплоуда*/ 
    
    public $url; // это хуйня
 
	public function behaviors()
    {
        return [
            
             'MyBehaviors' => [
                'class' => MyBehaviors::className(),
               // 'pro' => '',
               'attribute' => 'name_product',
               
                
            ]         
        ];
    }
 
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tst_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
           // [['name_product', 'product_category', 'sex_category', 'pictures'], 'string', 'max' => 255],
           
            [['name_product', 'product_category', 'markets', 'sex_category'], 'string', 'max' => 255],
            
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
            'name_product' => 'Name Product',
            'product_category' => 'Product Category',
            'markets' => 'Markets',
            'sex_category' => 'Sex Category',
            'pictures' => 'Pictures',
        ];
    }
    
    public function getCategoryProducts()
    {
        return $this->hasOne(CategoryProducts::className(), ['id' => 'product_category']);
    }
    
    public function getMarketModel()
    {
        return $this->hasOne(Markets::className(), ['id' => 'markets']);
    }
    
    public function getUsers() {
		return $this->hasMany(Users::className (), [ 
				'id' => 'id_users' 
		])->viaTable('{{%users_products}}', [ 
				'id_products' => 'id' 
		]);
	}
	

    
        /*
     public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('./photo/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
    */
   
}
