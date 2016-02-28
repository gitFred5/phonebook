<?php

namespace app\modules\phonebook\models;

use Yii;

/**
 * This is the model class for table "personal".
 *
 * @property integer $id
 * @property string $date_registered
 * @property string $fio
 * @property integer $office_id
 *
 * @property Offices $office
 * @property PhoneNumbers[] $phoneNumbers
 */
class Personal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_registered'], 'safe'],
            [['fio'], 'string'],
            [['office_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_registered' => 'Date Registered',
            'fio' => 'Fio',
            'office_id' => 'Office ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffice()
    {
        return $this->hasOne(Offices::className(), ['id' => 'office_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhoneNumbers()
    {
        return $this->hasMany(PhoneNumbers::className(), ['personal_id' => 'id']);
    }
}
