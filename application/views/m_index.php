<?php
/**
 * 后台首页，相关说明
 */
?>

<div class="jumbotron">
  <h2>TATSUKO YANO original admin (づ￣3￣)づ</h2>
  <p><a class="btn btn-primary btn-lg" href="javascript:void(0)" id="gogogo" role="button">Start here</a></p>
</div>

<script type="text/javascript">
$(function(){
	$('#gogogo').click(function(){
		window.location.href=$('.nav').find('a[href!=#]').attr('href');
	});
});
</script>