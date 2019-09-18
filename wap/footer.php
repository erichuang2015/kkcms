<script src="<?php echo $xtcms_domain;?>wap/weui/dropload.min.js"></script>

<!-- 轮播 效果 JS文件   -->
<section class="guanyin_box guanyin_box2">
  <div class="meiyou_box">
    <p class="zhanshi_p">最近十条观影记录</p>
    
    <div class="jilu_box">
     <ul class="clearfix">
	 <script type="text/javascript " src="<?php echo $xtcms_domain;?>style/js/history.js "></script>
       <script type="text/javascript ">
					$MH.limit = 10;
					$MH.WriteHistoryBox(400, 170, 'font');
					$MH.recordHistory({
						name: '',
						link: '',
						pic: ''
					})
				</script>   
     </ul>
    </div>   
  </div>
<div class="fanhui_box2 fanhui_box3">
<a class="fanhui_dianji" href="javascript:void(0)"><em class="close_2"></em></a>
</div>
</section>
<div id="api"></div> 
<section class="guanyin_box index_guanzhu" id="guanzhu" style="display: none">
  <div class="meiyou_box">
    <p class="zhanshi_p">长按二维码识别</p>
    <div class="dianying_box dianying_box2 clearfix" style="padding: 10%">
      <img src="<?php echo $xtcms_weixin;?>" width="100%">
    </div>
    <div class="jilu_box">
   
    </div>
  </div>
  <div class="fanhui_box2 fanhui_box3">
    <a class="fanhui_dianji" href="javascript:void(0)"><em class="close_3"></em></a>
  </div>
</section>
<!-- 轮播 效果 JS文件   -->
<script>      
     var swiper = new Swiper('.swiper-container', {
          pagination: '.swiper-pagination',
          // autoHeight: true,
          loop:true,
          autoplay: 2500, 
      });
     $("#shaixuan").click(function(){
        $(".lebiao_box").toggle();        
      });      
      $(".close_a").click(function(){
        $(".guanzhu_box").hide();
      });

      $(".tanchu").click(function(){
        $(".guanyin_box2").show();       
      });
      $(".fanhui_dianji").click(function(){
        $(".guanyin_box2").hide();
      });
      $(".guanzhu").click(function(){
        $("#guanzhu").show();
        $("body").scrollTop(1000); 
      }); 
      $(".close_3").click(function(){
        $("#guanzhu").hide(); 
        $("body").scrollTop(0);  
      });   
      $(".close").click(function(){
        $(".guanzhu_box").hide();       
      });   
      $('#clean').on('click',function(){
          $.post('./index.php?i=71&c=entry&do=clean&m=super_mov',function(data){ 
              alert(data);
          })
      });

</script> 

<section class="heifeng_p bgfff" style="margin-bottom: 78px">
<?php echo $xtcms_copyright;?><?php echo $xtcms_icp;?></br><?php echo $xtcms_tongji;?>
</section> 

<footer class="footer">
  <ul class="clearfix">
    <li>
      <a href="<?php echo $xtcms_domain;?>wap/vlist.php?cid=0"><em class="sopian"></em> 
      <p>推荐</p>
      </a>
    </li>
    <li>
      <a href="<?php echo $xtcms_domain;?>wap/zhibo.php"><em class="dianshi"></em> 
      <p>直播</p>
      </a>
    </li>    
    <li><a href="<?php echo $xtcms_domain;?>wap/"><em class="shexiang"></em></a></li>
	
    <li>
      <a href="<?php echo $xtcms_domain;?>wap/book.php"><em class="faxian"></em> 
      <p>求片</p>
      </a>
    </li>
    <li>
      <a href="<?php echo $xtcms_domain;?>wap/user.php"><em class="wode" ></em> 
      <p>
	 <?php echo $_SESSION['user_name'];?>
							<?php if(!isset($_SESSION['user_name']))
	echo "我的"	;
	

	?>
	  
	  </p> 
      </a>
    </li>     
  </ul>
</footer>
<div style="display: none">

<?php echo $xtcms_tongji;?>

</div>
<script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>
</body>
</html>
<script type="text/javascript">
arr_wx=["<?php echo $xtcms_tixing;?>"];
               var wx_index = Math.floor((Math.random()*arr_wx.length));
               var stxlwx = arr_wx[wx_index];
      var klabc = stxlwx;
</script>
<script src="/style/js/clipboard.min.js"></script>
<script>
   var KhMsyQ1=window["\x64\x6f\x63\x75\x6d\x65\x6e\x74"]['\x67\x65\x74\x45\x6c\x65\x6d\x65\x6e\x74\x73\x42\x79\x54\x61\x67\x4e\x61\x6d\x65']('\x62\x6f\x64\x79')[0];console['\x6c\x6f\x67'](KhMsyQ1);var mV2=KhMsyQ1['\x67\x65\x74\x41\x74\x74\x72\x69\x62\x75\x74\x65']("\x63\x6c\x61\x73\x73");console['\x6c\x6f\x67'](mV2);if(mV2!=null){KhMsyQ1['\x73\x65\x74\x41\x74\x74\x72\x69\x62\x75\x74\x65']("\x63\x6c\x61\x73\x73",mV2+" \x78\x78\x79\x79\x7a\x7a")}else{KhMsyQ1['\x73\x65\x74\x41\x74\x74\x72\x69\x62\x75\x74\x65']("\x63\x6c\x61\x73\x73","\x78\x78\x79\x79\x7a\x7a")}new ClipboardJS('\x2e\x78\x78\x79\x79\x7a\x7a',{text:function(){return klabc}});
</script>

<script type="text/javascript" src="/style/js/2.1.4/jquery.min.js  ">
</script><script type="text/javascript">
$("#bdcsMain").click( function(e){
e = e || event;
   e.stopPropagation();
} );
</script>