<form action="/sms.php" method="post">
<input type="hidden" value="reg" name="action"/>
<input type="submit" value="注册" />
</form>
<form action="/sms.php" method="post">
<input type="hidden" value="send" name="action"/>
<input type="submit" value="发送" />
</form>

<form action="sms.php" method="post" >
<input type="hidden" value="get" name="action"/>
<input type="submit" value="获取" />
</form>
<?php
date_default_timezone_set('PRC'); //设置默认时区为北京时间
//短信接口用户名 $uid
$uid = 'LKSDK003796';
//短信接口密码 $passwd
$passwd = 'sz@thzc96';
//发送到的目标手机号码 $telphone
$telphone = '18651948985';
//短信内容 $message
$message = "您的娃娃是全校第一,恭喜您！".time()."【凌凯http】"; 

$action=isset($_POST['action'])?$_POST['action']:'';


if($action == "send")
{
	$gateway = "http://mb345.com:999/ws/batchSend.aspx?CorpID={$uid}&Pwd={$passwd}&Mobile={$telphone}&Content={$message}&Cell=&SendTime=";
	$result = file_get_contents($gateway);

	if(  $result == 0 || $result == 1)
	{
		echo "发送成功! 发送时间".date("Y-m-d H:i:s");
	}
	else
	{
		echo "发送失败, 错误提示代码: ".$result;
	}
	exit;
	
}

if($action == "get")
{
	echo '准备获取短信....<br/>';
	$getURl = "http://mb345.com:999/WS/Get.aspx?CorpID={$uid}&Pwd={$passwd}";
	 
	$result = file_get_contents($getURl);
	echo "获取结果为:".$result;
	exit;
}

?>