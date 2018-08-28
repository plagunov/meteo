<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Модель результата измерения
 * Class MeasurementModel
 * @package app\models
 *
 * @property int $id
 * @property string $time
 * @property string $temperature
 */
class Measurement extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%measurement}}';
    }

    public function rules()
    {
        return [
            [['time', 'temperature'], 'required'],
            ['time', 'datetime', 'format' => 'php: Y-m-d H:i:s'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => '№',
            'time' => 'Дата измерения',
            'temperature' => 'Температура',
        ];
    }
}