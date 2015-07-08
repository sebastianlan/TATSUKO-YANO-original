<div class="hhome">
	<div class="home">
		<div class="hileft">
			<img src="<?php echo base_url('static/frontend/images/homef.gif')?>" />&nbsp;&nbsp;Your position :
            <a href="<?php echo site_url();?>">Home</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Join us</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Position request</a>
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
				<ul>
				<?php 
				if(!empty($joblist)){
					foreach ($joblist as $k=>$v){
						?>
						<li>
							<div class="title">
								<a href="<?php echo site_url('work/detail/'.$v['id'])?>"><?php echo $v['title']?> （<?php echo $v['area']?>）</a> 
								<span class="date"><?php echo date('Y-m-d',$v['createtime'])?></span>
							</div>
							<div class="job-des"><?php echo $v['desc']?></div>
						</li>
						<?php
					}
				}else{
					echo '<li><div class="title">No data</div></li>';
				}
				?>
					
				</ul>
			</div>
			<div class="show-page">
			<?php echo $this->pagination->create_links();?>
			</div>
		</div>
		<?php 
		require_once 'work-right-side.php';
		?>
	</div>



</div>



<div class="clear"></div>

