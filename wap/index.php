<?php ob_start();
include ('../data/cxini.php');
include('../system/inc.php');
$seach=file_get_contents('https://www.360kan.com/');
$szz="# <a href='(.*?)' class='p0 g-playicon js-playicon' ><img src='(.*?)' alt='(.*?)' /><span class='title'>(.*?)</span><span class='desc'>(.*?)</span><b></b>#";
preg_match_all($szz,$seach,$sarr);
$one=$sarr[1];//标题
$two=$sarr[2];
$three=$sarr[5];
?>
<!DOCTYPE html>
<html>
<head lang="en">
<?php  include 'head.php';?>
<title><?php echo $xtcms_seoname;?></title>
<meta name="keywords" content="<?php echo $xtcms_keywords ;?>">
<meta name="description" content="<?php echo $xtcms_description;?>">
</head>
<body>
<?php  include 'header.php';
?>

<div class="swiper-container swiper-container-horizontal" style="margin:0px 7px 0px 7px;border-radius:5px;">
<?php echo get_ad(2)?>
    <div class="swiper-wrapper">
	

<?php
					 {
						
						$result = mysql_query('select * from xtcms_slideshow order by s_order desc');
						while($row = mysql_fetch_array($result)){
						?>
        <div class="swiper-slide">
            
            <a href="<?php echo $row['s_url'];?>">
           
            <img src="<?php echo $row['s_picture'];?>" width="100%" style="border-radius:6px;height:200px;">
            
			</a>
		<div class="swiper-pagination"></div>
        </div>
<?php
 }

foreach ($one as $ni=>$cs){
$cs= str_replace('https://www.360kan.com', '', "$cs");
 echo '<div class="swiper-slide">
            
            <a href="./play.php?play='.$cs.'">
           
            <img src="'.$two[$ni].'" width="100%" style="border-radius:6px;height:200px;">
            
			</a>
			<div class="swiper-pagination"></div>
        </div>';

}
}?>						

          </div>
                     
      </div>
       
  </div>

<style type="text/css"> 
#gongao{width:100%;overflow:hidden;} 
#gongao #scroll_begin, #gongao #scroll_end{display:inline} 
</style> 
<div class="fhsy_fd" style="z-index: 99;">
    <a href="">
        <img src="<?php echo $xtcms_domain;?>/wap/style/images/fhsy_fd.png">
        </a>
        </div>
<script type="text/javascript"> 
function ScrollImgLeft(){ 
var speed=25; 
var scroll_begin = document.getElementById("scroll_begin"); 
var scroll_end = document.getElementById("scroll_end"); 
var scroll_div = document.getElementById("scroll_div"); 
scroll_end.innerHTML=scroll_begin.innerHTML; 
function Marquee(){ 
if(scroll_end.offsetWidth-scroll_div.scrollLeft<=0) 
scroll_div.scrollLeft-=scroll_begin.offsetWidth; 
else 
scroll_div.scrollLeft++; 
} 
var MyMar=setInterval(Marquee,speed); 
scroll_div.onmouseover=function() {clearInterval(MyMar);} 
scroll_div.onmouseout=function() {MyMar=setInterval(Marquee,speed);} 
} 
</script>
<section class="gonggao_box clearfix">
  <div class="gonggao_box2 clearfix"> <span class="gonggao fl">公告</span>
  
      <div id="gongao" class="fl xianshi" style="width: 82%;height: 27px"> 
        <div style="width:100%;height:27px;margin:0 auto;white-space: nowrap;overflow:hidden;" id="scroll_div" class="scroll_div"> 
        <div id="scroll_begin"> 
         <a class="guanzhu" href="" style="background: none;color: #000"><?php echo $xtcms_gonggao?></a>
        </div> 
        <div id="scroll_end">  
         <a class="guanzhu" href="" style="background: none;color: #000"><?php echo $xtcms_gonggao?></a>
        </div> 
        </div> 
        <script type="text/javascript">ScrollImgLeft();</script> 
        </div>
    
  </div>
</section>

