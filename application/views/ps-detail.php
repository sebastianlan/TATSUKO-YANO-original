<?php
/**
 * 产品详情
 */
?>
<link href="<?php echo base_url('static/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" />
<div class="hhome">
	<div class="home">
		<div class="hileft">
			<img src="<?php echo base_url('static/frontend/images/homef.gif')?>" />Your position :
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

<script type="text/javascript" src="<?php echo site_url('static/frontend/stickUp/stickUp.min.js')?>"></script>

<div class="list">
	<div class="page-title">PRODUCT & SERVICE</div>
	<div class="page-tag">
		<div class="tag">
			<a href="<?php echo site_url('ps/ls')?>" class="active">Product</a>
			<a href="<?php echo site_url('ps/desc')?>">Description</a>
			<a href="<?php echo site_url('ps/service')?>">Service</a>
		</div>
		<div>
			<div class="line" style="width: 330px;"></div>
		</div>
		<div class="back">
			<a href="javascript:void(0);" class="leftbtn"><img src="<?php echo base_url('static/frontend/images/tag-left.png');?>" /></a>
			<a href="javascript:void(0);" class="rightbtn"><img src="<?php echo base_url('static/frontend/images/tag-right.png');?>" /></a>
			<a href="javascript:history.go(-1);"><img src="<?php echo base_url('static/frontend/images/tag-back.png');?>" /></a>
		</div>
		<script type="text/javascript">
		$('.line').width(1200-$('.tag').width()-$('.back').width());
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
			<li class=""><a href="<?php echo site_url('ps/ls')?>">All</a></li>
			<?php 
			foreach ($pcate as $k=>$v){
				?>
				<li class="<?php echo $k==$product['cateid']?'active':''?>"><a href="<?php echo site_url('ps/ls/'.$k);?>"><?php echo $v;?></a></li>
				<?php
			}
			?>
		</ul>
	</div>

	<div class="article-con-box">
		<div class="article-left" style="width: 885px;">
			<div class="des">
				<h3 class="title"><?php echo $product['name']?>&nbsp;&nbsp;&nbsp;<span>（<?php echo $pcate[$product['cateid']];?>）</span>
				</h3>
			</div>
			<div class="procon">
				<p>
					<i class="fa fa-line-chart hong"></i>
                    <span class="p-title">Purchase starting point : </span>
                    <span class="p-num"><i><?php echo $product['buy_min'];?>&nbsp;thousand yuan</i></span>
				</p>
				<p>
					<i class="fa fa-clock-o hong"></i>
                    <span class="p-title">Time limit : </span>
					<?php 
					//期限时间点
					$count = count($earnlist);
					$i = 1;
					foreach ($earnlist as $k=>$v){
						?>
						<span class="mouth <?php echo $i==1?'active':''?>"
						id="deadline<?=$i?>"
						onclick="javascript:void(0);setTab('deadline',<?=$i?>,<?=$count?>)">
						<i><?=$k?></i>&nbsp;months
					</span>
						<?php
						$i++;
					}
					?>
				</p>
				<?php 
				//收益
				$j = 1;
				$n = 1;
				foreach ($earnlist as $time=>$earn){
					if(empty($earn)){
						continue;
					}
					?>
				<div class="deadline" id="con_deadline_<?=$j?>"
					<?php echo $j!=1?'style="display:none;"':'';?>>
					<div id="carousel-example-generic_<?=$j?>" class="carousel slide"
						data-ride="carousel">

						<div class="carousel-inner" role="listbox">
					    
					    <?php 
					    $n = 1;
					    $c = count($earn);
					    foreach ($earn as $k=>$v){
					    	if($n == 1){
					    		?>
					    		<div class="item active">
					    		<?php
					    	}
					    	?>
					    	<div>
									<a href="javascript:void(0);"><?=$v['earn']?>%</a> <span><?=$v['money']?> thousand yuan</span>
								</div>
					    	<?php
					    	//最后结束符
					    	if($n == $c){
					    		?>
					    		</div>
					    		<?php	
					    	}else{
					    		//被3整除时，重新开始新的item
					    		if($n%3 == 0){
					    			?>
					    			</div>
						<div class="item">
					    			<?php	
					    		}
					    	}
					    	$n ++;
					    }
					    ?>
					  </div>
						<!-- Controls -->
						<a class="left carousel-control" href="#carousel-example-generic_<?=$j?>" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
						</a>
                        <a class="right carousel-control" href="#carousel-example-generic_<?=$j?>" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
					<?php
					$j++;
				}
				?>
			</div>

			<div class="product-nav" id="navbar-example">
				<ul>
					<li class="menuItem"><a href="#pjj">Basic information</a></li>
					<li class="menuItem"><a href="#pxq">Product details</a></li>
					<li class="menuItem"><a href="#pcl">Product file</a></li>
				</ul>
			</div>
			<div id="pjj">
				<h3 class="pro-con-title">Basic information</h3>
				<div class="pro-con-box">
				<?php echo $product['product_baseinfo'];?>
				</div>
			</div>
			<div id="pxq">
				<h3 class="pro-con-title">Product details</h3>
				<div class="pro-con-box">
					<?php echo $product['product_detail'];?>
				</div>
			</div>
			<div id="pcl">
				<h3 class="pro-con-title">Product file</h3>
				<div class="pro-con-box">
					<div class="row">
						<ul>
						<?php 
						if(!empty($pattach)){
							
							foreach ($pattach as $k=>$v){
								$icon = '';
								switch ($v['ext']){
									case 'xls':
									case 'xlsx':
									case 'csv':
										$icon = 'excel.jpg';
										break;
									case 'doc':
									case 'docs':
										$icon = 'word.jpg';
										break;
									case 'pdf':
										$icon = 'pdf.jpg';
										break;
									case 'ppt':
										$icon = 'ppt.jpg';
										break;
									default:
										$icon = 'other.jpg';
										break;
								}
								//echo base_url($v['filepath']);
								//$pathinfo = pathinfo($v['filepath']);
								//$filePath = base_url($pathinfo['dirname'].'/'.urlencode($pathinfo['basename']));
								//echo $filePath;
								?>
								<li><a href="<?php echo base_url($v['filepath']);?>">
                                        <img src="<?php echo base_url('static/frontend/images/'.$icon);?>" />
									<span><?php echo $v['filename'];?></span>
							</a></li>
								<?php
							}
						}
						?>
						</ul>
					</div>
				</div>
			</div>

		</div>
		<div class="article-right">
			<div class="pro-form">
				<form action="<?php echo site_url('ps/order/'.$pid);?>"
					method="POST">
					<div class="form-group">
						<label for="exampleInputEmail1">Name : <i class="fa fa-exclamation"></i></label>
						<input type="text" class="form-control" name="name" placeholder="Your name" required />
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Mobile : <i class="fa fa-exclamation"></i></label>
						<input type="text" class="form-control" name="contact" placeholder="Your mobile No" required />
					</div>
					<div class="form-group">
						<i class="fa fa-heart fa-btn"></i>
						<button type="submit" class="btn btn-default btn-pink">Order now</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="clear"></div>


<script type="text/javascript">
  //initiating jQuery  
  jQuery(function($) {
    $(document).ready( function() {
      //为 '.navbar-wrapper' class 启用stickUp插件
      $('#navbar-example').stickUp({
                    parts: {
                      0:'pjj',
                      1:'pxq',
                      2:'pcl'
                    },
                    itemClass: 'menuItem',
                    itemHover: 'active',
                    marginTop: 'auto'
                  });
    });
  });

</script>
<script type="text/javascript">

function setTab(name,cursel,n){
 for(i=1;i<=n;i++){
  var menu=document.getElementById(name+i);
  var con=document.getElementById("con_"+name+"_"+i);
  menu.className=i==cursel?"mouth active":"mouth";
  con.style.display=i==cursel?"block":"none";
 }
}

</script>
