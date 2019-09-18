<?php include('system/inc.php');?>
<head>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $xtcms_name;?></title>
</head>
<iframe id="iframepage" allowFullScreen=ture marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" src="<?php {echo 'https://jx.wslmf.com/xyplay/?url='.$_GET["url"];}?>" height="100%" width="100%"></iframe>
<style type="text/css">
body{
  	margin: 0px;
    padding: 0px;
    background: #000;
}
</style>
<script>
   $(function () {
        var height = $(window).height();
		var playlisth=$('#playbg').height();			
		$('#playbg').height(height*0.58);  	
   })
   


</script>



