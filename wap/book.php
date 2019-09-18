<?php include('../system/inc.php');
if(isset($_POST['submit'])){
null_back($_POST['userid'],'请输入姓名');
	null_back($_POST['content'],'请输入内容');
	$data['userid'] = $_POST['userid'];
	$data['content'] =addslashes($_POST['content']);
	$data['time'] =date('y-m-d h:i:s',time());
	
	$str = arrtoinsert($data);
		$sql = 'insert into xtcms_book ('.$str[0].') values ('.$str[1].')';
	if(mysql_query($sql)){

alert_href('留言成功!小的马上为您准备相关资源！','book.php');
}
else{
alert_back('抱歉！服务器好像开小差了呢！');
	}
	
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php  include 'head.php';
$zy='class="active"'?>
<title>留言求片,留言板-<?php echo $xtcms_seoname;?></title>
<meta name="keywords" content="留言板,留言求片">
<meta name="description" content="留言求片:把你想看的大片留言给我们。我们会争取第一时间更新上！">
<script>
  $(function(){
    TagNav('#tagnav',{
        type: 'scrollToFirst',
    });
    $('.weui_tab').tab({
    defaultIndex: 0,
    activeClass:'weui_bar_item_on',
    onToggle:function(index){
    if(index>0){
    alert(index)
    }
    }
});
});     
</script>
<style type="text/css">
  .leimu_zui{width: auto}
  .weui-navigator-list li{font-weight: 500}
  .weui-navigator-list li.weui-state-hover, .weui-navigator-list li.weui-state-active a:after{background-color: none}
</style>
<style>

.clears{ clear:both;}
/*messages*/
.messages{padding:15px;}
.messages input,.messages select,.messages textarea{margin:0;padding:0; background:none; border:0; font-family:"Microsoft Yahei";}
.messlist {height:80px;margin-bottom:10px;}
.messlist label{height:30px; font-size:14px; line-height:30px; text-align:right;padding-right:10px;}
.messlist input{width:100%; height:28px;padding-left:5px;border:#ccc 1px solid;}
.messlist.textareas{ height:auto;}
.messlist textarea{width:100%; height:110px;padding:5px;border:#ccc 1px solid;}
.messlist.yzms input{width:100px;}
.messlist.yzms .yzmimg{ float:left;margin-left:10px;}
.messsub{padding:0px 0 0 110px;}
.messsub input{width:100px; height:35px; background:#ddd; font-size:14px; font-weight:bold; cursor:pointer;margin-right:5px}
.messsub input:hover{ background:#f60;color:#fff;}
#label0{display:none;color:#0aa770;height:28px;line-height:28px;}
#label1{display:none;color:#0aa770;height:28px;line-height:28px;}
#label2{display:none;color:#0aa770;height:28px;line-height:28px;}
#label3{display:none;color:#0aa770;height:28px;line-height:28px;}
#label4{display:none;color:#0aa770;height:28px;line-height:28px;}
#label5{display:none;color:#0aa770;height:28px;line-height:28px;}
#label6{display:none;color:#0aa770;height:28px;line-height:28px;}
#label7{display:none;color:#0aa770;height:28px;line-height:28px;}
#label8{display:none;color:#0aa770;height:48px;line-height:48px;}
#label9{display:none;color:#0aa770;height:48px;line-height:48px;}
#label10{display:none;color:#0aa770;height:48px;line-height:48px;}
</style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="page-bd">  
				

<form method="post" class="messages">
     <div class="messlist">
      <label>昵称</label>
      <input type="text" placeholder="请填写你的昵称" id="input1" onblur="jieshou()" name="userid">
<div id ="label0">*你还没填写昵称呢!</div>
<div id ="label1">√正确</div>
<div id ="label2">×错误</div>
      <div class="clears"></div>
     </div>

     <div class="messlist textareas">
      <label>留言内容</label>
      <textarea placeholder="例如：我想看《太阳的后裔》" id="input4" onblur="content()" name="content"></textarea>
<div id ="label8">√</div>
<div id ="label9">×</div>
<div id ="label10">* 必填</div>
      <div class="clears"></div>
     </div>

     <div class="messsub">
      <input type="submit" value="提交" name="submit" style="background:#00a3eb;color:#fff;" />

     </div>
</form>	<hr> <?php

									$sqll = 'select * from xtcms_book order by id desc';
									$pager = page_handle('page',20,mysql_num_rows(mysql_query($sqll)));
									$result = mysql_query($sqll.' limit '.$pager[0].','.$pager[1].'');
							while($row= mysql_fetch_array($result)){
							?> 
<div class="stui-pannel stui-pannel-bg clearfix"><div class="stui-pannel-box clearfix"><div class="col-pd clearfix"><ul><li class="topwords"><strong><u><?php echo $row['userid'] ?></u> 说：</strong></li><li class="top-line" style="margin-top: 10px; padding: 10px 0;"><?php echo $row['content'] ?><br/><font color=red></font>
</li></ul></div></div></div><hr><?php } ?>
<ul class="stui-page text-center"><div style='margin:50px auto;text-align:center'>
<?php echo page_show($pager[2],$pager[3],$pager[4],2);?></a> </div></ul>
      
    </div>
  </div>
</div>

<script>
function jieshou(){
var label1 = document.getElementById("label1");
var label2 = document.getElementById("label2");
var nametext = document.getElementById("input1").value;
if(nametext!=""){
label0.style.display = 'none';
label1.style.display = 'block';
label2.style.display = 'none';
}
else{
label0.style.display = 'block';
label1.style.display = 'none';
label2.style.display = 'none';
}
 
}
</script>


<script>
function content(){
var content = document.getElementById("input4").value;
if(content!=""){ 
        label8.style.display = 'block'; 
        label9.style.display = 'none'; 
        label10.style.display = 'none'; //*必填
        return false;
    } 
else{
        label8.style.display = 'none'; 
        label9.style.display = 'none'; 
        label10.style.display = 'block';  
}

}

</script>

	</div>

<?php include 'footer.php'; ?>
