<?php

use yii\db\Migration;

class m161013_144333_tst_users extends Migration
{
    public function up()
    {
		
		$this->createTable ( 'tst_users', [ 
				'id' => $this->integer ( 11 )->notNull (),
				'username' => $this->string ( 255 ),
				'alias' => $this->string ( 255 ),
				'login' => $this->string ( 255 ),
				'password' => $this->string ( 255 ),
		] );

    }

    public function down()
    {
        echo "m161013_144333_tst_users cannot be reverted.\n";

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
