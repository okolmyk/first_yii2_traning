<?php

use yii\db\Migration;

class m161019_123059_tst_products extends Migration
{
    public function up()
    {
		$this->createTable ( 'tst_products', [ 
				'id' => $this->primaryKey(),
				'name_product' => $this->string ( 255 ),
				'product_category' => $this->string ( 255 ),
				'sex_category' => $this->string ( 255 ),
				'pictures' => $this->string ( 255 ),
		] );
    }

    public function down()
    {
        echo "m161019_123059_tst_products cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
