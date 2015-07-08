<div class="list">
	<div class="article-con-box">
		<div class="article-left">
			<div class="job-list">
				<div class="job-list-title0">
					<div class="page-title0">Member Sign In</div>
					<span class="add">Please fill in your information , * is required .</span>
				</div>
				<div class="job-list-conn">
					<script type="text/javascript">
					function check(){
						if($('#username').val() == ''){
							$('#username').parent('p').find('.info').show();
							return false;
						}
						if($('#password').val() == ''){
							$('#password').parent('p').find('.info').show();
							return false;
						}
						if($('#authcode').val() == ''){
							$('#authcode').parent('p').find('.info').show();
							return false;
						}
						return true;
					}
					</script>
					<form name="formSeach" id="formSeach" action="<?php echo site_url('home/login')?>" method="post" onSubmit="return check()">
						<input type="hidden" value="<?php echo $authkey?>" name="authkey"/>
						<p style="width: 790px; overflow: hidden">
							<span style="float: left; width: 230px; text-align: right; line-height: 3em">Mobile No / ID Card No</span>
							<input type="text" size="34" class="cpkey" id="username" name="username" style="height: 36px; line-height: 22px; color: #999999; padding-left: 5px; background: #f2f0f0; border: #909090 1px solid; float: left" />
							<span style="float: left; margin-left: 10px; color: red; line-height: 2em;">*</span>
							<span style="float: left; margin-left: 10px; color: red; line-height: 3em; display: none;" class="info" >Please enter phone number or ID card number</span>
						</p>
						<br>
						<p style="width: 790px; overflow: hidden">
							<span style="float: left; width: 70px; width: 230px; text-align: right; line-height: 3em">Password</span>
							<input type="password" size="34" class="cpkey" value="" id="password" name="password" style="height: 36px; line-height: 22px; color: #999999; padding-left: 5px; background: #f2f0f0; border: #909090 1px solid; float: left" />
							<span style="float: left; margin-left: 10px; color: red; line-height: 2em;">*</span>
							<span style="float: left; margin-left: 10px; color: red; line-height: 3em; display: none;" class="info" >Please enter password</span>
						</p>
						<br>
						<p style="width: 790px; overflow: hidden">
							<span style="float: left; width: 70px; width: 230px; text-align: right; line-height: 3em">Auth Code</span>
							<input type="text" name="authcode" size="17" class="cpkey" value="" id="authcode" style="height: 36px; line-height: 22px; color: #999999; padding-left: 5px; background: #f2f0f0; border: #909090 1px solid; float: left" />
							<input type="image" class="image" src="<?php echo site_url('home/authcode/'.$authcode);?>" align="top" style="float: left; margin-left: 2px; width: 116px; height: 38px;">
							<span style="float: left; margin-left: 10px; color: red; line-height: 2em;">*</span>
							<span style="float: left; margin-left: 10px; color: red; line-height: 3em; display: none;" class="info" >Please enter auth code</span>
						</p>
						<br>
						<p style="width: 639px; overflow: hidden; float: right">
							<input type="checkbox" name="remember" style="margin-left: 40px; margin-top: 15px; float: left">
                            <span style="float: left; width: 170px; padding-top: 10px; margin-left: 8px;">Remember my password</span>
                            <span style="color: #999999; float: left; width: 240px; padding-top: 10px;">（Please do not check in public places）</span>
						</p>
						<br>
						<p style="width: 790px; overflow: hidden">
							<span style="float: left; width: 70px; width: 230px; text-align: right; line-height: 3em">&nbsp;</span>
							<input type="image" class="image" value="" style="margin-top: 15px;float: left" src="<?php echo base_url('static/frontend/images/signin.jpg')?>" align="top" style="margin-top: 25px;">
							<span style="float: left; margin-left: 20px;padding-top:34px; " class="info" >
							<a href="<?php echo site_url('home/forgethelp')?>" style="color: #999999;text-decoration:underline;font-size: 14px;font-style: italic;">Forgot Password</a></span>
						</p>
						<br>
					</form>
					<script type="text/javascript">

                    $("input[type='text'],input[type='password']").keyup(function(){
                    if($(this).val() == ''){
                        $(this).parents('p').find('.info').show();
                    }else{
                        $(this).parents('p').find('.info').hide();
                    }

                    });
					</script>
				</div>
			</div>
		</div>
		<div class="article-right">
			<h5>
				&gt; I haven't account , <a href="<?php echo site_url('home/register')?>">sign up</a>
			</h5>
			<p style="margin-top: 35px;">
				<img src="<?php echo base_url('static/frontend/images/shouzhua.jpg')?>" width="245" height="211">
			</p>
			<br />
		</div>
	</div>

</div>

<div class="clear"></div>