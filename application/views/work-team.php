<div class="hhome">
	<div class="home">
		<div class="hileft">
			<img src="<?php echo base_url('static/frontend/images/homef.gif')?>" />&nbsp;&nbsp;Your position :
            <a href="<?php echo site_url();?>">Home</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Join us</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">About our team</a>
		</div>
		<div class="hiright">
			<a href="javascript:history.go(-1);">Go back&gt;&gt;</a>
		</div>
	</div>
</div>
<div class="mmune1">
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
</div>



<div class="list">
	<div class="page-title">JOIN US</div>
	<div class="page-tag">
		<div class="tag">
			<a href="<?php echo site_url('work/why')?>">Why do you choose us</a>
            <a href="" class="active">About our team</a>
            <a href="<?php echo site_url('work/ls')?>">Position request</a>
		</div>
		<div>
			<div class="line" style="width: 585px;"></div>
		</div>
		<div class="back">
			<a href="javascript:void(0);" class="leftbtn"><img src="<?php echo base_url('static/frontend/images/tag-left.png');?>" /></a>
			<a href="javascript:void(0);" class="rightbtn"><img src="<?php echo base_url('static/frontend/images/tag-right.png');?>" /></a>
			<a href="javascript:history.go(-1);"><img src="<?php echo base_url('static/frontend/images/tag-back.png');?>" /></a>
		</div>
		<script type="text/javascript">
		//左右按钮
		$(".leftbtn").click(function(){
			var leftbtn = $('.tag a.active').prev();
			//console.log(leftbtn);
			if(leftbtn[0]){
				window.location.href=leftbtn.attr('href');
			}
		});
		$(".rightbtn").click(function(){
			var rightbtn = $('.tag a.active').next();
			//console.log(rightbtn);
			if(rightbtn[0]){
				window.location.href=rightbtn.attr('href');
			}
		});
		</script>
	</div>
	<div class="article-con-box">
		<div class="article-left">
			<div class="job-list">
				<div class="job-us-con">
					<h3>TATSUKO YANO original team</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem.
                    Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus.Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit. Nunc ultricies nulla non metus pulvinar imperdiet. Praesent non adipiscing libero.
                    Mauris ultrices odio vitae nulla ultrices iaculis. Nulla rhoncus odio eu lectus faucibus facilisis.
                    Maecenas ornare augue vitae sollicitudin accumsan.Etiam eget libero et erat eleifend consectetur a nec lectus.
                    Sed id tellus lorem. Suspendisse sed venenatis odio, quis lobortis eros.</p>

					<h3>Splendid moment</h3>
					<div class="us-show">
						<div>
							<div class="showpic1">
								<img src="<?php echo base_url('static/frontend/images/usshow01.jpg');?>" class="img-responsive" width="53" height="54"/>
							</div>
							<div class="clear"></div>
							<div class="showpic2">
								<img src="<?php echo base_url('static/frontend/images/usshow02.jpg');?>" class="img-responsive" width="132" height="59"/>
							</div>
						</div>
						<div>
							<div class="showpic3">
								<img src="<?php echo base_url('static/frontend/images/usshow03.jpg');?>" class="img-responsive" width="130" height="179"/>
							</div>
							<div class="showpicbox1">
								<div class="showpic4">
									<img src="<?php echo base_url('static/frontend/images/usshow04.jpg');?>" class="img-responsive" width="53" height="54"/>
								</div>
								<div class="showpic5">
									<img src="<?php echo base_url('static/frontend/images/usshow05.jpg');?>" class="img-responsive" width="53" height="54"/>
								</div>
							</div>
						</div>
						<div>
							<div class="showpic3">
								<img src="<?php echo base_url('static/frontend/images/usshow06.jpg');?>" class="img-responsive" width="178" height="133"/>
							</div>
							<div class="showpicbox1">
								<div class="showpic4">
									<img src="<?php echo base_url('static/frontend/images/usshow07.jpg');?>" class="img-responsive" width="60" height="134"/>
								</div>
								<div class="showpic5">
									<img src="<?php echo base_url('static/frontend/images/usshow08.jpg');?>" class="img-responsive" width="95" height="134"/>
								</div>
							</div>
						</div>
						<div>
							<div class="showpicbox1">
								<div class="showpic4">
									<img src="<?php echo base_url('static/frontend/images/usshow09.jpg');?>" class="img-responsive" width="53" height="54"/>
								</div>
								<div class="showpic5">
									<img src="<?php echo base_url('static/frontend/images/usshow10.jpg');?>" class="img-responsive" width="53" height="54"/>
								</div>
							</div>
							<div class="clear"></div>
							<div class="showpic11">
								<img src="<?php echo base_url('static/frontend/images/usshow11.jpg');?>" class="img-responsive" width="131" height="180"/>
							</div>

						</div>
						<div>
							<div class="showpic12">
								<img src="<?php echo base_url('static/frontend/images/usshow12.jpg');?>" class="img-responsive" width="93" height="132"/>
							</div>

						</div>
					</div>
				</div>

			</div>

		</div>
		<?php 
		require_once 'work-right-side.php';
		?>
	</div>
</div>


<div class="clear"></div>

