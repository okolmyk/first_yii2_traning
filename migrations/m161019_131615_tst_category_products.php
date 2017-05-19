<?php

use yii\db\Migration;

class m161019_131615_tst_category_products extends Migration
{
    public function up()
    {
		$this->createTable ( 'tst_category_products', [ 
				'id' => $this->primaryKey(),
				'name_category_products' => $this->string ( 255 ),
		] );
    }

    public function down()
    {
        echo "m161019_131615_tst_category_products cannot be reverted.\n";

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
