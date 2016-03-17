<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增班级</title>
<link rel="stylesheet" type="text/css" href="../css/erweima-style.css" />
</head>

<body>
<div class="chuda_co" id="container">
  <div class="co-box">
	<div class="title"><h4>用户管理>>新增管理员</h4></div>
<div class="fill-info">
    <div class="right">
        <a class="btn02" href="<?php echo Yii::$app->Urlmanager->createUrl('user/user_list');?>">管理员列表</a>
    <div class="info-box">
      <ul>
        <li>
          <label>管理员名称：</label>
          <input type="text" name="name" class="w200 name" value="">
        </li>
          <li>
              <label>设置密码：</label>
              <input type="text" name="name" class="w200 name" value="">
          </li>
          <li>
              <label>确认密码：</label>
              <input type="text" name="name" class="w200 name" value="">
          </li>
          
          <li>
              <label>分配权限：</label>
              <input type="checkbox" name="name" value="">&nbsp;&nbsp;校长&nbsp;&nbsp;
              <input type="checkbox" name="name" value="">&nbsp;&nbsp;院长&nbsp;&nbsp;
              <input type="checkbox" name="name" value="">&nbsp;&nbsp;主任&nbsp;&nbsp;
              <input type="checkbox" name="name" value="">&nbsp;&nbsp;讲师&nbsp;&nbsp;
              <input type="checkbox" name="name" value="">&nbsp;&nbsp;班主任&nbsp;&nbsp;
          </li>
      </ul>
    </div>
    <div class="preview"> <a class="preview-btn btn01">保存</a> <a class="cancel-btn btn01">取消</a> </div>
  </div>
</div>
</div></div>
</body>
</html>
