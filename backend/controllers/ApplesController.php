<?php

namespace backend\controllers;

use backend\models\Apple;
use backend\models\AppleStatus;
use Yii;
use backend\models\AppleColors;
use yii\data\ActiveDataProvider;
use backend\models\Apples;
use yii\web\NotFoundHttpException;
use yii\behaviors\TimestampBehavior;

class ApplesController extends \yii\web\Controller
{

    /**
     * Lists all Apples models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Apples::find(),
        ]);

        // запуск проверки на гнилые из числа упавших
        Apples::getAllRotten();


        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return mixed
     */
    public function actionCreate()
    {
        $count = rand(5, 10);
        $models = [];
        for ($i = 0; $i < $count; $i++) {
            $color = AppleColors::getRandColors();
            $model = new Apple($color);
            if ($model->save())
            {
                $models[] = $model->id;
            }

        }
        if (count(array_diff($models, array(''))) > 0) {
            Yii::$app->session->addFlash('success', sprintf('Создано %s яблок', count(array_diff($models, array('')))));
        }
        else
            Yii::$app->session->addFlash('danger', 'Нельзя создать яблоки без цвета');

        return $this->redirect('index');
    }

    /**
     * Падение яблока
     */
    public function actionDrop($id)
    {

        $model = $this->findModel($id);

        if (!$model->canDrop()) {
            Yii::$app->session->addFlash('danger', sprintf('Яблоко %s не может упасть', $id));
            return $this->redirect('index');
        }

        $model->status = AppleStatus::STATUS_ON_GROUND;
        $model->fell_at = time();

        if ($model->save()) {

            Yii::$app->session->addFlash('success', sprintf('Яблоко %s упало', $id));
            return $this->redirect('index');
        }
        return $this->redirect('index');
    }

    /**
     * Поедание яблока
     */
    public function actionEat($id)
    {
        $model = $this->findModel($id);
        $model->load(Yii::$app->request->post());

        if (!$model->eat((int)$model->percent))
        {
            Yii::$app->session->addFlash('warning', sprintf('Яблоко %s нельзя кусить', $id));
            return $this->redirect('index');
        }
        Yii::$app->session->addFlash('success', sprintf('Яблоко %s откушено на %d процентов', $id, $model->percent));
        return $this->redirect('index');
    }

    /**
     * Удаление яблока
     */
    public function actionDelete($id)
    {

        $this->findModel($id)->delete();

        return $this->redirect('index');
    }

    /**
     * Откат времени падения яблок
     */
    public function actionUptime()
    {

        Apples::Uptime();
        return $this->redirect('index');
    }


    /**
     * Finds the Apples model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Apples the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Apples::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Такого яблока не существует');
        }
    }

}
