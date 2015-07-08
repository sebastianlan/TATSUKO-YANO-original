<?php
/**
 * 
 * 招聘模块 控制器
 *
 */

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Job extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		checkBackendLogin();
	}
	
	
	public function test(){
		echo 'a';
	}
	
	/**
	 * 
	 * 后台工作列表
	 */
	public function ls(){
		$this->load->Model('Job_model','j',true);
		//分页
		$this->load->library('pagination');
		$where = array('isdel'=>0);
		$config ['base_url'] = site_url("job/ls");
		$config ['total_rows'] = $this->j->getCount($where);
		$config ['uri_segment'] = 3;
		$page_config = makePageConfig($config,10);
		$this->pagination->initialize($page_config);
		$offset = $this->uri->segment(3, 0);
		$data['offset'] = $offset;
		$data['joblist'] = $this->j->getRecordLimit($where, 'listorder desc', $page_config ['per_page'], $offset)->result_array();
		$data['contentpage'] = 'm_job_list.php';
		$this->load->view('m_tpl',$data);
	}
	
	
	/**
	 * 新增
	 */
	public function add(){
		$post = $this->input->post();
		if(empty($post)){
			//加载页面
			$data['contentpage'] = 'm_job_add.php';
			$this->load->view('m_tpl.php',$data);
		}else{
			//提交数据
			if(isset($post['isvalid'])){
				$post['isvalid'] = 1;
			}else{
				$post['isvalid'] = 0;
			}
			$post['createtime'] = time();
			$this->load->Model('Job_model','j',true);
			$jobid = $this->j->addRecord($post);
			if($jobid){
				showNotice('success',site_url('job/ls'),3);
			}else{
				showNotice('failure',site_url('job/add'),4);
			}
		}
	}
	
	/**
	 * 编辑工作
	 */
	public function edit(){
		$post = $this->input->post();
		$jobid = $this->uri->segment(3);
		if(empty($post)){
			//加载页面
			$data['jobid'] = $jobid;
			$this->load->Model('Job_model','j',true);
			$joblist = $this->j->getRecord('*',array('id'=>$jobid,'isdel'=>0),'listorder desc')->result_array();
			$data['job'] = $joblist[0];
			$data['contentpage'] = 'm_job_edit.php';
			$this->load->view('m_tpl.php',$data);
		}else{
			//提交数据
			if(isset($post['isvalid'])){
				$post['isvalid'] = 1;
			}else{
				$post['isvalid'] = 0;
			}
			$this->load->Model('Job_model','j',true);
			$newsid = $this->j->updateRecord($post,array('id'=>$jobid));
			if($newsid){
				showNotice('success',site_url('job/ls'),3);
			}else{
				showNotice('failure','javascript:history.go(-1);',4);
			}
		}
	}
	
	/**
	 * 更新顺序
	 */
	public function updateOrder(){
		$post = $this->input->post();
		$this->load->Model('Job_model','j',true);
		$order = $post['listorder'];
		if(empty($order)){
			showNotice('failure',site_url('job/ls'),4);
		}else{
			foreach ($order as $id=>$listorder){
				$this->j->updateRecord(array('listorder'=>$listorder),array('id'=>$id));
			}
			showNotice('success',site_url('job/ls'),3);
		}
	}
	
	/**
	 * 删除工作
	 */
	public function delete(){
		$id = $this->uri->segment(3);
		$offset = $this->uri->segment(4);
		$this->load->Model('Job_model','j',true);
		if($this->j->updateRecord(array('isdel'=>1),array('id'=>$id))){
			showNotice('success',site_url('job/ls/'.$offset),3);
		}else{
			showNotice('failure',site_url('job/ls/'.$offset),4);
		}
	}
	

}