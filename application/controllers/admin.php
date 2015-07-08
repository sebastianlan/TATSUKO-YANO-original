<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Admin extends CI_Controller {
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * http://example.com/index.php/welcome
	 * - or -
	 * http://example.com/index.php/welcome/index
	 * - or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * 
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct ();
	}
	
	/**
	 * 登录
	 */
	public function login() {
		$post = $this->input->post();
		if(empty($post)){
			$this->load->view('m_login');
		}else{
			$this->load->Model('Admin_model','a',true);
			$admin = $this->a->getRecord('*',array('username'=>$post['username'],'pwd'=>md5($post['password'])))->result_array();
			if(!empty($admin)){
				$session['backend'] = array(
						'is_login' => true,
						'adminid'=>$admin[0]['id'],
						'nickname' => $admin[0]['nickname']!=''?$admin[0]['nickname']:$admin[0]['username'],
						'power'=>unserialize($admin[0]['power'])
				);
				$this->session->set_userdata($session);
				showNotice('Login success !',site_url('admin/index'),3);
			}else{
				showNotice('Username or password wrong !',site_url('admin/login'),4);
			}
		}
	}
	
	/**
	 * 注销
	 */
	public function logout() {
		checkBackendLogin ();
		$this->session->unset_userdata('backend');
		showNotice('Logout success !',site_url('admin/login'),3);
	}
	
	/**
	 * 后台首页
	 */
	public function index() {
		//checkBackendLogin();
		
		$backend = $this->session->userdata('backend');
		if(!$backend || !$backend['is_login']){
			redirect(site_url("admin/login"));
			//showNotice("您好，请先登陆！",site_url("admin/login"),4);
		}
		
		$data ['contentpage'] = 'm_index.php';
		$this->load->view ( 'm_tpl', $data );
	}
	
	/**
	 * 修改密码
	 */
	public function editPwd(){
		checkBackendLogin();
		$post = $this->input->post();
		if(empty($post)){
			$data ['contentpage'] = 'm_password_edit.php';
			$this->load->view ( 'm_tpl', $data );
		}else{
			if($post['password2']!=$post['password3']){
				showNotice('New password is wrong !',site_url('admin/editPwd'),4);
			}
			$backend = $this->session->userdata('backend');
			$this->load->Model('Admin_model','a',true);
			$admin = $this->a->getRecord('*',array('id'=>$backend['adminid'],'pwd'=>md5($post['password1'])))->result_array();
			if(!empty($admin)){
				if($this->a->updateRecord(array('pwd'=>md5($post['password2'])),array('id'=>$backend['adminid']))){
					showNotice('Modify profile success !',site_url('admin/editPwd'),3);
				}else{
					showNotice('Modify profile failure !',site_url('admin/editPwd'),4);
				}
			}else{
				showNotice('Old password is wrong !',site_url('admin/editPwd'),4);
			}
		}
	}
	
	/**
	 * 富文本编辑器
	 */
	public function ueditor() {
		// echo 'basepath:'.BASEPATH;
		// echo 'fcpaht:'.FCPATH;
		// echo 'apppath:'.APPPATH;
		$this->load->view ( 'ueditor' );
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */