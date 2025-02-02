<?php

namespace backend\controllers;

use Yii;
use common\models\Pembimbing;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PembimbingController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Pembimbing::find(),
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
        $model = new Pembimbing();
        $userModel = new User();

        if ($userModel->load(Yii::$app->request->post())) {
            $userModel->username = Yii::$app->request->post('User')['username'];
            $userModel->email = Yii::$app->request->post('User')['email'];
            $userModel->password_hash = Yii::$app->security->generatePasswordHash(Yii::$app->request->post('User')['password_hash']);
            $userModel->role = 'pembimbing';
            $userModel->status = 10;

            if ($userModel->save()) {
                $model->user_id = $userModel->id;

                if ($model->load(Yii::$app->request->post())) {
                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'userModel' => $userModel,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = Pembimbing::findOne($id);
        $userModel = User::findOne($model->user_id);

        if ($model === null || $userModel === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        if ($userModel->load(Yii::$app->request->post()) && $userModel->validate()) {
            $userModel->username = Yii::$app->request->post('User')['username'];
            $userModel->email = Yii::$app->request->post('User')['email'];

            $password = Yii::$app->request->post('User')['password_hash'];
            if (!empty($password)) {
                $userModel->password_hash = Yii::$app->security->generatePasswordHash($password);
            }

            if ($userModel->save()) {
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'userModel' => $userModel,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Pembimbing::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
