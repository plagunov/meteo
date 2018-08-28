<?php

use yii\db\Migration;

/**
 * Class m180821_185228_measurement_table
 */
class m180821_185228_measurement_table extends Migration
{
    private $tableName = 'measurement';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'time' => $this->dateTime(),
            'temperature' => $this->float(1),
        ]);

        $this->createIndex('measurementTime', $this->tableName, 'time');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('measurementTime', $this->tableName);
        $this->dropTable($this->tableName);
    }
}
