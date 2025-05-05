<?php

use yii\db\Migration;

class m250505_192946_create_table_contact extends Migration
{
    public function safeUp()
    {
        $this->createTable('contacts', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Название контакта'),
            'first_name' => $this->string()->comment('Имя контакта'),
            'last_name' => $this->string()->comment('Фамилия контакта'),
            'created_by' => $this->integer()->comment('ID создавшего пользователя'),
            'created_at' => $this->integer()->notNull()->defaultValue(time())->comment('Дата создания (Unix Timestamp)'),
            'updated_at' => $this->integer()->defaultValue(time())->comment('Дата изменения (Unix Timestamp)'),
            'is_deleted' => $this->boolean()->defaultValue(false)->comment('Удален ли элемент'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('contacts');
    }
}
