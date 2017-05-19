<?php

namespace app\models;

use Yii;

use app\components\MyBehaviors;
/**
 * This is the model class for table "tst_category_products".
 *
 * @property integer $id
 * @property string $name_category_products
 */
class CategoryProducts extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            
             'MyBehaviors' => [
                'class' => MyBehaviors::className(),
               // 'pro' => '',
               'attribute' => 'name_category_products',
               
                
            ]         
        ];
    }
 
    
    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tst_category_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_category_products'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_category_products' => 'Name Category Products',
        ];
    }
}
