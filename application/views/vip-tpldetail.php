<?php
/**
 * 续期明细
 */
?>
<div class="hhome" style="margin-bottom:0px;">
	<div class="home">
		<div class="hileft">
			<img src="<?php echo base_url('static/frontend/images/homef.gif')?>" />&nbsp;&nbsp;Your position :
            <a href="<?php echo site_url();?>">Home</a>&nbsp;&gt;&nbsp;
            <a href="<?php echo site_url('vip/index')?>">Members area</a>&nbsp;&gt;&nbsp;
            <a href="<?php echo site_url('vip/index')?>">Renewal details</a>
		</div>
		<div class="hiright">
			<a href="javascript:history.go(-1);">Go back&gt;&gt;</a>
		</div>
	</div>
</div>
<div class="ameni">
	<div class="ameni2">
		<h2>
			<img src="<?php echo base_url('static/frontend/images/banner-m.png')?>" width="1200" height="373" />
		</h2>
		<div class="nav">
			<ul>
				<li style="border-right: #CCCCCC 1px dashed;"><a href="<?php echo site_url('vip/index')?>">Contract renewal</a></li>
				<li style="border-right: #CCCCCC 1px dashed;"><a href="javascript:void(0);">Member management</a>
					<ul style="border-right: #CCCCCC 1px solid;">
						<li><a href="<?php echo site_url('vip/editpwd')?>">Edit password</a></li>
						<li><a href="<?php echo site_url('vip/editprofiles')?>">Improve profile</a></li>
					</ul>
                </li>
				<li style="border-right: #CCCCCC 1px dashed;"><a href="<?php echo site_url('home/risk')?>">Online risk test</a></li>
				<li style="border: none"><a href="<?php echo site_url('home/asset')?>">Online asset allocation</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="zhongs">
	<h2>
		<?php echo $mp['pname']?><span> [ Details ]</span>
	</h2>
	<div class="mingxi">
		<span style="color: #777777">Price : </span>
        <span style="color: #9f4f00; font-weight: bold; font-style: oblique">￥<?php echo $mp['buymoney']?> yuan</span>
		<span style="color: #777777; margin-left: 30px;">Payment method : </span>
        <span style="color: #333333"><?php echo $eran_time[$mp['type']]?></span>
        <span style="color: #777777; margin-left: 30px;">Interest rate : </span>
        <span style="color: #333333"><?php echo $mp['earn']?>%</span>
        <span style="color: #777777; margin-left: 30px;">Time limit : </span>
        <span style="color: #333333"><?php echo $mp['overtime']?> months</span>
        <span style="color: #777777; margin-left: 30px;">Earnings : </span>
        <span style="color: #333333">￥<?php echo $mp['total']?></span>
	</div>
	<div class="mingxib">
		<div class="mxb">
			<ul>
				<li style="width: 77px; border-right: #CCCCCC 1px solid">No</li>
				<li style="width: 450px; border-right: #CCCCCC 1px solid">Product name</li>
				<li style="width: 170px; border-right: #CCCCCC 1px solid">Purchase Date</li>
				<li style="width: 150px;">Price</li>
			</ul>

		</div>
		<?php 
		if(empty($tpldetail)){
			echo '<div class="mxb1">No data</div>';
		}else{
			foreach ($tpldetail as $k=>$v){
				?>
				<div class="mxb1">
					<ul>
						<li style="width: 77px; border-right: #CCCCCC 1px solid"><?php echo str_pad(($k+1),2,'0',STR_PAD_LEFT)?></li>
						<li style="width: 450px; border-right: #CCCCCC 1px solid"><?php echo $mp['pname']?></li>
						<li style="width: 170px; border-right: #CCCCCC 1px solid"><?php echo date('Y-m-d',$v['time'])?></li>
						<li style="width: 150px;">￥<?php echo $v['money']?></li>
					</ul>
				</div>
				<?php
			}
			
		}
		?>
	</div>
	<div class="heji">
        Total : <span style="color: #f5740c; font-size: 14px;">￥<?php echo $mp['total']?></span>
	</div>

</div>
<div class="clear"></div>