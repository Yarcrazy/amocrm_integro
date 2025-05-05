<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use app\models\Deal;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class DealController extends Controller
{
    /**
     * Создание новой сделки
     */
    public function actionCreate()
    {
        $model = new Deal();
        $model->loadDefaultValues();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return true;
            }
        }

        return false;
    }

    /**
     * Обновление существующей сделки
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException если сделка не найдена
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return true;
            }
        }

        return false;
    }

    /**
     * Поиск модели сделки по ID
     * @param integer $id
     * @return Deal
     * @throws NotFoundHttpException если модель не найдена
     */
    protected function findModel($id)
    {
        if (($model = Deal::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрошенная сделка не найдена');
    }
}