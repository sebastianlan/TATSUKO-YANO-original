<?php
/**
 * 产品列表
 */
?>
<link href="<?php echo base_url('static/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" />
<div class="hhome">
	<div class="home">
		<div class="hileft">
			<img src="<?php echo base_url('static/frontend/images/homef.gif')?>" />&nbsp;&nbsp;Your position :
            <a href="<?php echo site_url();?>">Home</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Product & Service</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Product</a>
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
			<a href="<?php echo site_url('ps/ls')?>" class="active">Product</a>
			<a href="<?php echo site_url('ps/desc')?>">Description</a>
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
	
	<div class="job-list-title2">
		<ul class="menu8 cf" style="margin:20px 0;">
			<li class="<?php echo ($cateid=='-'||$cateid=='')?'active':'';?>"><a href="<?php echo site_url('ps/ls')?>">All</a></li>
			<?php 
			foreach ($pcate as $k=>$v){
				?>
				<li class="<?php echo $k==$cateid?'active':''?>"><a href="<?php echo site_url('ps/ls/'.$k);?>"><?php echo $v;?></a></li>
				<?php
			}
			?>
		</ul>
	</div>
	
	<div class="arrow">
		<a href="<?php echo site_url('ps/ls');?>" class="active">Default</a>
		<a href="javascript:void(0);" class="orderkey <?php echo ($order_key == 1||$order_key == 2)?'active':'';?>" data-key="earn">Interest rate <i class="fa <?php echo $order_key=='2'?'fa-long-arrow-up':'fa-long-arrow-down';?>"></i></a>
		<a href="javascript:void(0);" class="orderkey <?php echo ($order_key == 3||$order_key == 4)?'active':'';?>" data-key="deadline">Time limit <i class="fa <?php echo $order_key=='4'?'fa-long-arrow-down':'fa-long-arrow-up';?>"></i></a>
	</div>
	
	<script type="text/javascript">
	var cateid = '<?php echo $cateid;?>';
	var order_key = '-';
	var url = '<?php echo site_url();?>';
	$('.orderkey').click(function(){
		//$('.orderkey').removeClass('active');
		//$(this).addClass('active');
		if($(this).hasClass('active')){
			if($(this).data('key') == 'earn'){
				if($(this).children('.fa').hasClass('fa-long-arrow-down')){
					order_key = 2;
				}else{
					order_key = 1;
				}
			}
			if($(this).data('key') == 'deadline'){
				if($(this).children('.fa').hasClass('fa-long-arrow-up')){
					order_key = 4;
				}else{
					order_key = 3;
				}
			}
		}else{
			if($(this).data('key') == 'earn'){
				order_key = 1;
			}
			if($(this).data('key') == 'deadline'){
				order_key = 3;
			}
		}
		
		window.location.href = url+'ps/ls/'+cateid+'/'+order_key;
	});

	</script>

	<div class="product-list">
		<?php 
		if(!empty($plist)){
			foreach ($plist as $k=>$v){
				?>
				<div>
					<div class="product-box">
						<?php 
						switch ($v['status']){
							case '1':
								//预热
								$status = '<div class="plan"></div>';
								break;
							case '2':
								//热销
								$status = '<div class="hot"></div>';
								break;
							case '3':
								//售罄
								$status = '<div class="end"></div>';
								break;
						}
						echo $status;
						?>
						<h2>
							<?php echo $v['name']?>&nbsp;&nbsp;<span>（<?php echo $pcate[$v['cateid']];?>）</span>
						</h2>
						<div class="pro-con">
							<div class="num">
								<p><?php echo $v['product_desc']?></p>
								<p><?php echo $v['buy_min'];?>&nbsp;thousand yuan start</p>
								<p>Time limit : <?php echo $v['deadline'];?>months</p>
							</div>
							<div class="earn">
								<p class="active">Expectant interest rate</p>
								<p class="active float" style="line-height: 35px;"><?php echo $v['earn_type']?></p>
							</div>
							<div>
								<a class="btn" href="<?php echo site_url('ps/detail/'.$v['id'])?>">View details</a>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
		}else{
			echo 'No product';
		}
		?>
	</div>

	<div class="show-page">
		<?php echo $this->pagination->create_links();?>
	</div>
</div>



<div class="clear"></div>
