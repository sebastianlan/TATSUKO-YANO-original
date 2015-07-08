<?php
/**
 * 完善资料
 */
?>
<div class="hhome" style="margin-bottom: 0px;">
	<div class="home">
		<div class="hileft">
			<img src="<?php echo base_url('static/frontend/images/homef.gif')?>" />&nbsp;&nbsp;Your position :
            <a href="<?php echo site_url();?>">Home</a>&nbsp;&gt;&nbsp;
            <a href="<?php echo site_url('vip/index')?>">Members area</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Improve profile</a>
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
		<form name="formSeach" id="formSeach"
			action="<?php echo site_url('vip/editprofiles')?>" method="post">
			<?php
			if ($member ['mobile'] != '') {
				?>
				<p style="width: 1000px; overflow: hidden; margin-left: 200px; margin-bottom: 15px;">
				<span style="color: #333333; height: 26px; font-size: 14px;">Mobile No : </span>
                <span style="color: #85622b; font-size: 14px; height: 26px;"><?php echo $member['mobile']?></span><br>
			    </p>
				<?php
			}
			?>
            <p style="width: 1000px; overflow: hidden; margin-left: 200px;">
				<span style="text-align: left; line-height: 2em; font-size: 14px; color: #333333">Name</span>
                <span style="color: #999999; font-size: 14px; line-height: 2em">( Please enter your real name, for us to contact you )</span><br>
				<input type="text" name="nickname" size="66" class="cpkey" value="<?php echo $member['nickname']?>" style="height: 42px; line-height: 42px; color: #999999; background: #fff; border: #cccccc 1px solid; padding-left: 5px;" />
			</p>
			<p style="width: 1000px; overflow: hidden; margin-left: 200px; margin-top: 12px;">
				<span style="text-align: left; line-height: 2em; font-size: 14px; color: #333333">ID card No</span><br>
				<input type="text" name="idcard" size="66" class="cpkey" value="<?php echo $member['idcard']?>" style="height: 42px; line-height: 42px; color: #999999; background: #fff; border: #cccccc 1px solid; padding-left: 5px;" />
			</p>
			<p style="width: 1000px; overflow: hidden; margin-left: 200px; margin-top: 12px;">
				<span style="text-align: left; line-height: 2em; font-size: 14px; color: #333333">Primary email</span><br>
				<input type="text" name="email" size="66" class="cpkey" value="<?php echo $member['email']?>" style="height: 42px; line-height: 42px; color: #999999; background: #fff; border: #cccccc 1px solid; padding-left: 5px;" />
			</p>
			<p style="width: 1000px; overflow: hidden; margin-left: 200px; margin-top: 12px;">
				<span style="text-align: left; line-height: 2em; font-size: 14px; color: #333333">Age</span><br>
				<input type="text" name="age" size="33" class="cpkey" value="<?php echo $member['age']?>" style="height: 42px; line-height: 42px; color: #999999; background: #fff; border: #cccccc 1px solid; padding-left: 5px;" />
			</p>
			<p style="width: 1000px; overflow: hidden; margin-left: 200px; margin-top: 12px;">
				<span style="float: left; width: 50px; text-align: right; line-height: 1.5em; font-size: 14px; color: #333333; margin-top: 3px;">Gender</span>
				<input type="radio" name="sex" value="1" class="cpkey" <?php echo $member['sex']==1?'checked':'';?> style="margin-top: 6px; float: left; background: #faf0db; border: none; margin-left: 10px;">
				<span style="float: left; width: 50px; line-height: 2em; margin-left: 6px; margin-top: 1px;">Male</span>
				<input type="radio" name="sex" value="2" class="cpkey" <?php echo $member['sex']==2?'checked':'';?> style="margin-top: 6px; float: left; background: #faf0db; border: none; margin-left: 10px;">
				<span style="float: left; width: 30px; line-height: 2em; margin-left: 6px; margin-top: 1px;">Female</span>
			</p>
			<p style="width: 1000px; overflow: hidden; margin-left: 200px; margin-top: 18px;">
				<input type="image" class="image" src="<?php echo base_url('static/frontend/images/save.jpg')?>" align="top" style="margin-top: 25px;">
			</p>
		</form>
	</div>
</div>
<div class="clear"></div>