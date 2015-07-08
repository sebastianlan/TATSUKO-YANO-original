<?php
// 通用提示页面
?>
<!Doctype html>
<html>
<head>
<title>TATSUKO YANO original</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<!-- Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link rel="icon" href="<?php echo base_url('static/frontend/images/favicon.ico');?>">
</head>
<body>
	<div class="container" style="width: 50%; margin-top: 10%;">
		<div class="alert <?=$alert_class?> alert-dismissible fade in"
			role="alert">
			<h4><?php echo $notice_content; ?></h4>
			 <?php
				if (isset ( $url )) {
					?>
                    <p>
				<span id="second">3</span> seconds after redirect , or <a href="<?php echo $url;?>">click here</a> direct redirect .
			</p>
                    <?php
				}
				?>
		</div>
	</div>

	<script type="text/javascript">
	if($('#second')[0]){
		var seconds = 2;
        var go = window.setInterval(function(){
            $("#second").html(seconds--);
            if(seconds < 0){
                window.location.href="<?php echo $url;?>";
            }
        },1000);
	}
    </script>


</body>
</html>
