<?php
/**
 * 
 * 合作伙伴 控制器
 *
 */

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Group extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		checkBackendLogin();
	}
	
	
	public function test(){
	}
	
	/**
	 * 
	 * 合作伙伴 列表
	 */
	public function ls(){
		$this->load->Model('Group_model','g',true);
		//分页
		$this->load->library('pagination');
		$where = array('isdel'=>0);
		$config ['base_url'] = site_url("group/ls");
		$config ['total_rows'] = $this->g->getCount($where);
		$config ['uri_segment'] = 3;
		$page_config = makePageConfig($config,10);
		$this->pagination->initialize($page_config);
		$offset = $this->uri->segment(3, 0);
		$data['offset'] = $offset;
		$data['grouplist'] = $this->g->getRecordLimit($where, 'listorder desc', $page_config ['per_page'], $offset)->result_array();
		$this->load->Model('Groupcate_model','gc',true);
		$groupcate = $this->gc->getRecord('*',array('isdel'=>0))->result_array();
		$data['groupcate'] = array_column($groupcate, 'name','id');
		//print_r($data);
		$data['contentpage'] = 'm_group_list.php';
		$this->load->view('m_tpl',$data);
	}
	
	
	/**
	 * 新增
	 */
	public function add(){
		$post = $this->input->post();
		if(empty($post)){
			//加载页面
			//获取合作伙伴分类列表
			$this->load->Model('Groupcate_model','gc',true);
			$data['groupcate'] = $this->gc->getRecord('*',array('isdel'=>0))->result_array();
			$data['contentpage'] = 'm_group_add.php';
			$this->load->view('m_tpl.php',$data);
		}else{
			//提交数据
			if(isset($post['isvalid'])){
				$post['isvalid'] = 1;
			}else{
				$post['isvalid'] = 0;
			}
			//图片上传
			if(!empty($_FILES) && $_FILES['logo']['error']!=4){
				$config['upload_path'] = FCPATH.'uploads/image/'.date('Ymd').'/';
				if(!file_exists($config['upload_path'])){
					mkdir($config['upload_path'], 0777, true);
				}
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				$config['encrypt_name'] = true;
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('logo')){
					showNotice($this->upload->display_errors(),site_url('group/add'),4);
				}else{
					$logodata = $this->upload->data();
					$post['logo'] = str_replace(FCPATH, '', $logodata['full_path']);
				}
			}else{
				showNotice('Need upload logo！',site_url('group/add'),4);
			}
			$this->load->Model('Group_model','g',true);
			$groupid = $this->g->addRecord($post);
			if($groupid){
				showNotice('success',site_url('group/ls'),3);
			}else{
				showNotice('failure',site_url('group/add'),4);
			}
		}
	}
	
	/**
	 * 编辑
	 */
	public function edit(){
		$post = $this->input->post();
		$groupid = $this->uri->segment(3);
		if(empty($post)){
			//加载页面
			$data['groupid'] = $groupid;
			//获取分类列表
			$this->load->Model('Groupcate_model','gc',true);
			$data['groupcate'] = $this->gc->getRecord('*',array('isdel'=>0))->result_array();
			
			$this->load->Model('Group_model','g',true);
			$grouplist = $this->g->getRecord('*',array('id'=>$groupid,'isdel'=>0),'listorder desc')->result_array();
			$data['group'] = $grouplist[0];
			$data['contentpage'] = 'm_group_edit.php';
			$this->load->view('m_tpl.php',$data);
		}else{
			//提交数据
			if(isset($post['isvalid'])){
				$post['isvalid'] = 1;
			}else{
				$post['isvalid'] = 0;
			}
			//图片上传
			if(!empty($_FILES) && $_FILES['logo']['error']!=4){
				$config['upload_path'] = FCPATH.'uploads/image/'.date('Ymd').'/';
				if(!file_exists($config['upload_path'])){
					mkdir($config['upload_path'], 0777, true);
				}
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				$config['encrypt_name'] = true;
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('logo')){
					showNotice($this->upload->display_errors(),site_url('group/add'),4);
				}else{
					$logodata = $this->upload->data();
					$post['logo'] = str_replace(FCPATH, '', $logodata['full_path']);
				}
			}
			
			$this->load->Model('Group_model','g',true);
			if($this->g->updateRecord($post,array('id'=>$groupid))){
				showNotice('success',site_url('group/ls'),3);
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
		$this->load->Model('Group_model','g',true);
		$order = $post['listorder'];
		if(empty($order)){
			showNotice('failure',site_url('group/ls'),4);
		}else{
			foreach ($order as $id=>$listorder){
				$this->g->updateRecord(array('listorder'=>$listorder),array('id'=>$id));
			}
			showNotice('success',site_url('group/ls'),3);
		}
	}
	
	/**
	 * 删除合作伙伴
	 */
	public function delete(){
		$id = $this->uri->segment(3);
		$offset = $this->uri->segment(4);
		$this->load->Model('Group_model','g',true);
		if($this->g->updateRecord(array('isdel'=>1),array('id'=>$id))){
			showNotice('success',site_url('group/ls/'.$offset),3);
		}else{
			showNotice('failure',site_url('group/ls/'.$offset),4);
		}
	}
	
	
	/**
	 * 
	 * 分类列表
	 */
	public function lsCate(){
		$this->load->Model('Groupcate_model','gc',true);
		//分页
		$this->load->library('pagination');
		$where = array('isdel'=>0);
		$config ['base_url'] = site_url("group/lsCate");
		$config ['total_rows'] = $this->gc->getCount($where);
		$config ['uri_segment'] = 3;
		$page_config = makePageConfig($config,10);
		$this->pagination->initialize($page_config);
		$offset = $this->uri->segment(3, 0);
		$data['offset'] = $offset;
		$data['groupcatelist'] = $this->gc->getRecordLimit($where, 'listorder desc', $page_config ['per_page'], $offset)->result_array();
		$data['contentpage'] = 'm_groupcate_list.php';
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
			$data['contentpage'] = 'm_groupcate_add.php';
			$this->load->view('m_tpl.php',$data);
		}else{
			//提交数据
			if(isset($post['isvalid'])){
				$post['isvalid'] = 1;
			}else{
				$post['isvalid'] = 0;
			}
			$this->load->Model('Groupcate_model','gc',true);
			$id = $this->gc->addRecord($post);
			if($id){
				showNotice('success',site_url('group/lsCate'),3);
			}else{
				showNotice('failure',site_url('group/addCate'),4);
			}
		}
	}
	
	
	/**
	 * 
	 * 更新合作伙伴分类
	 */
	public function editCate(){
		$post = $this->input->post();
		$groupcateid = $this->uri->segment(3);
		if(empty($post)){
			//加载页面
			$data['groupcateid'] = $groupcateid;
			//获取合作伙伴分类列表
			$this->load->Model('Groupcate_model','gc',true);
			$groupcate_list = $this->gc->getRecord('*',array('id'=>$groupcateid,'isdel'=>0))->result_array();
			$data['groupcate'] = $groupcate_list[0];
			$data['contentpage'] = 'm_groupcate_edit.php';
			$this->load->view('m_tpl.php',$data);
		}else{
			//提交数据
			if(isset($post['isvalid'])){
				$post['isvalid'] = 1;
			}else{
				$post['isvalid'] = 0;
			}
			$this->load->Model('Groupcate_model','gc',true);
			if($this->gc->updateRecord($post,array('id'=>$groupcateid))){
				showNotice('success',site_url('group/lsCate'),3);
			}else{
				showNotice('failure','javascript:history.go(-1);',4);
			}
		}
	}
	
	/**
	 * 更新合作伙伴分类顺序
	 */
	public function updateCateOrder(){
		$post = $this->input->post();
		$this->load->Model('Groupcate_model','gc',true);
		$order = $post['listorder'];
		if(empty($order)){
			showNotice('failure',site_url('group/lsCate'),4);
		}else{
			foreach ($order as $id=>$listorder){
				$this->gc->updateRecord(array('listorder'=>$listorder),array('id'=>$id));
			}
			showNotice('success',site_url('group/lsCate'),3);
		}
	}
	
	/**
	 * 删除合作伙伴分类
	 */
	public function deleteCate(){
		$id = $this->uri->segment(3);
		$offset = $this->uri->segment(4);
		$this->load->Model('Groupcate_model','gc',true);
		if($this->gc->updateRecord(array('isdel'=>1),array('id'=>$id))){
			showNotice('success',site_url('group/lsCate/'.$offset),3);
		}else{
			showNotice('failure',site_url('group/lsCate/'.$offset),4);
		}
	}
}