<link href="<?php echo base_url('static/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" />
<div class="list">
	<div class="article-con-box">
		<div class="article-left">
			<div class="job-list">
				<div class="job-list-title0">
					<div class="page-title0">Member Sign Up</div>
					<span class="add">Please fill in your information , * is required .</span>
				</div>
				<div class="job-list-conn">
					<form name="formSeach" id="formSeach" action="<?php echo site_url('home/register')?>" method="post" onSubmit="return check()">
						<p style="width: 790px; overflow: hidden">
							<span style="float: left; width: 230px; text-align: right; line-height: 3em">Mobile No</span>
							<input type="text" id="mobile" name="mobile" size="34" class="cpkey" value="" style="height: 36px; line-height: 22px; color: #999999; padding-left: 5px; background: #f2f0f0; border: #909090 1px solid; float: left" />
							<span style="float: left; margin-left: 10px; color: red; line-height: 2em;">*</span>
							<span style="float: left; margin-left: 10px; color: red; line-height: 3em; display: none;" class="info" id="mobileinfo">Please enter phone number</span>
						</p>

						<br>
						<p style="width: 790px; overflow: hidden">
							<input type="hidden" value="" id="authcode" name="authcode" /> <span style="float: left; width: 70px; width: 230px; text-align: right; line-height: 3em">Auth Code</span>
							<input type="text" size="19" class="cpkey" id="inputcode" name="inputcode" style="height: 36px; line-height: 22px; color: #999999; padding-left: 5px; background: #f2f0f0; border: #909090 1px solid; float: left" />
							<span class="k" style="background: url(<?php echo site_url('static/frontend/images/yanzheng.gif');?>); width: 100px; height: 38px; float: left; margin-left: 5px; ">
								<a href="javascript:void(0);" id="toggle"><span>Send Auth</span></a>
							</span> 
							 <span style="float: left; margin-left: 10px; color: red; line-height: 2em;">*</span>
							<span style="float: left; margin-left: 10px; color: red; line-height: 3em; display: none;" class="info" id="inputcodeinfo">Please enter auth code</span>
						</p>
						<br>

						<p style="width: 790px; overflow: hidden">
							<span style="float: left; width: 230px; text-align: right; line-height: 3em">Password</span>
							<input type="password" id="password1" name="password" size="34" class="cpkey" value="" style="height: 36px; line-height: 22px; color: #999999; padding-left: 5px; background: #f2f0f0; border: #909090 1px solid; float: left" />
							<span style="float: left; margin-left: 10px; color: red; line-height: 2em;">*</span>
							<span style="float: left; margin-left: 10px; color: red; line-height: 3em; display: none;" class="info" id="password1info">Please enter password</span>
						</p>
						<br>
						<p style="width: 790px; overflow: hidden">
							<span style="float: left; width: 230px; text-align: right; line-height: 3em">Confirm Password</span>
							<input type="password" id="password2" size="34" class="cpkey" value="" style="height: 36px; line-height: 22px; color: #999999; padding-left: 5px; background: #f2f0f0; border: #909090 1px solid; float: left" />
							<span style="float: left; margin-left: 10px; color: red; line-height: 2em;">*</span>
							<span style="float: left; margin-left: 10px; color: red; line-height: 3em; display: none;" class="info" id="password2info">Please enter password again</span>
						</p>
						<br>

						<p style="width: 650px; overflow: hidden; text-align: center">
							<input type="image" class="image" src="<?php echo site_url('static/frontend/images/signup.jpg')?>" align="top" style="margin-top: 25px;">
						</p>
					</form>

				</div>

			</div>

		</div>
		<div class="article-right">
			<h5>
				&gt; I already have a account , <a href="<?php echo site_url('home/login')?>">sign in</a>
			</h5>
			<p style="margin-top: 35px;">
				<img src="<?php echo site_url('static/frontend/images/shouzhua.jpg')?>" width="245" height="211">
			</p>
			<br />
		</div>

		<script type="text/javascript">
		function check(){
			if($('#mobile').val()==''){
				$('#mobileinfo').html('Please enter phone number').show();
				$('#mobile').focus();
				return false;
			}

			if($('#inputcode').val()==''){
				$('#inputcodeinfo').html('Please enter auth code').show();
				$('#inputcode').focus();
				return false;
			}

			if($('#password1').val()==''){
				$('#password1info').html('Please enter password').show();
				$('#password1').focus();
				return false;
			}

			if($('#password2').val()==''){
				$('#password2info').html('Please enter password again').show();
				$('#password2').focus();
				return false;
			}

			if($('#password1').val()!=$('#password2').val()){
				$('#password1info').html('The password and confirmation password are different').show();
				$('#password1').focus();
				return false;
			}
			return true;
		}
		
		$('#mobile').keyup(function(){
			if($(this).val() == ''){
				$('#mobileinfo').html('Please enter phone number').show();
			}else{
				$('#mobileinfo').html('Please enter phone number').hide();
			}
			});
		$('#inputcode').keyup(function(){
			if($(this).val() == ''){
				$('#inputcodeinfo').html('Please enter auth code').show();
			}else{
				$('#inputcodeinfo').html('Please enter auth code').hide();
			}
			});
		$("input[type='password']").keyup(function(){
				if($(this).val() == ''){
					$(this).parents('p').find('.info').show();
				}else{
					$(this).parents('p').find('.info').hide();
				}
			});

		$('#toggle').click(function(){
			var phone = $('#mobile').val();
			if(!$(this).hasClass('on')){
				//未发送
				if(!phone.match(/^((13[0-9])|(15[^4,\D])|(18[0,5-9]))\d{8}$/)){
					$('#mobileinfo').html('Please enter a valid phone number').show();
				}else{
					$('#toggle').html('<span>sending ...</span>');
					//发请求
					$.ajax({
							url:'<?php echo site_url('home/sendcode')?>',
							type:'post',
							data:{'mobile':phone},
							success:function(msg){
								if(msg.code == 1){
									$('#mobileinfo').hide();
									$('#authcode').val(msg.auth);
									$('#toggle').addClass('on').html('<i class="fa fa-clock-o">&nbsp;&nbsp;</i><span id="time">120</span>');
									var i = 120;
									var interval = window.setInterval(function(){
										i--;
										$('#time').html(i);
										if(i==0){
											window.clearInterval(interval);
											$('#toggle').removeClass('on').html('<span>Send Auth</span>');
										}
									},1000);
								}else{
									$('#mobileinfo').html(msg.msg).show();
									$('#toggle').removeClass('on').html('<span>Send Auth</span>');
								}
							}
							
						});
				}
				//console.log(12);
			}else{
				//console.log('xx');
			}
		});

		</script>
	</div>

</div>


<div class="clear"></div>