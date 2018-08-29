<?php

namespace app\controllers;

use app\models\Measurement;
use Yii;
use yii\data\ActiveDataProvider;
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
        $query = Measurement::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ],
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Получение измерений
     */
    public function actionCreate()
    {
        $model = new Measurement();

        $model->time = date('Y-m-d H:i:s');
        $model->temperature = Yii::$app->request->get('temperature');

        if ($model->validate() && (Yii::$app->params['importKey'] == Yii::$app->request->get('importKey')))
        {
            if ($model->save()) {
                Yii::$app->session->setFlash('successMeasurement', 'Результат измерения успешно получен');
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}
