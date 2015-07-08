<div class="hhome">
	<div class="home">
		<div class="hileft">
			<img src="<?php echo base_url('static/frontend/images/homef.gif')?>" />&nbsp;&nbsp;Your position :
            <a href="<?php echo site_url();?>">Home</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Join us</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Position details</a>
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
			<a href="<?php echo site_url('work/why')?>">Why do you choose us</a>
            <a href="<?php echo site_url('work/team')?>">About our team</a>
            <a href="javascript:void(0);" class="active">Position request</a>
		</div>
		<div>
			<div class="line" style="width: 585px;"></div>
		</div>
		<div class="back">
			<a href="#"><img src="<?php echo base_url('static/frontend/images/tag-left.png');?>" /></a>
			<a href="#"><img src="<?php echo base_url('static/frontend/images/tag-right.png');?>" /></a>
			<a href="#"><img src="<?php echo base_url('static/frontend/images/tag-back.png');?>" /></a>
		</div>
	</div>
	<div class="article-con-box">
		<div class="article-left">
			<div class="job-list">
				<div class="job-list-title">
					<span class="title"><?php echo $job['title']?></span>
					<span class="address">Location : <?php echo $job['area']?></span>
					<span class="date"><?php echo date('Y-m-d H:i',$job['createtime'])?></span>
				</div>
				<div class="job-list-con">
					<?php echo $job['content']?>
				</div>

				<div class="job-back">
					<p><span class="active">Tips</span></p>
					<p>Please <a class="active" href="<?php echo site_url('work/ls')?>">click here</a> go back to [ position request ] .</p>
				</div>
			</div>
			
		</div>
		<?php 
		require_once 'work-right-side.php';
		?>
	</div>

</div>

<div class="clear"></div>

