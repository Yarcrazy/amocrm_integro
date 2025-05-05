<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Contact;

class ContactController extends Controller
{
    /**
     * Создание нового контакта
     */
    public function actionCreate()
    {
        $model = new Contact();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return true;
        }

        return false;
    }

    /**
     * Редактирование существующего контакта
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return true;
        }

        return false;
    }

    /**
     * Находит модель контакта по ID
     */
    protected function findModel($id)
    {
        if (($model = Contact::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Контакт не найден');
    }
}