<?php

/**
 * 辅助方法
 */

/**
 *
 * 弹出框
 * 
 * @param type $msg 提示信息
 * @param type $url 跳转URL
 *
 */
function showMsg($msg, $url = "") {
	if (! $url) {
		$url = site_url ();
	}
	echo '<script>alert("' . $msg . '");location.href="' . $url . '"</script>';
	exit ();
}

/**
 *
 * @param type $msg 信息内容
 * @param type $url 跳转地址
 * @param type $type 类型，选择不同的类型，会显示不同的样色
 *        	
 *        	type可选值说明
 *        	1.普通信息，淡蓝色
 *        	2.警告信息，橙色
 *        	3.成功信息，绿色
 *        	4.错误信息，红色
 */
function showNotice($msg, $url = "", $type = 1) {
	$style = array (
			"1" => "alert-info",
			"2" => "alert-warning",
			"3" => "alert-success",
			"4" => "alert-danger" 
	);
	$ci = & get_instance ();
	// $data["contentpage"] = "notice.php";
	$data ["notice_content"] = $msg;
	$data ["alert_class"] = $style [$type];
	$data ["url"] = $url;
	echo $ci->load->view ( 'notice.php', $data, true );
	exit ();
}


/**
 *
 * @param type $msg 信息内容
 * @param type $url 跳转地址
 * @param type $type 类型，选择不同的类型，会显示不同的样色
 *
 *        	type可选值说明
 *        	1.普通信息，淡蓝色
 *        	2.警告信息，橙色
 *        	3.成功信息，绿色
 *        	4.错误信息，红色
 */
function showFrontendNotice($msg, $url = "", $type = 1) {
	$style = array (
			"1" => "alert-info",
			"2" => "alert-warning",
			"3" => "alert-success",
			"4" => "alert-danger"
	);
	$ci = & get_instance ();
	// $data["contentpage"] = "notice.php";
	$data ["notice_content"] = $msg;
	$data ["alert_class"] = $style [$type];
	$data ["url"] = $url;
	echo $ci->load->view ( 'notice.php', $data, true );
	exit ();
}

/**
 *
 * 分页
 * 
 * @param type $iconfig 配置信息
 * @param type $per_page 每页数量
 * @return type
 */
function makePageConfig($iconfig, $per_page = 10) {
	$config = array ();
	$config ['use_page_numbers'] = FALSE;
	$config ['num_links'] = 5;
	$config ['per_page'] = $per_page;
	$config ['first_link'] = 'First';
	$config ['last_link'] = 'Last';
	$config ['prev_link'] = 'previous';
	$config ['next_link'] = 'Next';
	// 分页样式
	$config ['first_tag_open'] = '<li>';
	$config ['first_tag_close'] = '</li>';
	$config ['last_tag_open'] = '<li>';
	$config ['last_tag_close'] = '</li>';
	$config ['full_tag_open'] = '<nav><ul class="pagination" style="visibility: visible;">';
	$config ['full_tag_close'] = '</ul></nav>';
	$config ['num_tag_open'] = '<li>';
	$config ['num_tag_close'] = '</li>';
	$config ['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
	$config ['cur_tag_close'] = '</a></li>';
	$config ['prev_tag_open'] = '<li class="prev">';
	$config ['prev_tag_close'] = '</li>';
	$config ['next_tag_open'] = '<li class="next">';
	$config ['next_tag_close'] = '</li>';
	return array_merge ( $config, $iconfig );
}

/**
 *
 * 分页
 * 
 * @param type $iconfig 配置信息
 * @param type $per_page 每页数量
 * @return type
 */
function makeFrontendPageConfig($iconfig, $per_page = 10) {
	$config = array ();
	$config ['use_page_numbers'] = FALSE;
	$config ['per_page'] = $per_page;
	$config ['first_link'] = 'First';
	$config ['last_link'] = 'Last';
	$config ['prev_link'] = '<<';
	$config ['next_link'] = '>>';
	// 分页样式
	// $config['num_tag_open'] = '<li>';
	// $config['num_tag_close'] = '</li>';
	$config ['cur_tag_open'] = '<a class="active" href="javascript:void(0);">';
	$config ['cur_tag_close'] = '</a>';
	// $config['prev_tag_open'] = '<a class="active">';
	// $config['prev_tag_close'] = '</a>';
	// $config['next_tag_open'] = '<li class="next">';
	// $config['next_tag_close'] = '</li>';
	return array_merge ( $config, $iconfig );
}

/**
 *
 * 按长度截取字符串，不区分中英文
 * 
 * @param string $string 待截取的字符串
 * @param int $start 开始位置
 * @param int $length 截取长度
 * @return string 返回字符串
 */
function subStrByChar($string, $start, $length = "") {
	$t_length = strlen ( $string );
	$str_arr = array ();
	for($i = 0; $i < $t_length; $i ++) {
		if (ord ( substr ( $string, $i, 1 ) ) > 0xa0) {
			$tmpstr = substr ( $string, $i, 3 );
			$i = $i + 2;
		} else {
			// 其他是截取1位
			$tmpstr = substr ( $string, $i, 1 );
		}
		$str_arr [] = $tmpstr;
	}
	if ($length) {
		$restr = implode ( "", array_slice ( $str_arr, $start, $length ) );
	} else {
		$restr = implode ( "", array_slice ( $str_arr, $start ) );
	}
	return $restr;
}

/**
 *
 * 输出status状态码
 * 
 * @param type $error_string        	
 * @param type $status_code        	
 */
function output_error($error_string, $status_code = 500) {
	http_response_code ( $status_code );
	die ( $error_string );
}

/**
 * 输出json字符串
 * 
 * @param type $data        	
 */
function output($data) {
	header ( 'Content-Type: application/json' );
	die ( json_encode ( $data ) );
}

/**
 *
 * post请求
 * 
 * @param type $url 请求参数
 * @param type $param 参数，string/array
 * @return boolean 有返回则返回数据，否则返回false
 */
function curl_post($url, $param) {
	$oCurl = curl_init ();
	if (stripos ( $url, "https://" ) !== FALSE) {
		curl_setopt ( $oCurl, CURLOPT_SSL_VERIFYPEER, FALSE );
		curl_setopt ( $oCurl, CURLOPT_SSL_VERIFYHOST, false );
	}
	if (is_string ( $param )) {
		$strPOST = $param;
	} else {
		$aPOST = array ();
		foreach ( $param as $key => $val ) {
			$aPOST [] = $key . "=" . urlencode ( $val );
		}
		$strPOST = join ( "&", $aPOST );
	}
	curl_setopt ( $oCurl, CURLOPT_URL, $url );
	curl_setopt ( $oCurl, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt ( $oCurl, CURLOPT_POST, true );
	curl_setopt ( $oCurl, CURLOPT_POSTFIELDS, $strPOST );
	$sContent = curl_exec ( $oCurl );
	$aStatus = curl_getinfo ( $oCurl );
	curl_close ( $oCurl );
	if (intval ( $aStatus ["http_code"] ) == 200) {
		return $sContent;
	} else {
		return false;
	}
}

/**
 *
 * get请求
 *
 * @param type $url 请求参数
 * @return boolean 有返回则返回数据，否则返回false
 */
function curl_get($url) {
	$oCurl = curl_init ();
	if (stripos ( $url, "https://" ) !== FALSE) {
		curl_setopt ( $oCurl, CURLOPT_SSL_VERIFYPEER, FALSE );
		curl_setopt ( $oCurl, CURLOPT_SSL_VERIFYHOST, FALSE );
	}
	curl_setopt ( $oCurl, CURLOPT_URL, $url );
	curl_setopt ( $oCurl, CURLOPT_RETURNTRANSFER, 1 );
	$sContent = curl_exec ( $oCurl );
	$aStatus = curl_getinfo ( $oCurl );
	curl_close ( $oCurl );
	if (intval ( $aStatus ["http_code"] ) == 200) {
		return $sContent;
	} else {
		return false;
	}
}


/**
 * 
 * array_column
 */
if (! function_exists ( 'array_column' )) {
	function array_column($input, $columnKey, $indexKey = NULL) {
		$columnKeyIsNumber = (is_numeric ( $columnKey )) ? TRUE : FALSE;
		$indexKeyIsNull = (is_null ( $indexKey )) ? TRUE : FALSE;
		$indexKeyIsNumber = (is_numeric ( $indexKey )) ? TRUE : FALSE;
		$result = array ();
		
		foreach ( ( array ) $input as $key => $row ) {
			if ($columnKeyIsNumber) {
				$tmp = array_slice ( $row, $columnKey, 1 );
				$tmp = (is_array ( $tmp ) && ! empty ( $tmp )) ? current ( $tmp ) : NULL;
			} else {
				$tmp = isset ( $row [$columnKey] ) ? $row [$columnKey] : NULL;
			}
			if (! $indexKeyIsNull) {
				if ($indexKeyIsNumber) {
					$key = array_slice ( $row, $indexKey, 1 );
					$key = (is_array ( $key ) && ! empty ( $key )) ? current ( $key ) : NULL;
					$key = is_null ( $key ) ? 0 : $key;
				} else {
					$key = isset ( $row [$indexKey] ) ? $row [$indexKey] : 0;
				}
			}
			
			$result [$key] = $tmp;
		}
		
		return $result;
	}
}
