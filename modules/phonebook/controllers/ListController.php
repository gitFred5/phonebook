<?php

namespace app\modules\phonebook\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;

class ListController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'except' => ['index'],
                'rules' => [
                    [
//                        'actions' => ['contacts'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],
            ],

/*            'verbs' => [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],*/
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionOffices()
    {
        return $this->render('index');
    }

}