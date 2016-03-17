/*
 * file    : jquery-base.js
 * author  : chao.Radish@gmail.com
 */

//鍒ゆ柇User-Agent
var system={
	win:false,
	mac:false,
	xll:false
};
var platform=navigator.platform;
system.win=platform.indexOf('Win')==0;
system.mac=platform.indexOf('Mac')==0;
system.x11=(platform=='X11')||(platform.indexOf('Linux')==0);
if(system.win){
	document.write('<link href="/Public/Css/font_win.css" rel="stylesheet" type="text/css" />');
}else if(system.mac){
	document.write('<link href="/Public/Css/font_mac.css" rel="stylesheet" type="text/css" />');
}else if(system.xll){
	document.write('<link href="/Public/Css/font_xll.css" rel="stylesheet" type="text/css" />');
}

//jQuery鎻掍欢
(function(jQuery){
	$.fn.focusMap=function(options){        
		var defaults={
			speed:300,
			time:5000,
			play:true
		}
		var options=$.extend(defaults,options);
		
		this.each(function(){
			
			var obj=$(this),
				element=obj.find('li'),
				len=element.size(),
				nowNum=0,
				picTimer=false,
				active=false;
				
			obj.find('ul').show();
				
			if(len<=1) return;
			
			obj.find('.btn a').eq(0).addClass('on');
		
			obj.find('.btn a').click(function(){
				nowNum=obj.find('.btn a').index(this);
				showPics();
			});
			
			obj.find('a.prev').click(function(){
				if(nowNum<=0) nowNum=len;
				nowNum--;
				showPics();
			});
			
			obj.find('a.next').click(function(){
				nowNum++;
				if(nowNum==len) nowNum=0;
				showPics();
			});
			
			element.css({'opacity':0,'z-index':0});
			element.eq(0).css({'opacity':1,'z-index':1});
			element.eq(0).find('img').fadeIn(500);
			
			if(options.play){
				obj.hover(function(){
					clearInterval(picTimer);
				},function(){
					picTimer=setInterval(function(){
						nowNum++;
						if(nowNum==len) nowNum=0;
						showPics();
					},options.time);
				}).trigger('mouseleave');
			}
			
			function showPics(){
				active=true;
				element.css({'z-index':0});
				obj.find('li.on').css({'z-index':1});
				
				element.eq(nowNum).find('img').hide();
				element.eq(nowNum).css({opacity:0,'z-index':2});
				
				element.eq(nowNum).animate({'opacity':1},options.speed,function(){
					jQuery(this).find('img').fadeIn(500);
					jQuery(this).siblings().find('img').fadeOut();
					active=false;
				});
								
				element.removeClass('on').eq(nowNum).addClass('on');
				
				obj.find('.btn a').eq(nowNum).addClass('on').siblings().removeClass('on');
			}
		});
	}
	
	$.fn.albumFoucs=function(options){
		var defaults={
			num:5,
			height:129,
			time:300
		};
		var options=$.extend(defaults,options);
		
		this.each(function(){
			var obj=$(this);
			var list=obj.find('.list');
			var ul=list.find('ul:first');
			var len=list.find('li').length;
			var ulHeight=options.height*len;
			//涓篣L璧嬪€�
			ul.height(ulHeight);
			//鎻掑叆澶у浘
			//var showHtml='<div class="show"></div>';
			//obj.prepend(showHtml);
			
			var show=obj.find('.img');
			//涓虹涓€寮犵缉鐣ュ浘澧炲姞閫変腑鏁堟灉
			list.find('li:first a').addClass('on');
			//鑾峰彇绗竴寮犵缉鐣ュ浘澶у浘璺緞
			var firstSrc=list.find('li:first a').attr('href');
			loadingImg(show,firstSrc);
			
			//鍒ゆ柇缂╃暐鍥炬暟閲�
			if(len>options.num){
				//鍚戝墠婊氬姩鎸夐挳缁戝畾鏂规硶
				obj.find('.prev').live('click',function(){
					scrollPrev();
				});
				//鍚戝悗婊氬姩鎸夐挳缁戝畾鏂规硶
				obj.find('.next').live('click',function(){
					scrollNext();
				});
			}
			//缂╃暐鍥剧偣鍑�
			list.find('li a').bind('click',function(){
				var isSelect=0;
				if($(this).hasClass('on') || $(this).parent().index()==0) isSelect=1;
				//鑾峰彇澶у浘SRC
				var src=$(this).attr('href');
				//鏀瑰彉缂╃暐鍥鹃€変腑鏁堟灉
				$(this).addClass('on').parent().siblings('li').find('a').removeClass('on');
				//濡傛灉缂╃暐鍥炬暟閲忔弧瓒宠姹傚悜鍚庢粴鍔�
				if(len>options.num && isSelect==0){
					scrollNext();
					loadingImg(show,src);
				}else{
					loadingImg(show,src);
				}
				//灞忚斀A鏍囩璺宠浆
				return false;
			});
			//鍔犺浇鍥剧墖
			function loadingImg(obj,src,callback){
				//鍔犺浇绛夊緟鍥炬爣
				obj.html('<i></i>');
				var img=new Image();
				img.src=src;
				
				if(img.complete){
					obj.html(img);
					
					//鍥炶皟鍑芥暟
					if(callback) callback.call(null,callback);
				}else{
					img.onload=function(){
						obj.html(img);
						
						//鍥炶皟鍑芥暟
						if(callback) callback.call(null,callback);
						img.onload=null;
					};
				};
			}
			//鍚戝墠婊氬姩
			function scrollPrev(){
				if(!ul.is(":animated")){
					ul.css('margin-top','-'+options.height+'px').find('li:last').prependTo(ul);
					ul.animate({
						'margin-top':0
					},options.time);
				}
			}
			//鍚戝悗婊氬姩
			function scrollNext(){
				if(!ul.is(":animated")){
					ul.animate({
						'margin-top':'-'+options.height+'px'
					},options.time,function(){
						ul.css('margin-top',0).find('li:first').appendTo(ul);
					});
				}
			}
		});
	};
})(jQuery);

