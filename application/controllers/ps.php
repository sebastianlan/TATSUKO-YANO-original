<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );


/**
 * 
 * 产品与服务 控制器
 */
class Ps extends CI_Controller {
	
	
	public function ls(){
		//banner
		$this->load->model('Ads_model','ads',true);
		$data['adslist'] = $this->ads->getRecord('*',array('key'=>'product','title !='=>'','pic !='=>''),'listorder desc')->result_array();
		
		$where = array();
		$where['isdel'] = 0;
		
		//分类
		$cateid = $this->uri->segment(3);
		if($cateid!='' && $cateid !='-'){
			$where['cateid'] = $cateid;
		}else {
			$cateid = '-';
		}
		$data['cateid'] = $cateid;
		//order
		$order_arr = array(
				'1'=>'earn_max desc',//收益从大到小
				'2'=>'earn_max asc',
				'3'=>'deadline asc',//期限从小到大
				'4'=>'deadline desc'
		);
		$order = '';
		$order_key = $this->uri->segment(4);
		if($order_key && $order_key!='-' && in_array($order_key, array_keys($order_arr))){
			$order = $order_arr[$order_key];
		}else{
			$order_key = '-';
			$order = 'listorder desc';
		}
		$data['order_key'] = $order_key;
		
		//data
		$this->load->Model('product_model','p',true);
		$this->load->library('pagination');
		$config ['base_url'] = site_url("ps/ls/{$cateid}/{$order_key}");
		$config ['total_rows'] = $this->p->getCount($where);
		$config ['uri_segment'] = 5;
		$page_config = makeFrontendPageConfig($config,6);
		$this->pagination->initialize($page_config);
		$offset = $this->uri->segment(5, 0);
		$data['offset'] = $offset;
		$data['plist'] = $this->p->getRecordLimit($where, $order, $page_config ['per_page'], $offset)->result_array();
		
		//echo $this->db->last_query();
		
		//产品分类
		$this->load->Model('productcate_model','pc',true);
		$tmpcate = $this->pc->getRecord()->result_array();
		$data['pcate'] = array_column($tmpcate, 'name','id');
		//print_r($data['pcate']);exit();
		
		//print_r($data['plist']);exit();
		
		$data ['contentpage'] = 'ps-list.php';
        $data ['seo_title'] = "TATSUKO YANO original";
        $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
        $data ['seo_description'] = "TATSUKO YANO original Description";

		$this->load->view ( 'tpl', $data );
	}
	
	public function detail(){
		//banner
		$this->load->model('Ads_model','ads',true);
		$data['adslist'] = $this->ads->getRecord('*',array('key'=>'product','title !='=>'','pic !='=>''),'listorder desc')->result_array();
		
		$id = $this->uri->segment(3);
		
		//更新访问量
		$this->load->Model('product_model','p',true);
		$this->p->updatePageview(array('id'=>$id));
		
		$data['pid'] = $id;
		
		//产品
		
		$tmpproduct = $this->p->getRecord('*',array('id'=>$id))->result_array();
		$data['product'] = $tmpproduct[0];
		
		//产品分类
		$this->load->Model('productcate_model','pc',true);
		$tmpcate = $this->pc->getRecord()->result_array();
		$data['pcate'] = array_column($tmpcate, 'name','id');
		
		//产品材料
		$this->load->Model('productattach_model','pa',true);
		$data['pattach'] = $this->pa->getRecord('*',array('product_id'=>$id))->result_array();
		
		//产品收益
		$this->load->Model('productearn_model','pe',true);
		$earn = $this->pe->getRecord('*',array('product_id'=>$id),'time asc')->result_array();
		$earnlist = array();
		//$earntime = array();
		foreach ($earn as $k=>$v){
			$tmp = array();
			$earnlist[$v['time']][] = $v;
		}
		//print_r($earntime);
		//print_r($earnlist);exit;
		
		$data['earnlist'] = $earnlist;
		
		$data ['contentpage'] = 'ps-detail.php';
		$data ['seo_title'] = "{$tmpproduct[0]['name']}-TATSUKO YANO original";
		$data ['seo_keywords'] = "{$tmpproduct[0]['keywords']},TATSUKO YANO original Keywords";
		$data ['seo_description'] = "{$tmpproduct[0]['desc']}";
		
		$this->load->view ( 'tpl', $data );
	}
	
	public function desc(){
		$this->load->model('Ads_model','ads',true);
		$data['adslist'] = $this->ads->getRecord('*',array('key'=>'product','title !='=>'','pic !='=>''),'listorder desc')->result_array();
		$data ['contentpage'] = 'ps-service-1.php';
        $data ['seo_title'] = "TATSUKO YANO original";
        $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
        $data ['seo_description'] = "TATSUKO YANO original Description";

		$this->load->view ( 'tpl', $data );
	}
	
	
	public function desc1(){
		//banner
		$this->load->model('Ads_model','ads',true);
		$data['adslist'] = $this->ads->getRecord('*',array('key'=>'product','title !='=>'','pic !='=>''),'listorder desc')->result_array();
		$data ['contentpage'] = 'ps-service-1.php';
        $data ['seo_title'] = "TATSUKO YANO original";
        $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
        $data ['seo_description'] = "TATSUKO YANO original Description";

		$this->load->view ( 'tpl', $data );
	}
	public function desc2(){
		//banner
		$this->load->model('Ads_model','ads',true);
		$data['adslist'] = $this->ads->getRecord('*',array('key'=>'product','title !='=>'','pic !='=>''),'listorder desc')->result_array();
		$data ['contentpage'] = 'ps-service-2.php';
        $data ['seo_title'] = "TATSUKO YANO original";
        $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
        $data ['seo_description'] = "TATSUKO YANO original Description";

		$this->load->view ( 'tpl', $data );
	}
	public function desc3(){
		//banner
		$this->load->model('Ads_model','ads',true);
		$data['adslist'] = $this->ads->getRecord('*',array('key'=>'product','title !='=>'','pic !='=>''),'listorder desc')->result_array();
		$data ['contentpage'] = 'ps-service-3.php';
        $data ['seo_title'] = "TATSUKO YANO original";
        $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
        $data ['seo_description'] = "TATSUKO YANO original Description";

		$this->load->view ( 'tpl', $data );
	}
	public function desc4(){
		//banner
		$this->load->model('Ads_model','ads',true);
		$data['adslist'] = $this->ads->getRecord('*',array('key'=>'product','title !='=>'','pic !='=>''),'listorder desc')->result_array();
		$data ['contentpage'] = 'ps-service-4.php';
        $data ['seo_title'] = "TATSUKO YANO original";
        $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
        $data ['seo_description'] = "TATSUKO YANO original Description";

		$this->load->view ( 'tpl', $data );
	}
	
	
	public function service(){
		//banner
		$this->load->model('Ads_model','ads',true);
		$data['adslist'] = $this->ads->getRecord('*',array('key'=>'product','title !='=>'','pic !='=>''))->result_array();
		
		
		$data ['contentpage'] = 'ps-service.php';
        $data ['seo_title'] = "TATSUKO YANO original";
        $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
        $data ['seo_description'] = "TATSUKO YANO original Description";

		$this->load->view ( 'tpl', $data );
	}
	
	
	/**
	 * 订单
	 */
	public function order(){
		$pid = $this->uri->segment(3);
		$post = $this->input->post();
		$post['product_id'] = $pid;
		$post['createtime'] = time();
		$this->load->Model('order_model','o',true);
		if($this->o->addRecord($post)){
			showNotice('success',site_url('ps/detail/'.$pid),3);
		}else{
			showNotice('failure',site_url('ps/detail/'.$pid),4);
		}
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */