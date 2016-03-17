<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>头部</title>
<link rel="stylesheet" type="text/css" href="../css/erweima-style.css" />
<script type="text/javascript" src="../js/login.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>	  
</head>

<body>
<div class="wrap">
	<div class="whole-top">
    <span class="name"><script type="text/javascript">LoadBlogParts();</script></span>
	<span><img src="../images/cyzn_logo.png" alt="彩云之南管理系统" /></span>
    <div class="login">
    <!--登录后 start-->
    <div class="login-after">
      <span>欢迎<font color="#000000"><?php echo $username;?></font>登陆</span>
      <a class="exit" href="<?php echo Yii::$app->Urlmanager->createUrl('index/quit');?>" target="_top" >退出</a>
    </div>
    <!--登录后 end-->
  </div>
  </div>
</div>
</body>
</html>
<!--时间-->
<script type="text/javascript">
$(function(){
	$(".btn").click(function(){
	var left = ($(window).width()*(1-0.35)) /2;//box弹出框距离左边的额距离
	var height =  ($(window).height()*(1-0.5)) /2;
	
   $(".box").addClass("animated bounceIn").show().css({left:left,top:top});
   $(".opacity_bg").css("opacity","0.3").show();
   });
  
  
   $(".colse").click(function(){
	 
	var left=($(window).width()*(1-0.35))/2;
	var top=($(window).height()*(1-0.5))/2;
	$(".box").show().animate({
		width:"-$(window).width()*0.35",
		height:"-$(window).height()*0.5",
		left:"-"+left+"px",
		top:"-"+top+"px"
		},1000,function(){
			 var width1 = $(window).width()*0.35;
			 var height1 =$(window).height()*0.5;
			 console.log(width1);
			$(this).css({width:width1,height:height1}).hide();
		});

   });
});
</script>
