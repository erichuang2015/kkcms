<?php include('../system/inc.php');
include '../system/list.php';
$page=$_GET['page'];?>
<!DOCTYPE html>
<html>
<head lang="en">
<?php  include 'head.php';
$tv='class="weui-state-active"'?>
<title>追热剧-最新剧集-好看剧集-最新剧集排行-<?php echo $xtcms_seoname;?></title>
<meta name="keywords" content="追热剧-最新剧集-好看剧集-最新剧集排行,<?php echo $xtcms_keywords;?>">
<meta name="description" content="<?php echo $xtcms_description;?>">
<style>
.hy-head-menu .item .menulist li.act a{ border: 0; background: none; border-bottom: 2px solid #09BB07; color: #09BB07;}
</style>
</head>
<body>
<?php include 'header.php'; ?>
<section class="tuijian_box">
<?php echo get_ad(10)?>
    <div class="bgfff shaixuan clearfix">
    <div class="fl leimu_zui"> 
	<?php 
$b=(strpos($_GET['m'],'rank='));
$ye=substr($_GET['m'],$b+5);
?>
		
        <a <?php if ($ye=="rankhot"){echo 'class="on"';}elseif($ye=="createtime" or $ye=="rankpoint"){}else{ echo 'class="on"';};?> href="?m=/dianshi/list.php?rank=rankhot">最近热映</a> 

     
        </div>
    <div class="fr shaixuan_2"><a href="javascript:;" id="shaixuan">条件筛选 <em class="shaixuan_icon"><img src="<?php echo $xtcms_domain;?>wap/style/images/icon_y4_03.jpg"></em></a> </div>
 
  </div>
    
        <div class="lebiao_box bgfff shaixuan" style="display: none">
              <div class="biao_li leibiao clearfix">
        <dt><h2 class="leixing"><a href="?m=/dianshi/list.php?cat=all">全部</a></h2></dt> 
        <div style="width: 90%;float: right">
          <?php
foreach ($cat as $kcat=>$vcat)
{ $flname= $name[$kcat];
if($flname!==伦理){
$flid="/dianshi/list.php?cat=".$vcat.''; 
echo "<dd><a href='?m=$flid'>$flname</a></dd>"; } }
?>    
                       

                        
                        
                        </div>
      </div>
                  <div class="biao_li leibiao clearfix">
        <dt><h2 class="leixing"><a href="?m=/diasnhi/list.php?area=all">全部</a></h2></dt>
        <div style="width: 90%;float: right">
                
<?php

foreach($cat1 as $kcat=>$vcat){$flname=$name1[$kcat];
$flid='/dianshi/list.php?year='.$vcat.'';
echo "<dd><a href='?m=$flid' target='_self'>$flname</a></dd>";}?>

                        
                        </div>
      </div>
                  
      <div class="biao_li leibiao clearfix">
        <dt><h2 class="leixing"><a href="?m=/dianshi/list.php?area=all">全部</a></h2></dt>
        <div style="width: 90%;float: right">
<?php
foreach($cat2 as $kcat=>$vcat){$flname=$name2[$kcat];
$flid='/dianshi/list.php?area='.$vcat.'';
echo "<dd><a href='?m=$flid' target='_self'>$flname</a></dd>";}?>

                        
                        
                        </div>
      </div>
       
         
    </div>
  </div>
  <div class="dianying_box bgfff clearfix content">
    <ul class="clearfix">
<?php
$flid1=$_GET['m'];
if ($flid1==""){
$flid1='/dianshi/list?rank=rankhot';
}
include '../system/360.php';
foreach ($xname as $key=>$xvau){  if ($i<27){$do=$xlist[$key]; 
$do1=$do; 
$cc="./play.php?play="; 
if ($xtcms_wei==1){
$ccb=vod.$do1;
}
else{
$ccb=$cc.$do1;	
}
echo '<li><a href="'.$ccb.'">
<img src="'.$ximg[$key].'"></a>       
<p class="clearfix leimu"><span class="fl"></span><span class="fr">'.$xjishu[$key].'</span></p>
        <a href="'.$ccb.'">
		<span class="biaoti">'.$xvau.'</span></a></li>
        ';
		 $i ++;		 }				

						
 } ?>               
      
 
    </ul>  <div class="hy-page clearfix">
				<ul class="cleafix">
<?php echo getPageHtml($page,$fenye,'tv.php?m='.$yourneed.'&page=');?>
</ul>
			</div>
  </div>

</section>


<?php  include 'footer.php';?>
