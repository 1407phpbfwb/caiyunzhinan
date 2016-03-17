<?php

namespace frontend\controllers;

class ContactController extends \yii\web\Controller
{
	//贵宾反馈
    public function actionTicking()
    {
        return $this->renderPartial('ticking');
    }

}
