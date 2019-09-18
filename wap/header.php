<section class="logo_box clearfix">
  <div class="fl"> <a href="<?php echo $xtcms_domain;?>/wap/"><img class="logo_img" src="<?php echo $xtcms_logo;?>"></a> </div>
  <div class="sosuo_box fl">
    <form  action="<?php echo $xtcms_domain;?>wap/seacher.php" method="post" role="form">
    <input class="btn_com btn_sosuo" type="text" placeholder="请输入影视、电视剧关键词、支持拼音" name="wd" value="">
    </form>
  </div>
  <div class="fr"><a class="tanchu" href="javascript:void(0)"><em class="jilu"></em></a></div>
</section>
<div id="tagnav" class="weui-navigator weui-navigator-wrapper"> 
  <ul class="weui-navigator-list">
  <li><a href="<?php echo $xtcms_domain;?>wap/">首页</a></li>
					<?php if($xtcms_dianying==1){?><li <?php echo $movie;?>><a href="<?php echo $xtcms_domain;?>wap/movie.php">电影</a></li><?php }?>
					<li <?php echo $tv;?>><a href="<?php echo $xtcms_domain;?>wap/tv.php">电视剧</a></li>
      				<li <?php echo $mj;?>><a href="<?php echo $xtcms_domain;?>wap/clist.php?type=mj">美剧</a></li>
					<?php if($xtcms_dongman==1){?><li <?php echo $dm;?>><a href="<?php echo $xtcms_domain;?>wap/dongman.php">动漫</a></li><?php }?>
					<?php if($xtcms_zongyi==1){?><li <?php echo $zy;?>><a href="<?php echo $xtcms_domain;?>wap/zongyi.php">综艺</a></li><?php }?>

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

