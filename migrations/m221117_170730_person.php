<?php

use yii\db\Migration;

/**
 * Class m221117_170730_person
 */
class m221117_170730_person extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('person', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'email_id' =>  $this->string()->notNull()->unique(),
            'status' =>  $this->integer()->defaultValue(1),
            'deleted_status' =>  $this->integer()->defaultValue(0),
           // 'created_at' =>  $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
           // 'updated_at' =>  $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->append('ON UPDATE CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221117_170730_person cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221117_170730_person cannot be reverted.\n";

        return false;
    }
    */
}
