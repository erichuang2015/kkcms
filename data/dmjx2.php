<?php
if ($xtcms_dongmannew==0){
$dmurllist='http://www.360kan.com/dongman/list.php?rank=createtime&pageno=1'; 
}
elseif($xtcms_dongmannew==1){
$dmurllist='http://www.360kan.com/dongman/list.php?rank=rankhot&pageno=1'; 
}
mkdir('./data');
mkdir('./data/runtime');
$gxpd=time()-filemtime('./data/runtime/'.md5($dmurllist));
if($gxpd>2*60*60){
$dminfo=file_get_contents($dmurllist);
file_put_contents('./data/runtime/'.md5($dmurllist),gzdeflate($dminfo));
}	
$dminfo=gzinflate(file_get_contents('./data/runtime/'.md5($dmurllist)));

$vname='#<span class="s1">(.*?)</span>#';//影片名称
$fname='#<span class="s2">(.*?)</span>#';//评分
$nname='#<span class="hint">(.*?)</span>#';//年份
$vlist='#<a class="js-tongjic" href="(.*?)">#';//链接
$vstar='# <p class="star">(.*?)</p>#';//主演
$vvlist='#<div class="s-tab-main">[\s\S]+?<div monitor-desc#';//获取图片区域
$vimg='#<img src="(.*?)">#'; //图片
$array = array(); 
preg_match_all($vname, $dminfo,$dmnamearr); //影片名称
preg_match_all($vlist, $dminfo,$dmlinkarr);//链接 
preg_match_all($vstar, $dminfo,$dmzhuyanarr);//主演 
preg_match_all($vvlist, $dminfo,$imglist);
$zcf=implode($glue, $imglist[0]);
preg_match_all($vimg, $zcf,$dmimgarr); //图片
preg_match_all($fname, $dminfo,$dmpingfenarr); //评分
preg_match_all($nname, $dminfo,$dmyeararr);// 年份

?>