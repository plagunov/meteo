<?php

namespace app\controllers;

use app\models\Measurement;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;

class MeasurementController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'create' => ['get'],
                ],
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Получение измерений
     */
    public function actionCreate()
    {
        $model = new Measurement();

        if ($model->load(Yii::$app->request->get()) && $model->validate())
        {
            if ($model->save()) {
                Yii::$app->session->setFlash('successMeasurement', 'Результат измерения успешно получен');
                return $this->refresh();
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}
