<?php
if ($xtcms_pc==1){
?>

<script>
function uaredirect(f){try{if(document.getElementById("bdmark")!=null){return}var b=false;if(arguments[1]){var e=window.location.host;var a=window.location.href;if(isSubdomain(arguments[1],e)==1){f=f+"/#m/"+a;b=true}else{if(isSubdomain(arguments[1],e)==2){f=f+"/#m/"+a;b=true}else{f=a;b=false}}}else{b=true}if(b){var c=window.location.hash;if(!c.match("fromapp")){if((navigator.userAgent.match(/(iPhone|iPod|Android|ios)/i))){location.replace(f)}}}}catch(d){}}function isSubdomain(c,d){this.getdomain=function(f){var e=f.indexOf("://");if(e>0){var h=f.substr(e+3)}else{var h=f}var g=/^www\./;if(g.test(h)){h=h.substr(4)}return h};if(c==d){return 1}else{var c=this.getdomain(c);var b=this.getdomain(d);if(c==b){return 1}else{c=c.replace(".","\\.");var a=new RegExp("\\."+c+"$");if(b.match(a)){return 2}else{return 0}}}};
</script>
<?php
if ($_GET['play']!=""){
$cc="play.php?play=";
$dd="bplay.php?play=";
$yugao=explode('.html',$_GET['play']);
for($k=0;$k<count($yugao);$k++){
if ($k>0){
$tiaourl=$cc.$_GET['play'];
		}
else{
$tiaourl=$dd.$_GET['play'];	
		}
}
}
?>

<script type="text/javascript">uaredirect("<?php echo $xtcms_domain;?>wap/<?php echo $tiaourl;?>");</script>

<?php	 } ?>
<?php
if ($xtcms_hong==1){
?>

	<style type="text/css">

	.weixin-tip{display: none; position: fixed; left:0; top:0; bottom:0; background: rgba(0,0,0,0.8); filter:alpha(opacity=80);  height: 100%; width: 100%; z-index: 99999;}
	.weixin-tip p{text-align: center; margin-top: 10%; padding:0 5%;}
	</style>
	<div class="weixin-tip">
		<p>
			<img src="<?php echo $xtcms_domain;?>images/live_weixin.png" width=100% alt="微信打开"/>
		</p>
	</div>
		<script type="text/javascript">        $(window).on("load",function(){	        var winHeight = $(window).height();			function is_weixin() {			    var ua = navigator.userAgent.toLowerCase();			    if (ua.match(/MicroMessenger/i) == "micromessenger") {			        return true;			    } else {			        return false;			    }			}			var isWeixin = is_weixin();			if(isWeixin){				$(".weixin-tip").css("height",winHeight);	            $(".weixin-tip").show();			}        })	</script>
<?php	 } ?>

<div class="hy-head-menu">

	<div class="container">

	    <div class="row">

		  	<div class="item">

			    <div class="logo hidden-xs">

					<a class="hidden-sm hidden-xs" href="<?php echo $xtcms_domain;?>"><img src="<?php echo $xtcms_logo;?>" /></a>

		  			<a class="visible-sm visible-xs" href="<?php echo $xtcms_domain;?>"><img src="<?php echo $xtcms_logo;?>" /></a>											  

				</div>	

				<div class="search"> 

<form id="ff-search" role="search" action="<?php echo $xtcms_domain;?>seacher.php" method="post">

                            <input class="form-control" placeholder="输入影片关键词..." type="text" id="ff-wd" name="wd" required="">

                            <input type="submit" class="hide"><a href="javascript:" class="btns" title="搜索" onClick="$('#ff-search').submit();"><i class="icon iconfont icon-search"></i></a></form>

			   </div>			   


			   <ul class="menulist hidden-xs">

					<li><a href="<?php echo $xtcms_domain;?>">首页</a></li>

					<?php if($xtcms_dianying==1){?><li <?php echo $movie;?>><a href="<?php echo $xtcms_domain;?>movie.php?m=/dianying/list.php?cat=all&page=1">电影</a></li><?php }?>

					<li <?php echo $tv;?>><a href="<?php echo $xtcms_domain;?>tv.php?m=/dianshi/list.php?cat=all&page=1">电视剧</a></li>
					<li <?php echo $mj;?>><a href="<?php echo $xtcms_domain;?>clist.php?type=mj">美剧</a></li>

					<?php if($xtcms_dongman==1){?><li <?php echo $dm;?>><a href="<?php echo $xtcms_domain;?>dongman.php?m=/dongman/list.php?cat=all&page=1">动漫</a></li><?php }?>

					<?php if($xtcms_zongyi==1){?><li <?php echo $zy;?>><a href="<?php echo $xtcms_domain;?>zongyi.php?m=/zongyi/list.php?cat=all&pageno=1">综艺</a></li><?php }?>



										<?php

						$result = mysql_query('select * from xtcms_nav order by id asc');

						while($row = mysql_fetch_array($result)){

						?>

<li class="act<?php echo $row['id'];?>"><a href="<?php echo $row['n_url'];?>" target="_blank"><?php echo $row['n_name'];?></a></li>

<?php

						}

						?>



				</ul>													 

		  	</div>							

	    </div>

	</div>

</div>



