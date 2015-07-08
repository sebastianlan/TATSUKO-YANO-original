<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );


/**
 * 
 * 招聘 控制器
 *
 */
class Work extends CI_Controller {
	
	
	public function why(){
		//banner
		$this->load->model('Ads_model','ads',true);
		$data['adslist'] = $this->ads->getRecord('*',array('key'=>'job','title !='=>'','pic !='=>''),'listorder desc')->result_array();
		
		$data ['contentpage'] = 'work-why.php';
        $data ['seo_title'] = "TATSUKO YANO original";
        $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
        $data ['seo_description'] = "TATSUKO YANO original Description";

		$this->load->view ( 'tpl', $data );
	}
	
	public function team(){
		//banner
		$this->load->model('Ads_model','ads',true);
		$data['adslist'] = $this->ads->getRecord('*',array('key'=>'job','title !='=>'','pic !='=>''))->result_array();
		
		
		$data ['contentpage'] = 'work-team.php';
        $data ['seo_title'] = "TATSUKO YANO original";
        $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
        $data ['seo_description'] = "TATSUKO YANO original Description";

		$this->load->view ( 'tpl', $data );
	}
	
	
	public function ls(){
		//banner
		$this->load->model('Ads_model','ads',true);
		$data['adslist'] = $this->ads->getRecord('*',array('key'=>'job','title !='=>'','pic !='=>''),'listorder desc')->result_array();
		
		//job
		$this->load->Model('job_model','j',true);
		$this->load->library('pagination');
		$config ['base_url'] = site_url("work/ls");
		$config ['total_rows'] = $this->j->getCount();
		$config ['uri_segment'] = 3;
		$page_config = makeFrontendPageConfig($config,10);
		$this->pagination->initialize($page_config);
		$offset = $this->uri->segment(3, 0);
		$data['offset'] = $offset;
		$data['joblist'] = $this->j->getRecordLimit(array(), 'listorder desc,createtime desc', $page_config ['per_page'], $offset)->result_array();
		
		
		$data ['contentpage'] = 'work-list.php';
        $data ['seo_title'] = "TATSUKO YANO original";
        $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
        $data ['seo_description'] = "TATSUKO YANO original Description";

		$this->load->view ( 'tpl', $data );
	}
	
	public function detail(){
		//banner
		$this->load->model('Ads_model','ads',true);
		$data['adslist'] = $this->ads->getRecord('*',array('key'=>'job','title !='=>'','pic !='=>''),'listorder desc')->result_array();
		
		$id = $this->uri->segment(3);
		$data['infoid'] = $id;
		//新闻
		$this->load->Model('job_model','j',true);
		$tmpjob = $this->j->getRecord('*',array('id'=>$id))->result_array();
		$data['job'] = $tmpjob[0];
		
		$data ['contentpage'] = 'work-detail.php';
		$data ['seo_title'] = "{$tmpjob[0]['title']}-TATSUKO YANO original";
		$data ['seo_keywords'] = "{$tmpjob[0]['keywords']},TATSUKO YANO original Keywords";
		$data ['seo_description'] = "{$tmpjob[0]['desc']}";
	
		$this->load->view ( 'tpl', $data );
	}
	

	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */