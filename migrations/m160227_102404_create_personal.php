<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m160227_102404_create_personal - миграция создает таблицу персональных данных пользователя
 */
class m160227_102404_create_personal extends Migration
{
    public function up()
    {

        $table_options = Null;
        if ($this->db->driverName=='mysql'){
            $table_options = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('personal', [
            'id' => $this->primaryKey(),
            'date_registered' => $this->dateTime()->defaultExpression('NOW()'),
            'fio' => Schema::TYPE_TEXT,
            'office_id' => Schema::TYPE_INTEGER

        ],$table_options);


    }

    public function down()
    {
        $this->dropTable('personal');
    }
}
