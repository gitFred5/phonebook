<?php

use yii\db\Migration;

/**
 * Class m160227_110323_create_offices - Миграция создает таблицу в которой
 * хранятся данные - какой офис на каком этаже находится
 */
class m160227_110323_create_offices extends Migration
{
    public function up()
    {
        $table_options = Null;
        if ($this->db->driverName=='mysql'){
            $table_options = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('offices', [
            'id' => $this->primaryKey(),
            'office_number'=> $this->integer()->notNull(),
            'floor'=> $this->integer()->notNull()
        ],$table_options);


    }

    public function down()
    {
        $this->dropTable('offices');
    }
}
