<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=9" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/public/admin/css/css.css" />
<link type="text/css" rel="stylesheet" href="/public/admin/css/jbox.css"/>
<link href="/public/admin/css/Mbmber.css?2016031605" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/public/admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/public/admin/css/style.css">
<!-- qingfu -->
<link type="text/css" rel="stylesheet" href="/public/admin/css/y_style.css"/> 
<!--end -->
	<link rel="stylesheet" type="text/css" href="/public/admin/css/kefu.css" />
<link rel="stylesheet" type="text/css" href="/public/admin/css/headerandfooter.css">
<script language=javascript type="text/javascript" src="/public/admin/js/jquery.js"></script>
<script language=javascript src="/public/admin/js/jquery.jBox.min.js" type=text/javascript></script>
<script language=javascript src="/public/admin/js/jquery.jBoxConfig.js" type=text/javascript></script>
<script  type="text/javascript" src="/public/admin/js/ui.core.js"></script>
<script  type="text/javascript" src="/public/admin/js/ui.tabs.js"></script>
<script type="text/javascript" src="/public/admin/js/WdatePicker.js" language="javascript"></script>
<script language="javaScript" type="text/javascript" src="/public/admin/js/backtotop.js"></script>
<script type="text/javascript" src="/public/admin/js/utils.js"></script>
<script type="text/javascript" src="/public/admin/js/jquery.artDialog.source.js?skin=aero"></script>
<script type="text/javascript">
	function makevar(v){
		var d={};
		for(i in v){
			var id = v[i];
			d[id] = $("#"+id).val();
			if(!d[id]) d[id] = $("input[name='"+id+"']:checked").val();
		}
		return d;
	}
	function ajaxGetData(url,targetid,data){
			if(!url) return;
			data = data||{};
			var thtml = '<div class="loding"><img src="/public/admin/images/008.gif"align="absmiddle" /></div>';
			$("#"+targetid).html(thtml);
			
			$.ajax({
				url: url,
				data: data,
				timeout: 10000,
				cache: true,
				type: "get",
				dataType: "json",
				success: function (d, s, r) {
					if(d) $("#"+targetid).html(d.html);
				},
				error: '',
				complete: ''
			});
		
	}
	var currentUrl = window.location.href.toLowerCase();
	$(document).ready(function() {
		$('#rotate > ul').tabs();/* 第一个TAB渐隐渐现（{ fx: { opacity: 'toggle' } }），第二个TAB是变换时间（'rotate', 2000） */
		$('.dw_navlist li a').click(function() { // 绑定单击事件
			var nowurl = $(this).attr('href');
			var vid = nowurl.split("#");
			try{
				if(currentUrl.indexOf(vid[0]) != -1 ){
					$('#rotate > ul').tabs('select', "#"+vid[1]); // 切换到第三个选项卡标签
					var geturl= $('#rotate > ul li a [href="#'+vid[1]+'"]').attr("ajax_href");
					ajaxGetData(geturl,vid[1]);
					return false;
				}
			}catch(ex){};
				return true;
		});
		
		$('.ajaxdata a').click(function(){
			var geturl = $(this).attr('ajax_href');
			var hasget = $(this).attr('get')||0;
			var nowurl = $(this).attr('href');
			var vid = nowurl.split("#");
			if(hasget!=1) ajaxGetData(geturl,vid[1]);
			$(this).attr('get','1');
			$('html,body').animate({scorllTop:0},1000);
			return false;
		})
	});
	//ui
    function addBookmark(title, url) {
        if (window.sidebar) {
            window.sidebar.addPanel(title, url, "");
        }
        else if (document.all) {
            window.external.AddFavorite(url, title);
        }
        else if (window.opera && window.print) {
            return true;
        }
    }
    function SetHome(obj, vrl) {
        try {
            obj.style.behavior = 'url(other/.cn/member/charge#fragment-1/#default#homepage)'; obj.setHomePage(vrl);
            NavClickStat(1);
        }
        catch (e) {
            if (window.netscape) {
                try {
                    netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
                }
                catch (e) {
                    alert("抱歉！您的浏览器不支持直接设为首页。请在浏览器地址栏输入“about:config”并回车然后将[signed.applets.codebase_principal_support]设置为“true”，点击“加入收藏”后忽略安全提示，即可设置成功。");
                }
                var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
                prefs.setCharPref('browser.startup.homepage', vrl);
            }
        }
    }
        $(function() {
            $(".dw_navlist li,.dv_r_5 li").mousemove(function() {
                $(this).addClass("current");
            }).mouseout(function() {
                $(this).removeClass("current");
            });
        });
