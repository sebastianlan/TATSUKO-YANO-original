<div class="hhome">
	<div class="home">
		<div class="hileft">
			<img src="<?php echo base_url('static/frontend/images/homef.gif')?>" />&nbsp;&nbsp;Your position :
            <a href="<?php echo site_url();?>">Home</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">About us</a>&nbsp;&gt;&nbsp;
            <a href="javascript:void(0);">Leader</a>
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
			<div>
				<a href="<?=site_url('about/profile')?>">
					<div class="ipro_com"">
                        <p>PROFILE</p>
                        <H5>Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc.</H5>
					</div>
				</a>
			</div>
			<div class="current">
				<div class="ipro_com" id="ipro_com_hover">
                    <p>LEADER</p>
                    <H5> Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent id tempor ipsum.</H5>
				</div>
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
			<div class="picdiv">
				<h2>Co-founder</h2>
				<div class="ipro_conoa">
					<div class="ipro_conoileft">
						<img src="<?php echo base_url('static/frontend/images/ceo.jpg')?>" width="127" height="160" />
					</div>
					<div class="ipro_conoiright">
						<div class="ipro_top">
							<p>Sebastian Michaelis<span>&nbsp;CEO</span></p>
						</div>
						<div class="ipro_bottom">
							<p>Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent id tempor ipsum. Fusce at massa ac nunc porta fringilla sed eget neque. Quisque quis pretium nulla. Fusce eget bibendum neque, vel volutpat augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
						</div>
					</div>

				</div>
				<p class="clear"></p>
				<h2></h2>
				<div class="ipro_conoa">
					<div class="ipro_conoileft">
						<img src="<?php echo base_url('static/frontend/images/cto.jpg')?>" width="127" height="160" />
					</div>
					<div class="ipro_conoiright">
						<div class="ipro_top">
							<p>Ciel Phantomhive<span>&nbsp;CTO</span></p>
						</div>
						<div class="ipro_bottom">
							<p>Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent id tempor ipsum. Fusce at massa ac nunc porta fringilla sed eget neque. Quisque quis pretium nulla. Fusce eget bibendum neque, vel volutpat augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
						</div>
					</div>
				</div>
                <p class="clear"></p>
                <h2></h2>
                <div class="ipro_conoa">
                    <div class="ipro_conoileft">
                        <img src="<?php echo base_url('static/frontend/images/cfo.jpg')?>" width="126" height="160" />
                    </div>
                    <div class="ipro_conoiright">
                        <div class="ipro_top">
                            <p>Grell Sutcliff<span>&nbsp;CFO</span> </p>
                        </div>
                        <div class="ipro_bottom">
                            <p>Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent id tempor ipsum. Fusce at massa ac nunc porta fringilla sed eget neque. Quisque quis pretium nulla. Fusce eget bibendum neque, vel volutpat augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                        </div>
                    </div>
                </div>
			</div>

			<p class="clear"></p>

		</blockquote>

	</div>

</div>


<div class="clear"></div>