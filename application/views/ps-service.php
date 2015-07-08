<?php
/**
 * 服务
 */
?>

<div class="hhome">
	<div class="home">
		<div class="hileft">
			<img src="<?php echo base_url('static/frontend/images/homef.gif')?>" />&nbsp;&nbsp;Your position :
            <a href="<?php echo site_url();?>">Home</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Product & Service</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Service</a>
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
			<a href="<?php echo site_url('ps/desc')?>">Description</a>
			<a href="<?php echo site_url('ps/service')?>" class="active">Service</a>
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
		<div class="article-left">
			<div class="service">
				<div class="service-title">
					<div class="serimg"><img src="<?php echo base_url('static/frontend/images/service01.jpg');?>"></div>
					<div>
						<h3>Service Aim</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non metus pulvinar imperdiet. Praesent non adipiscing libero.</p>
					</div>
				</div>

			</div>

			<div class="service">
				<div class="service-title">
					<div class="serimg"><img src="<?php echo base_url('static/frontend/images/service02.jpg');?>"></div>
					<div>
						<h3>Service Management</h3>
						<p>Mauris ultrices odio vitae nulla ultrices iaculis. Nulla rhoncus odio eu lectus faucibus facilisis. Maecenas ornare augue vitae sollicitudin accumsan.</p>
					</div>
				</div>

			</div>

			<div class="service">
				<div class="service-title">
					<div class="serimg"><img src="<?php echo base_url('static/frontend/images/service03.jpg');?>"></div>
					<div>
						<h3>One-stop Service</h3>
						<p>Etiam eget libero et erat eleifend consectetur a nec lectus. Sed id tellus lorem. Suspendisse sed venenatis odio, quis lobortis eros.</p>
					</div>
				</div>

			</div>
		</div>
		<div class="article-right">
			<h4 class="title">News</h4>
			<ul>
				<li><span>>><span>&nbsp;&nbsp;<a href="<?php echo site_url('newspaper/detail/1')?>">news-title-01</a></li>
				<li><span>>><span>&nbsp;&nbsp;<a href="<?php echo site_url('newspaper/detail/2')?>">news-title-02</a></li>
				<li><span>>><span>&nbsp;&nbsp;<a href="<?php echo site_url('newspaper/detail/3')?>">news-title-03</a></li>
				<li><span>>><span>&nbsp;&nbsp;<a href="<?php echo site_url('newspaper/detail/4')?>">news-title-04</a></li>
                <li><span>>><span>&nbsp;&nbsp;<a href="<?php echo site_url('newspaper/detail/5')?>">news-title-05</a></li>
			</ul>
		</div>
	</div>

</div>

<div class="clear"></div>
