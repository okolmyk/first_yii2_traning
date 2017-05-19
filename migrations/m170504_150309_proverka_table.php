<?php

use yii\db\Migration;

class m170504_150309_proverka_table extends Migration
{
    public function up()
    {
		$this->createTable('tst_proverka_table', [ 
				'id_proverka_1' => $this->integer(11),
				'id_proverka_2' => $this->integer(11)
		]);
    }

    public function down()
    {
        
    }

    
}
