<?php
/**
 * 资讯列表
 */
?>

<div class="hhome">
	<div class="home">
		<div class="hileft">
			<img src="<?php echo base_url('static/frontend/images/homef.gif')?>" />&nbsp;&nbsp;Your position :
            <a href="<?php echo site_url();?>">Home</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Information</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Information list</a>
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
	<div class="page-title">Information</div>
	<div class="page-tag">
		<div class="tag">
			<a href="<?php echo site_url('study/ls')?>" class="<?php echo ($cateid=='-'||$cateid=='')?'active':'';?>">All</a>
			<?php 
			foreach ($infocate as $k=>$v){
				?>
				<a href="<?php echo site_url('study/ls/'.$k);?>" class="<?php echo $k==$cateid?'active':''?>" ><?php echo $v;?></a>
				<?php
			}
			?>
		</div>
		<div>
			<div class="line" style="width: 745px;"></div>
		</div>
		<div class="back" id="backblock">
			<a href="javascript:void(0);" class="leftbtn"><img src="<?php echo base_url('static/frontend/images/tag-left.png');?>" /></a>
			<a href="javascript:void(0);" class="rightbtn"><img src="<?php echo base_url('static/frontend/images/tag-right.png');?>" /></a>
			<a href="javascript:history.go(-1);"><img src="<?php echo base_url('static/frontend/images/tag-back.png');?>" /></a>
		</div>
		<script type="text/javascript">
		$(function(){
			$('.line').width(1200-$('.tag').width()-195);
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
		});
		</script>
	</div>
	<div class="list-box">
		<ul>
		<?php 
		if(!empty($infolist)){
			foreach ($infolist as $k=>$v){
				?>
				<li class="study-li">
					<h3 class="title">
						<a href="<?php echo site_url('study/detail/'.$v['id'])?>"><?php echo $v['title']?></a>&nbsp;&nbsp;
						<span class="abt"><?php echo $infocate[$v['cateid']]?></span>&nbsp;
						<span class="abt"><?php echo date('Y-m-d',$v['createtime']);?></span>
					</h3>
					<div>
						<div class="con">
							<span class="des"><?php echo $v['desc']?></span>
							<br />
						</div>
					</div>
					<div class="more">
						<a href="<?php echo site_url('study/detail/'.$v['id'])?>">View details</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="<?php echo base_url($v['attach'])?>">Download</a>
					</div>
				</li>
				<?php
			}
		}else{
			echo '<li class="study-li"><h3 class="title"><a>No data</a></h3></li>';
		}
		?>

		</ul>
	</div>

	<div class="show-page">
		<?php echo $this->pagination->create_links();?>
	</div>
</div>

<div class="clear"></div>