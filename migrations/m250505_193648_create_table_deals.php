<?php

use yii\db\Migration;

class m250505_193648_create_table_deals extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('deals', [
            'id' => $this->primaryKey()->comment('ID сделки'),
            'name' => $this->string()->notNull()->comment('Название сделки'),
            'price' => $this->integer()->defaultValue(0)->comment('Бюджет сделки'),
            'created_by' => $this->integer()->comment('ID создавшего пользователя'),
            'closed_at' => $this->integer()->comment('Дата закрытия (Unix Timestamp)'),
            'created_at' => $this->integer()->defaultValue(time())->comment('Дата создания (Unix Timestamp)'),
            'updated_at' => $this->integer()->comment('Дата изменения (Unix Timestamp)'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('deals');
    }
}
