<!Doctype html>
<html>
<head>
<title>TATSUKO YANO original admin</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url('static/css/m_style.css');?>">
<!-- awesome 字体 -->
<link href="<?php echo base_url('static/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" />
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<!-- Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="panel panel-default" style="width: 500px; margin: 200px auto 0 auto;">
			<div class="panel-heading">
				<h3 class="panel-title" style="font-size: 24px;">TATSUKO YANO original Admin</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="<?php echo site_url('admin/login');?>" method="post">
					<div class="form-group ">
						<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Username</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="" name="username" required />
						</div>
					</div>
					<div class="form-group ">
						<label for="email" class="col-sm-2 control-label"><span class="required">*</span>Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" placeholder="" name="password" required />
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-success">Login</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

