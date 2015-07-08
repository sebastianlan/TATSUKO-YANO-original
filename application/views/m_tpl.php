<!Doctype html>
<html>
<head>
<title>TATSUKO YANO original Admin</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url('static/css/m_style.css');?>">
<!-- awesome 字体 -->
<link href="<?php echo base_url('static/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" />
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<!-- Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link rel="icon" href="<?php echo base_url('static/frontend/images/favicon.ico');?>">
</head>

<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo site_url('admin/index');?>">TATSUKO YANO original Admin</a>
			</div>
			<?php 
			$c = $this->uri->segment(1);
			$backend = $this->session->userdata('backend');
			?>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-right">
				<ul class="nav navbar-nav">
					<?php 
					if(in_array('NEWS_MANAGE', $backend['power'])){
					?>
					<li class="<?php echo $c =='news'?'active':'';?> dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">News<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo site_url('news/ls')?>">News list</a></li>
							<li><a href="<?php echo site_url('news/lsCate')?>">Category list</a></li>
						</ul></li>
					<?php
					}
					?>
					
					<?php 
					if(in_array('INFO_MANAGE', $backend['power'])){
						?>
					<li class="<?php echo $c =='info'?'active':'';?> dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Info<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo site_url('info/ls')?>">Info list</a></li>
							<li><a href="<?php echo site_url('info/lsCate')?>">Category list</a></li>
						</ul></li>
						<?php
					}
					?>
					
					<?php 
					if(in_array('PRODUCT_MANAGE', $backend['power'])){
						?>
					<li class="<?php echo in_array($c, array('product','order'))?'active':'';?> dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Product<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo site_url('product/ls')?>">Product list</a></li>
							<li><a href="<?php echo site_url('product/lsCate')?>">Category list</a></li>
							<li><a href="<?php echo site_url('order/ls')?>">Appointment list</a></li>
						</ul></li>
						<?php
					}
					?>
					
					<?php 
					if(in_array('GROUP_MANAGE', $backend['power'])){
						?>
					<li class="<?php echo $c =='group'?'active':'';?> dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Partner<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo site_url('group/ls')?>">Partner list</a></li>
							<li><a href="<?php echo site_url('group/lsCate')?>">Category list</a></li>
						</ul></li>
						<?php
					}
					?>
					
					<?php 
					if(in_array('MEMBER_MANAGE', $backend['power'])){
						?>
						<li class="<?php echo $c =='member'?'active':'';?>"><a
						href="<?php echo site_url('member/ls')?>">Member</a></li>
						<?php
					}
					?>
					
					<?php 
					if(in_array('ADS_MANAGE', $backend['power'])){
						?>
						<li><a class="<?php echo $c =='ads'?'active':'';?>"
						href="<?php echo site_url('ads/ls')?>">Banner</a></li>
						<?php
					}
					?>
					
					<?php 
					if(in_array('JOB_MANAGE', $backend['power'])){
						?>
						<li class="<?php echo $c =='job'?'active':'';?>"><a
						href="<?php echo site_url('job/ls')?>">Job</a></li>
						<?php
					}
					?>
					<li class="<?php echo ($c =='admin' || $c =='isystem')?'active':'';?> dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $backend['nickname'];?><span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
						<?php 
						if(in_array('SYSTEM_MANAGE', $backend['power'])){
							?>
							<li><a href="<?php echo site_url('isystem/edit')?>">Config setting</a></li>
							<li><a href="<?php echo site_url('isystem/lsUser')?>">Administrator list</a></li>
							<?php
						}
						?>
							<li><a href="<?php echo site_url('admin/editPwd')?>">Edit password</a></li>
							<li><a href="<?php echo site_url('admin/logout')?>">Logout</a></li>
						</ul></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
	<div class="container-fluid">
		<?php
		require_once $contentpage;
		?>
	</div>
	<!-- 
	<div id="infomodal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">提示</h4>
				</div>
				<div class="modal-body">
					<p id="infomodal-content"></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	-->
	<script type="text/javascript">
	//$('#infomodal').modal();
    </script>


</body>

<script type="text/javascript">
$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	});
</script>

</html>

