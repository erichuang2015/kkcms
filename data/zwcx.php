<?php
error_reporting(0);
header('Content-type:text/html;charset=utf-8');
$info = file_get_contents($zwcx["zhanwai"]); //采集源站地址
$szz1='#<li><a href="/index.php/show/index/(.*?)"><b></b><img src="(.*?)" /><span>(.*?)</span></a></li>#';
preg_match_all($szz1, $info,$sarr1);
       for($i =0;$i<9;$i++){   
           $zname=$sarr1[3][$i];//名字
           $two=$sarr1[1][$i];//ID                                              
           $zimg=$sarr1[2][$i];//图片
          $link="mplay.php?mso=".$two;
           //echo $zname;
           //echo $gul;//取出播放链接
        
		 echo '<li><a href="'.$link.'"><img src="'.$zimg.'"></a>
       <span class="fl"></span><span class="fr">'.get_channel_name($row['d_parent']).'</span>
        <a href="'.$link.'"><span class="biaoti">'.$zname.'</span></a></li>';}
		 
		 
	   ?>
	   
	 