</script>
<body>
    
<!-- <div class="sub_banner" style="width:100%; height:320px; background:url(/Style/Stock/img/sub_bannerr.jpg) no-repeat center;">
</div> -->
<title>我的账户-- 手投网</title>


<style>

.zixunbox {

    background: none repeat scroll 0 0 #fff;

    left: 50%;

    margin-left: -116px;

    margin-top: -256px;

    position: fixed;

    top: 50%;

    z-index: 1004;

}







.zixunbox ul li {

    border-bottom: 1px dashed #c8c8c8;

    height: 47px;

    line-height: 47px;

    margin: 0 20px;

    overflow: hidden;

}

.zixunbox .over_icon{

	background-image:url("images/over_icon.png");



    height: 21px;

    position: absolute;

    right: -10px;

    top: -10px;

    width: 20px;

    z-index: 1003;

}



.zixunbox ul li a {

    background-image: url("images/qq_icon.png");

	background-repeat:no-repeat;

	background-position:0px center;

    color: #858585;

    display: inline-block;

    height: 47px;

    text-indent: 20px;

    width: 92px;

}

.zixunbox p {

    background: url("images/dianh.png");

	background-repeat:no-repeat;

	background-position:40px center;

    color: #2382ba;

    font-size: 16px;

    padding-bottom: 20px;

    padding-left: 30px;

    padding-top: 20px;

    text-align: center;

}

.zixunbox h3 {

    margin-bottom: 10px;

    margin-top: 20px;

    text-align: center;

}

.zixunbox span {

    display: block;

    padding-bottom: 20px;

    

    text-align: center;

}



.NewYear{

    width: 100%;

    position: relative;

    height: 112px;

    overflow: hidden;

    background: url(images/NewYear_01_02.png) no-repeat center center;

    background-size: 1920px 112px;

    filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='images/NewYear_01_02.png',sizingMethod='scale'); 

}



.NewYear>img.NewYear_close{

    position: absolute;

    display: block;

    width: 35px;

    right: 5px;

    top: 5px;

    cursor: pointer;

    opacity: 0.8;

    filter:alpha(opacity=80);       /* IE */

    -moz-opacity:0.8;              /* 老版Mozilla */

    -khtml-opacity:0.8;              /* 老版Safari */

}

.NewYear>img.NewYear_close:hover{

    opacity: 1;

    filter:alpha(opacity=100);       /* IE */

    -moz-opacity:100;              /* 老版Mozilla */

    -khtml-opacity:100;              /* 老版Safari */

    

}

/*奥运标志*/

    .nav_main .OlympicBox{float:left;margin-left:15px;padding:20px 0;}

</style>

<!-- <div class="NewYear">

        <img src="/public/admin/images/NewYear2_03.png" class="NewYear_close"/>

    </div>

    <script>

        $(".NewYear_close").on("click",function(){

            $(".NewYear").animate({

                "height":"0"

            })

        })

    </script> -->

<!--导航-->



<div class="top">

	<div class="top_main">

		<span class="top_l"><img style="vertical-align: middle;" src="/public/admin/images/phone.png" width="15" height="15">客服热线：400-047-5588</span>

        <span class="top_m">

            <em class="wx_fade_box"><img src="/public/admin/images/index_new_5_1a.png" width="18" height="15" style="margin-right:5px;vertical-align: middle;">微信<img src="/public/admin/images/index_new_5_2a.png" width="6" height="3" style="margin-left:5px;vertical-align: middle;"></em>

            <em class="wx_fade_box2" style="display:none;"><img src="/public/admin/images/index_new_5_1b.png" width="18" height="15" style="margin-right:5px;vertical-align: middle;">微信<img src="/public/admin/images/index_new_5_2b.png" width="6" height="3" style="margin-left:5px;vertical-align: middle;"></em>

            <em class="wx_fadeinbox" style="display:none;line-height: 20px;">

                <img src="/public/admin/images/index_new_6.jpg" width="124" height="124">

                <i>扫码注册，领<strong style="font-weight:normal;color:#f52f1b;">百元红包</strong></i> 

                <i><a href="/help/weixin" target="_blank" style="color:#0ca1d2;">查看详情>></a></i>

            </em>

        </span>

        <span class="top_r">

            <a href="/help/help" >帮助中心</a>

            <a href="/member/index" class="new_name">17600972628</a>&nbsp;&nbsp;

            <a href="/member/msg#fragment-1" >消息(4)</a>

            <a href="/Member/common/actlogout" >退出</a>

        </span>

	</div>        

</div>

<script type="text/javascript">

	//顶部微信

    $(".top_main .top_m").hover(function(){

        $(this).find(".wx_fade_box2").show();

        $(this).find(".wx_fade_box").hide();

        $(this).find(".wx_fadeinbox").show();

    },function(){

        $(this).find(".wx_fade_box2").hide();

        $(this).find(".wx_fade_box").show();

        $(this).find(".wx_fadeinbox").hide();

    });

</script>

    <div class="nav">

	<div class="nav_main">

    	<div class="logo"><a href="/" target="_blank"><p><img alt="" style="height: 65px; width: 309px; float: none; margin: 0px;" src="/public/admin/images/20170307223459.jpg" /></p></a></div>

<div class="nav_list">

<div id="topnavbar" style="display: block;">

    <div id="topnanv">

	<div class="my_zh"></div>

<div class="defu nav_cur"> <a href="/index.html">首页</a> </div>

<div class="defu nav_cur"><a href="/freestock/index" target="_blank">热销活动</a></div>

<div  class="defu nav_cur" class="posbox"> <a  id="invest" href="/invest/index">我要出借</a></div>

<div  class="defu nav_cur"><a id="borrow" href="/capital/index">我要借款</a></div>

<div class="defu nav_cur"> <a  id="xinshou"  href="/Help/novice" target="_blank">新手指引</a> </div>

<div id="anvlfteb">

<div selec="youhui" class="posbox nav_cur"><a  id="jianjie" href="/aboutus/jianjie.html">信息披露</a> <i></i></div>

<div id="seledbox" class="posiabox" style="display: none; left: 1px;"></div>

                </div>

              </div>

            </div>

        </div>

    </div>

</div>



<script type="text/javascript">



/* 导航 */

$(function(){

	var $anvlfteb=$('#anvlfteb'),

		$posbox=$anvlfteb.find('div.posbox'),

		$seledbox=$("#seledbox"),

		anvjson={

			bbs:'<a href="/invest/index">出借产品</a>'

				/*+'<a href="/invest/index?type=search&&stock_type=2">月月盈</a>'+

				'<a href="/invest/index?type=search&&stock_type=4">打新宝</a>'+

                '<a href="/debt/index">债权转让</a>'*/

				,

        	news:'<a href="/daystock/index">按天融资</a>'+

				'<a href="/Monthstock/index">按月融资</a>'+

				'<a href="/Imtrader/index">我是操盘手</a>',

        	 post:'<a href="/Help/novice">新手指引</a>',

			youhui:'<a href="/aboutus/jianjie.html">公司简介</a>'+

			'<a href="/aboutus/anquan.html">安全保障</a>'+

			'<a href="/aboutus/tdjs.html">团队介绍</a>'+

			'<a href="/aboutus/zizhi.html">证件资质</a>'+

			'<a href="/aboutus/licheng.html">发展历程</a>'+

			'<a href="/aboutus/lianxi.html">联系我们</a>'+

			'<a href="/aboutus/yingcai.html">诚聘英才</a>'+

			'<a href="/aboutus/partner.html">友情链接</a>'+

			'<a href="/help/platform_data">平台数据</a>'

		};

		 



		$posbox.mouseover(function(){

           var i=$(this).index();

           $(this).addClass("anvh").siblings().removeClass("anvh");

                  //$seledbox.find(".new_point").show();

           var selec=$(this).attr("selec");

           if($seledbox.is(":hidden")){

              $seledbox.show(200).css("left",100*i+1).html("<em class='new_point'>"+"</em>"+"<div>"+anvjson[selec]+"</div>")



           }else{

              $seledbox.show(200).animate({left:100*i+1},200,function(){

                 $("#seledbox").html("<em class='new_point'>"+"</em>"+"<div>"+anvjson[selec]+"</div>")

              })

           }

        });

		$anvlfteb.mouseleave(function(){

			$seledbox.hide();

			$posbox.removeClass("anvh");

		});

        var href = window.location.href;

        var a=$(".nav_cur")[0].getElementsByTagName("a");

        for(var i=0;i<a.length;i++){

            a[i].className="";

            if(href.indexOf('invest')>0){

                $("#invest").addClass("current");

            }else if(href.indexOf('capital')>0){

                $("#borrow").addClass("current");

            }else if(href.indexOf('novice')>0){

                $("#xinshou").addClass("current");

            }else if(href.indexOf('aboutus')>0){

                $("#jianjie").addClass("current");

            }else{

                $("#index").addClass("current");

            }

        }

})



/*微博二维码显示效果*/



$(document).ready(function() {

 	$(".footer .footerC .guanzhu span a").hover(function() {

 		$(this).children('img').show()

 	}, function() {

 		$(this).children('img').hide()

 	});



 })



</script>

<script type="text/javascript">



    var dl_num=$(".header .main dl").length;

    for(var i=0;i<dl_num;i++){

        var dd_num=$(".header .main dl:eq("+i+") dd").length;

        if(dd_num<=1){

            $(".header .main dl:eq("+i+") dd").remove();

            $(".header .main dl:eq("+i+") dt em").remove();

        }

    }



</script>





<script type="text/javascript">

    function bodyTop(){

        $("html,body").animate({

            scrollTop:"0px"

        },1000);

    }

	$(".header .main .fr dl dd").css("float","none");

</script>

<script type="text/javascript">

$(function(){

	$(".kefu").click(function(){

		$(".zixunbox").fadeIn("slow");

		$(".body_box").fadeIn("slow");

	});

	$(".liuyan").click(function(){

		$(".liuy_box").fadeIn("slow");

		$(".body_box").fadeIn("slow");

	});

	

	$(".over_icon").click(function(){

		$(".zixunbox").fadeOut("slow");

		$(".body_box").fadeOut("slow");

		$(".liuy_box").fadeOut("slow");

	});

	

	$(".over_cionn").click(function(){

		$(".video").fadeOut("slow");

	});

});



    $(".header .fr dl").hover(function(){

        $(".header .fr dl dd").stop();

        $(".header .fr dl dd").hide();

        $(this).children("dd").fadeIn(500);

    },function(){

        $(this).children("dd").fadeOut(500);

    });

$(window).scroll(function(){

    var topnum=$(window).scrollTop();

    if(topnum>510){

        $(".header").addClass("header-on");

    }else{

        $(".header").removeClass("header-on");

    }

});

</script>







<div class="float-box"></div>

<script type="text/javascript">

    var w_width= $(window).width();

    $(window).resize(function(){

        w_width= $(window).width();

        fix_hie(w_width);

    });

    function fix_hie(w_wid){

        if(w_wid<1340){

            $("body").addClass("body-small");

            $(".float-login").fadeOut(500);

        }else{

            $("body").removeClass("body-small");

            $(".float-login").fadeIn(500);



        }

    }

    fix_hie(w_width);



    $(".float-box").click(function(){

        if($(".float-login").css("display")=="none"){

            $(".float-login").fadeIn(500);

        }else{

            $(".float-login").fadeOut(500);

        }

    });

</script>







<!--页眉end-->
<!--中部开始-->
<div class="wrap2">
	<div id="hy_left">
		<div class="user_list" > <a class="dw_top" href="/member" style=" background:#e74a4a; border:0px; color:#fff; font-size:18px;">帐户总览</a>
  <div id="dw_m_left">
  
    <div class="dv_r_5" > <a class="bt3"><span></span>资金管理</a> </div>
    <div class="dw_navlist">
      <ul>
        <li><a href="/member/capital#fragment-2">资金流水</a></li>     
        <li><a href="/member/charge#fragment-1">我要充值</a></li>
        <li><a href="/member/withdraw#fragment-1">我要提现</a></li>
        <li><a href="/member/bank#fragment-1">银行帐户</a></li>
        <li><a href="/member/myinterestrate#fragment-1">我的加息券<img src="/Style/images/quan.gif" style="display: inline-block;height:16px;vertical-align: middle;margin: -2px 0 0 2px;"></a></li>
      </ul>
    </div>
    
    <div class="dv_r_5"> <a class="bt5"><span></span>理财管理</a> </div>
    <div class="dw_navlist">
      <ul>
        <li><a href="/member/tendout#fragment-3">投标记录</a></li>
        <!-- <li><a href="/member/current#fragment-1">活期理财</a></li> -->
		<li><a href="/member/borrowin#fragment-3">借款记录</a></li>
<!-- 		<li><a href="/member/debt#fragment-1">债权转让</a></li> 
 -->        <!--<li  class="last"><a href="/member/auto/index.html">自动投标</a></li>-->
      </ul>
    </div>
	
  
  <!---
	<div class="dv_r_5"> <a class="bt4"><span></span>股票配资</a> </div>
    <div class="dw_navlist">
      <ul>
        <li><a href="/member/daystock#fragment-1">按天配资</a></li>
        <li><a href="/member/Monthstock#fragment-1">按月配资</a></li>
        <li><a href="/member/Imtrader#fragment-1">我是操盘手</a></li>
        <li><a href="/member/Freestock#fragment-1">免费体验</a></li>
      </ul>
    </div>
	-->
	<div class="dv_r_5" > <a class="bt7"><span></span>邀请好友</a></div>
    <div class="dw_navlist">
      <ul>
        <li><a href="/member/promotion#fragment-1">邀请好友<img src="/public/admin/images/mac-xin.gif" style="display: inline-block;height:16px;vertical-align: middle;margin: -2px 0 0 2px;"></a></a></li>
        <li><a href="/member/promotion#fragment-2">奖金记录</a></li>
      </ul>
    </div>
	
    <div class="dv_r_5" > <a class="bt6"><span></span>基本设置</a> </div>
    <div class="dw_navlist">
		<ul>
			<li><a href="/member/memberinfo#fragment-1">基本资料</a></li>
			<li><a href="/member/user#fragment-1">头像与密码</a></li>
			<li><a href="/member/verify?id=1#fragment-2">认证中心</a></li>
	   <li><a href="/member/sign">电子签章</a></li> 
	 
	    	
			<li><a href="/member/index/evaluateresult?score=&classification=&info=&answerNum=">风险承受能力评估</a></li>		</ul>
    </div>
  
  </div>
</div>
<!--<script type="text/javascript">
dw_solid =function (a,b,c){
var a1=$(a).children(),
b1=$(a).children(b),
c1=$(a).children(c),
lh=location.href;
lh=lh.split(location.host)[1];
c1.hide();
lh=="/member/verify?id=1#fragment-3" && a1.eq(1).show();
b1.each(function(){
var next=$(this).next(),
index=next.index(),
sp=$('span',this),
sibp=$('span',$(this).siblings(b)),
aa=$('a',next);
aa.each(function(){
var ah=$(this).attr('href');
if(lh==ah){
a1.eq(index).show();
sp.addClass('on');
}
});
$(this).click(function(){
sp.toggleClass('on');
sibp.removeClass('on');
next.slideToggle().siblings(c).slideUp();
})
});
}
dw_solid("#dw_m_left",".dv_r_5",".dw_navlist");
$(window).load(function(){
$('body,html').animate({scrollTop:0},1);
});
</script>-->
	</div>
	
	<script type="text/javascript">
	$("#dw_m_left li:eq(1) a").css({"color":"#008CB4","font-weight":"bold"});
	</script>
	<div id="hy_right">
            <div class="box">
				<div class="Menubox1" id="rotate">
					<ul class="menu ajaxdata">
						<li><a href="#fragment-1" ajax_href="/Member/charge/charge/">在线充值</a></li>
						<!-- <li><a href="#fragment-3" ajax_href="/Member/charge/chargeoff/">线下充值</a></li> -->
						<!--<li><a href="#fragment-4" ajax_href="/Member/charge/chargealipay/">支付宝充值</a></li>-->
						<!--<li><a href="#fragment-5" ajax_href="/Member/charge/chargeatm/">线下充值</a></li>-->
						<li><a href="#fragment-2" ajax_href="/Member/charge/chargelog/">充值记录</a></li>
					</ul>
				</div> 
				<div class="contentright">
					<div id="fragment-1" style="display:none">
						<!--充值总表-->
					</div>
					<div id="fragment-2" style="display:none">
						<!--借记卡充值-->
					</div>
					<!-- <div id="fragment-3" style="display:none"> -->
						<!--线下充值-->
					<!-- </div> -->
					<div id="fragment-4" style="display:none">
						<!--支付宝充值-->
					</div>
					<div id="fragment-5" style="display:none">
						<!--ATM充值-->
					</div>
				</div>
			</div>
    </div>
</div>
<div class="VdFooter">
        <div class="footer">
            <!-- <div class="footerT">
                <span class="yqlj">友情链接:</span>
                <p>
                                </p>
            </div> -->
            <div class="footerC">
                <div class="f_l">
                    <p><span><a href="/aboutus/partner.html" target="_blank">友情链接</a></span>
                    <span><a href="/aboutus/yingcai.html" target="_blank">诚聘英才</a></span>
                    <span><a href="/aboutus/lianxi.html" target="_blank">联系我们</a></span>
                    <span style="display: none"><a href="/Index/download" target="_blank">交易软件</a></span>
                    <span><a href="/aboutus/anquan.html" target="_blank">安全保障</a></span>
                    <span><a href="/xueyuan/redian.html" >文投学院</a></span>
                    </p>
                    <div class="guanzhu">
                        <span class="txt1">关注我们</span>
                        <span><a class="wb" ><img style="float:none;margin:0px;" alt="" src="/public/admin/images/20150709172433.png" /></a></span>
                        <span><a class="wx" ><img alt="" style="float:none;margin:0px;" src="/public/admin/images/20150716110549.jpg" />&nbsp;</a></span>
                        <span class="txt2" style="display: none">手机手投</span>
                        <span style="display: none"><a class="pg" >广告未上传或已过期</a></span>
                        <span style="display: none"><a class="az">广告未上传或已过期</a></span>
                    </div>
                </div>
                <div class="kefu">
                    <span>客服电话</span><br/>
                    <span class="nber">400-047-5588</span><br/>
                    <span class="wangzhi"><p>kf@ishoutou.com</p></span>
                    <p><span style="padding:0;">网贷有风险，投资需谨慎</span></p>
                </div>
            </div>
            <div class="footerB">
                <p>
                    <span style="display: none"><a class="tu1" href="http://http://webscan.360.cn/" target="_blank"></a></span>
                    <span style="width: 130px;"><a style="width: 130px;" class="tu2" id='___szfw_logo___' href='javascript:;' ></a></span>
                    <span><a class="tu6" href="javascript:;" ></a></span>
                    <span><a class="tu7" href="javascript:;" ></a></span>
                    <span style="display: none"><a class="tu3" href="http://kx.zw.cn" target="_blank"></a></span>
                    <span style="display: none"><a class="tu4" href="http://www.cec9000.com" target="_blank"></a></span>
                    <span style="display: none;"><a class="tu5" href="http://www.ccig.org.cn" target="_blank"></a></span></p>
                    <p></p>
                    <p>©2015&nbsp;手投网 (www.ishoutou.cn) All&nbsp;Rights&nbsp;Reserved&nbsp;|&nbsp;北京手投网投资控股有限公司&nbsp;|&nbsp;京ICP备15028302号&nbsp;|&nbsp;京ICP证160127号&nbsp;|&nbsp;<font style="cursor:pointer;" onclick="javascript:window.open('http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010702001418')" ><img alt="" src="/public/admin/images/beian.png" /> 京公网安备 11010702001418号</font></p>
                    <p>版权所有：手投网</p>
                    <p></p>
                    <p></p>
            </div>
        </div>
    </div>
    
