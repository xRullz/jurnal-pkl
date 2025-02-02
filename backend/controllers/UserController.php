<?php

namespace backend\controllers;

use Yii;
use common\models\Dudi;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class UserController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {
            // Hash password sebelum menyimpan
            $password = Yii::$app->request->post('User')['password_hash'];
            if (!empty($password)) {
                $model->password_hash = Yii::$app->security->generatePasswordHash($password);
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldPasswordHash = $model->password_hash;

        if ($model->load(Yii::$app->request->post())) {
            $password = Yii::$app->request->post('User')['password_hash'];
            if (!empty($password)) {
                $model->password_hash = Yii::$app->security->generatePasswordHash($password);
            } else {
                $model->password_hash = $oldPasswordHash;
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
