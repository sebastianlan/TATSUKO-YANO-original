<?php

/**
 * 
 * 操作权限检测钩子，在controller实例化之后，方法执行前调用
 * 1.获取路由，控制器及方法，对比权限
 * 2.如果该路由的权限为空，则可以执行，否则跳转到用户的上一次页面或者首页(admin/index)
 *
 */
class power_hook {
	private $ci;
	public function __construct() {
		$this->ci = & get_instance ();
	}
	
	/**
	 * 权限检测
	 */
	public function check_power() {
		// 未设置的字段无需检测
		$pp = array (
				//系统模块
				"isystem" => array (
						"test"=>"WIDTHOUT_CHECK",// 无需检测权限
						"edit" => "SYSTEM_MANAGE",
						"lsUser"=>"SYSTEM_MANAGE",
						"editUser"=>"SYSTEM_MANAGE",
						"delUser"=>"SYSTEM_MANAGE"
				),
				//新闻模块
				"news" => array (
						"test"=>"WIDTHOUT_CHECK",// 无需检测权限
						"ls" => "NEWS_MANAGE", 
						"add" => "NEWS_MANAGE",
						"edit" => "NEWS_MANAGE",
						"updateOrder" => "NEWS_MANAGE", // 需要［NEWS_MANAGE］才可以访问
						"delete" => "NEWS_MANAGE",
						"lsCate" => "NEWS_MANAGE",
						"addCate" => "NEWS_MANAGE",
						"editCate" => "NEWS_MANAGE",
						"updateCateOrder" => "NEWS_MANAGE",
						"deleteCate" => "NEWS_MANAGE" 
				),
				//资讯
				"info" => array (
						"test"=>"WIDTHOUT_CHECK",
						"ls" => "INFO_MANAGE",
						"add" => "INFO_MANAGE",
						"edit" => "INFO_MANAGE",
						"updateOrder" => "INFO_MANAGE",
						"delete" => "INFO_MANAGE",
						"lsCate" => "INFO_MANAGE",
						"addCate" => "INFO_MANAGE",
						"editCate" => "INFO_MANAGE",
						"updateCateOrder" => "INFO_MANAGE",
						"deleteCate" => "INFO_MANAGE"
				),
				//产品
				"product" => array (
						"test"=>"WIDTHOUT_CHECK",
						"ls" => "PRODUCT_MANAGE",
						"add" => "PRODUCT_MANAGE",
						"edit" => "PRODUCT_MANAGE",
						"updateOrder" => "PRODUCT_MANAGE",
						"delete" => "PRODUCT_MANAGE",
						"lsCate" => "PRODUCT_MANAGE",
						"addCate" => "PRODUCT_MANAGE",
						"editCate" => "PRODUCT_MANAGE",
						"updateCateOrder" => "PRODUCT_MANAGE",
						"deleteCate" => "PRODUCT_MANAGE"
				),
				//合作伙伴
				"group" => array (
						"test"=>"WIDTHOUT_CHECK",
						"ls" => "GROUP_MANAGE",
						"add" => "GROUP_MANAGE",
						"edit" => "GROUP_MANAGE",
						"updateOrder" => "GROUP_MANAGE",
						"delete" => "GROUP_MANAGE",
						"lsCate" => "GROUP_MANAGE",
						"addCate" => "GROUP_MANAGE",
						"editCate" => "GROUP_MANAGE",
						"updateCateOrder" => "GROUP_MANAGE",
						"deleteCate" => "GROUP_MANAGE"
				),
				//会员
				"member" => array (
						"test"=>"WIDTHOUT_CHECK",
						"ls" => "MEMBER_MANAGE",
						"add" => "MEMBER_MANAGE",
						"edit" => "MEMBER_MANAGE",
						"delete" => "MEMBER_MANAGE",
						"buylist" => "MEMBER_MANAGE",
						"buy" => "MEMBER_MANAGE",
						"editbuy" => "MEMBER_MANAGE",
						"tplservice" => "MEMBER_MANAGE",
						"sendsms" => "MEMBER_MANAGE",
						"deletebuy" => "MEMBER_MANAGE"
				),
				//banner
				"ads" => array (
						"test"=>"WIDTHOUT_CHECK",
						"ls" => "ADS_MANAGE",
						"edit" => "ADS_MANAGE",
						"updateOrder" => "ADS_MANAGE"
				),
				//招聘
				"job" => array (
						"test"=>"WIDTHOUT_CHECK",
						"ls" => "JOB_MANAGE",
						"add" => "JOB_MANAGE",
						"edit" => "JOB_MANAGE",
						"updateOrder" => "JOB_MANAGE",
						"delete" => "JOB_MANAGE"
				)
				 
		);
		
		$backend = $this->ci->session->userdata('backend');
		if(!$backend || !$backend['is_login']){
			//showNotice("Hello, please log in first!",site_url("admin/login"),4);
		}
		
		$routes = $this->ci->uri->rsegments;
		$controller = $routes [1];
		$func = isset ( $routes [2] ) ? $routes [2] : "index";
		
		if (! isset ( $pp [$controller] [$func] ) || $pp [$controller] [$func] == "WIDTHOUT_CHECK") {
			// 无需检测，gogogo...
		} elseif (! $backend['is_login'] || empty ( $backend['power'] )) {
			// 未登录
			showNotice("Hello, please log in first!",site_url("admin/login"),4);
		} elseif (! in_array ( $pp [$controller] [$func], $backend['power'] )) {
			//权限不足
			showNotice("Access Violation!",site_url("admin/index"),4);
		} else {
			// 权限通过，gogogo...
		}
	}
}
