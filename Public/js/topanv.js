
/* 导航 */
$(function(){
	var $anvlfteb=$('#anvlfteb'),
		$posbox=$anvlfteb.find('div.posbox'),
		$seledbox=$("#seledbox"),
		anvjson={
			bbs:'<a href="#">天天盈</a>'+
				'<a href="#">月月盈</a>'+
				'<a href="#">债权转让</a>',
        	news:'<a href="#">按天配资</a>'+
				'<a href="#">按月配资</a>'+
				'<a href="#">我是操盘手</a>',
        	post:'<a href="#">新手指引</a>',
        	youhui:'<a href="#">安全保障</a>'+
				'<a href="#">联系我们</a>',
        	/*other:'<a href="#">抚州快讯</a>'+
				'<a href="#">抚州教育</a>'+
				'<a href="#">国内新闻</a>'+
				'<a href="#">军事快讯</a>',
        	store:'<a href="#">抚州快讯</a>'+
				'<a href="#">抚州教育</a>'+
				'<a href="#">江西快讯</a>'+
				'<a href="#">国内新闻</a>'+
				'<a href="#">军事快讯</a>'*/
		};
		 

		$posbox.mouseover(function(){
			var i=$(this).index();
			$(this).addClass("anvh").siblings().removeClass("anvh");
			var selec=$(this).attr("selec");
			if($seledbox.is(":hidden")){
				$seledbox.show().css("left",100*i+1).html("<div>"+anvjson[selec]+"</div>")
			}else{
				$seledbox.stop().animate({left:100*i+1},200,function(){
					$("#seledbox").html("<div>"+anvjson[selec]+"</div>")
				})
			}
		});
		$anvlfteb.mouseleave(function(){
			$seledbox.hide();
			$posbox.removeClass("anvh");
		})
})

/*微博二维码显示效果*/

$(document).ready(function() {
 	$(".footer .footerC .guanzhu span a").hover(function() {
 		$(this).children('img').show()
 	}, function() {
 		$(this).children('img').hide()
 	});

 })