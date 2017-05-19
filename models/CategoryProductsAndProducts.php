<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_products_and_products".
 *
 * @property integer $id_category_products
 * @property integer $id_products
 */
class CategoryProductsAndProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_products_and_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_category_products', 'id_products'], 'required'],
            [['id_category_products', 'id_products'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_category_products' => 'Id Category Products',
            'id_products' => 'Id Products',
        ];
    }
    
    public function getCategoryProducts()
    {
        return $this->hasMany(CategoryProducts::className(), ['id_category_products' => 'id']);
    }
    
    public function getProducts()
    {
        return $this->hasMany(CategoryProducts::className(), ['id_products' => 'id']);
    }
}
