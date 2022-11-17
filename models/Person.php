<?php

namespace app\models;

use Yii;
use app\models\Contact;

/**
 * This is the model class for table "person".
 *
 * @property int $id
 * @property string $name
 * @property string $email_id
 * @property string $created_at
 * @property string $updated_at
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email_id'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email_id'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email_id' => 'Email ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getContact()
    {
        return $this->hasMany(Contact::class, ['person_id' => 'id']);
    }}