$(function(){
	//TopBar
	var windowWidth=$(window).width();
	//if(windowWidth>1440) $('.topbar').css('left',(windowWidth-1440)/2+'px');
	//浜岀淮鐮�
	$('.topbar .code img').hover(function(){
		var codeLeft=$(this).offset().left-(356-21)/2;
		$('#code').css({'left':codeLeft+'px'}).show();
	},function(){
		$('#code').hide();
	});
	//鏂囨湰妗嗘彁绀�
	$('input,textarea').placeholder();
	//鍙嬫儏閾炬帴
	$('#getFriendly').hover(function(){
		var width=($(this).width()-202)/2;
		var top=$(this).css('marginTop').replace('px','');
		var height=-(48*$('#friendly .box a').length+24+parseInt(top));
		
		$(this).addClass('on');
		$('#friendly').css({'padding-bottom':top+'px','left':width+'px','top':height+'px'}).show();
	},function(){
		$('#friendly').hide();
		$(this).removeClass('on');
	});
	//瀵艰埅
	var getMenuIndex=0
	$(window).load(function(){
		getMenuIndex=$('.header .menu li.on').index();
	});
	$('.header .menu li').hover(function(){
		$(this).addClass('on').siblings().removeClass('on');
		$(this).find('div').show();
	},function(){
		$('.header .menu li').eq(getMenuIndex).addClass('on').siblings().removeClass('on')
		$(this).find('div').hide();
	});
	//婊氬姩鍒伴《閮�
	$('#goto').bind('click',function(){
		 $('html,body').animate({scrollTop:0},500);
	});
	
	//浜岀骇瀵艰埅鍥哄畾
	$(window).scroll(function(){
		var scrollTop=$(this).scrollTop();
		
		if(scrollTop>=618){
			$('.menu_sub').css({'position':'fixed','left':0,'top':0,'z-index':9999999});
			
			if($('#menuBg').length==0) $('.menu_sub').after('<div id="menuBg" style="height:53px; overflow:hidden;"></div>')
		}else{
			if($('#menuBg').length>0) $('#menuBg').remove();
			
			$('.menu_sub').removeAttr('style');
		}
	});
});