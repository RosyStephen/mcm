<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property int $id
 * @property string $country_name
 * @property string $currency_name
 * @property string $currency_code
 * @property string $currency_symbol
 * @property string $phone_code
 * @property string $iso_code
 * @property string $status
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'country_name', 'currency_name', 'currency_code', 'currency_symbol', 'phone_code', 'iso_code'], 'required'],
            [['id'], 'integer'],
            [['status'], 'string'],
            [['country_name', 'currency_name', 'currency_code', 'currency_symbol', 'phone_code'], 'string', 'max' => 255],
            [['iso_code'], 'string', 'max' => 75],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_name' => 'Country Name',
            'currency_name' => 'Currency Name',
            'currency_code' => 'Currency Code',
            'currency_symbol' => 'Currency Symbol',
            'phone_code' => 'Phone Code',
            'iso_code' => 'Iso Code',
            'status' => 'Status',
        ];
    }
}
