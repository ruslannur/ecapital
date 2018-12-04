<?php

namespace app\module\comment\controllers;

use Yii;
use yii\web\Controller;
use app\module\comment\models\Comments;

/**
 * Default controller for the `comment` module
 */
class CommentsController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionContent()
    {
        return $this->renderPartial('comment');
    }

    public function actionCreate()
    {
        $model = new Comments();

        if ($model->load(Yii::$app->request->post())) {
            //print_r($model);
            $model->content = htmlspecialchars($model->content);
            $model->created_at = date('Y-m-d  h:m:s');
            if($model->save()) {
                return 'success';
            }
            return 'error';
        }
        //echo 'test';
        return 'error';
    }
}
