<!Doctype html>
<html>
<head>
<title><?=$seo_title?></title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="<?=$seo_keywords?>" />
<meta name="description" content="<?=$seo_description?>">
<!-- 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 -->

<?php
if (($this->uri->segment ( 1 ) == 'ps' && $this->uri->segment ( 2 ) == 'detail')||($this->uri->segment ( 1 ) == 'work' && $this->uri->segment ( 2 ) == 'us')) {
	?>
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
<?php
}
?>


<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<!-- 
<script src="<?php echo base_url('static/js/jquery.min.js')?>"></script>
 -->
 
<!-- Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<!-- 
<script src="<?php echo base_url('static/js/bootstrap.min.js')?>"></script>
 -->
 
<!-- 自定义 -->
<link href="<?php echo site_url('static/frontend/lib/style.css?uu');?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo site_url('static/frontend/lib/lrtk.css');?>">
<script type="text/javascript" src="<?php echo site_url('static/frontend/lib/png.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('static/frontend/lib/menu.js')?>"></script>
<script type="text/javascript">
//导航菜单
$(function() {
	$("#menu dl dd").hover(
		function() {
			if ($(this).find("table tr").length > 0) {
				$(this).find("table").show();
			}
		},
		function() {
			$(this).find("table").hide();
		}
	);
});
</script>
<link rel="icon" href="<?php echo base_url('static/frontend/images/favicon.ico');?>">
</head>

<body>
	<div class="top1">
		<div class="top2">
			<div class="topleft">Welcome to TATSUKO YANO original.</div>
			<div class="topright">
				<?php 
				$frontend = $this->session->userdata('frontend');
				if($frontend && $frontend['is_login']){
					?>
					Hello，<a href="<?php echo site_url('vip/index')?>"><?php echo $frontend['nickname']?></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('vip/logout')?>">[Sing out]</a>
					<?php
				}else{
					?>
					<a href="<?php echo site_url('home/login')?>">Sign in</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('home/register')?>">Sing up</a>
					<?php
				}
				?>
				&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;_(:зゝ∠)_
			</div>
		</div>

	</div>
	<div class="tai_b">
		<div class="tover">
			<div class="logo1">
				<img src="<?php echo base_url('static/frontend/images/logo.png');?>" />
			</div>
			<div class="sou">
				<p><a href="<?php echo site_url('home/risk')?>">RISK TEST</a></p>
				<p><a href="<?php echo site_url('home/asset')?>">ASSET ALLOCATION</a></p>
				<p><a href="<?php echo site_url('home/subscribe')?>">ONLINE BOOKING</a></p>
			</div>
		</div>
	</div>
	<div class="menum">
		<div id="wrapper">
			<div class="menu">
				<div class="menubg">
					<div class="imenu" id="menu">
						<dl>
							<?php
							$c = $this->uri->segment ( 1 );
							?>
							<dd class="none menuList">
								<a href="<?=site_url()?>" class="<?=($c == 'home'|| $c == '')?'gaoliang':''?>">Home</a>
							</dd>
							<dd id="mainbav1">
								<a href="<?=site_url('about/profile')?>" class="<?=$c == 'about'?'gaoliang':''?>">About us</a>
								<table border="0" cellspacing="0" cellpadding="0" style="display: none;">
									<tr>
										<td>
                                            <a href="<?=site_url('about/profile')?>">Profile</a>
                                            <a href="<?=site_url('about/leader')?>">Leader</a>
                                            <a href="<?=site_url('about/partner')?>">Partners</a>
                                            <a href="<?=site_url('about/contact')?>">Contact us</a>
                                        </td>
									</tr>
								</table>
							</dd>
							<dd>
								<a href="<?=site_url('ps/ls')?>" class="<?=($c == 'ps')?'gaoliang':''?>">Product & Service</a>
								<table border="0" cellspacing="0" cellpadding="0" style="display: none;">
									<tr>
										<td>
                                            <a href="<?=site_url('ps/ls')?>">Product</a>
                                            <a href="<?=site_url('ps/desc')?>">Description</a>
                                            <a href="<?=site_url('ps/service')?>">Service</a>
                                        </td>
									</tr>
								</table>
							</dd>
							<dd>
								<a href="<?=site_url('newspaper/ls')?>" class="<?=($c == 'newspaper')?'gaoliang':''?>">News</a>
							</dd>
							<dd>
								<a href="<?=site_url('vip/index')?>" class="<?=($c == 'vip')?'gaoliang':''?>">Members area</a>
							</dd>
							<dd>
								<a href="<?=site_url('study/ls')?>" class="<?=($c == 'study')?'gaoliang':''?>">Information</a>
							</dd>
							<dd>
								<a href="<?=site_url('work/ls')?>" class="<?=($c == 'work')?'gaoliang':''?>">Join us</a>
								<table border="0" cellspacing="0" cellpadding="0" style="display: none;">
									<tr>
                                        <td>
                                            <a href="<?=site_url('work/why')?>">Why do you choose us</a>
                                            <a href="<?=site_url('work/team')?>">About our team</a>
                                            <a href="<?=site_url('work/ls')?>">Position request</a>
                                        </td>
                                    </tr>
								</table>
							</dd>
						</dl>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	require_once $contentpage;
	?>
	<div class="bottom2">
		<div class="for"></div>
		<div class="dlolo">
			<img src="<?php echo base_url('static/frontend/images/Dlogo.jpg')?>" width="283" height="110" />
		</div>
		<div class="dzhong">
			<p style="color: #666666">
				<a href="<?=site_url()?>">Home</a> |
                <a href="<?=site_url('about/profile')?>">About us</a> |
                <a href="<?=site_url('ps/ls')?>">Product & Service</a> |
				<a href="<?=site_url('newspaper/ls')?>">News</a> |
                <a href="<?=site_url('vip/index')?>">Members area</a> |
                <a href="<?=site_url('study/ls')?>">Information</a> |
				<a href="<?=site_url('work/ls')?>">Join us</a>
			</p>
			<p style="color: #333333">Designed by Sebastian Lan</p>
			<p style="color: #999999">Copyright 2015 TATSUKO YANO original All Rights Reserved</p>
		</div>
		<div class="bototo">
			<img src="<?php echo base_url('static/frontend/images/doge.jpg')?>" width="169" height="88" />
		</div>
	</div>
</body>
</html>
