<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );


/**
 * 资讯 控制器
 */
class Study extends CI_Controller {
	
	
	public function ls(){
		//banner
		$this->load->model('Ads_model','ads',true);
		$data['adslist'] = $this->ads->getRecord('*',array('key'=>'info','title !='=>'','pic !='=>''),'listorder desc')->result_array();
		
		$where = array();
		
		//分类
		$cateid = $this->uri->segment(3);
		if($cateid!='' && $cateid !='-'){
			$where['cateid'] = $cateid;
		}else {
			$cateid = '-';
		}
		$data['cateid'] = $cateid;
		
		//info
		$this->load->Model('info_model','i',true);
		$this->load->library('pagination');
		$config ['base_url'] = site_url("study/ls/{$cateid}");
		$config ['total_rows'] = $this->i->getCount($where);
		$config ['uri_segment'] = 4;
		$page_config = makeFrontendPageConfig($config,10);
		$this->pagination->initialize($page_config);
		$offset = $this->uri->segment(4, 0);
		$data['offset'] = $offset;
		$data['infolist'] = $this->i->getRecordLimit($where, 'listorder desc,createtime desc', $page_config ['per_page'], $offset)->result_array();
		
		//info cate
		$this->load->Model('infocate_model','ic',true);
		$tmpcate = $this->ic->getRecord()->result_array();
		$data['infocate'] = array_column($tmpcate, 'name','id');
		
		$data ['contentpage'] = 'study-list.php';
        $data ['seo_title'] = "TATSUKO YANO original";
        $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
        $data ['seo_description'] = "TATSUKO YANO original Description";

		$this->load->view ( 'tpl', $data );
	}
	
	public function detail(){
		//banner
		$this->load->model('Ads_model','ads',true);
		$data['adslist'] = $this->ads->getRecord('*',array('key'=>'info','title !='=>'','pic !='=>''),'listorder desc')->result_array();
		
		$id = $this->uri->segment(3);
		$data['infoid'] = $id;
		
		//更新访问量
		$this->load->Model('info_model','i',true);
		$this->i->updatePageview(array('id'=>$id));
		
		//分类
		$this->load->Model('infocate_model','ic',true);
		$tmpcate = $this->ic->getRecord()->result_array();
		$data['infocate'] = array_column($tmpcate, 'name','id');
		
		//新闻
		$tmpinfo = $this->i->getRecord('*',array('id'=>$id))->result_array();
		$data['info'] = $tmpinfo[0];
		
		//边栏
		$data['infolist'] = $this->i->getRecordLimit(array('cateid'=>$tmpinfo[0]['cateid']), 'listorder desc,createtime desc', 10, 0)->result_array();
		
		//上一篇
		$data['prev'] = $this->i->getRecordLimit('`cateid` = '.$tmpinfo[0]['cateid'].' and `id`<'.$tmpinfo[0]['id'], 'id desc,listorder desc,createtime desc', 1, 0)->result_array();
		//下一篇
		$data['next'] = $this->i->getRecordLimit('`cateid` = '.$tmpinfo[0]['cateid'].' and `id`>'.$tmpinfo[0]['id'], 'listorder desc,createtime desc', 1, 0)->result_array();
		
		
		
		$data ['contentpage'] = 'study-detail.php';
		$data ['seo_title'] = "{$tmpinfo[0]['title']}-TATSUKO YANO original";
		$data ['seo_keywords'] = "{$tmpinfo[0]['keywords']},TATSUKO YANO original Keywords";
		$data ['seo_description'] = "{$tmpinfo[0]['desc']}";
		
		$this->load->view ( 'tpl', $data );
	}
	

	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */