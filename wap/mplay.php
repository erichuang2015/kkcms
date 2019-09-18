<?php 
include ('../data/cxini.php'); //加载最新尝鲜链接地址
include ('../system/inc.php'); //加载配置文件
error_reporting(0); //关闭错误报告
$zhan = $zwcx["zhanwai"];
$url = $_SERVER["HTTP_HOST"];
$jiejie = substr($url, 0 - 7, 7);
$jia0 = base64_encode($jiejie);
$jia = md5($jia0);
$b = strpos($jia, "a");
$c = strpos($jia, "z");
$ye = substr($jia, $b, $b - $c - 1);
$jia1 = md5($jia);
$d = strpos($jia1, "s");
$e = strpos($jia1, "0");
$ye1 = substr($jia1, $d, $d - $e - 3);
$jia3 = base64_encode($ye1);
$jia2 = md5($jia3);
$f = strpos($jia2, "W");
$g = strpos($jia2, "5");
$ye2 = substr($jia2, $f, $f - $g - 5);
$jiami0 = $ye1 . $ye2 . $ye;
$jiami = base64_encode($jiami0);
if ($_GET["url"]) {
	$link = base64_decode($_GET["url"]);
	$idd = $_GET["id"];
	$timu = $_GET["name"];
	if ($idd == 2) {
		$fang = $link;
	} else {
		if ($idd == 1) {
			$play = $link;
			$fang = "/jx.php?url=" . $play;
		} else {
			$mso = substr(strrchr($link, "="), 1);
			$link = file_get_contents($zhan . "index.php/play/index/" . $mso);
			$name = "#<h3>&nbsp;&nbsp;(.*?)</h3>#";
			$jishu = "#<li><a id=\"(.*?)\" href=\"/index.php/play/index/(.*?)\">(.*?)</a></li>#";
			$bobo = "#<iframe8899 src=\"(.*?)\" marginwidth=\"0\" marginheight=\"0\" border=\"0\" scrolling=\"no\" frameborder=\"0\" topmargin=\"0\" width=\"100%\" height=\"100%\"></iframe>#";
			preg_match_all($name, $link, $nmarr);
			preg_match_all($jishu, $link, $jjarr);
			preg_match_all($bobo, $link, $bfarr);
			$timu = $nmarr[1][0];
			$iidd = $jjarr[1];
			$ljie = $jjarr[2];
			$jjshu = $jjarr[3];
			$bofang = $bfarr[1][0];
			$b = strpos($bofang, "/y");
			$c = strpos($bofang, "e/");
			$ye = substr($bofang, $b + 2, $c - 1);
			if ($ye == "unparse") {
				$fang = $zhan . $bofang;
			} else {
				$fang = $bofang;
			}
		}
	}
} else {
	$mso = $_GET["mso"];
	$link = file_get_contents($zhan . "index.php/play/index/" . $mso);
	$name = "#<h3>&nbsp;&nbsp;(.*?)</h3>#";
	$jishu = "#<li><a id=\"(.*?)\" href=\"/index.php/play/index/(.*?)\">(.*?)</a></li>#";
	$bobo = "#<iframe8899 src=\"(.*?)\" marginwidth=\"0\" marginheight=\"0\" border=\"0\" scrolling=\"no\" frameborder=\"0\" topmargin=\"0\" width=\"100%\" height=\"100%\"></iframe>#";
	preg_match_all($name, $link, $nmarr);
	preg_match_all($jishu, $link, $jjarr);
	preg_match_all($bobo, $link, $bfarr);
	$timu = $nmarr[1][0];
	$iidd = $jjarr[1];
	$ljie = $jjarr[2];
	$jjshu = $jjarr[3];
	$bofang = $bfarr[1][0];
	$b = strpos($bofang, "/y");
	$c = strpos($bofang, "e/");
	$ye = substr($bofang, $b + 2, $c - 1);
	if ($ye == "unparse") {
		$fang = $zhan . $bofang;
	} else {
		$fang = $bofang;
	}
}
$result1 = mysql_query('select * from xtcms_vod_class where c_id='.$d_parent.' order by c_id asc');
while ($row1 = mysql_fetch_array($result1)){
$c_hide=$row1['c_hide'];
}
$d_scontent = explode(',', $xtcms_shoufei);
for ($i = 0; $i < count($d_scontent); $i++) {
    if ($timu == $d_scontent[$i]) {
        //提示错误值
        alert_href('对不起,您的观看的视频已经下架,请到官网观看.谢谢!', '' . $xtcms_domain . '');
    }
}
if($c_hide>0){
if(!isset($_SESSION['user_name'])){
		alert_href('请注册会员登录后观看',''.$xtcms_domain.'wap/login.php');
	};
    $result = mysql_query('select * from xtcms_user where u_name="'.$_SESSION['user_name'].'"');//查询会员积分
     if($row = mysql_fetch_array($result)){
	 $u_group=$row['u_group'];//到期时间
     }
 if($u_group<=1){//如果会员组
 alert_href('对不起,您不能观看会员视频，请升级会员！',''.$xtcms_domain.'wap/user.php?op=open');
 } 
}
include('system/shoufei.php');
if($d_jifen>0){//积分大于0,普通会员收费
	if(!isset($_SESSION['user_name'])){
		alert_href('请注册会员登录后观看',''.$xtcms_domain.'wap/login.php');
	};
    $result = mysql_query('select * from xtcms_user where u_name="'.$_SESSION['user_name'].'"');//查询会员积分
     if($row = mysql_fetch_array($result)){
     $u_points=$row['u_points'];//会员积分
     $u_plays=$row['u_plays'];//会员观看记录
     $u_end=$row['u_end'];//到期时间
	 $u_group=$row['u_group'];//到期时间
     }	

	     if($u_group<=1){//如果会员组
     if($d_jifen>$u_points){
	 alert_href('对不起,您的积分不够，无法观看收费数据，请充值续费！',''.$xtcms_domain.'wap/user.php?op=open');
    }  else{

    if (strpos(",".$u_plays,$d_id) > 0){ 

	}	
	//有观看记录不扣点
else{

   $uplays = ",".$u_plays.$d_id;
   $uplays = str_replace(",,",",",$uplays);
   $_data['u_points'] =$u_points-$d_jifen;
   $_data['u_plays'] =$uplays;
   $sql = 'update xtcms_user set '.arrtoupdate($_data).' where u_name="'.$_SESSION['user_name'].'"';
if (mysql_query($sql)) {

alert_href('您成功支付'.$d_jifen.'积分,请重新打开视频观看!',''.$xtcms_domain.'bplay.php?play='.$d_id.'');
}
}
	
}
}
}
if($d_user>0){	
if(!isset($_SESSION['user_name'])){
		alert_href('请注册会员登录后观看',''.$xtcms_domain.'wap/login.php');
	};
    $result = mysql_query('select * from xtcms_user where u_name="'.$_SESSION['user_name'].'"');//查询会员积分
     if($row = mysql_fetch_array($result)){
     $u_points=$row['u_points'];//会员积分
     $u_plays=$row['u_plays'];//会员观看记录
     $u_end=$row['u_end'];//到期时间
	 $u_group=$row['u_group'];//到期时间
     }		 
if($u_group<$d_user){
	alert_href('您的会员组不支持观看此视频!',''.$xtcms_domain.'ucenter/mingxi.php');
}
}

?><!DOCTYPE HTML>
<html>
<head lang="en">
<?php  include 'head.php';?>
<title>《<?php echo $timu;?>》-正在播放-<?php echo $xtcms_seoname;?></title>
<meta name="keywords" content="<?php echo $timu; ?>,<?php echo $xtcms_keywords;?>">
<meta name="description" content="<?php echo $timu; ?>,<?php echo $xtcms_description;?>">
</head>
<body class="vod-play">
<?php include 'header.php'; ?>
<div class="container">
<div class="row"  style="margin-top:10px"><?php echo get_ad(2)?></div>
	<div class="row">
		<div class="hy-player clearfix">
			<div class="item">
				<div class="col-md-9 col-sm-12 padding-0">
					<div class="info embed-responsive "  id="cms_player">
					<img id="addid" src="" style="display: none;width:100%;border: 0px solid #FF6651"><div id="shiping_box"></div>
					<a style="display:none" id="videourlgo" href=""></a>
<script type="text/javascript"> 

          function run(){
        var s = document.getElementById("timer");      
        if(!s){          
            return false;
        }else{
          s.innerHTML = s.innerHTML * 1 - 1;
        }
        
    }
    window.setInterval("run();", 1000);
	$('#shiping_box').html('<div style="text-align:center;width:100%;height:255px;"><?php echo get_ad(1)?></div><div id="timer"></div>');

    //设置延时函数
    function adsUp(){    
        $("#shiping_box").html('<iframe allowFullscreen="true" src="<?php echo $fang;?>" id="video" style="width:100%;height:255px;border:none" allowtransparency="true" allowfullscreen="true" frameborder="0" scrolling="no"></iframe>');  
    }
    //五秒钟后自动收起
    var t = setTimeout(adsUp,<?php echo $xtcms_miaoshu*1000;?>); 
    
</script>

<section class="sanguo_box bgfff">
 <span style="font-size: 15px;color: #ff4306">温馨提示：尝鲜资源可能加载较慢，请您耐心等待片刻。</span>
<div class="fr lianjie_box_y9">  <a href="javascript:;" onclick="$('.weui-share').show().addClass('fadeIn');"><em class="icon icon-3" style="margin-right: 10px"></em></a>  
<a href="<?php echo $xtcms_domain;?>wap/addfav.php?title=<?php echo $timu; ?>&dizhi=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>"><em class="icon icon-48" style="font-size: 19px;"></em></a> </div>
<section class="sanguo_box bgfff">
    <h2 class="sanguo_h2" id="xuji"></h2>
	
</section>


<div class="weui-share" onClick="$(this).fadeOut();$(this).removeClass('fadeOut')">
<div class="weui-share-box">
点击右上角发给朋友<i></i> 
</div>
</div> 
<span id="title" class="title" ></span>
<style type="text/css">
  .jishi_box2 ul li:nth-child(5n){ margin-right:0;} 
