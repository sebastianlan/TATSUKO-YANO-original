<link href="<?php echo base_url('static/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" />
<div class="list">
	<div class="article-con-box">
		<div class="article-left">
			<div class="content clearfix">
				<!-- content start -->
				<div class="content_left">
					<!--content_left start -->
					<div class="content_left_title">
						<h3>Retrieve Password</h3>
					</div>
					<ul class="password_title">
						<li class="firsted"><span></span> Step 1</li>
						<li class="second"><span></span> Step 2</li>
						<li class="success"><span></span> Step 3</li>
					</ul>
					<div class="content_left_nner">
						<form name="myform" action="<?php echo site_url('home/forgetcheck')?>" method="post" onSubmit="return check()">
							<input type="hidden" name="authcode" id="authcode" value=""/>
							<div class="content_left_nner_layer">
								<div class="content_left_nner_layer_title">Mobile No</div>
								<input class="mian_text" name="mobile" type="text" id="mobile">
								<span style="color:red;" id="mobileinfo" style="display:none;"></span>
							</div>
							<div class="content_left_nner_layer">
								<div class="content_left_nner_layer_title">Auth Code</div>
								<div class="yam clearfix">
									<input class="yzm_text" name="inputcode" type="text" id="inputcode">
									<a href="javascript:void(0);" id="toggle">Send Auth Code</a>
									<span style="margin-left:3px;color:red;line-height:40px;" id="inputcodeinfo" style="display:none;"></span>
								</div>
							</div>
							<div class="content_left_nner_layer2">
								<input class="butn" name="" type="submit" value="Next">
							</div>
						</form>
					</div>
				</div>
				<!-- content_left stop -->

			</div>
			<!-- content stop -->

		</div>
		<div class="article-right">
			<h5>
                &gt; I already have a account , <a href="<?php echo site_url('home/login')?>">sign in</a>
			</h5>
			<p style="margin-top: 35px;">
				<img src="<?php echo base_url('static/frontend/images/shouzhua.jpg')?>" width="245" height="211">
			</p>
			<br />
		</div>
	</div>



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
		
		$('#toggle').click(function(){
			var phone = $('#mobile').val();
			if(!$(this).hasClass('on')){
				//未发送
				if(!phone.match(/^((13[0-9])|(15[^4,\D])|(18[0,5-9]))\d{8}$/)){
					$('#mobileinfo').html('Please enter a valid phone number').show();
				}else{
					$('#toggle').html('Sending ...');
					//发请求
					$.ajax({
							url:'<?php echo site_url('home/sendforgetcode')?>',
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
											$('#toggle').removeClass('on').html('Send Auth Code');
										}
									},1000);
								}else{
									$('#mobileinfo').html(msg.msg).show();
									$('#toggle').removeClass('on').html('Send Auth Code');
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

<div class="clear"></div>