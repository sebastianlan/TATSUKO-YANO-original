<?php
/**
 * 
 * 在线调查 控制器
 */

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Survey extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		checkBackendLogin();
	}
	
	
	public function test(){
		$arr = array(
				'1'=>'GoldenEye',
				'2'=>'1',
				'3'=>'2',
				'4'=>'3',
				'5'=>'3',
				'6'=>'4',
				'7'=>'4'
		);
		echo serialize($arr);
	}
	
	/**
	 * 
	 * 订单列表
	 */
	public function ls(){
		$this->load->Model('Survey_model','s',true);
		//分页
		$this->load->library('pagination');
		$config ['base_url'] = site_url("survey/ls");
		$config ['total_rows'] = $this->s->getCount();
		$config ['uri_segment'] = 3;
		$page_config = makePageConfig($config,10);
		$this->pagination->initialize($page_config);
		$offset = $this->uri->segment(3, 0);
		$data['offset'] = $offset;
		$data['surveylist'] = $this->s->getRecordLimit(array(), 'createtime desc', $page_config ['per_page'], $offset)->result_array();
		$data['contentpage'] = 'm_survey_list.php';
		$this->load->view('m_tpl',$data);
	}
	
	
	
	/**
	 * 处理订单
	 */
	public function deal(){
		$id = $this->uri->segment(3);
		$offset = $this->uri->segment(4);
		$this->load->Model('Survey_model','s',true);
		if($this->s->updateRecord(array('isdeal'=>1),array('id'=>$id))){
			showNotice('Handle success !',site_url('survey/ls/'.$offset),3);
		}else{
			showNotice('Handle failure !',site_url('survey/ls/'.$offset),4);
		}
	}
	
	
	/**
	 * 调查详情
	 */
	public function detail(){
		$this->config->load('online',true);
		$data['question'] = $this->config->item('survey','online');
		$id = $this->uri->segment(3);
		$this->load->Model('Survey_model','s',true);
		$surveylist = $this->s->getRecord('*',array('id'=>$id))->result_array();
		$data['survey'] = $surveylist[0];
		$data['survey']['answer'] = unserialize($data['survey']['answer']);
		$data['contentpage'] = 'm_survey_detail.php';
		$this->load->view('m_tpl',$data);
	}
	
}