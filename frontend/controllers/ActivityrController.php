<?php

namespace frontend\controllers;

class ActivityrController extends \yii\web\Controller
{
	//节日活动页面
    public function actionFetival_activity()
    {
        return $this->renderPartial('fetival_activity');
    }
    //节日活动详情页
    public function actionFetival_activity_detail(){
    	return $this->renderPartial('fetival_activity_detail');
    }
    //经典套餐页面
    public function actionWtown_club(){
    	return $this->renderPartial('wtown_club');
    }
    //套餐详情页
    public function actionWtown_club_detail(){
		return $this->renderPartial('wtown_club_detail');
    }
}
