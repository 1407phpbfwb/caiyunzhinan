<?php

namespace backend\controllers;

use Yii;
use backend\models\NavForm;
use yii\web\UploadedFile;
use yii\db\Command;
/*
 * 管理导航栏目
 * auth:fwb  2016-03-17 
 */

class NavController extends \yii\web\Controller
{
	/*展示*/
    public function actionIndex()
    {
        return $this->renderPartial('index');
    }
	/*添加导航*/
    public function actionAdd(){
    	$model = new NavForm();
    	/*通过$model->load()将表单提交的值传递入模型层，以完成自动验证*/
    	if($model->load(Yii::$app->request->post())){
    		//var_dump($_POST);exit;
    		$img = $model->n_img = UploadedFile::getInstance($model, 'n_img');
            //var_dump($model->upload());exit;
            if ($model->upload()) {
                $n_img = $img->name;
                $nav = Yii::$app->request->post('NavForm');
                //执行添加
                $res = Yii::$app->db->createCommand()->insert('nav',[
					'n_title'   => $nav['n_title'],
                	'e_title'   => $nav['e_title'],
                	'n_url'     => $nav['n_url'],
                	'n_content' => $nav['n_content'],
                	'n_desc'	=> $nav['n_desc'],
                	'n_img'     => $n_img
                ])->execute();
                if($res){
                	echo '添加成功';
                }else{
                	echo '添加失败';
                }
            }else{
            	echo '失败';
            }
    	}else{
    		return $this->renderPartial('add' , ['model'=>$model]);
    	}
	}
	/*前台导航栏目展示*/
	public function actionNavList(){
		$sql = "select * from nav";
		//echo $sql;exit;
		$nav_info = Yii::$app->db->createCommand($sql)->queryAll();
		//var_dump($nav_info);
		return $this->renderPartial('index',['nav_info' => $nav_info ]);
	}
}
