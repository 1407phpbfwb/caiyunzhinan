<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>班级列表</title>
<link rel="stylesheet" type="text/css" href="css/erweima-style.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/js.js"></script>
</head>

<body>
<div class="chuda_co" id="container">
  <div class="co-box">
    <div class="title">
      <h4>班级管理>>班级列表</h4>
    </div>
    <div class="right container">
        <div class="custom-info">
            <div class="info-box">
                <ul class="ul-datetime">
                    <li>
                        <label>用户名称：</label>
                        <input type="text" class="w100">
                    </li>
                    <li><a class="btn01">查询</a></li><a class="btn03" href="">新增用户</a><a class="btn02" href="">批量删除</a>
                </ul>
            </div>
        </div>
      <!--detail start-->
      <div class="co-detail clearfix"> 
        <table class="tablelist" border="0" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
                  <th>请选择</th>
                <th>用户ID</th>
                <th>用户名称</th>
                <th>用户邮箱</th>
                <th>最后一次登录时间</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="checkbox" name="" /></td>
                <td>001</td>
                <td>李朋</td>
                <td>861745122@qq.com</td>
                <td>2015-12-07 19:56:30</td>
                <td class="operation"><a class="edit">锁定</a>|<a class="edit">删除</a></td>
              </tr>
              <tr>
                  <td><input type="checkbox" name="" /></td>
                  <td>001</td>
                  <td>李朋</td>
                  <td>861745122@qq.com</td>
                  <td>2015-12-07 19:56:30</td>
                  <td class="operation"><a class="edit">锁定</a>|<a class="edit">删除</a></td>
              </tr>
              <tr>
                  <td><input type="checkbox" name="" /></td>
                  <td>001</td>
                  <td>李朋</td>
                  <td>861745122@qq.com</td>
                  <td>2015-12-07 19:56:30</td>
                  <td class="operation"><a class="edit">锁定</a>|<a class="edit">删除</a></td>
              </tr>
              <tr>
                  <td><input type="checkbox" name="" /></td>
                  <td>001</td>
                  <td>李朋</td>
                  <td>861745122@qq.com</td>
                  <td>2015-12-07 19:56:30</td>
                  <td class="operation"><a class="edit">锁定</a>|<a class="edit">删除</a></td>
              </tr>
            </tbody>
          </table>
          <!--分页 start-->
          <div class="pages">
            <div class="sum">共<i>18</i>条记录</div>
            <div class="pages-btn">
              <a class="pre">上一页</a>
              <div class="num-btn"><a class="pages-current">1</a><a>2</a><a>3</a><a>4</a><a>5</a><a>6</a><a>7</a></div>
              <a class="after">下一页</a>
            </div>
          </div>
          <!--分页 end-->
      </div>
      <!--detail end--> 
    </div>
  </div>
</div>
<div class="pop_layer add-mess">
  <div class="fill-info pop-layer-box">
    <h3 class="title-big">修改班级信息</h3><a class="pop-close">X</a>
    <div class="info-box">
      <ul>
        <li>
          <label>班级名称：</label>
          <input type="text" name="name" class="w200 name" value="">
        </li>
        <li>
          <label>班主任：</label>
          <select class="w200">
            <option>于强</option>
            <option>张三</option>
          </select>
        </li>
        <li>
          <label>讲师：</label>
          <select class="w200">
            <option>李朋</option>
            <option>王五</option>
          </select>
        </li>
      </ul>
    </div>
    <div class="preview"> <a class="preview-btn btn01">保存</a> <a class="cancel-btn btn01">取消</a> </div>
  </div>
</div>
</body>
</html>
