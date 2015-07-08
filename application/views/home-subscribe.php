<div class="hhome">
	<div class="home">
		<div class="hileft">
			<img src="<?php echo base_url('static/frontend/images/homef.gif')?>" />&nbsp;&nbsp;Your position :
            <a href="<?php echo site_url();?>">Home</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Online booking</a>
		</div>
		<div class="hiright">
			<a href="javascript:history.go(-1);">Go bac&gt;&gt;</a>
		</div>
	</div>
</div>
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

<div class="list">
	<div class="article-con-box">
		<div class="article-left">
			<div class="job-list">
				<div class="job-list-title0">
					<div class="page-title0">Online Booking</div>
					<span class="add">Please fill in listed below information , * is required .</span>
				</div>
				<div class="job-list-conn">
					<form name="formSeach" id="formSeach" action="<?php echo site_url('home/subscribe')?>" method="post">
						<p style="width: 790px; overflow: hidden; margin-bottom: 20px;">
							<span style="float: left; width: 230px; text-align: right; line-height: 2em">Name</span>
							<input type="text" name="name" size="27" class="cpkey" value="<?php echo isset($fields['name'])?$fields['name']:'';?>" required style="height: 23px; line-height: 22px; color: #999999; padding-left: 5px; background: #faf0db; border: #909090 1px solid; float: left; margin-left: 10px;" />
							<span style="color: #a40000; float: left; line-height: 2em; margin-left: 8px;">*</span>
							<span style="color: #6e6e6e; float: left; line-height: 2em; margin-left: 8px;">Please enter your real name</span>
						</p>
						<p style="width: 790px; overflow: hidden; margin-bottom: 17px;">
							<span style="float: left; width: 230px; text-align: right; line-height: 2em">Mobile No</span>
							<input type="text" name="mobile" size="27" class="cpkey" value="<?php echo isset($fields['mobile'])?$fields['mobile']:'';?>" required style="height: 23px; line-height: 22px; color: #999999; padding-left: 5px; background: #faf0db; border: #909090 1px solid; float: left; margin-left: 10px;" />
							<span style="color: #a40000; float: left; line-height: 2em; margin-left: 8px;">*</span>
							<span style="color: #6e6e6e; float: left; line-height: 2em; margin-left: 8px;">Please enter your contact phone number</span>
						</p>

						<p style="width: 790px; overflow: hidden">
							<span style="float: left; width: 230px; text-align: right; line-height: 2em">Product</span>
							<?php
							$wantprodcut = isset ( $fields ['wantproduct'] ) ? $fields ['wantproduct'] : array ();
							foreach ( $product as $k => $v ) {
								?>
								<input type="checkbox" name="wantproduct[]" value="<?php echo $k;?>" class="cpkey" <?php echo in_array($k, $wantprodcut)?'checked':'';?> style="margin-top: 6px; float: left; background: #faf0db; border: none; margin-left: 10px;">
							    <span style="float: left; width: 90px;"><?php echo $v;?></span>
								<?php
							}
							?>
						</p>

						<div id="box3" class="box3">
							<p style="width: 790px; overflow: hidden; margin-bottom: 17px; margin-top: 17px;">
								<span style="float: left; width: 230px; text-align: right; line-height: 2em">Age</span>
								<input type="text" name="age" size="27" class="cpkey" value="<?php echo isset($fields['age'])?$fields['age']:'';?>" style="height: 23px; line-height: 22px; color: #999999; padding-left: 5px; background: #faf0db; border: #909090 1px solid; float: left; margin-left: 10px;" />
							</p>

                            <?php
                            $type = isset ( $fields ['type'] ) ? $fields ['type'] : 0;
                            ?>

                            <p style="width: 790px; overflow: hidden">
								<span style="float: left; width: 230px; text-align: right; line-height: 2em">Character</span>
								<input type="radio" name="type" value="1" <?php echo $type==1?'checked':'';?> class="cpkey" style="margin-top: 6px; float: left; background: #faf0db; border: none; margin-left: 10px;">
								<span style="float: left; width: 90px;">option1</span>
                                <input type="radio" name="type" value="2" <?php echo $type==2?'checked':'';?> class="cpkey" style="margin-top: 6px; float: left; background: #faf0db; border: none; margin-left: 10px;">
								<span style="float: left; width: 90px;">option2</span>
							</p>
							<p style="width: 790px; overflow: hidden; margin-bottom: 17px; margin-top: 17px;">
								<span style="float: left; width: 230px; text-align: right; line-height: 2em">E-mail</span>
								<input type="text" name="email" size="27" class="cpkey" value="<?php echo isset($fields['email'])?$fields['email']:'';?>" style="height: 23px; line-height: 22px; color: #999999; padding-left: 5px; background: #faf0db; border: #909090 1px solid; float: left; margin-left: 10px;" />
							</p>
							<p style="width: 790px; overflow: hidden">
								<span style="float: left; width: 230px; text-align: right; line-height: 2em">Condition</span>
								<?php
								$oldproduct = isset ( $fields ['oldproduct'] ) ? $fields ['oldproduct'] : array ();
								foreach ( $product as $k => $v ) {
									?>
								<input type="checkbox" name="oldproduct[]" value="<?php echo $k;?>" class="cpkey" <?php echo in_array($k, $oldproduct)?'checked':'';?> style="margin-top: 6px; float: left; background: #faf0db; border: none; margin-left: 10px;">
								<span style="float: left; width: 90px;"><?php echo $v;?></span>
								<?php
								}
								?>	
							</p>
							<p style="width: 790px; overflow: hidden; margin-bottom: 17px; margin-top: 17px;">
								<span style="float: left; width: 230px; text-align: right; line-height: 2em">Description</span>
								<textarea name="desc" rows="8" cols="70" id="textContent" style="margin-top: 6px; float: left; background: #faf0db; border: 1px #999999 solid; margin-left: 10px;; margin-left: 10px;"><?php echo isset($fields['desc'])?$fields['desc']:'';?></textarea>
							</p>
							<p style="width: 790px; overflow: hidden; margin-bottom: 17px; margin-top: 17px;">
								<span style="float: left; width: 230px; text-align: right; line-height: 2em">Address</span>
								<input type="text" name="addr" size="50" class="cpkey" value="<?php echo isset($fields['addr'])?$fields['addr']:'';?>" style="height: 23px; line-height: 22px; color: #999999; padding-left: 5px; background: #faf0db; border: #909090 1px solid; float: left; margin-left: 10px;" />
							</p>
							<p style="width: 790px; overflow: hidden; margin-bottom: 17px; margin-top: 17px;">
								<span style="float: left; width: 230px; text-align: right; line-height: 2em">Postcode</span>
								<input type="text" name="areacode" size="27" class="cpkey" value="<?php echo isset($fields['areacode'])?$fields['areacode']:'';?>" style="height: 23px; line-height: 22px; color: #999999; padding-left: 5px; background: #faf0db; border: #909090 1px solid; float: left; margin-left: 10px;" />
							</p>

						</div>
						
						<?php
						if (! isset ( $fields ['submit'] )) {
							?>
							<input type="hidden" name="submit" />
						<p style="width: 588px; overflow: hidden; text-align: center; margin-top: 22px;">
							<input type="image" class="image" src="<?php echo base_url('static/frontend/images/submit.jpg')?>" align="top" style="margin-top: 25px;; margin-left: 10px;">
						</p>
							<?php
						}
						
						?>
					</form>

				</div>

			</div>
		</div>
		<div class="article-right">
			<h5>
                &gt; Learn more , please <a href="<?php echo site_url('home/register')?>">sign up</a> or <a href="<?php echo site_url('home/login')?>">sign in</a>
			</h5>
			<p style="margin-top: 35px;">
				<img src="<?php echo base_url('static/frontend/images/shouzhua.jpg')?>" width="245" height="211">
			</p>
			<br />
		</div>
	</div>
</div>

<div class="clear"></div>