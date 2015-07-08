<?php
/**
 * 
 * 新闻后台 控制器
 *
 */

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class News extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		checkBackendLogin();
	}
	
	
	public function test(){
		echo 'a';
	}
	
	/**
	 * 
	 * 后台新闻列表
	 */
	public function ls(){
		$this->load->Model('News_model','n',true);
		//分页
		$this->load->library('pagination');
		$where = array('isdel'=>0);
		$config ['base_url'] = site_url("news/ls");
		$config ['total_rows'] = $this->n->getCount($where);
		$config ['uri_segment'] = 3;
		$page_config = makePageConfig($config,10);
		$this->pagination->initialize($page_config);
		$offset = $this->uri->segment(3, 0);
		$data['offset'] = $offset;
		$data['newslist'] = $this->n->getRecordLimit($where, 'listorder desc', $page_config ['per_page'], $offset)->result_array();
		/*
		$data['newslist'] = $this->n->getRecord('*',$where,'listorder desc')->result_array();
		*/
		$this->load->Model('Newscate_model','nc',true);
		$newscate = $this->nc->getRecord('*',array('isdel'=>0))->result_array();
		$data['newscate'] = array_column($newscate, 'name','id');
		//print_r($data);
		$data['contentpage'] = 'm_news_list.php';
		$this->load->view('m_tpl',$data);
	}
	
	
	/**
	 * 新增
	 */
	public function add(){
		$post = $this->input->post();
		if(empty($post)){
			//加载页面
			
			//获取新闻分类列表
			$this->load->Model('Newscate_model','nc',true);
			$data['newscate'] = $this->nc->getRecord('*',array('isdel'=>0))->result_array();
			$data['contentpage'] = 'm_news_add.php';
			$this->load->view('m_tpl.php',$data);
		}else{
			//提交数据
			if(isset($post['isvalid'])){
				$post['isvalid'] = 1;
			}else{
				$post['isvalid'] = 0;
			}
			//新闻图片
			if(!empty($_FILES) && $_FILES['pic']['error']!=4){
				$config['upload_path'] = FCPATH.'uploads/image/'.date('Ymd').'/';
				if(!file_exists($config['upload_path'])){
					mkdir($config['upload_path'], 0777, true);
				}
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				$config['encrypt_name'] = true;
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('pic')){
					showNotice($this->upload->display_errors(),'javascript:void(0);',4);
				}else{
					$picdata = $this->upload->data();
					$post['pic'] = str_replace(FCPATH, '', $picdata['full_path']);
				}
			}
			$post['createtime'] = time();
			$this->load->Model('News_model','n',true);
			$newsid = $this->n->addRecord($post);
			if($newsid){
				showNotice('success',site_url('news/ls'),3);
			}else{
				showNotice('failure','javascript:void(0);',4);
			}
		}
	}
	
	/**
	 * 编辑新闻
	 */
	public function edit(){
		$post = $this->input->post();
		$newsid = $this->uri->segment(3);
		if(empty($post)){
			//加载页面
			$data['newsid'] = $newsid;
			//获取新闻分类列表
			$this->load->Model('Newscate_model','nc',true);
			$data['newscate'] = $this->nc->getRecord('*',array('isdel'=>0))->result_array();
			
			$this->load->Model('News_model','n',true);
			$newslist = $this->n->getRecord('*',array('id'=>$newsid,'isdel'=>0),'listorder desc')->result_array();
			$data['news'] = $newslist[0];
			$data['contentpage'] = 'm_news_edit.php';
			$this->load->view('m_tpl.php',$data);
		}else{
			//提交数据
			if(isset($post['isvalid'])){
				$post['isvalid'] = 1;
			}else{
				$post['isvalid'] = 0;
			}
			//新闻图片
			if(!empty($_FILES) && $_FILES['pic']['error']!=4){
				$config['upload_path'] = FCPATH.'uploads/image/'.date('Ymd').'/';
				if(!file_exists($config['upload_path'])){
					mkdir($config['upload_path'], 0777, true);
				}
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				$config['encrypt_name'] = true;
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('pic')){
					showNotice($this->upload->display_errors(),site_url('news/add'),4);
				}else{
					$picdata = $this->upload->data();
					$post['pic'] = str_replace(FCPATH, '', $picdata['full_path']);
				}
			}
			$post['updatetime'] = time();
			$this->load->Model('News_model','n',true);
			$newsid = $this->n->updateRecord($post,array('id'=>$newsid));
			if($newsid){
				showNotice('success',site_url('news/ls'),3);
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
		$this->load->Model('News_model','n',true);
		$order = $post['listorder'];
		if(empty($order)){
			showNotice('failure',site_url('news/ls'),4);
		}else{
			foreach ($order as $id=>$listorder){
				$this->n->updateRecord(array('listorder'=>$listorder),array('id'=>$id));
			}
			showNotice('success',site_url('news/ls'),3);
		}
	}
	
	/**
	 * 删除新闻
	 */
	public function delete(){
		$id = $this->uri->segment(3);
		$offset = $this->uri->segment(4);
		$this->load->Model('News_model','n',true);
		if($this->n->updateRecord(array('isdel'=>1),array('id'=>$id))){
			showNotice('success',site_url('news/ls/'.$offset),3);
		}else{
			showNotice('failure',site_url('news/ls/'.$offset),4);
		}
	}
	
	
	/**
	 * 
	 * 分类列表
	 */
	public function lsCate(){
		$this->load->Model('Newscate_model','nc',true);
		//分页
		$this->load->library('pagination');
		$where = array('isdel'=>0);
		$config ['base_url'] = site_url("news/lsCate");
		$config ['total_rows'] = $this->nc->getCount($where);
		$config ['uri_segment'] = 3;
		$page_config = makePageConfig($config,10);
		$this->pagination->initialize($page_config);
		$offset = $this->uri->segment(3, 0);
		$data['offset'] = $offset;
		$data['newscatelist'] = $this->nc->getRecordLimit($where, 'listorder desc', $page_config ['per_page'], $offset)->result_array();
		$data['contentpage'] = 'm_newscate_list.php';
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
			$data['contentpage'] = 'm_newscate_add.php';
			$this->load->view('m_tpl.php',$data);
		}else{
			//提交数据
			if(isset($post['isvalid'])){
				$post['isvalid'] = 1;
			}else{
				$post['isvalid'] = 0;
			}
			$this->load->Model('Newscate_model','nc',true);
			$id = $this->nc->addRecord($post);
			if($id){
				showNotice('success',site_url('news/lsCate'),3);
			}else{
				showNotice('failure',site_url('news/addCate'),4);
			}
		}
	}
	
	
	/**
	 * 
	 * 更新新闻分类
	 */
	public function editCate(){
		$post = $this->input->post();
		$newscateid = $this->uri->segment(3);
		if(empty($post)){
			//加载页面
			$data['newscateid'] = $newscateid;
			//获取新闻分类列表
			$this->load->Model('Newscate_model','nc',true);
			$newscate_list = $this->nc->getRecord('*',array('id'=>$newscateid,'isdel'=>0))->result_array();
			$data['newscate'] = $newscate_list[0];
			$data['contentpage'] = 'm_newscate_edit.php';
			$this->load->view('m_tpl.php',$data);
		}else{
			//提交数据
			if(isset($post['isvalid'])){
				$post['isvalid'] = 1;
			}else{
				$post['isvalid'] = 0;
			}
			$this->load->Model('Newscate_model','nc',true);
			if($this->nc->updateRecord($post,array('id'=>$newscateid))){
				showNotice('success',site_url('news/lsCate'),3);
			}else{
				showNotice('failure','javascript:history.go(-1);',4);
			}
		}
	}
	
	/**
	 * 更新新闻分类顺序
	 */
	public function updateCateOrder(){
		$post = $this->input->post();
		$this->load->Model('Newscate_model','nc',true);
		$order = $post['listorder'];
		if(empty($order)){
			showNotice('failure',site_url('news/lsCate'),4);
		}else{
			foreach ($order as $id=>$listorder){
				$this->nc->updateRecord(array('listorder'=>$listorder),array('id'=>$id));
			}
			showNotice('success',site_url('news/lsCate'),3);
		}
	}
	
	/**
	 * 删除新闻分类
	 */
	public function deleteCate(){
		$id = $this->uri->segment(3);
		$offset = $this->uri->segment(4);
		$this->load->Model('Newscate_model','nc',true);
		if($this->nc->updateRecord(array('isdel'=>1),array('id'=>$id))){
			showNotice('success',site_url('news/lsCate/'.$offset),3);
		}else{
			showNotice('failure',site_url('news/lsCate/'.$offset),4);
		}
	}
}