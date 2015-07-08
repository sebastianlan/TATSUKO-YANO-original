<?php
/**
 * 
 * 资讯 控制器
 *
 */

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Info extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		checkBackendLogin();
	}
	
	
	public function test(){
	}
	
	/**
	 * 
	 * 资讯列表
	 */
	public function ls(){
		$this->load->Model('Info_model','i',true);
		//分页
		$this->load->library('pagination');
		$where = array('isdel'=>0);
		$config ['base_url'] = site_url("info/ls");
		$config ['total_rows'] = $this->i->getCount($where);
		$config ['uri_segment'] = 3;
		$page_config = makePageConfig($config,10);
		$this->pagination->initialize($page_config);
		$offset = $this->uri->segment(3, 0);
		$data['offset'] = $offset;
		$data['infolist'] = $this->i->getRecordLimit($where, 'listorder desc', $page_config ['per_page'], $offset)->result_array();
		$this->load->Model('Infocate_model','ic',true);
		$infocate = $this->ic->getRecord('*',array('isdel'=>0))->result_array();
		$data['infocate'] = array_column($infocate, 'name','id');
		//print_r($data);
		$data['contentpage'] = 'm_info_list.php';
		$this->load->view('m_tpl',$data);
	}
	
	
	/**
	 * 新增
	 */
	public function add(){
		$post = $this->input->post();
		if(empty($post)){
			//加载页面
			
			//获取资讯分类列表
			$this->load->Model('Infocate_model','ic',true);
			$data['infocate'] = $this->ic->getRecord('*',array('isdel'=>0))->result_array();
			$data['contentpage'] = 'm_info_add.php';
			$this->load->view('m_tpl.php',$data);
		}else{
			//提交数据
			if(isset($post['isvalid'])){
				$post['isvalid'] = 1;
			}else{
				$post['isvalid'] = 0;
			}
			
			//上传附件
			if(!empty($_FILES) && $_FILES['attach']['error']!=4){
				$config['upload_path'] = FCPATH.'uploads/file/'.date('Ymd').'/';
				if(!file_exists($config['upload_path'])){
					mkdir($config['upload_path'], 0777, true);
				}
				//$config['allowed_types'] = 'pdf|doc|docs|xls|xlsx|zip|rar|txt|csv';
				$config['allowed_types'] = '*';
				$config['encrypt_name'] = true;
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('attach')){
					showNotice($this->upload->display_errors(),'javascript:history.go(-1);',4);
				}else{
					$logodata = $this->upload->data();
					$post['attach'] = str_replace(FCPATH, '', $logodata['full_path']);
				}
			}
			//print_r($post);
			//exit();
			
			
			$post['createtime'] = time();
			$this->load->Model('Info_model','n',true);
			$infoid = $this->n->addRecord($post);
			if($infoid){
				showNotice('success',site_url('info/ls'),3);
			}else{
				showNotice('failure',site_url('info/add'),4);
			}
		}
	}
	
	/**
	 * 编辑资讯
	 */
	public function edit(){
		$post = $this->input->post();
		$infoid = $this->uri->segment(3);
		if(empty($post)){
			//加载页面
			$data['infoid'] = $infoid;
			//获取分类列表
			$this->load->Model('Infocate_model','ic',true);
			$data['infocate'] = $this->ic->getRecord('*',array('isdel'=>0))->result_array();
			
			$this->load->Model('Info_model','i',true);
			$infolist = $this->i->getRecord('*',array('id'=>$infoid,'isdel'=>0),'listorder desc')->result_array();
			$data['info'] = $infolist[0];
			$data['contentpage'] = 'm_info_edit.php';
			$this->load->view('m_tpl.php',$data);
		}else{
			//提交数据
			if(isset($post['isvalid'])){
				$post['isvalid'] = 1;
			}else{
				$post['isvalid'] = 0;
			}
			if(!empty($_FILES) && $_FILES['attach']['error']!=4){
				$config['upload_path'] = FCPATH.'uploads/file/'.date('Ymd').'/';
				if(!file_exists($config['upload_path'])){
					mkdir($config['upload_path'], 0777, true);
				}
				//$config['allowed_types'] = 'pdf|doc|docs|xls|xlsx|zip|rar|txt|csv';
				$config['allowed_types'] = '*';
				$config['encrypt_name'] = true;
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('attach')){
					showNotice($this->upload->display_errors(),'javascript:history.go(-1);',4);
				}else{
					$logodata = $this->upload->data();
					$post['attach'] = str_replace(FCPATH, '', $logodata['full_path']);
				}
			}
			
			$post['updatetime'] = time();
			$this->load->Model('Info_model','i',true);
			if($this->i->updateRecord($post,array('id'=>$infoid))){
				showNotice('success',site_url('info/ls'),3);
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
		$this->load->Model('Info_model','i',true);
		$order = $post['listorder'];
		if(empty($order)){
			showNotice('failure',site_url('info/ls'),4);
		}else{
			foreach ($order as $id=>$listorder){
				$this->i->updateRecord(array('listorder'=>$listorder),array('id'=>$id));
			}
			showNotice('success',site_url('info/ls'),3);
		}
	}
	
	/**
	 * 删除资讯
	 */
	public function delete(){
		$id = $this->uri->segment(3);
		$offset = $this->uri->segment(4);
		$this->load->Model('Info_model','i',true);
		if($this->i->updateRecord(array('isdel'=>1),array('id'=>$id))){
			showNotice('success',site_url('info/ls/'.$offset),3);
		}else{
			showNotice('failure',site_url('info/ls/'.$offset),4);
		}
	}
	
	
	/**
	 * 
	 * 分类列表
	 */
	public function lsCate(){
		$this->load->Model('Infocate_model','ic',true);
		//分页
		$this->load->library('pagination');
		$where = array('isdel'=>0);
		$config ['base_url'] = site_url("info/lsCate");
		$config ['total_rows'] = $this->ic->getCount($where);
		$config ['uri_segment'] = 3;
		$page_config = makePageConfig($config,10);
		$this->pagination->initialize($page_config);
		$offset = $this->uri->segment(3, 0);
		$data['offset'] = $offset;
		$data['infocatelist'] = $this->ic->getRecordLimit($where, 'listorder desc', $page_config ['per_page'], $offset)->result_array();
		$data['contentpage'] = 'm_infocate_list.php';
		$this->load->view('m_tpl',$data);
	}
	
	
	/**
	 * 
	 * 添加分类
	 */
	public function addCate(){
		$post = $this->input->post();
		if(empty($post)){
			//加载页面
			$data['contentpage'] = 'm_infocate_add.php';
			$this->load->view('m_tpl.php',$data);
		}else{
			//提交数据
			if(isset($post['isvalid'])){
				$post['isvalid'] = 1;
			}else{
				$post['isvalid'] = 0;
			}
			$this->load->Model('Infocate_model','ic',true);
			$id = $this->ic->addRecord($post);
			if($id){
				showNotice('success',site_url('info/lsCate'),3);
			}else{
				showNotice('failure',site_url('info/addCate'),4);
			}
		}
	}
	
	
	/**
	 * 
	 * 更新资讯分类
	 */
	public function editCate(){
		$post = $this->input->post();
		$infocateid = $this->uri->segment(3);
		if(empty($post)){
			//加载页面
			$data['infocateid'] = $infocateid;
			//获取新闻分类列表
			$this->load->Model('Infocate_model','ic',true);
			$infocate_list = $this->ic->getRecord('*',array('id'=>$infocateid,'isdel'=>0))->result_array();
			$data['infocate'] = $infocate_list[0];
			$data['contentpage'] = 'm_infocate_edit.php';
			$this->load->view('m_tpl.php',$data);
		}else{
			//提交数据
			if(isset($post['isvalid'])){
				$post['isvalid'] = 1;
			}else{
				$post['isvalid'] = 0;
			}
			$this->load->Model('Infocate_model','ic',true);
			if($this->ic->updateRecord($post,array('id'=>$infocateid))){
				showNotice('success',site_url('info/lsCate'),3);
			}else{
				showNotice('failure','javascript:history.go(-1);',4);
			}
		}
	}
	
	/**
	 * 更新资讯分类顺序
	 */
	public function updateCateOrder(){
		$post = $this->input->post();
		$this->load->Model('Infocate_model','ic',true);
		$order = $post['listorder'];
		if(empty($order)){
			showNotice('failure',site_url('info/lsCate'),4);
		}else{
			foreach ($order as $id=>$listorder){
				$this->ic->updateRecord(array('listorder'=>$listorder),array('id'=>$id));
			}
			showNotice('success',site_url('info/lsCate'),3);
		}
	}
	
	/**
	 * 删除资讯分类
	 */
	public function deleteCate(){
		$id = $this->uri->segment(3);
		$offset = $this->uri->segment(4);
		$this->load->Model('Infocate_model','ic',true);
		if($this->ic->updateRecord(array('isdel'=>1),array('id'=>$id))){
			showNotice('success',site_url('info/lsCate/'.$offset),3);
		}else{
			showNotice('failure',site_url('info/lsCate/'.$offset),4);
		}
	}
}