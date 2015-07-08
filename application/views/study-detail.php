<?php
/**
 * 资讯详情
 */
?>

<div class="hhome">
	<div class="home">
		<div class="hileft">
			<img src="<?php echo base_url('static/frontend/images/homef.gif')?>" />&nbsp;&nbsp;Your position :
            <a href="<?php echo site_url();?>">Home</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Information</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Information details</a>
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
			<a href="<?php echo site_url('study/ls')?>">All</a>
			<?php 
			foreach ($infocate as $k=>$v){
				?>
				<a href="<?php echo site_url('study/ls/'.$k);?>" class="<?php echo $k==$info['cateid']?'active':''?>" ><?php echo $v;?></a>
				<?php
			}
			?>
		</div>
		<div>
			<div class="line" style="width: 745px;"></div>
		</div>
		<div class="back">
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
	<div class="article-con-box">
		<div class="article-left">
			<div class="dowmloadico"><a href="<?php echo base_url($info['attach'])?>"><img src="<?php echo base_url('static/frontend/images/down.png');?>" /></a></div>
			<h3 class="title"><?php echo $info['title']?></h3>
			<div class="des">
                Publication date&nbsp;:&nbsp;<?php echo date('Y-m-d',$info['createtime']);?>&nbsp;&nbsp;&nbsp;&nbsp;Viewed <?php echo $info['pageview'];?> times
			</div>
			<div class="con">
				<?php echo $info['content'];?>
			</div>
			<div class="nextprev">
				<?php 
				if(empty($prev)){
					?>
					<span class="prev">This is the first information .</span>
					<?php
				}else{
					?>
					<span class="prev">Previous&nbsp;:&nbsp;<a href="<?php echo site_url('study/detail/'.$prev[0]['id'])?>"><?php echo $prev[0]['title']?></a></span>
					<?php
				}
				?>
				<?php 
				if(empty($next)){
					?>
					<span class="prev">This is the last information .</span>
					<?php
				}else{
					?>
					<span class="next">Next&nbsp;:&nbsp;<a href="<?php echo site_url('study/detail/'.$next[0]['id'])?>"><?php echo $next[0]['title']?></a></span>
					<?php
				}
				?>
			</div>
		</div>
		<div class="article-right">
			<h4 class="title"><?php echo $infocate[$info['cateid']];?></h4>
			<ul>
			<?php 
			foreach ($infolist as $k=>$v){
				?>
				<li><span>&gt;&gt;<span>&nbsp;&nbsp;<a href="<?php echo site_url('study/detail/'.$v['id'])?>">&nbsp;<?php echo $v['title'];?></a></li>
				<?php
			}
			?>
			</ul>
		</div>
	</div>

</div>

<div class="clear"></div>