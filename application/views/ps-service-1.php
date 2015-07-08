<?php
/**
 * Description 1
 */
?>
<div class="hhome">
	<div class="home">
		<div class="hileft">
			<img src="<?php echo base_url('static/frontend/images/homef.gif')?>" />&nbsp;&nbsp;Your position :
            <a href="<?php echo site_url();?>">Home</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Product & Service</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Description</a>
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
	<div class="page-title">PRODUCT & SERVICE</div>
	<div class="page-tag">
		<div class="tag">
			<a href="<?php echo site_url('ps/ls')?>">Product</a>
            <a href="<?php echo site_url('ps/desc')?>" class="active">Description</a>
            <a href="<?php echo site_url('ps/service')?>">Service</a>
		</div>
		<div>
			<div class="line" style="width: 645px;"></div>
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
		<div class="article-left2">
			<div class="job-list2">
				<div class="job-list-title2">
					<ul class="menu8 cf">
						<li class="active"><a href="javascript:void(0);">Description-01</a></li>
						<li><a href="<?php echo site_url('ps/desc2')?>">Description-02</a></li>
						<li><a href="<?php echo site_url('ps/desc3')?>">Description-03</a></li>
						<li><a href="<?php echo site_url('ps/desc4')?>">Description-04</a></li>
					</ul>
				</div>
				<div class="job-list-con">
					<h4>Description-01</h4>
					<p>Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent id tempor ipsum. Fusce at massa ac nunc porta fringilla sed eget neque. Quisque quis pretium nulla. Fusce eget bibendum neque, vel volutpat augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
					<p>1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non metus pulvinar imperdiet. Praesent non adipiscing libero.</p>
					<p>2. Mauris ultrices odio vitae nulla ultrices iaculis. Nulla rhoncus odio eu lectus faucibus facilisis. Maecenas ornare augue vitae sollicitudin accumsan.</p>
					<p>3. Etiam eget libero et erat eleifend consectetur a nec lectus. Sed id tellus lorem. Suspendisse sed venenatis odio, quis lobortis eros.</p>
					<h5>Tips</h5>
					<p>Please <a href="<?php echo site_url('ps/ls')?>">click here</a> go back to [ product ] .</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="clear"></div>
