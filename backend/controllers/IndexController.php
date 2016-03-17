<?php

namespace backend\controllers;
use Yii;
use backend\models\User;
use backend\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;
class IndexController extends \yii\web\Controller
{
	//后台显示页面
    public function actionIndex()
    {
        //查看当前登陆用户
        $session = Yii::$app->session;
        //开启session
        $session->open();
        $user_id=$session->get('user_id');
        if(empty($user_id)){
            echo "<script>alert('请先登陆')</script>";
            return $this -> redirect(array('user/login')); 
        }else{
            return $this->renderPartial('index');
        }      
    }
    //头部
    public function actionTop()
    {
        //查看当前登陆用户
        $session = Yii::$app->session;
        //开启session
        $session->open();
        $user_id=$session->get('user_id');
        //查询当前登陆用户
        $obj=Yii::$app->db;
        $name=$obj->createCommand("select username from user where id='$user_id'")->queryOne();
        $username=$name['username'];
    	//查询当前时间
        return $this->renderPartial('top',array('username'=>$username));
    }
    //左侧
    public function actionLeft()
    {
        return $this->renderPartial('left');
    }
    //右侧
    public function actionRight()
    {
        return $this->renderPartial('right');
    }
    //用户退出
    public function actionQuit(){
        $session = Yii::$app->session;
        //开启session
        $session->open();
        unset($session['user_id']);
        return $this -> redirect(array('user/login')); 

        
    }

}
