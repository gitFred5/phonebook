<?php

use yii\db\Migration;

class m160227_114316_create_constraintsIndexes extends Migration
{
    public function up()
    {

        $this->addForeignKey('phone-numbers','phone_numbers',['personal_id'],'personal',['id']);
        $this->createIndex('phone-numbers-index','phone_numbers',['personal_id']);
        $this->createIndex('offices-index','offices',['office_number','floor']);
        $this->addForeignKey('personal-foreign','personal','office_id','offices','id');

    }

    public function down()
    {

    }
}