</style>
<section class="jishi_box_y9 p_r">
 
  <div class="jishi_box2">
  <ul class="clearfix">
<?php
foreach ($iidd as $key => $iddd) {
	$lianjie = "mplayo.php?mso=" . $ljie[$key];
?>
<li><a href='<?php echo $lianjie;?>'> <?php echo $jjshu[$key];?></a></li>

<?php
}
?>
              
  </ul>
  </div>
</section>
<script type="text/javascript">
	var al = $('.jishi_box2 a');
	al.attr('class','am-btn am-btn-default lipbtn');
	var ji= new Array();
	var btnji= new Array();
	for(var g=0;g<al.length;g++){
		ji.push(al[g].href);
		btnji.push(al[g].id);
		al[g].href = 'javascript:void(0)';
		al[g].target = '_self';
		al.eq(g).attr('onclick','bofang(\''+ji[g]+'\',\''+btnji[g]+'\')');
	};
</script>
<script type="text/javascript">
var tishi = ('正在为您播放《<?php echo $timu;?>》');
document.getElementById('xuji').innerHTML = tishi;
	function bofang(mp4url,jiid){
		var tishi = ('正在为您播放《<?php echo $timu;?>》 '+jiid+'');
		document.getElementById('xuji').innerHTML = tishi;
		document.getElementById('video').src=''+mp4url;
		
				//点击之后
document.getElementById('xuji').style.display='block';
document.getElementById('video').style.display='none';
function test() {
			document.getElementById('video').style.display='block';
		}
		setTimeout(test, 0);
	};
</script>
<?php echo get_ad(13)?>

<div class="tcenter page-hd">
  <a href="javascript:;" class="weui_btn weui_btn_warn weui_btn_inline" id="shang">赏</a>
  <p class="page-hd-desc" style="text-align: center;">→_→土豪给打赏个呗←_←</p>  
</div>
<div id="dashang" style="display: none">  
  <img src="<?php echo $xtcms_dashang; ?>" style="border-radius: 50%;width: 100px;height: 100px">
  <p style="text-align: center;">喜欢就打赏个小红包吧</p>
  <p style="text-align: center;"><b style="font-size: 20px;color:red" class="shang_fee"></b>元</p>
  <p style="text-align: center;"><a href="javascript:;" onClick="generateMixed(2)">随机更换</a> <a href="javascript:;" onClick="shuru()">输入金额</a></p>
<script>
var shang_fee = $(".shang_fee").text();
if (!shang_fee) {
 var num = 1 * Math.random();    
 $(".shang_fee").text(num.toFixed(2));
}
function generateMixed(n) {
    var num = 10*Math.random();    
    $(".shang_fee").text(num.toFixed(2));
}
function shuru(n) { 
    $(".shang_fee").html('<input class="weui_input shuru" placeholder="请输入金额" type="text" style="width: 54%;border: 1px solid #ccc;border-radius: 50px;height: 1.2em;line-height: 1.2em;text-align: center;margin-right: 6px;">'); 
}
</script>

</div>
<section class=" bgfff">
 <div class="bgfff pinglun_box"> <div class="clearfix tuijian caini_xihuan bgfff p_r"><em class="kuai"></em><h2 class="pinglun_h2 clearfix">评论<span class="f14"></span><a class="fr woyao_shuo" href="javascript:;" id="sd3">我要说两句</a></h2></div></div> 
<div class="pinglun_box2">
<?php echo $xtcms_changyan; ?>

</div>
</section> 
<script>

    $("#shang").click(function(){ 
       var dashang = $("#dashang").html();        
       $.modal({    
          title:'',     
          text: dashang,
          buttons: [
            { text: "打赏", onClick: function(){
               var shang_fee = $(".shuru:eq(1)").val();
               if (!shang_fee) {
                  var shang_fee = $(".shang_fee:eq(1)").text();
               }                           
               var url = "<?php echo $xtcms_domain;?>wap/shang.php?fee="+shang_fee;
               window.location.href=url;
            } },
            // { text: "微信支付", onClick: function(){ $.alert("你选择了微信支付"); } },
            { text: "取消", className: "default"},
          ]
        });
    }); 
    $("#shoucang").click(function(){       
      $.get("",function(data,status){ 
         $.toast(data); 
      });       
    }); 

  
    var swiper = new Swiper('.swiper-container', {
          pagination: '.swiper-pagination',
          nextButton: '.swiper-button-next',
          prevButton: '.swiper-button-prev',
          paginationClickable: true,
          centeredSlides: true,
          autoplay: 2500,
          autoplayDisableOnInteraction: false
      });

</script>

<?php include 'footer.php'; ?>
<script type="text/javascript ">
					$MH.limit = 10;
					$MH.WriteHistoryBox(200, 170, 'font');
					$MH.recordHistory({
						name: '<?php echo $d_name; ?>',
						link: '<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>',
						pic: '/m-992/uploads/allimg/201706/a0a13289528feabb.jpg'
					})
				</script>

