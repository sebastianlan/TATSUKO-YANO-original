<div class="hhome">
	<div class="home">
		<div class="hileft">
			<img src="<?php echo base_url('static/frontend/images/homef.gif')?>" />&nbsp;&nbsp;Your position :
            <a href="<?php echo site_url();?>">Home</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Online risk test</a>
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
				<div class="job-list-title0">
					<div class="page-title0">
						<strong>Online Risk Test</strong>
					</div>
					<span class="add">Please fill in listed below information , * is required .</span>
				</div>
				<div class="job-ceshi">
					<div class="cheshi_left">
						<form name="formSeach" id="formSeach" action="<?php echo site_url('home/risk')?>" method="post" >
							<p style="width: 350px; overflow: hidden">
								<span style="text-align: left; line-height: 3em">Name</span><br>
                                <input type="text" name="name" size="32" class="cpkey" value="<?php echo isset($fields['name'])?$fields['name']:''?>" required style="height: 36px; line-height: 22px; color: #999999; background: #f2f0f0; border: #909090 1px solid;padding-left:5px;" />
								<span style="color:red;margin-left:5px;">*</span>
							</p>
							<p style="width: 350px; overflow: hidden">
								<span style="text-align: left; line-height: 3em">Occupation</span><br>
								<input type="text" name="job" size="32" class="cpkey" value="<?php echo isset($fields['job'])?$fields['job']:''?>" style="height: 36px; line-height: 22px; color: #999999; background: #f2f0f0; border: #909090 1px solid;padding-left:5px;" />
							</p>
							<p style="width: 350px; overflow: hidden">
								<span style="text-align: left; line-height: 3em">Burden</span><br>
								<div class="xl">
									<input class="submit" type="hidden" name="jtfd" value="" />
									<div class="xl_butn"></div>
									<div class="xl_nner">
										<div class="mr">Please select</div>
										<div class="xl_nner_option">
											<?php 
											foreach ($jtfdoption as $k=>$v){
												?>
												<p data-value="<?php echo $k;?>"><?php echo $v;?></p>
												<?php
											}
											?>
										</div>
									</div>
								</div>
							</p>
							<p style="width: 350px; overflow: hidden">
								<span style="text-align: left; line-height: 3em">Experience</span><br>
								<div class="xl">
									<input class="submit" type="hidden" name="tzjy" value="" />
									<div class="xl_butn"></div>
									<div class="xl_nner">
										<div class="mr">Please select</div>
										<div class="xl_nner_option">
											<?php 
											foreach ($tzjyoption as $k=>$v){
												?>
												<p data-value="<?php echo $k;?>"><?php echo $v;?></p>
												<?php
											}
											?>
										</div>
									</div>
								</div>
							</p>
							<p style="width: 350px; overflow: hidden">
								<span style="text-align: left; line-height: 3em">Factor</span><br>
								<div class="xl">
									<input class="submit" type="hidden" name="syys" value="" />
									<div class="xl_butn"></div>
									<div class="xl_nner">
										<div class="mr">Please select</div>
										<div class="xl_nner_option">
											<?php 
											foreach ($syysoption as $k=>$v){
												?>
												<p data-value="<?php echo $k;?>"><?php echo $v;?></p>
												<?php
											}
											?>
										</div>
									</div>
								</div>
							</p>


					</div>

					<div class="cheshi_right">

							<p style="width: 350px; overflow: hidden">
								<span style="text-align: left; line-height: 3em">Mobile No</span><br>
                                <input type="text" name="mobile" size="32" class="cpkey" value="<?php echo isset($fields['mobile'])?$fields['mobile']:''?>" required style="height: 36px; line-height: 22px; color: #999999; background: #f2f0f0; border: #909090 1px solid;padding-left:5px;" />
								<span style="color:red;margin-left:5px;">*</span>
							</p>
							<p style="width: 350px; overflow: hidden">
								<span style="text-align: left; line-height: 3em">Level</span><br>
								<div class="xl">
									<input class="submit" type="hidden" name="tzljcd" value="" />
									<div class="xl_butn"></div>
									<div class="xl_nner">
										<div class="mr">Please select</div>
										<div class="xl_nner_option">
											<?php 
											foreach ($tzljcdoption as $k=>$v){
												?>
												<p data-value="<?php echo $k;?>"><?php echo $v;?></p>
												<?php
											}
											?>
										</div>
									</div>
								</div>
							</p>
							<p style="width: 350px; overflow: hidden">
								<span style="text-align: left; line-height: 3em">Condition</span><br>
								<div class="xl">
									<input class="submit" type="hidden" name="zyqk" value="" />
									<div class="xl_butn"></div>
									<div class="xl_nner">
										<div class="mr">Please select</div>
										<div class="xl_nner_option">
											<?php 
											foreach ($zyqkoption as $k=>$v){
												?>
												<p data-value="<?php echo $k;?>"><?php echo $v;?></p>
												<?php
											}
											?>
										</div>
									</div>
								</div>
							</p>
							<p style="width: 350px; overflow: hidden">
								<span style="text-align: left; line-height: 3em">Investment</span><br>
								<div class="xl">
									<input class="submit" type="hidden" name="zytz" value="" />
									<div class="xl_butn"></div>
									<div class="xl_nner">
										<div class="mr">Please select</div>
										<div class="xl_nner_option">
											<?php 
											foreach ($zytzoption as $k=>$v){
												?>
												<p data-value="<?php echo $k;?>"><?php echo $v;?></p>
												<?php
											}
											?>
										</div>
									</div>
								</div>
							</p>
							
							<?php
					if (! isset ( $fields ['submit'] )) {
						?>
							<input type="hidden" name="submit" />
							<p style="width: 350px; overflow: hidden">
								<input type="image" class="image" src="<?php echo base_url('static/frontend/images/submit.jpg')?>" align="top" style="margin-top: 35px;">
							</p>
							<?php
					}
					
					?>
						</p>
						</form>

					</div>

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


<script type="text/javascript">
$('.mr').click(function(e){
	var that = $(this);
	if(that.hasClass('on')){
		that.next('.xl_nner_option').hide();
		that.removeClass('on');
		return false;
	}
	$('.xl_nner_option').hide();
	$('.xl_nner_option').prev('.mr').removeClass('on');
	that.next('.xl_nner_option').show();
	that.addClass('on');
});

$('.xl_nner_option p').click(function(e){
	//显示
	$(this).parents('.xl').find('.mr').html($(this).html());
	//设定提交的值
	$(this).parents('.xl').find('.submit').val($(this).data('value'));
	//关闭下拉
	$(this).parents('.xl_nner_option').hide();
	$(this).parents('.xl').find('.mr').removeClass('on');
});

$('.xl_butn').click(function(e){
	var that = $(this).next('.xl_nner').find('.mr');
	if(that.hasClass('on')){
		that.next('.xl_nner_option').hide();
		that.removeClass('on');
		return false;
	}
	that.next('.xl_nner_option').show();
	that.addClass('on');
});
</script>