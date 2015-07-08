<div class="hhome">
	<div class="home">
		<div class="hileft">
			<img src="<?php echo base_url('static/frontend/images/homef.gif')?>" />&nbsp;&nbsp;Your position :
            <a href="<?php echo site_url();?>">Home</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">About us</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Profile</a>
		</div>
		<div class="hiright">
			<a href="javascript:history.go(-1);">Go back&gt;&gt;</a>
		</div>
	</div>
</div>
<div class="mmune">
	<?php 
	foreach ($adslist as $ads){
		?>
		<h2>
			<img src="<?php echo base_url($ads['pic'])?>" alt="<?php echo $ads['title']?>" width="<?php echo $ads['width']?>" height="<?php echo $ads['height']?>" />
		</h2>
		<?php
	}
	?>
</div>


<div class="mini">
	<div class="ipros_nav">
		<div class="yidiudiu">
			<div class="current">
				<div class="ipro_com" id="ipro_com_hover">
                    <p>PROFILE</p>
                    <H5>Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc.</H5>
				</div>
			</div>
			<div>
				<a href="<?=site_url('about/leader')?>">
					<div class="ipro_com">
                        <p>LEADER</p>
                        <H5>Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent id tempor ipsum.</H5>
					</div>
				</a>
			</div>
			<div>
				<a href="<?=site_url('about/partner')?>">
					<div class="ipro_com">
                        <p>PARTNERS</p>
                        <H5>Fusce at massa ac nunc porta fringilla sed eget neque. Quisque quis pretium nulla. Fusce eget bibendum neque.</H5>
					</div>
				</a>
			</div>
			<div>
				<a href="<?=site_url('about/contact')?>">
					<div class="ipro_com nomarginright">
                        <p>CONTACT US</p>
                        <H5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis.</H5>
					</div>
				</a>
			</div>

		</div>
	</div>
	<div class="ipros_list">

		<blockquote id=subpro0>
			<div class="picdivq">
				<div class="nei_bo">
					<p>
						<span>TATSUKO YANO original</span><br />
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non metus pulvinar imperdiet. Praesent non adipiscing libero.<br />
                        Mauris ultrices odio vitae nulla ultrices iaculis. Nulla rhoncus odio eu lectus faucibus facilisis. Maecenas ornare augue vitae sollicitudin accumsan.<br />
                        Etiam eget libero et erat eleifend consectetur a nec lectus. Sed id tellus lorem. Suspendisse sed venenatis odio, quis lobortis eros.
					</p>
				</div>

				<div class="ipro_conon">
                    <p>Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent id tempor ipsum. Fusce at massa ac nunc porta fringilla sed eget neque. Quisque quis pretium nulla. Fusce eget bibendum neque, vel volutpat augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
				</div>

			</div>
			<p class="clear"></p>


		</blockquote>
	</div>
</div>

<div class="clear"></div>