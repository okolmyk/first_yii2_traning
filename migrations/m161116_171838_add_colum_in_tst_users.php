<?php

use yii\db\Migration;

class m161116_171838_add_colum_in_tst_users extends Migration
{
    public function up()
    {
			$this->addColumn('tst_users', 'username', $this->string (255));
			
			$this->addColumn('tst_users', 'auth_key', $this->integer(11));
			
			$this->addColumn('tst_users', 'access_token', $this->string (255));
		
    }

    public function down()
    {
       $this->dropColumn('tst_users', 'username');
       $this->dropColumn('tst_users', 'auth_key');
       $this->dropColumn('tst_users', 'access_token');
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