<?php echo get_ad(3)?>
<?php if($xtcms_dianshi==1){?>
<section class="tuijian_box">
  <h2 class="clearfix tuijian bgfff"><em class="dianshiju"></em>今日推荐<a class="fr more" href="clist.php">More<em class="more_icon"></em></a></h2>
  <div class="dianying_box  bgfff clearfix">
    <ul class="clearfix">
<?php  include '../data/zwcx.php'; ?>
	</ul>
  </div>
</section>
<?php }?>	
<?php if($xtcms_qianxian==1){?>
<section class="tuijian_box">
  <h2 class="clearfix tuijian bgfff" ><em class="dianyin"></em>特别推荐<a class="fr more" href="vlist.php?cid=0">More<em class="more_icon"></em></a></h2>
  <div class="dianying_box  bgfff clearfix">
    <ul class="clearfix">      
      <?php $result = mysql_query('select * from xtcms_vod where d_rec=1 order by d_id desc LIMIT 0,9');
		while ($row = mysql_fetch_array($result)){
$cc="./bplay.php?play=";
								$dd="./bplay/";
if ($xtcms_wei==1){
$ccb=$dd.$row['d_id'];
}
else{
$ccb=$cc.$row['d_id'];	
}
if ($row['d_jifen']>0){
$ok="onclick=\"return confirm('此视频为收费视频，观看需要支付".$row['d_jifen']."积分，您是否观看？')\"";
}
else{
$ok="";
}
			echo '<li><a '.$ok.' href="'.$ccb.'"><img src="'.$row['d_picture'].'"></a>
        <span class="fl"></span>
        <a href="'.$ccb.'"><span class="biaoti">'.$row['d_name'].'</span></a></li>';
		

		}?>	
		
      
           
    </ul>
  </div>
</section>

<?php }?>
<?php echo get_ad(4)?>
<?php if($xtcms_dianying==1){?>
<section class="tuijian_box">
  <h2 class="clearfix tuijian bgfff" ><em class="dianyin"></em>电影推荐<a class="fr more" href="./movie.php">More<em class="more_icon"></em></a></h2>
  <div class="dianying_box  bgfff clearfix">
    <ul class="clearfix">      
     <?php  include '../data/dyjx.php'; 
$i=0;
foreach ($namearr[1] as $key => $value) 
{if ($i<9){
$gul=$listarr[1][$key]; 
$_GET['id']=$gul; 
$zimg=$imgarr[1][$key]; 
$zname=$namearr[1][$key]; 
$fname=$fnamearr[1][$key]; 
$nname=$nnamearr[1][$key]; 
$zstar=$stararr[1][$key];
$tok=$gul; 
if ($xtcms_wei==1){
$playurl=vod.$tok;
}
else{
$play='./play.php?play=';
$playurl=$play.$tok;	
}
echo '<li><a href="'.$playurl.'"><img src="'.$zimg.'"></a>';
if ($fname!="") {
echo '<span class="fenshu">'.$fname.'</span>';
} 
echo '<p class="clearfix leimu"><span class="fl"></span><span class="fr">'.$nname.'</span></p>
        <a href="'.$playurl.'"><span class="biaoti">'.$zname.'</span></a></li>'; 
		
		




$i ++;		 }
} ?>

           
    </ul>
  </div>
</section>
<?php }?>
<?php echo get_ad(5)?>

<section class="tuijian_box">
  <h2 class="clearfix tuijian bgfff"><em class="dianshiju"></em>电视剧推荐<a class="fr more" href="./tv.php">More<em class="more_icon"></em></a></h2>
  <div class="dianying_box  bgfff clearfix">
    <ul class="clearfix">
<?php  include '../data/tvjx.php'; 
$i=0;
foreach ($namearr[1] as $key => $value) 
{if ($i<9){
$gul=$listarr[1][$key]; 
$guq=$listarr[1][$key]; $_GET['id']=$gul; 
$zimg=$imgarr[1][$key]; 
$zname=$namearr[1][$key]; 
$nname=$nnamearr[1][$key]; 
$jishu=$xjishu[1][$key]; 
$zstar=$stararr[1][$key]; 
$jiami=$gul; 

 if ($xtcms_wei==1){
$chuandi='./vod'.$jiami;
}
else{
$chuandi='./play.php?play='.$jiami;	
}
echo '<li><a href="'.$chuandi.'"><img src="'.$zimg.'"></a>
        <p class="clearfix leimu"><span class="fl"></span><span class="fr">'.$jishu.'</span></p>
        <a href="'.$chuandi.'"><span class="biaoti">'.$zname.'</span></a></li>'; 


$i ++;		 }
}		 ?>      
    </ul>
  </div>
</section>

<?php echo get_ad(6)?>
<?php if($xtcms_zongyi==1){?>
<section class="tuijian_box">
  <h2 class="clearfix tuijian bgfff"><em class="zongyi"></em>综艺推荐<a class="fr more" href="./zongyi.php">More<em class="more_icon"></em></a></h2>
  <div class="dianying_box clearfix bgfff">
    <ul class="clearfix">
<?php  include '../data/zyjx.php'; 
$i=0;
foreach ($namearr[1] as $key => $value) 
{if ($i<9){
$gul=$listarr[1][$key]; 
$cd=$host.'/alist.php?id='.$gul; 
$guq=$listarr[1][$key]; 
$_GET['id']=$gul; 
$zimg=$imgarr[1][$key]; 
$zname=$namearr[1][$key]; 
$nname=$nnamearr[1][$key]; 
$qishu=$xjishu[1][$key]; 
$zstar=$stararr[1][$key]; 
$jiami=$gul; 
 if ($xtcms_wei==1){
$chuandi='./vod'.$jiami;
}
else{
$chuandi='./play.php?play='.$jiami;	
}
echo '<li><a href="'.$chuandi.'"><img src="'.$zimg.'"></a>
        <p class="clearfix leimu"><span class="fl"></span><span class="fr">'.$nname.'</span></p>
        <a href="'.$chuandi.'"><span class="biaoti">'.$zname.'</span></a></li>'; 
$i ++;		 }
}		 ?>	     
    </ul>
  </div>
</section>
<?php }?>
<?php echo get_ad(7)?>
<?php if($xtcms_dongman==1){?>
<section class="tuijian_box">
  <h2 class="clearfix tuijian bgfff"><em class="dongman"></em>动漫推荐<a class="fr more" href="./dongman.php">More<em class="more_icon"></em></a></h2>
  <div class="dianying_box clearfix bgfff">
    <ul class="clearfix">
<?php  include '../data/dmjx.php'; 
$i=0;
foreach ($namearr[1] as $key => $value) 
{if ($i<9){
$gul=$listarr[1][$key]; 
$cd=$host.'/alist.php?id='.$gul; 
$guq=$listarr[1][$key]; 
$_GET['id']=$gul; 
$zimg=$imgarr[1][$key]; 
$zname=$namearr[1][$key]; 
$nname=$nnamearr[1][$key]; 
$jishu=$xjishu[1][$key]; 
$zstar=$stararr[1][$key]; 
$jiami=$gul; 
 if ($xtcms_wei==1){
$chuandi='./vod'.$jiami;
}
else{
$chuandi='./play.php?play='.$jiami;	
}
echo '<li><a href="'.$chuandi.'"><img src="'.$zimg.'"></a>
        <p class="clearfix leimu"><span class="fl"></span><span class="fr">'.$jishu.'</span></p>
        <a href="'.$chuandi.'"><span class="biaoti">'.$zname.'</span></a></li>';
$i ++;		 }
}		 ?>     
    </ul>
  </div>
</section>
<?php }?>

<?php  include 'footer.php';?>

  <!--生成静态页面开始-->
<?php
$info = ob_get_contents(); 
$filectime = filectime("index.html"); 
if ( !(time() - 3600 * 12 > $filectime) ) { //这里更改缓存刷新时间 默认12小时刷新一次  如果你需要频繁调试首页模版，请把整段代码删除
exit();
}
if ( $handle = @fopen('index.html', 'w') ) { 
@fwrite($handle, $info);
@fclose($handle);
}
?>
  <!--生成静态页面结束-->