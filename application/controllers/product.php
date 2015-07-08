<?php
/**
 * 
 * 产品 控制器
 *
 */

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Product extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		checkBackendLogin();
	}
	
	
	public function test(){
	}
	
	/**
	 * 
	 * 产品列表
	 */
	public function ls(){
		//常用配置
		$data['invest'] = $this->config->item('invest');
		$data['earn_time'] = $this->config->item('invest');
		$data['earn_type'] = $this->config->item('invest');
		$data['status'] = $this->config->item('status');
		
		$this->load->Model('product_model','p',true);
		$where['isdel'] = 0;
		//查询
		$post = $this->input->post();
		if(!empty($post)){
			if(isset($post['name']) && $post['name']!=''){
				$k1 = $post['name'];
			}else{
				$k1 = '0';
			}
		}else{
			//分页链接
			$k1 = urldecode($this->uri->segment(3, 0));
		}
		if($k1!='0'){
			$where['name like'] = '%'.$k1.'%';
		}
		//分页
		$this->load->library('pagination');
		
		$config ['base_url'] = site_url("product/ls/{$k1}");
		$config ['total_rows'] = $this->p->getCount($where);
		$config ['uri_segment'] = 4;
		$page_config = makePageConfig($config,10);
		$this->pagination->initialize($page_config);
		$offset = $this->uri->segment(4, 0);
		$data['offset'] = $offset;
		$data['plist'] = $this->p->getRecordLimit($where, 'listorder desc', $page_config ['per_page'], $offset)->result_array();
		
		//分类
		$this->load->Model('Productcate_model','pc',true);
		$pcate = $this->pc->getRecord('*',array('isdel'=>0))->result_array();
		$data['pcate'] = array_column($pcate, 'name','id');
		//发行机构
		$this->load->Model('group_model','g',true);
		$group = $this->g->getRecord()->result_array();
		$data['group'] = array_column($group, 'name','id');
		//print_r($data);
		$data['contentpage'] = 'm_product_list.php';
		$this->load->view('m_tpl',$data);
	}
	
	
	/**
	 * 新增
	 */
	public function add(){
		$post = $this->input->post();
		if(empty($post)){
			//加载页面
			//常用配置
			$data['invest'] = $this->config->item('invest');
			$data['earn_time'] = $this->config->item('earn_time');
			$data['earn_type'] = $this->config->item('earn_type');
			$data['status'] = $this->config->item('status');
			//获取分类列表
			$this->load->Model('productcate_model','pc',true);
			$data['pcate'] = $this->pc->getRecord('*',array('isdel'=>0))->result_array();
			//发行机构
			$this->load->Model('group_model','g',true);
			$data['group'] = $this->g->getRecord('*',array('isdel'=>0))->result_array();
			$data['contentpage'] = 'm_product_add.php';
			$this->load->view('m_tpl.php',$data);
		}else{
			//提交数据
			$this->load->Model('product_model','p',true);
			$mydeadline = $post['mydeadline'];
			unset($post['mydeadline']);
			$mymoney = $post['mymoney'];
			unset($post['mymoney']);
			$myearn = $post['myearn'];
			unset($post['myearn']);
			
			//print_r($post);
			//print_r($_FILES);
			//exit();
			
			$pid = $this->p->addRecord($post);
			
			//存储收益
			$earnmin = $earnmax = $myearn[0];
			$earn_fields = array();
			foreach ($mydeadline as $k=>$v){
				$tmp = array();
				if($mymoney[$k]!=''&&$myearn[$k]!=''){
					$tmp['product_id'] = $pid;
					$tmp['time'] = $v;
					$tmp['money'] = $mymoney[$k];
					$tmp['earn'] = $myearn[$k];
					$earn_fields[] = $tmp;
					//寻找最小收益
					if($myearn[$k] < $earnmin){
						$earnmin = $myearn[$k];
					}
					//寻找最大收益
					if($myearn[$k] > $earnmax){
						$earnmax = $myearn[$k];
					}
				}
			}
			
			
			$this->load->Model('productearn_model','pe',true);
			$this->pe->addRecords($earn_fields);
			//更新最大最小收益
			$this->p->updateRecord(array('earn_min'=>$earnmin,'earn_max'=>$earnmax),array('id'=>$pid));
			
			//存储材料
			$attach_fields = array();
			foreach ($_FILES as $k=>$v){
				$tmp = array();
				if($v['error']!=4){
					$config['upload_path'] = FCPATH.'uploads/file/'.date('Ymd').'/';
					$config['encrypt_name'] = true;
					if(!file_exists($config['upload_path'])){
						mkdir($config['upload_path'], 0777, true);
					}
					//$config['allowed_types'] = 'pdf|doc|docs|xls|xlsx|zip|rar|txt|csv';
					$config['allowed_types'] = '*';
					$config['max_size'] = 10240;
					$this->load->library('upload', $config);
					if ($this->upload->do_upload($k)){
						$updata = $this->upload->data();
						$tmp['product_id'] = $pid;
						$tmp['filename'] = $updata['orig_name'];
						$tmp['filepath'] = str_replace(FCPATH, '', $updata['full_path']);
						$tmp['ext'] = substr($updata['file_ext'], 1);
						$tmp['size'] = $updata['file_size'];
						$attach_fields[] = $tmp;
					}
				}
			}
			if(!empty($attach_fields)){
				$this->load->Model('productattach_model','pa',true);
				$this->pa->addRecords($attach_fields);
			}
			
			if($pid){
				showNotice('success',site_url('product/ls'),3);
			}else{
				showNotice('failure',site_url('product/add'),4);
			}
		}
	}
	
	/**
	 * 编辑产品
	 */
	public function edit(){
		$post = $this->input->post();
		$productid = $this->uri->segment(3);
		if(empty($post)){
			//加载页面
			$data['productid'] = $productid;
			//常用配置
			$data['invest'] = $this->config->item('invest');
			$data['earn_time'] = $this->config->item('earn_time');
			$data['earn_type'] = $this->config->item('earn_type');
			$data['status'] = $this->config->item('status');
			//获取分类列表
			$this->load->Model('productcate_model','pc',true);
			$data['pcate'] = $this->pc->getRecord('*',array('isdel'=>0))->result_array();
			//发行机构
			$this->load->Model('group_model','g',true);
			$data['group'] = $this->g->getRecord('*',array('isdel'=>0))->result_array();
			
			//产品收益
			$this->load->Model('productearn_model','pe',true);
			$data['productearn'] = $this->pe->getRecord('*',array('product_id'=>$productid))->result_array();
			
			//产品材料
			$this->load->Model('productattach_model','pa',true);
			$data['productattach'] = $this->pa->getRecord('*',array('product_id'=>$productid))->result_array();
			
			$this->load->Model('product_model','p',true);
			$productlist = $this->p->getRecord('*',array('id'=>$productid,'isdel'=>0),'listorder desc')->result_array();
			$data['product'] = $productlist[0];
			$data['contentpage'] = 'm_product_edit.php';
			$this->load->view('m_tpl.php',$data);
		}else{
			$delattach = $post['delattach'];
			unset($post['delattach']);
			//删除材料
			$this->load->Model('productattach_model','pa',true);
			if($delattach!=''){
				$arr = explode(',', $delattach);
				foreach ($arr as $v){
					$this->pa->deleteRecord(array('id'=>$v));
				}
			}
			//如果有新材料上传
			$attach_fields = array();
			foreach ($_FILES as $k=>$v){
				$tmp = array();
				if($v['error']!=4){
					$config['upload_path'] = FCPATH.'uploads/file/'.date('Ymd').'/';
					$config['encrypt_name'] = true;
					if(!file_exists($config['upload_path'])){
						mkdir($config['upload_path'], 0777, true);
					}
					//$config['allowed_types'] = 'pdf|doc|docs|xls|xlsx|zip|rar|txt|csv';
					$config['allowed_types'] = '*';
					$config['max_size'] = 10240;
					$this->load->library('upload', $config);
					if ($this->upload->do_upload($k)){
						$updata = $this->upload->data();
						$tmp['product_id'] = $productid;
						$tmp['filename'] = $updata['orig_name'];
						$tmp['filepath'] = str_replace(FCPATH, '', $updata['full_path']);
						$tmp['ext'] = substr($updata['file_ext'], 1);
						$tmp['size'] = $updata['file_size'];
						$attach_fields[] = $tmp;
					}else{
						echo $this->upload->display_errors();
						exit;
					}
				}
			}
			if(!empty($attach_fields)){
				$this->pa->addRecords($attach_fields);
			}
			
			//产品收益变更，全部删除原有的，添加现在的
			
			$this->load->Model('productearn_model','pe',true);
			$this->pe->deleteRecord(array('product_id'=>$productid));
			
			
			$mydeadline = $post['mydeadline'];
			unset($post['mydeadline']);
			$mymoney = $post['mymoney'];
			unset($post['mymoney']);
			$myearn = $post['myearn'];
			unset($post['myearn']);
				
			//print_r($post);
			//print_r($_FILES);
			//exit();
			
			//存储收益
			$earnmin = $earnmax = $myearn[0];
			$earn_fields = array();
			foreach ($mydeadline as $k=>$v){
				$tmp = array();
				if($mymoney[$k]!=''&&$myearn[$k]!=''){
					$tmp['product_id'] = $productid;
					$tmp['time'] = $v;
					$tmp['money'] = $mymoney[$k];
					$tmp['earn'] = $myearn[$k];
					$earn_fields[] = $tmp;
					//寻找最小收益
					if($myearn[$k] < $earnmin){
						$earnmin = $myearn[$k];
					}
					//寻找最大收益
					if($myearn[$k] > $earnmax){
						$earnmax = $myearn[$k];
					}
				}
			}
			
			$this->pe->addRecords($earn_fields);
			$post['earn_min'] = $earnmin;
			$post['earn_max'] = $earnmax;
			
			//提交数据
			//$post['faxing_time'] = strtotime($post['faxing_time']);
			$this->load->Model('product_model','p',true);
			$newsid = $this->p->updateRecord($post,array('id'=>$productid));
			if($newsid){
				showNotice('success',site_url('product/ls'),3);
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
		$this->load->Model('product_model','p',true);
		$order = $post['listorder'];
		if(empty($order)){
			showNotice('success',site_url('product/ls'),4);
		}else{
			foreach ($order as $id=>$listorder){
				$this->p->updateRecord(array('listorder'=>$listorder),array('id'=>$id));
			}
			showNotice('failure',site_url('product/ls'),3);
		}
	}
	
	/**
	 * 删除产品
	 */
	public function delete(){
		$id = $this->uri->segment(3);
		$offset = $this->uri->segment(4);
		$this->load->Model('product_model','p',true);
		if($this->p->updateRecord(array('isdel'=>1),array('id'=>$id))){
			showNotice('success',site_url('product/ls/'.$offset),3);
		}else{
			showNotice('failure',site_url('product/ls/'.$offset),4);
		}
	}
	
	
	/**
	 * 
	 * 分类列表
	 */
	public function lsCate(){
		$this->load->Model('Productcate_model','pc',true);
		//分页
		$this->load->library('pagination');
		$where = array('isdel'=>0);
		$config ['base_url'] = site_url("product/lsCate");
		$config ['total_rows'] = $this->pc->getCount($where);
		$config ['uri_segment'] = 3;
		$page_config = makePageConfig($config,10);
		$this->pagination->initialize($page_config);
		$offset = $this->uri->segment(3, 0);
		$data['offset'] = $offset;
		$data['productcatelist'] = $this->pc->getRecordLimit($where, 'listorder desc', $page_config ['per_page'], $offset)->result_array();
		$data['contentpage'] = 'm_productcate_list.php';
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
			$data['contentpage'] = 'm_productcate_add.php';
			$this->load->view('m_tpl.php',$data);
		}else{
			//提交数据
			if(isset($post['isvalid'])){
				$post['isvalid'] = 1;
			}else{
				$post['isvalid'] = 0;
			}
			$this->load->Model('Productcate_model','pc',true);
			$id = $this->pc->addRecord($post);
			if($id){
				showNotice('success',site_url('product/lsCate'),3);
			}else{
				showNotice('failure',site_url('product/addCate'),4);
			}
		}
	}
	
	
	/**
	 * 
	 * 更新产品分类
	 */
	public function editCate(){
		$post = $this->input->post();
		$productcateid = $this->uri->segment(3);
		if(empty($post)){
			//加载页面
			$data['productcateid'] = $productcateid;
			//获取产品分类列表
			$this->load->Model('Productcate_model','pc',true);
			$productcate_list = $this->pc->getRecord('*',array('id'=>$productcateid,'isdel'=>0))->result_array();
			$data['productcate'] = $productcate_list[0];
			$data['contentpage'] = 'm_productcate_edit.php';
			$this->load->view('m_tpl.php',$data);
		}else{
			//提交数据
			if(isset($post['isvalid'])){
				$post['isvalid'] = 1;
			}else{
				$post['isvalid'] = 0;
			}
			$this->load->Model('Productcate_model','pc',true);
			if($this->pc->updateRecord($post,array('id'=>$productcateid))){
				showNotice('success',site_url('product/lsCate'),3);
			}else{
				showNotice('failure','javascript:history.go(-1);',4);
			}
		}
	}
	
	/**
	 * 更新产品分类顺序
	 */
	public function updateCateOrder(){
		$post = $this->input->post();
		$this->load->Model('Productcate_model','pc',true);
		$order = $post['listorder'];
		if(empty($order)){
			showNotice('failure',site_url('product/lsCate'),4);
		}else{
			foreach ($order as $id=>$listorder){
				$this->pc->updateRecord(array('listorder'=>$listorder),array('id'=>$id));
			}
			showNotice('success',site_url('product/lsCate'),3);
		}
	}
	
	/**
	 * 删除产品分类
	 */
	public function deleteCate(){
		$id = $this->uri->segment(3);
		$offset = $this->uri->segment(4);
		$this->load->Model('Productcate_model','pc',true);
		if($this->pc->updateRecord(array('isdel'=>1),array('id'=>$id))){
			showNotice('success',site_url('product/lsCate/'.$offset),3);
		}else{
			showNotice('failure',site_url('product/lsCate/'.$offset),4);
		}
	}
}