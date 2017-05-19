<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tst_products_users".
 *
 * @property integer $id_products
 * @property integer $id_users
 */
class ProductsUsers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tst_products_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_products', 'id_users'], 'required'],
            [['id_products', 'id_users'], 'integer'],
            [['id_products'], 'unique'],
            [['id_users'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_products' => 'Id Products',
            'id_users' => 'Id Users',
        ];
    }
}
