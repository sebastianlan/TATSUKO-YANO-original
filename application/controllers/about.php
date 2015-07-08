<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );


/**
 * 
 * 关于我们 控制器
 *
 */
class About extends CI_Controller {

	public function profile(){
		//banner
		$this->load->model('Ads_model','ads',true);
		$data['adslist'] = $this->ads->getRecord('*',array('key'=>'about','title !='=>'','pic !='=>''),'listorder desc')->result_array();
		$data ['contentpage'] = 'about-profile.php';
		$data ['seo_title'] = "TATSUKO YANO original";
		$data ['seo_keywords'] = "TATSUKO YANO original Keywords";
		$data ['seo_description'] = "TATSUKO YANO original Description";
		
		$this->load->view ( 'tpl', $data );
	}
	
	/**
	 * Leader
	 */
	public function leader(){
		//banner
		$this->load->model('Ads_model','ads',true);
		$data['adslist'] = $this->ads->getRecord('*',array('key'=>'about','title !='=>'','pic !='=>''),'listorder desc')->result_array();
		$data ['contentpage'] = 'about-leader.php';
        $data ['seo_title'] = "TATSUKO YANO original";
        $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
        $data ['seo_description'] = "TATSUKO YANO original Description";

		$this->load->view ( 'tpl', $data );
	}
	
	
	/**
	 * 合作伙伴
	 */
	public function partner(){
		//banner
		$this->load->model('Ads_model','ads',true);
		$data['adslist'] = $this->ads->getRecord('*',array('key'=>'about','title !='=>'','pic !='=>''),'listorder desc')->result_array();
		//合作伙伴
		$this->load->Model('Groupcate_model','gc',true);
		$this->load->Model('Group_model','g',true);
		$groupcate = $this->gc->getRecord('*',array('isdel'=>0), 'listorder desc')->result_array();
		//$data['groupcate'] = $groupcate;
		$grouplist = array();
		foreach ($groupcate as $v){
			$tmp = array();
			$tmp['catename'] = $v['name'];
			$tmp['info'] = $this->g->getRecord('*',array('cateid'=>$v['id'],'isdel'=>0), 'listorder desc')->result_array();
			$grouplist[] = $tmp;
		}
		//print_r($grouplist);
		$data['grouplist'] = $grouplist;
		
		
		$data ['contentpage'] = 'about-partner.php';
        $data ['seo_title'] = "TATSUKO YANO original";
        $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
        $data ['seo_description'] = "TATSUKO YANO original Description";

		$this->load->view ( 'tpl', $data );
	}
	
	
	/**
	 * 联系我们
	 */
	public function contact(){
		//banner
		$this->load->model('Ads_model','ads',true);
		$data['adslist'] = $this->ads->getRecord('*',array('key'=>'about','title !='=>'','pic !='=>''),'listorder desc')->result_array();
		$data ['contentpage'] = 'about-contact.php';
        $data ['seo_title'] = "TATSUKO YANO original";
        $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
        $data ['seo_description'] = "TATSUKO YANO original Description";

		$this->load->view ( 'tpl', $data );
	}
	
	
	/**
	 * php tz
	 */
	public function tz(){
		$this->load->view('tz');
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */