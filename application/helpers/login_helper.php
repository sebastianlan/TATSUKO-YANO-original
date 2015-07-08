<?php

/**
 * SESSION,COOKIE辅助方法
 */


function checkBackendLogin(){
	$ci = & get_instance();
	$backend = $ci->session->userdata('backend');
	if(!$backend || !$backend['is_login']){
		showNotice("Hello, please login first!",site_url("admin/login"),4);
	}
}


function checkFrontendLogin(){
	$ci = & get_instance();
	//检测是否需要自动登录
	$ci->load->model('member_model','m',true);
	$frontend = $ci->session->userdata('frontend');
	if(!$frontend || !$frontend['is_login']){
		//判断是否自动登录
		$autocode = $ci->session->userdata('autocode');
		if($autocode!=''){
			$autoinfo = $ci->getRecord('*',array('autocode'=>$autocode));
			if(!empty($autoinfo) && $autoinfo[0]['autoexpire']<time()){
				$session['frontend'] = array(
						'is_login' => true,
						'memberid'=>$autoinfo[0]['id'],
						'nickname' => $autoinfo[0]['nickname']!=''?$autoinfo[0]['nickname']:$autoinfo[0]['mobile']
				);
			}else{
				redirect(site_url("home/login"));
			}
		}else{
			redirect(site_url("home/login"));
		}
		
	}
}
