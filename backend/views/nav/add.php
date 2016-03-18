<?php 
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
use yii\helpers\Html;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加导航</title>
<link rel="stylesheet" type="text/css" href="../css/erweima-style.css" />
<style>
.form-control{
	display:inline;
	width:20%;
}
#nav-n_img{
	display:inline;
}
</style>
</head>

<body>
<div class="chuda_co" id="container">
  <div class="co-box">
	<div class="title"><h4>导航管理>>添加导航</h4></div>
<?php $form = ActiveForm::begin(['action' => 'index.php?r=nav/add','options' => ['enctype' => 'multipart/form-data'],'method' => 'post']); ?>
<div class="fill-info">
    <div class="info-box">
      <ul>
        <li>
          <?= $form->field($model , 'n_title')->textInput() ?>
        </li>
        <li>
          <?= $form->field($model , 'e_title')->textInput() ?>
        </li>
        <li>
          <?= $form->field($model , 'n_url')->textInput() ?>
        </li>
        <li>
          <?= $form->field($model , 'n_img')->fileInput() ?>
        </li>
        <li>
          <?= $form->field($model , 'n_content')->textInput() ?>
        </li>
        <li>
          <?= $form->field($model , 'n_desc')->textInput() ?>
        </li>
      </ul>

    </div>
    <div class="preview"><?= Html::submitButton('提交',['class'=>'btn btn-primary']) ?></div>
  </div>
  <?php ActiveForm::end(); ?>
</div>
</div>
</body>
</html>

