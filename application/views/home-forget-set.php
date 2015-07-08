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
						<li class="first"><span></span> Step 1</li>
						<li class="seconded"><span></span> Step 2</li>
						<li class="success"><span></span> Step 3</li>
					</ul>
					<div class="content_left_nner">
						<form action="<?php echo site_url('home/forgetset/'.$memberid)?>" onSubmit="return check()" method="post">
							<div class="content_left_nner_layer">
								<div class="content_left_nner_layer_title"> Password </div>
								<input class="mian_text" name="password" id="password1" type="password">
                                <span style="color: red;" id="password1info" style="display:none;"></span>
							</div>
							<div class="content_left_nner_layer">
								<div class="content_left_nner_layer_title"> Confirm Password </div>
								<input class="mian_text" name="" id="password2" type="password">
                                <span style="color: red;" id="password2info" style="display:none;"></span>
							</div>
							<div class="content_left_nner_layer2">
								<input class="butn" name="" type="submit" value="Next">
							</div>
						</form>
					</div>
				</div>
				<!-- content_left stop -->

			</div>

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

$("input[type='password']").keyup(function(){
		if($(this).val() == ''){
			$(this).next().html('Please enter password').show();
		}else{
			$(this).next().html('Please enter password').hide();
		}
	});
</script>

<div class="clear"></div>