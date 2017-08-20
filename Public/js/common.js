// JavaScript Document

//通用弹出层触发动作 begin
function showPop(id,className){
  $(".bgIframe").css({
	  "filter":"alpha(opacity=0)",
	  "opacity":"0"
	  });
  $(".bgDiv").css({
	  "filter":"alpha(opacity=50)",
	  "opacity":"0.5"
	  });  
  $(id).addClass(className).fadeIn(10,function(){
	  	var	popHeight = $(''+id+'.popWrap,'+id+' .popWrap_sub,'+id+' .popIframe');
		var h=$(''+id+' .popBox').height();//获取高度
		popHeight.height(h);
		$(".bgIframe,.bgDiv").fadeIn(200);
	  });
   return false;	  
}
	  
//关闭弹层窗口
function hidePop(id,className){
	$(''+id+',.bgIframe,.bgDiv').fadeOut(function(){
		   $(this).removeClass(className);
		   $(''+id+'.popWrap,'+id+' .popWrap_sub,'+id+' .popIframe').height('');
		})
}
//---------- end

//js无缝滚动代码
function marquee(i, direction){
	var obj = document.getElementById("marquee" + i);
	var obj1 = document.getElementById("marquee" + i + "_1");
	var obj2 = document.getElementById("marquee" + i + "_2");
	if (direction == "up"){
		if (obj2.offsetTop - obj.scrollTop <= 0){
			obj.scrollTop -= (obj1.offsetHeight + 20);
		}else{
			var tmp = obj.scrollTop;
			obj.scrollTop++;
			if (obj.scrollTop == tmp){
				obj.scrollTop = 1;
			}
		}
	}else{
		if (obj2.offsetWidth - obj.scrollLeft <= 0){
			obj.scrollLeft -= obj1.offsetWidth;
		}else{
			obj.scrollLeft++;
		}
	}
}

function marqueeStart(i, direction){
	var obj = document.getElementById("marquee" + i);
	var obj1 = document.getElementById("marquee" + i + "_1");
	var obj2 = document.getElementById("marquee" + i + "_2");

	obj2.innerHTML = obj1.innerHTML;
	var marqueeVar = window.setInterval("marquee("+ i +", '"+ direction +"')", 20);
	obj.onmouseover = function(){
		window.clearInterval(marqueeVar);
	}
	obj.onmouseout = function(){
		marqueeVar = window.setInterval("marquee("+ i +", '"+ direction +"')", 20);
	}
}

$(function(){
	//右侧飘浮
	$(".oul1>li").on("mouseover",function(){
		$(this).addClass("on");
	}).on("mouseout",function(){
		$(this).removeClass("on");
	})

	//查看更多抽奖信息
	$(".toggleShow").on("click",function(){
		if($(this).hasClass("on")){
			$(this).removeClass("on");
			$(this).html("点击查看更多抽奖信息<em></em>");
			$(".actOne_box3").hide();
			$(".box0_con").css("height","1380");
			$(".box0_bg").css("height","1116");
			location.href="#guize"
		}else{
			$(this).addClass("on");
			$(this).html("点击收起更多抽奖信息<em></em>");
			$(".actOne_box3").show();
			$(".box0_con").css("height","1800");
			$(".box0_bg").css("height","1536");
			location.href="#guize"
		}
	})
	$(".chakan").on("click",function(){
		location.href="#guize";
	})
})



