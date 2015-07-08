<div class="slide_container">
	<ul class="rslides" id="slider">
		<?php 
		foreach ($adslist as $ads){
			?>
			<li><img src="<?php echo base_url($ads['pic'])?>" alt="<?php echo $ads['title']?>"></li>
			<?php
		}
		?>
	</ul>
</div>
<script src="<?php echo site_url('static/frontend/lib/responsiveslides.min.js')?>"></script>
<script src="<?php echo site_url('static/frontend/lib/slide.js')?>"></script>

<div class="clear"></div>

<div class="min">
	<div class="hen"></div>
	<div class="zhong1">
		<div class="ileft">
			<div class="iproduct">
				<div class="ipronav">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left:25px;">
						<tr>
							<td width="81%" align="center" valign="top" >
                                <a href="<?php echo site_url('about/profile')?>" id="mainpro0" onMouseOver="showproduct(0)" class="ipronav-a-active">Profile</a>
                                <span><img src="<?php echo base_url('static/frontend/images/SHUSHU.jpg')?>" width="4" height="19" /></span>
                                <a href="<?php echo site_url('about/leader')?>" id="mainpro1" onMouseOver="showproduct(1)">Leader</a>
                                <span><img src="<?php echo base_url('static/frontend/images/SHUSHU.jpg')?>" width="4" height="19" /></span>
                                <a href="<?php echo site_url('about/partner')?>" id="mainpro2" onMouseOver="showproduct(2)">Partners</a>
                                <span><img src="<?php echo base_url('static/frontend/images/SHUSHU.jpg')?>" width="4" height="19" /></span>
                                <a href="<?php echo site_url('about/contact')?>" id="mainpro3" onMouseOver="showproduct(3)">Contact us</a>
                            </td>
						</tr>
					</table>
				</div>
				<div class="ipro_list">
					<blockquote id=subpro0>
						<div class="ipro_con">
							<p>Profile</p>
							<H5>Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc.&nbsp;<a href="<?php echo site_url('about/profile')?>">Details&gt;&gt;</a></H5>
						</div>
						<h6 class="clear"></h6>
					</blockquote>
					<blockquote id=subpro1 style="display: none;">
						<div class="ipro_con">
							<p>Leader</p>
							<h5>Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent id tempor ipsum.&nbsp;<a href="<?php echo site_url('about/leader')?>" />Details&gt;&gt;</a></h5>
						</div>
						<h6 class="clear"></h6>
					</blockquote>
					<blockquote id=subpro2 style="display: none;">
						<div class="ipro_con">
							<p>Partners</p>
							<h5>Fusce at massa ac nunc porta fringilla sed eget neque. Quisque quis pretium nulla. Fusce eget bibendum neque.&nbsp;<a href="<?php echo site_url('about/partner')?>">Details&gt;&gt;</a></h5>
						</div>
						<h6 class="clear"></h6>
					</blockquote>
					<blockquote id=subpro3 style="display: none;">
						<div class="ipro_con">
							<p>Contact us</p>
							<h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis.&nbsp;<a href="<?php echo site_url('about/contact')?>">Details&gt;&gt;</a></h5>
						</div>
						<h6 class="clear"></h6>
					</blockquote>
				</div>
			</div>
		</div>
		<div class="icher">
			<div class="iproduct">
				<div class="ipronav2">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="81%" align="right" valign="top">
                                <a href="<?php echo site_url('ps/desc1')?>" target="" id="mainpro10" onMouseOver="showproduct1(0)" class="ipronav-a-active">Description1</a>
                                <span><img src="<?php echo base_url('static/frontend/images/SHUSHU.jpg')?>" width="4" height="19" /></span>
                                <a href="<?php echo site_url('ps/desc2')?>" target="" id="mainpro11" onMouseOver="showproduct1(1)">Description2</a>
                                <span><img src="<?php echo base_url('static/frontend/images/SHUSHU.jpg')?>" width="4" height="19" /></span>
                                <a href="<?php echo site_url('ps/desc3')?>" target="" id="mainpro12" onMouseOver="showproduct1(2)">Description3</a>
                                <span><img src="<?php echo base_url('static/frontend/images/SHUSHU.jpg')?>" width="4" height="19" /></span>
                                <a href="<?php echo site_url('ps/desc4')?>" target="" id="mainpro13" onMouseOver="showproduct1(3)">Description4</a>
                            </td>
						</tr>
					</table>
				</div>
				<div class="ipro_list">
					<blockquote id="subpro10">
						<div class="ipro_con">
							<p>Description1</p>
							<H5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis.&nbsp;<a href="<?php echo site_url('ps/desc1')?>">Details&gt;&gt;</a></H5>
						</div>
						<h6 class="clear"></h6>
					</blockquote>
					<blockquote id="subpro11" style="display: none;">
						<div class="ipro_con">
							<p>Description2</p>
							<H5>Fusce at massa ac nunc porta fringilla sed eget neque. Quisque quis pretium nulla. Fusce eget bibendum neque.&nbsp;<a href="<?php echo site_url('ps/desc2')?>">Details&gt;&gt;</a></H5>
						</div>
						<h6 class="clear"></h6>
					</blockquote>
					<blockquote id="subpro12" style="display: none;">
						<div class="ipro_con">
							<p>Description3</p>
							<H5>Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent id tempor ipsum.&nbsp;<a href="<?php echo site_url('ps/desc3')?>">Details&gt;&gt;</a></H5>
						</div>
						<h6 class="clear"></h6>
					</blockquote>
					<blockquote id="subpro13" style="display: none;">
						<div class="ipro_con">
							<p>Description4</p>
							<H5>Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc.&nbsp;<a href="<?php echo site_url('ps/desc4')?>">Details&gt;&gt;</a></H5>
						</div>
						<h6 class="clear"></h6>
					</blockquote>
				</div>
			</div>
		</div>
		<div class="iright">
			<div class="iproduct">
				<div class="ipronav3">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="100%" align="right" valign="top">
							<?php 
							foreach ($newscate as $k=>$v){
								?>
								<a href="<?php echo site_url('newspaper/ls/'.$v['id'])?>" target=""
								id="mainpro2<?php echo $k;?>" onMouseOver="showproduct2(<?php echo $k;?>)"
								<?php echo $k==0?'class="ipronav-a-active"':''?>><?php echo $v['name'];?></a>
								<?php
								//不是最后一条
								if($k+1 != count($newscate)){
									?>
									<span><img src="<?php echo base_url('static/frontend/images/SHUSHU.jpg')?>" width="4" height="19" /></span>
									<?php
								}
							}
							
							?>
							</td>
						</tr>
					</table>
				</div>
				<div class="ipro_list">
					<?php 
					foreach ($newslist as $k=>$news){
						?>
						<blockquote id="subpro2<?php echo $k;?>" style='<?php echo $k!=0?'display:none;':''?>'>
							<div class="ipro_con">
								<p><?php echo $news['catename']?></p>
								<div class="newsx3">
									<ul>
									<?php 
									if(!empty($news['info'])){
										foreach ($news['info'] as $v){
											?>
											<li><a href="<?php echo site_url('newspaper/detail/'.$v['id']);?>"><?php echo $v['title']?></a></li>									
											<?php
										}
										
									}
									?>
									</ul>
								</div>
							</div>
							<h6 class="clear"></h6>
						</blockquote>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="diudiu">
		<div class="zixun">
			<div class="ztitle">
				<img src="<?php echo base_url('static/frontend/images/tubiao_03.gif')?>" width="24" height="29" />&nbsp;Information<span>HOT</span>
			</div>
			<div class="zneir">
				<div class="zileft">
					<img src="<?php echo base_url('static/frontend/images/zixun.jpg')?>" width="353" height="237" />
				</div>
				<div class="ziright">
					<div class="iproduct">
						<div class="ipronav4">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td width="81%" align="left" valign="bottom">
                                        <span id="mainpro30" onMouseOver="showproduct3(0)" class="ipronav-a-active"><?php echo $infocate[0]['name']?></span>
                                        <span><img src="<?php echo base_url('static/frontend/images/shu.jpg')?>" width="4" height="15" /></span>
                                        <span id="mainpro31" onMouseOver="showproduct3(1)"><?php echo $infocate[1]['name']?></span>
                                    </td>
									<td width="81%" align="right" valign="top">
                                        <a href="<?php echo site_url('study/ls');?>">More&gt;&gt;</a>
									</td>

								</tr>
							</table>
						</div>
						<div class="ipro_list4">
						<?php 
						foreach ($infolist as $k=>$info){
						?>
						<blockquote id="subpro3<?php echo $k;?>" style='<?php echo $k!=0?'display:none;':''?>'>
								<div class="newsx">
									<ul>
									<?php 
									if(!empty($info['info'])){
										foreach ($info['info'] as $v){
											?>
											<li><a href="<?php echo site_url('study/detail/'.$v['id']);?>"><?php echo $v['title']?></a><span><?php echo date('Y-m-d',$v['createtime'])?></span></li>									
											<?php
										}
									}
									?>
									</ul>
								</div>
							<h6 class="clear"></h6>
						</blockquote>
						<?php
						}
					?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="shiping">
			<div class="stitle">
				<img src="<?php echo base_url('static/frontend/images/tubiao_05.gif')?>" width="32" height="24" />&nbsp;Video
			</div>
			<div class="sneir">
				<object width="408" height="265">
					<param name="allowFullScreen" value="true">
					<param name="flashVars" value="id=22181746 " />
					<param name="movie" value="http://i7.imgs.letv.com/player/swfPlayer.swf?autoplay=0" />
					<embed src="http://i7.imgs.letv.com/player/swfPlayer.swf?autoplay=0" flashVars="id=22181746" width="408" height="265" allowFullScreen="true" type="application/x-shockwave-flash"></embed>
				</object>
			</div>
		</div>
	</div>
</div>

<div class="biubiu">
	<div class="ipronav5">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="81%" align="right" valign="top">
                    <span><img style="vertical-align: bottom;" src="<?php echo base_url('static/frontend/images/tubiao_09.gif')?>" width="31" height="27" />&nbsp;Partners</span>
                    <?php
                        foreach ($groupcate as $k=>$v){
                            ?>
                            <a href="<?php echo site_url('about/partner')?>" id="mainpro4<?php echo $k;?>" onMouseOver="showproduct4(<?php echo $k;?>)" class="ipronav-a-active1">[<?php echo $v['name'];?>]</a>
                            <?php
                        }
                    ?>
					<p style="float: right; padding-right: 10px; line-height: 45px; color: #999999; "><a href="<?php echo site_url('about/partner')?>">More&gt;&gt;</a></p>
				</td>
			</tr>
		</table>
	</div>
	<div class="hezuo">
		<div class="iproduct">
			<div class="ipro_list5">
                <?php
                    foreach ($grouplist as $k=>$group){
                    ?>
                    <blockquote id="subpro4<?php echo $k;?>" style='height:144px;<?php echo $k!=0?'display:none;':''?>'>
                            <div class="ipro_con5">
                                <?php
                                if(!empty($group['info'])){
                                    foreach ($group['info'] as $v){
                                        ?>
                                        <p>
                                            <a href="javascript:void(0);"><img src="<?php echo base_url($v['logo'])?>" width="163" height="53" /></a>
                                        </p>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        <h6 class="clear"></h6>
                    </blockquote>
                    <?php
                    }
                ?>
			</div>
		</div>
		<div class="jigouhx">
			<img src="<?php echo base_url('static/frontend/images/jigouhx.jpg')?>" width="715" height="3" />
		</div>
		<div class="jigou">
			<h3>Links:</h3>
			<div class="jianguan">
				<ul>
					<li><a href="#">Link1</a></li>
					<li><a href="#">Link2</a></li>
					<li><a href="#">Link3</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="weixin">
		<div class="wiright">
			<p style="width:133px; float:left; padding-left:7px; margin-left:70px; background:url(<?php echo base_url('static/frontend/images/erwei_bj_new.png')?>) no-repeat; height:129px; padding-top:4px;">
				<img src="<?php echo base_url('static/frontend/images/erweima.jpg')?>" width="120" height="120" />
			</p>
			<p style=" float:left; width:120px;margin-left:15px;">
				<span style=" font-size:18px; color:#333333; font-weight:bold; line-height:3em">Follow us</span><br />
				<span style=" color:#999999; font-size:12px; padding-top:25px;">Use WeChat scan to follow us (๑￫ܫ￩)</span>
			</p>
		</div>
	</div>
</div>
<div class="clear"></div>
