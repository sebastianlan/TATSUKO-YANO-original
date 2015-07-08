<?php
/**
 * 
 * 系统设置 控制器
 *
 */

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Isystem extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		checkBackendLogin();
	}
	
	
	public function test(){
		echo strtotime('2015-03-24');exit;
		
		$arr = array('SYSTEM_MANAGE','NEWS_MANAGE');
		echo serialize($arr);
	}
	
	
	
	/**
	 * 设置参数
	 */
	public function edit(){
		$post = $this->input->post();
		if(empty($post)){
			//加载页面
			$this->load->Model('Isystem_model','sys',true);
			$data['params'] = $this->sys->getRecord()->result_array();
			$data['contentpage'] = 'm_isystem_edit.php';
			$this->load->view('m_tpl.php',$data);
		}else{
			//提交数据
			$this->load->Model('Isystem_model','sys',true);
			foreach ($post as $k=>$v){
				$this->sys->updateRecord(array('value'=>$v),array('key'=>$k));
			}
			showNotice('success',site_url('isystem/edit'),3);
		}
	}
	
	
	/**
	 * 用户列表
	 */
	public function lsUser(){
		$this->load->Model('Admin_model','a',true);
		$this->load->library('pagination');
		$config ['base_url'] = site_url("isystem/lsUser");
		$config ['total_rows'] = $this->a->getCount();
		$config ['uri_segment'] = 3;
		$page_config = makePageConfig($config,10);
		$this->pagination->initialize($page_config);
		$offset = $this->uri->segment(3, 0);
		$data['offset'] = $offset;
		$data['userlist'] = $this->a->getRecordLimit(array(), '', $page_config ['per_page'], $offset)->result_array();
		
		$data['contentpage'] = 'm_user_list.php';
		$this->load->view('m_tpl',$data);
	}
	
	/**
	 * 新增用户
	 */
	public function addUser(){
		$post = $this->input->post();
		if(empty($post)){
			//权限数组
			$this->load->Model('Power_model','power',true);
			$powerlist = $this->power->getRecord()->result_array();
			$data['power'] = array_column($powerlist, 'name','key');
			
			$data['contentpage'] = 'm_user_add.php';
			$this->load->view('m_tpl',$data);
		}else{
			//检测用户名是否已存在
			$this->load->Model('Admin_model','a',true);
			if($this->a->getCount(array('username'=>$post['username']))>0){
				showNotice('User name already exists','javascript:history.go(-1);',4);
			}
			if(!isset($post['pwd']) || empty($post['pwd'])){
				showNotice('Password cannot be empty','javascript:history.go(-1);',4);
			}
			if(!isset($post['power']) || empty($post['power'])){
				showNotice('Power cannot be empty','javascript:history.go(-1);',4);
			}
			$post['pwd'] = md5($post['pwd']);
			$post['createtime'] = time();
			$post['power'] = serialize($post['power']);
			if($this->a->addRecord($post)){
				showNotice('success',site_url('isystem/lsUser'),3);
			}else{
				showNotice('failure','javascript:history.go(-1);',4);
			}
		}
		
	}
	
	/**
	 * 编辑用户  
	 * 1.用户名不可修改
	 * 2.密码为空，则不修改
	 */
	public function editUser(){
		$post = $this->input->post();
		$id = $this->uri->segment(3);
		if(empty($post)){
			//用户信息
			$this->load->Model('Admin_model','a',true);
			$userlist = $this->a->getRecord('*',array('id'=>$id))->result_array();
			$data['user'] = $userlist[0];
			
			//用户权限
			$data['userpower'] = unserialize($userlist[0]['power']);
			
			//权限数组
			$this->load->Model('Power_model','power',true);
			$powerlist = $this->power->getRecord()->result_array();
			$data['power'] = array_column($powerlist, 'name','key');
				
			$data['id'] = $id;
			$data['contentpage'] = 'm_user_edit.php';
			
			$this->load->view('m_tpl',$data);
		}else{
			if($post['pwd'] == ''){
				unset($post['pwd']);
			}else{
				$post['pwd'] = md5($post['pwd']);
			}
			if(!isset($post['power']) || empty($post['power'])){
				showNotice('Power cannot be empty','javascript:history.go(-1);',4);
			}
			$post['power'] = serialize($post['power']);
			//用户信息
			$this->load->Model('Admin_model','a',true);
			if($this->a->updateRecord($post,array('id'=>$id))){
				showNotice('success',site_url('isystem/lsUser'),3);
			}else{
				showNotice('failure','javascript:history.go(-1);',4);
			}
		}
	}
	
	/**
	 * 删除用户
	 */
	public function delUser(){
		$id = $this->uri->segment(3);
		$this->load->Model('Admin_model','a',true);
		if($this->a->deleteRecord(array('id'=>$id))){
			showNotice('success',site_url('isystem/lsUser'),3);
		}else{
			showNotice('failure','javascript:history.go(-1);',4);
		}
	}
	
	

}