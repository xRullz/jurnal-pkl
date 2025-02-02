<?php

namespace backend\controllers;

use Yii;
use common\models\Kegiatan;
use common\models\Pembimbing;
use common\models\Siswa;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\HttpException;
use yii\web\UploadedFile;

class KegiatanController extends Controller
{
    public function actionIndex()
    {
        $userId = Yii::$app->user->identity->id;
        $userRole = Yii::$app->user->identity->role;
        $siswa = Siswa::find()->where(['user_id' => $userId])->one();
        $pembimbing = Pembimbing::find()->where(['user_id' => $userId])->one();

        if ($userRole === 'siswa') {
            $dataProvider = new ActiveDataProvider([
                'query' => Kegiatan::find()->where(['siswa_id' => $siswa->id]), 
            ]);
        } elseif ($userRole === 'pembimbing') {
            $siswaIds = Siswa::find()
                ->select('id')
                ->where(['pembimbing_id' => $pembimbing->id])
                ->column();

            $dataProvider = new ActiveDataProvider([
                'query' => Kegiatan::find()->where(['siswa_id' => $siswaIds]),
            ]);
        } else {
            $dataProvider = new ActiveDataProvider([
                'query' => Kegiatan::find(),
            ]);
        }

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
        $model = new Kegiatan();

        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'bukti');
            if (isset($image)) {
                $explodedName = explode('.', $image->name);
                $extension = strtolower(end($explodedName));
                $temporaryName = Yii::$app->security->generateRandomString() . ".{$extension}";

                if (in_array($extension, ['jpg', 'jpeg', 'png', 'webp', 'jfif'])) {
                    $path = Yii::getAlias('@webroot/uploads/' . $temporaryName);
                    if ($image->saveAs($path)) {
                        $model->bukti = 'uploads/' . $temporaryName;
                    }
                } else {
                    throw new \yii\web\BadRequestHttpException('Invalid image format.');
                }
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
        $oldBuktiHadir = $model->bukti;

        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'bukti');
            if (isset($image)) {
                $explodedName = explode('.', $image->name);
                $extension = strtolower(end($explodedName));
                $temporaryName = Yii::$app->security->generateRandomString() . ".{$extension}";

                if (in_array($extension, ['jpg', 'jpeg', 'png', 'webp', 'jfif'])) {
                    $path = Yii::getAlias('@webroot/uploads/' . $temporaryName);
                    if ($image->saveAs($path)) {
                        if ($oldBuktiHadir && file_exists(Yii::getAlias('@webroot/' . $oldBuktiHadir))) {
                            unlink(Yii::getAlias('@webroot/' . $oldBuktiHadir));
                        }
                        $model->bukti = 'uploads/' . $temporaryName;
                    }
                } else {
                    throw new \yii\web\BadRequestHttpException('Invalid image format.');
                }
            } else {
                $model->bukti = $oldBuktiHadir;
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
        $model = $this->findModel($id);
        $buktiHadirPath = Yii::getAlias('@webroot/' . $model->bukti);

        if ($model->bukti && file_exists($buktiHadirPath)) {
            unlink($buktiHadirPath);
        }
        $model->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Kegiatan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
