<?php

use yii\db\Migration;

/**
 * Class m221117_172007_contact
 */
class m221117_172007_contact extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('contact', [
            'id' => $this->primaryKey(),
            'person_id' => $this->integer()->notNull(),
            'country_code' =>  $this->string()->notNull(),
            'phone_number' =>  $this->string()->notNull()->unique(),
            'status' =>  $this->integer()->defaultValue(1),
            'deleted_status' =>  $this->integer()->defaultValue(0),
           // 'created_at' =>  $this->timestamp()->defaultValue('CURRENT_TIMESTAMP'),
           // 'updated_at' =>  $this->timestamp()->defaultValue('CURRENT_TIMESTAMP')->append('ON UPDATE CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221117_172007_contact cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221117_172007_contact cannot be reverted.\n";

        return false;
    }
    */
}
