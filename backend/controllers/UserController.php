<?php

namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    //允许多次提交
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
//-----------------------------------------------------------------------------------------------------------
    //登陆页面显示
    public function actionLogin(){
        //判断是否点击登陆
        if(Yii::$app->request->post()){
            $username = Yii::$app->request->post('username');
            $pwd = Yii::$app->request->post('password_hash');
            //连接数据库
            $obj = Yii::$app->db;
            //查询用户信息
            $sql = $obj->createCommand("select * from user where username='$username'");
            $user_info=$sql->queryOne();
            $password=$user_info['password_hash'];

            if($user_info['username']){
                
                if($user_info['password_hash'] == $pwd){         //判断密码是否正确
                    //登陆成功时将当前登陆ID存储到session 
                    $session = Yii::$app->session;
                    //开启session
                    $session->open();
                    //将当前登陆用户的ID存入session
                    $session->set('user_id',$user_info['id']);
                    echo $session['user_id'];//可用
                    return $this->redirect(array('index/index'));//登陆成功
                }else{
                   echo "<script>alert('密码不正确')</script>";
                   return $this -> renderPartial('login');      //密码不正确
                }
            }else{
                echo "<script>alert('用户名不存在')</script>";
                return $this -> renderPartial('login');        //用户名不存在
            }
        }else{
            return $this -> renderPartial('login');
        }
    }
//------------------------------------------------------------------------------------------------------------------
    //添加管理员
    public function actionUser_add(){
        return $this -> renderPartial('user_add');
    }
    //管理员列表显示
    public function actionUser_list(){
        return $this -> renderPartial('user_list');
    }
//------------------------------------------------------------------------------------------------------------------
    
}
