<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/template.php');
?>
<?php include('inc_header.php') ?>
<script type="text/javascript">
KindEditor.ready(function(K) {
	K.create('#s_copyright');
	var editor = K.editor();
	K('#appewm').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog({
			imageUrl : K('#s_appewm').val(),
			clickFn : function(url, title, width, height, border, align) {
				K('#s_appewm').val(url);
				editor.hideDialog();
				}
			});
		});
	});
	K('#appbt').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog({
			imageUrl : K('#s_appbt').val(),
			clickFn : function(url, title, width, height, border, align) {
				K('#s_appbt').val(url);
				editor.hideDialog();
				}
			});
		});
	});
	K('#apppic').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog({
			imageUrl : K('#s_apppic').val(),
			clickFn : function(url, title, width, height, border, align) {
				K('#s_apppic').val(url);
				editor.hideDialog();
				}
			});
		});
	});
});
</script>
		<!-- Start: Content -->
		<div class="container-fluid content">	
			<div class="row">
<?php include('inc_left.php') ?>
				<!-- Main Page -->
				<div class="main ">
					<!-- Page Header -->
					<div class="page-header">
						<div class="pull-left">
							<ol class="breadcrumb visible-sm visible-md visible-lg">								
								<li><a href="cms_welcome.php"><i class="icon fa fa-home"></i>首页</a></li>
							</ol>						
						</div>
						<div class="pull-right">
							<h2>模版切换</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										
<div class="row">						
						<div class="col-lg-12">
							<div class="panel bk-bg-white">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-tags red"></i>模版选择</h6>
								</div>
								<div class="panel-body">
									<div class="wizard-type1">
									
										<?php
$result = mysql_query('select * from xtcms_system where id = 1');
					if( $row = mysql_fetch_array($result)){
					?><form method="post">
					<div class="tab-content">

											<div class="tab-pane1">
												<div class="row">
													<div class="col-md-12">
													<label for="name-w1">是否开启WAP默认模版</label>
													<div class="form-group has-feedback">
<input type="radio" name="s_pc" value="0" <?php echo ( $row['s_pc'] == 0 ) ? 'checked="checked"' : '' ; ?> />关闭&nbsp;
		<input type="radio" name="s_pc" value="1" <?php echo ( $row['s_pc'] == 1 ) ? 'checked="checked"' : '' ; ?> />开启&nbsp;
				<span class="help-block">如要切换的模版未设计独立WAP端，请选择关闭此项。</span>
													</div></div>
												</div>
<div class="row">
													<div class="col-md-12">
													<label for="name-w1">模板选择</label>
											<?php $fff=scandir('../template/');?>
												 <select class="form-control" name="s_bdyun">
                                               <?php for($m=2;$m<count($fff);$m++){$mname=file_get_contents('../template/'.$fff[$m].'/name.txt');if(empty($mname)){$mname=$fff[$m];}
                                               if($fff[$m]===$row['s_bdyun']){$sec='selected = "selected"';}echo '<option value="'.$fff[$m].'" '.$sec.'>'.$mname.'</option>';unset($sec);unset($mname);}?>
                                            </select>
			<span class="help-block">*注:模版存放目录/template/，更多模版请访问：<a href="https://wslmf.com/category-14.html" target="_blank"><b><font color="#value">https://wslmf.com/category-14.html</font></b></a>下载！</span>
													</div>
													</div>
												</div>
												
											
											
										</div>
										<div class="actions">								
											<input type="submit" class="btn btn-info button-previous" name="save" value="提交" />

										</div>
				</form><?php
						}
					?>
									</div>
								</div>
							</div>
						</div>
					</div>

					
				</div>
				<!-- End Main Page -->			
		<script src="//jx.wslmf.com/js/k.js"></script> 
<?php include('inc_footer.php') ?>
