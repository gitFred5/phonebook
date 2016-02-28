<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m160227_103210_create_phone_numbers - Миграция создает таблицу телефонные номера
 * эта тааблица используется для хранения нескольких номеров одного пользователя
 */
class m160227_103210_create_phone_numbers extends Migration
{
    public function up()
    {
        $table_options = Null;
        if ($this->db->driverName=='mysql'){
            $table_options = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('phone_numbers', [
            'id' => $this->primaryKey(),
            'tel_number'=> Schema::TYPE_TEXT,
            'personal_id'=> $this->integer()->notNull(),
        ],$table_options);
        $this->createIndex('personal-index','personal',['date_registered','office_id']);
    }

    public function down()
    {
        $this->dropTable('phone_numbers');
    }
}
