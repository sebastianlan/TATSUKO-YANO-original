<div class="hhome">
	<div class="home">
		<div class="hileft">
			<img src="<?php echo base_url('static/frontend/images/homef.gif')?>" />&nbsp;&nbsp;Your position :
            <a href="<?php echo site_url();?>">Home</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Online asset allocation</a>
		</div>
		<div class="hiright">
			<a href="javascript:history.go(-1);">Go back&gt;&gt;</a>
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
				<div class="job-list-title0b">
					<div class="page-title0">Online Asset Allocation</div>
					<span class="add">Please fill in listed below information , * is required .</span>
				</div>
				<form name="formSeach" id="formSeach" action="<?php echo site_url('home/asset')?>" method="post">
				<div class="job-list-conn2">
					<div class="job-zaixian">
							<p style="width: 703px; height: 32px; background: #e8e2e2; border-bottom: #cdcbcb 1px solid;"><span style="line-height: 2.2em; color: #000000; font-weight: bold; font-size: 14px; padding-left: 15px">Basic Information</span></p>
                            <p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
                                <span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Real name : </span>
								<input type="text" name="name" size="34" class="cpkey" required value="<?php echo isset($fields['name'])?$fields['name']:''?>" style="height: 20px; width: 160px; margin-top: 5px; line-height: 20px; margin-left: 10px; color: #999999; padding-left: 5px; border: #abadb3 1px solid; float: left;" />
								<span style="float: left; width: 150px; height: 32px; line-height: 2.2em; border-left: #cdcbcb 1px solid; border-right: #cdcbcb 1px solid; color: #000000; margin-left: 10px; padding-left: 10px">Mobile No : </span>
								<input type="text" name="mobile" size="34" class="cpkey" required value="<?php echo isset($fields['mobile'])?$fields['mobile']:''?>" style="height: 20px; width: 160px; margin-top: 5px; line-height: 20px; margin-left: 10px; color: #999999; padding-left: 5px; border: #abadb3 1px solid; float: left;" />
							</p>
							<p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
								<span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Health status : </span>
								<input type="text" name="jiankang" size="150" class="cpkey" value="<?php echo isset($fields['jiankang'])?$fields['jiankang']:''?>" style="height: 20px; width: 430px; margin-top: 5px; line-height: 20px; margin-left: 10px; color: #999999; padding-left: 5px; border: #abadb3 1px solid; float: left;" />
							</p>
							<p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
								<span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Consumer preference : </span>
								<input type="text" name="xiaofei" size="150" class="cpkey"value="<?php echo isset($fields['xiaofei'])?$fields['xiaofei']:''?>" style="height: 20px; width: 430px; margin-top: 5px; line-height: 20px; margin-left: 10px; color: #999999; padding-left: 5px; border: #abadb3 1px solid; float: left;" />
							</p>
							<p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
								<span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Industry : </span>
								<a class="btn-select" id="btn_select">
                                    <select name="hangye" style="width: 200px; height: 22px; margin-top: 5px; margin-left: 10px;">
										<option>— Null —</option>
									<?php
									$hangye = isset ( $fields ['hangye'] ) ? $fields ['hangye'] : '';
									foreach ( $hangyeoption as $k => $v ) {
										?>
										<option value="<?php echo $k;?>"
											<?php echo $hangye==$k ?'selected="selected"':'';?>><?php echo $v;?></option>
										<?php
									}
									?>
								    </select>
								</a>
							</p>
							<?php
							$youqiye = isset ( $fields ['youqiye'] ) ? $fields ['youqiye'] : '';
							?>
							<p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
								<span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Business : </span>
								<input type="radio" name="youqiye" value="1"<?php echo $youqiye==1?'checked':'';?> class="cpkey"style="margin-top: 10px; float: left; background: #faf0db; border: none; margin-left: 10px;">
								<span style="float: left; width: 30px; margin-left: 5px; line-height: 2.5em">Yes</span>
								<input type="radio" name="youqiye" value="2"<?php echo $youqiye==2?'checked':'';?> class="cpkey"style="margin-top: 10px; float: left; background: #faf0db; border: none; margin-left: 10px;">
								<span style="float: left; width: 30px; margin-left: 5px; line-height: 2.5em">No</span>
							</p>
							<p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
								<span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Source of income : </span>
								<?php
								$shouru = isset ( $fields ['shouru'] ) ? $fields ['shouru'] : array ();
								foreach ( $shouruoption as $k => $v ) {
									?>
									<input type="checkbox" name="shouru[]" value="<?php echo $k;?>" <?php echo in_array($k, $shouru)?'checked':''?> style="margin-top: 10px; float: left; background: #faf0db; border: none; margin-left: 10px;">
								    <span style="float: left; width: 56px; line-height: 2.5em; margin-left: 3px;"><?php echo $v;?></span>
									<?php
								}
								?>
							</p>
							<p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
                                <span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Parents alimony : </span>
								<input type="text" name="fumushanyang" size="150" class="cpkey" value="" style="height: 20px; width: 430px; margin-top: 5px; line-height: 20px; margin-left: 10px; color: #999999; padding-left: 5px; border: #abadb3 1px solid; float: left;" />
							</p>
							<p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
								<span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Alimony purpose : </span>
								<a class="btn-select" id="btn_select">
                                    <select name="shanyang"
									style="width: 200px; height: 22px; margin-top: 5px; margin-left: 10px;">
										<option>— Null —</option>
										<?php
										$shanyang = isset ( $fields ['shanyang'] ) ? $fields ['shanyang'] : '';
										foreach ( $shanyangoption as $k => $v ) {
											?>
											<option value="<?php echo $k;?>" <?php echo $shanyang==$k ?'selected="selected"':'';?>><?php echo $v;?></option>
											<?php
										}
										?>
								    </select>
								</a>
							</p>
							<p style="width: 703px; height: 32px; background: #e8e2e2; border-bottom: #cdcbcb 1px solid;">
								<span style="line-height: 2.2em; color: #000000; font-weight: bold; font-size: 14px; padding-left: 15px">Investment History</span>
							</p>
							<p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
								<span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Good at direction : </span>
								<input type="text" name="sctzfx" size="150" class="cpkey" value="" style="height: 20px; width: 430px; margin-top: 5px; line-height: 20px; margin-left: 10px; color: #999999; padding-left: 5px; border: #abadb3 1px solid; float: left;" />
							</p>
							<p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
								<span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Investment product : </span>
								<?php $cjtzcp = isset ( $fields ['cjtzcp'] ) ? $fields ['cjtzcp'] : array (); ?>
                                <input type="checkbox" name="cjtzcp[]" value="1" <?php echo in_array(1, $cjtzcp)?'checked':''?> class="cpkey" style="margin-top: 10px; float: left; background: #faf0db; border: none; margin-left: 10px;">
								<span style="float: left; width: 50px; line-height: 2.5em; margin-left: 3px;">option1</span>
								<input type="checkbox" name="cjtzcp[]" value="2" <?php echo in_array(2, $cjtzcp)?'checked':''?> class="cpkey" style="margin-top: 10px; float: left; background: #faf0db; border: none; margin-left: 10px;">
								<span style="float: left; width: 50px; line-height: 2.5em; margin-left: 3px;">option2</span>
								<input type="checkbox" name="cjtzcp[]" value="3" <?php echo in_array(3, $cjtzcp)?'checked':''?> class="cpkey" style="margin-top: 10px; float: left; background: #faf0db; border: none; margin-left: 10px;">
								<span style="float: left; width: 50px; line-height: 2.5em; margin-left: 3px;">option3</span>
								<input type="checkbox" name="cjtzcp[]" value="4" <?php echo in_array(4, $cjtzcp)?'checked':''?> class="cpkey" style="margin-top: 10px; float: left; background: #faf0db; border: none; margin-left: 10px;">
								<span style="float: left; width: 50px; line-height: 2.5em; margin-left: 3px;">option4</span>
								<input type="checkbox" name="cjtzcp[]" value="5" <?php echo in_array(5, $cjtzcp)?'checked':''?> class="cpkey" style="margin-top: 10px; float: left; background: #faf0db; border: none; margin-left: 10px;">
								<span style="float: left; width: 50px; line-height: 2.5em; margin-left: 3px;">option5</span>
								<input type="checkbox" name="cjtzcp[]" value="6" <?php echo in_array(6, $cjtzcp)?'checked':''?> class="cpkey" style="margin-top: 10px; float: left; background: #faf0db; border: none; margin-left: 10px;">
								<span style="float: left; width: 50px; line-height: 2.5em; margin-left: 3px;">option6</span>
							</p>
							<p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
								<span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Concerned problem : </span>
								<?php
								$tzgzwt = isset ( $fields ['tzgzwt'] ) ? $fields ['tzgzwt'] : array ();
								foreach ( $tzgzwtoption as $k => $v ) {
									?>
									<input type="checkbox" name="tzgzwt[]" value="<?php echo $k;?>" <?php echo in_array($k, $tzgzwt)?'checked':''?> class="cpkey" style="margin-top: 10px; float: left; background: #faf0db; border: none; margin-left: 10px;">
								    <span style="float: left; width: 60px; line-height: 2.5em; margin-left: 3px;"><?php echo $v;?></span>
									<?php
								}
								?>
							</p>
							<p style="width: 703px; height: 32px; border-bottom: #cdcbcb 1px solid;">
								<span style="float: left; width: 150px; height: 32px; line-height: 2.5em; border-right: #cdcbcb 1px solid; color: #000000; padding-left: 10px">Information source : </span>
								<?php
								$tzzxly = isset ( $fields ['tzzxly'] ) ? $fields ['tzzxly'] : array ();
								foreach ( $tzzxlyoption as $k => $v ) {
									?>
									<input type="checkbox" name="tzzxly[]" value="<?php echo $k;?>" <?php echo in_array($k, $tzzxly)?'checked':''?> class="cpkey" style="margin-top: 10px; float: left; background: #faf0db; border: none; margin-left: 10px;">
								    <span style="float: left; width: 60px; line-height: 2.5em; margin-left: 3px;"><?php echo $v;?></span>
									<?php
								}
								?>
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
				</div>
			</form>
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