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
						<li class="second"><span></span> Step 2</li>
						<li class="successed"><span></span> Step 3</li>
					</ul>
					<div class="content_left_nner">
						<div class="success_nner">
							<p>modify is success !</p>
							<p class="success_nner_tips">
								<span id="second">3</span> seconds after redirect , <a href="<?php echo site_url('home/login')?>" id="goto">redirect now</a>
							</p>
						</div>
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
	if($('#second')[0]){
		var seconds = 2;
        var go = window.setInterval(function(){
            $("#second").html(seconds--);
            if(seconds < 0){
                window.location.href=$('#goto').attr('href');
            }
        },1000);
	}
</script>


<div class="clear"></div>