<?php

use yii\db\Migration;

class m161206_174936_tst_products_users extends Migration
{
    public function up()
    {
		$this->createTable('tst_products_users', [ 
				'id_products' => $this->integer(11),
				'id_users' => $this->integer(11)
		]);
		
		$this->addPrimaryKey('', 'tst_products_users', [ 
				'id_products',
				'id_users' 
		]);
    }

    public function down()
    {
        echo "m161206_174936_tst_products_users cannot be reverted.\n";

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
