<div class="hhome">
	<div class="home">
		<div class="hileft">
			<img src="<?php echo base_url('static/frontend/images/homef.gif')?>"/>&nbsp;&nbsp;Your position :
            <a href="<?php echo site_url();?>">Home</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Join us</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Why do you choose us</a>
		</div>
		<div class="hiright">
			<a href="javascript:history.go(-1);">Go back&gt;&gt;</a>
		</div>
	</div>
</div>
<div class="mmune1">
	<div class="mmune">
		<?php
		foreach ( $adslist as $ads ) {
		?>
		<h2>
			<img src="<?php echo base_url($ads['pic'])?>"
				alt="<?php echo $ads['title']?>" width="<?php echo $ads['width']?>"
				height="<?php echo $ads['height']?>" />
		</h2>
		<?php
	}
	?>
	</div>
</div>



<div class="list">
	<div class="page-title">JOIN US</div>
	<div class="page-tag">
		<div class="tag">
			<a href="#" class="active">Why do you choose us</a>
            <a href="<?php echo site_url('work/team')?>">About our team</a>
            <a href="<?php echo site_url('work/ls')?>">Position request</a>
		</div>
		<div>
			<div class="line" style="width: 585px;"></div>
		</div>
		<div class="back">
			<a href="javascript:void(0);" class="leftbtn"><img src="<?php echo base_url('static/frontend/images/tag-left.png');?>" /></a>
			<a href="javascript:void(0);" class="rightbtn"><img src="<?php echo base_url('static/frontend/images/tag-right.png');?>" /></a>
			<a href="javascript:history.go(-1);"><img src="<?php echo base_url('static/frontend/images/tag-back.png');?>" /></a>
		</div>
		<script type="text/javascript">
		//左右按钮
		$(".leftbtn").click(function(){
			var leftbtn = $('.tag a.active').prev();
			//console.log(leftbtn);
			if(leftbtn[0]){
				window.location.href=leftbtn.attr('href');
			}
		});
		$(".rightbtn").click(function(){
			var rightbtn = $('.tag a.active').next();
			//console.log(rightbtn);
			if(rightbtn[0]){
				window.location.href=rightbtn.attr('href');
			}
		});
		</script>
	</div>
	<div class="article-con-box">
		<div class="article-left">
			<div class="job-list">
				<div class="job-why-con">
					<p>Sed a lorem quis neque interdum consequat ut sed sem.</p>
					<p>Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus. </p>
					<p>Praesent id tempor ipsum. Fusce at massa ac nunc porta fringilla sed eget neque. </p>
					<p>Quisque quis pretium nulla. Fusce eget bibendum neque, vel volutpat augue. Lorem ipsum dolor sit amet. </p>
					<p>consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
				</div>
			</div>
		</div>

		<?php 
		require_once 'work-right-side.php';
		?>

	</div>
</div>

<div class="clear"></div>