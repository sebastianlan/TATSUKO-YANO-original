<?php
/**
 * 修改密码
 */
?>
<div class="hhome" style="margin-bottom: 0px;">
	<div class="home">
		<div class="hileft">
			<img src="<?php echo base_url('static/frontend/images/homef.gif')?>" />&nbsp;&nbsp;Your position :
            <a href="<?php echo site_url();?>">Home</a>&nbsp;&gt;&nbsp;
            <a href="<?php echo site_url('vip/index')?>">Members area</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Edit password</a>
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
					</ul></li>
				<li style="border-right: #CCCCCC 1px dashed;"><a href="<?php echo site_url('home/risk')?>">Online risk test</a></li>
				<li style="border: none"><a href="<?php echo site_url('home/asset')?>">Online asset allocation</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="zhongs">
	<div class="job_xiug">
		<form name="formSeach" id="formSeach" action="<?php echo site_url('vip/editpwd')?>" method="post">
			<?php 
			if($member['mobile']!=''){
				?>
				<p style="width: 1000px; overflow: hidden; margin-left: 200px; margin-bottom: 15px;">
					<span style="color: #333333; height: 26px; font-size: 14px;">Mobile No : </span>
                    <span style="color: #85622b; font-size: 14px; height: 26px;"><?php echo $member['mobile']?></span><br>
				</p>
				<?php
			}
			if($member['idcard']!=''){
				?>
				<p style="width: 1000px; overflow: hidden; margin-left: 200px; margin-bottom: 15px;">
					<span style="color: #333333; height: 26px; font-size: 14px;">ID card No : </span>
                    <span style="color: #85622b; font-size: 14px; height: 26px;"><?php echo $member['idcard']?></span><br>
				</p>
				<?php
			}
			?>

			<p style="width: 1000px; overflow: hidden; margin-left: 200px;">
				<span style="text-align: left; line-height: 2em; font-size: 14px; color: #333333">Current password</span>
                <span style="color: #999999; font-size: 14px; line-height: 2em">( Enter current password must to modify )</span><br>
				<input type="password" name="password1" size="66" class="cpkey" value="" required style="height: 42px; line-height: 42px; color: #999999; background: #fff; border: #cccccc 1px solid;padding-left:5px;" />
			</p>
			<p style="width: 1000px; overflow: hidden; margin-left: 200px; margin-top: 12px;">
				<span style="text-align: left; line-height: 2em; font-size: 14px; color: #333333">Password</span><br>
				<input type="password" name="password2" size="66" class="cpkey" value="" required style="height: 42px; line-height: 42px; color: #999999; background: #fff; border: #cccccc 1px solid;padding-left:5px;" />
			</p>
			<p style="width: 1000px; overflow: hidden; margin-left: 200px; margin-top: 12px;">
				<span style="text-align: left; line-height: 2em; font-size: 14px; color: #333333">Confirm password</span><br>
				<input type="password" name="password3" size="66" class="cpkey" value="" required style="height: 42px; line-height: 42px; color: #999999; background: #fff; border: #cccccc 1px solid;padding-left:5px;" />
			</p>
			<p style="width: 1000px; overflow: hidden; margin-left: 200px; margin-top: 18px;">
				<input type="image" class="image"src="<?php echo base_url('static/frontend/images/save.jpg')?>" align="top" style="margin-top: 25px;">
			</p>
		</form>
	</div>
</div>
<div class="clear"></div>