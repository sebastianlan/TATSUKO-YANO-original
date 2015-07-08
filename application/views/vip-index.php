<?php
/**
 * 会员首页 续期列表
 */
?>
<div class="hhome" style="margin-bottom:0px;">
	<div class="home">
		<div class="hileft">
			<img src="<?php echo base_url('static/frontend/images/homef.gif')?>" />&nbsp;&nbsp;Your position :
            <a href="<?php echo site_url();?>">Home</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Members area</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Contract renewal</a>
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
				<li style="border-right: #CCCCCC 1px dashed;"><a href="<?php echo site_url('vip/index')?>">Contract renewal</a>
				</li>
				<li style="border-right: #CCCCCC 1px dashed;"><a href="javascript:void(0);">Member management</a>
					<ul style="border-right: #CCCCCC 1px solid;">
						<li><a href="<?php echo site_url('vip/editpwd')?>">Edit password</a></li>
						<li><a href="<?php echo site_url('vip/editprofiles')?>">Improve profile</a></li>
					</ul></li>
				<li style="border-right: #CCCCCC 1px dashed;"><a href="<?php echo site_url('home/risk')?>">Online risk test</a></li>
				<li style="border: none"><a href="<?php echo site_url('home/asset')?>">Online asset allocation</a></li>
			</ul>
		</div>
	</div>
</div>

<div class="zhongs">
	<div class="saixuan">
		<img src="<?php echo base_url('static/frontend/images/saixuan.png')?>" width="18" height="22" style="padding-right: 10px;">filter :&nbsp;&nbsp;
        <select id="plist">
			<option value="">Please select a product</option>
			<?php 
			if(!empty($plist)){
				foreach ($plist as $v){
					?>
					<option value="<?php echo $v['pid'];?>" <?php echo $v['pid']==$product_id?'selected="selected"':''?>><?php echo $v['pname'];?></option>
					<?php
				}
			}
			?>
			</select>
	</div>
	<script type="text/javascript">
	var url = '<?php echo site_url('vip/index')?>'
	$('#plist').change(function(){
		window.location.href=url+'/'+$(this).val();
	});
	</script>
	<div class="daohang">
		<ul>
			<li style="width: 80px; background: url(images/cha.gif) no-repeat right top; height: 43px;">No</li>
			<li style="width: 330px; background: url(images/chazi.gif) no-repeat right top; height: 43px;">Product name</li>
			<li style="width: 175px; background: url(images/cha.gif) no-repeat right top; height: 43px;">Price</li>
			<li style="width: 130px; background: url(images/cha.gif) no-repeat right top; height: 43px;">Payment method</li>
			<li style="width: 125px; background: url(images/cha.gif) no-repeat right top; height: 43px;">Interest rate</li>
			<li style="width: 120px; background: url(images/cha.gif) no-repeat right top; height: 43px;">Time limit</li>
			<li style="width: 125px; height: 43px;">Operation</li>
		</ul>
	</div>
	<?php 
	if(empty($list)){
		?>
		<div class="daohang1">No data</div>
		<?php
	}else{
		//print_r($list);
		foreach ($list as $k=>$v){
			?>
			<div class="daohang1">
				<ul>
					<li style="width: 80px; background: url(<?php echo base_url('static/frontend/images/cha1.gif')?>) no-repeat right top; height: 43px;"><?php echo str_pad(($k+1),2,'0',STR_PAD_LEFT)?></li>
					<li style="width: 330px; background: url(<?php echo base_url('static/frontend/images/chazi1.gif')?>) no-repeat right top; height: 43px; color: #9f4f00"><a style="color: #9f4f00;" target="_blank" href="<?php echo site_url('ps/detail/'.$v['product_id']);?>"><?php echo $v['pname']?></a></li>
					<li style="width: 175px; background: url(<?php echo base_url('static/frontend/images/cha1.gif')?>) no-repeat right top; height: 43px; color: #9f4f00">￥<?php echo $v['buymoney']?></li>
					<li style="width: 130px; background: url(<?php echo base_url('static/frontend/images/cha1.gif')?>) no-repeat right top; height: 43px;"><?php echo $eran_time[$v['type']]?></li>
					<li style="width: 125px; background: url(<?php echo base_url('static/frontend/images/cha1.gif')?>) no-repeat right top; height: 43px;"><?php echo $v['earn']?>%</li>
					<li style="width: 120px; background: url(<?php echo base_url('static/frontend/images/cha1.gif')?>) no-repeat right top; height: 43px;"><?php echo $v['overtime']?> months</li>
					<li style="width: 125px; height: 43px;"><a style="color: #9f4f00;" href="<?php echo site_url('vip/tpldetail/'.$v['id'])?>">Renewal details</a></li>
		
				</ul>
			</div>
			<?php
		}
	}
	?>
	<div class="clear"></div>
	<div class="show-page">
		<?php echo $this->pagination->create_links();?>
	</div>
</div>

<div class="clear"></div>