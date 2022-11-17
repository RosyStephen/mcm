<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property int $person_id
 * @property int|null $country_id
 * @property string $country_code
 * @property string $phone_number
 * @property int $status
 * @property int $deleted_status
 * @property string $created_at
 * @property string $updated_at
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_id', 'country_code', 'phone_number'], 'required'],
            [['person_id', 'country_id', 'status', 'deleted_status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['country_code'], 'string', 'max' => 5],
            [['phone_number'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'person_id' => 'Person ID',
            'country_id' => 'Country ID',
            'country_code' => 'Country Code',
            'phone_number' => 'Phone Number',
            'status' => 'Status',
            'deleted_status' => 'Deleted Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
