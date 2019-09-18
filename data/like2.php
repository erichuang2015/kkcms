<?php
$fang=$_GET['play']; 
$yuming='http://www.360kan.com';
$jmfang= $yuming.$fang;

mkdir('./data');
mkdir('./data/runtime');
$gxpd=time()-filemtime('./data/runtime/'.md5($flid2));
if($gxpd>2*60*60){
$like=file_get_contents($jmfang);
file_put_contents('./data/runtime/'.md5($jmfang),gzdeflate($like));
}	
$like=gzinflate(file_get_contents('./data/runtime/'.md5($jmfang)));

$likezz="#<a href='(.*?)' data-index=(.*?)>#"; 
$likenn="#data-index=(.*?)>(.*?)</a></p>#"; 
$likeimg="#<img src=\"(.*?)\" data-src='(.*?)'>#"; 
preg_match_all($likezz, $like,$likearr); 
preg_match_all($likenn, $like,$likearrr); 
preg_match_all($likeimg, $like,$likearr1); 
$likename=$likearrr[2]; 
$likeurl=$likearr[1]; 
$likeimg=$likearr1[2];  
?>