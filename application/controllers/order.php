<?php
/**
 * 
 * 订单管理 控制器
 *
 */

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Order extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		checkBackendLogin();
	}
	
	
	public function test(){
	}
	
	/**
	 * 
	 * 订单列表
	 */
	public function ls(){
		$this->load->Model('Order_model','o',true);
		//分页
		$this->load->library('pagination');
		$config ['base_url'] = site_url("order/ls");
		$config ['total_rows'] = $this->o->getCount();
		$config ['uri_segment'] = 3;
		$page_config = makePageConfig($config,10);
		$this->pagination->initialize($page_config);
		$offset = $this->uri->segment(3, 0);
		$data['offset'] = $offset;
		$data['orderlist'] = $this->o->getOrder('tyo_order.*,tyo_product.id as pid,tyo_product.name as pname',array(), 'tyo_order.createtime desc', $page_config ['per_page'], $offset)->result_array();
		//echo $this->db->last_query();
		//print_r($data);
		//print_r($data);
		$data['contentpage'] = 'm_order_list.php';
		$this->load->view('m_tpl',$data);
	}
	
	
	
	/**
	 * 处理订单
	 */
	public function deal(){
		$id = $this->uri->segment(3);
		$offset = $this->uri->segment(4);
		$this->load->Model('Order_model','o',true);
		if($this->o->updateRecord(array('isdeal'=>1),array('id'=>$id))){
			showNotice('success',site_url('order/ls/'.$offset),3);
		}else{
			showNotice('failure',site_url('order/ls/'.$offset),4);
		}
	}
	
}