<!-- new kefu -->
<div class="tools_bar" id="tools_bar">
    <ul class="kfBox">
        <li class="qqKf">
            <a class="icon1" href="javascript:;"></a>
            <div class="qqKf_list" style="display: none;">
                <p><a href="tencent://Message/?Uin=2853950306&websiteName=客服1号&Menu=yes">客服1号</a></p><p><a href="tencent://Message/?Uin=2853950300&websiteName=客服2号&Menu=yes">客服2号</a></p><p><a href="tencent://Message/?Uin=2853950301&websiteName=客服3号&Menu=yes">客服3号</a></p>                <span></span>
                <p class="last"><a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=0b54bf9b1e47d54b596651b0539ef7ee0a04c8f7cdcab2d03a3a1da1b1a32c7a">QQ群：239166306</a></p>            </div>
        </li>
        <li class="hotLine">
            <a class="icon2" href="javascript:;"></a>
            <div class="qqKf_list2" style="display: none;">
                <p class="first">400-047-5588</p><span></span>
                <p>工作日9:00-18:00</p>
            </div>
        </li>
        <li class="index_calculator">
            <a class="icon3" href="/tool/tool2.html" target="_blank"></a>
        </li>
        <li class="index_top">
            <a class="icon4" href="javascript:;" style="display:none;"></a>
        </li>
        <li class="index_invite">
            <a class="icon5" href="http://www.ishoutou.cn/Help/yaoqing" target="_blank"><img src="/public/admin/images/invite.png" width="123" height="130"></a>
        </li>
    </ul>
</div>
<script type='text/javascript'>(function(){document.getElementById('___szfw_logo___').oncontextmenu = function(){return false;}})();</script>
<link type="text/css" rel="stylesheet" href="/public/admin/css/kf.css?v=20160829"/>
<script>
    $(function(){
        $(".kfBox .qqKf").hover(
                function(){
                    $(this).find(".icon1").addClass("on");
                    $(this).find(".qqKf_list").show();
                },
                function(){
                    $(this).find(".icon1").removeClass("on");
                    $(this).find(".qqKf_list").hide();
                }
        );
        $(".kfBox .hotLine").hover(
                function(){
                    $(this).find(".icon2").addClass("on");
                    $(this).find(".qqKf_list2").show();
                },
                function(){
                    $(this).find(".icon2").removeClass("on");
                    $(this).find(".qqKf_list2").hide();
                }
        );
        $(".kfBox .index_calculator").hover(
                function(){
                    $(this).find(".icon3").addClass("on");
                },
                function(){
                    $(this).find(".icon3").removeClass("on");
                }
        );
        $(".kfBox .index_top").hover(
                function(){
                    $(this).find(".icon4").addClass("on");
                },
                function(){
                    $(this).find(".icon4").removeClass("on");
                }
        );
    });
    $(function(){ 
        $(function () {
            $(window).scroll(function(){
                if ($(window).scrollTop()>100){
                    $(".index_top .icon4").fadeIn(0);
                }
                else
                {
                    $(".index_top .icon4").fadeOut(0);
                }
            });
            $(".index_top .icon4").click(function(){
                $('body,html').animate({scrollTop:0},0);
                return false;
            });
        });
    });
</script>
<!-- en kefu-->
    <div style="display: none"><!-- 百度监控代码 -->

<script>

var _hmt = _hmt || [];

(function() {

  var hm = document.createElement("script");

  hm.src = "https://hm.baidu.com/hm.js?fa25924969831380d1c11ec35ee65b5f";

  var s = document.getElementsByTagName("script")[0]; 

  s.parentNode.insertBefore(hm, s);

})();

</script></div>