<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理平台</title>

<link href="../css/style.css" rel="stylesheet" type="text/css">

</head>

<body class="login">
<div class="login_logo"><img src="../images/cy_logo.png"></div>
<div class="login_m">
	<form id='form' action="<?php echo Yii::$app->Urlmanager->createUrl('user/login');?>" method="post">
	<div class="login_boder">
		<div class="login_padding">
			<h2>用户名</h2>
			<label>
				<input type="text" name="username" id="username" onblur="checkU()" class="txt_input txt_input2" >
			</label>
			<span><font color="red" id="fint_user"></font></span>
			<h2>密码</h2>
			<label>
				<input type="password" name="password_hash" id="userpwd" class="txt_input">
			</label>
			<span><font color="red" id="fint_pwd"></font></span>
            <!--<h2>验证码</h2>
			<label>
				<input type="text" id="yzm" class="txt_input3" onfocus="if (value ==&#39;******&#39;){value =&#39;&#39;}" onblur="if (value ==&#39;&#39;){value=&#39;******&#39;}" value="******"><img src="images/YZM.png" width="100" height="30" style=" vertical-align:middle" />
			</label>-->
			<div class="rem_sub">
				
				<label>
					<input type="button" class="sub_button" name="button" id="button" onclick="checkU()" value="登录" style="opacity: 0.7;">
				</label>
			</div>
		</div>
	</div><!--login_boder end-->
	</form>
</div><!--login_m end-->

<br />
<br />
</body>
</html>
<script src="../js/jquery.js"></script>
<script>

     function checkU(){
		var username = $('#username').val();
		var pwd = $('#userpwd').val();
      // alert(username);
      if(username == ''){
      	$('#fint_user').html('用户名不能为空!');
      	die;
      } else{
      	$('#fint_user').html('');
      }
    if(pwd == ''){
      	$('#fint_pwd').html('密码不能为空!');
      	die;
      }else{
      	$('#fint_pwd').html('');
      }	
      $('#form').submit();
    }
</script>