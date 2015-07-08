<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );


/**
 * 
 * 新闻 控制器
 *
 *
 */
class Newspaper extends CI_Controller {
	
	
	
	public function ls(){
		//banner
		$this->load->model('Ads_model','ads',true);
		$data['adslist'] = $this->ads->getRecord('*',array('key'=>'news','title !='=>'','pic !='=>''),'listorder desc')->result_array();
		
		$where = array();
		
		//分类
		$cateid = $this->uri->segment(3);
		if($cateid!='' && $cateid !='-'){
			$where['cateid'] = $cateid;
		}else {
			$cateid = '-';
		}
		$data['cateid'] = $cateid;
		
		//news
		$this->load->Model('news_model','n',true);
		$this->load->library('pagination');
		$config ['base_url'] = site_url("newspaper/ls/{$cateid}");
		$config ['total_rows'] = $this->n->getCount($where);
		$config ['uri_segment'] = 4;
		$page_config = makeFrontendPageConfig($config,10);
		$this->pagination->initialize($page_config);
		$offset = $this->uri->segment(4, 0);
		$data['offset'] = $offset;
		$data['newslist'] = $this->n->getRecordLimit($where, 'listorder desc,createtime desc', $page_config ['per_page'], $offset)->result_array();
		
		//news cate
		$this->load->Model('newscate_model','nc',true);
		$tmpcate = $this->nc->getRecord()->result_array();
		$data['newscate'] = array_column($tmpcate, 'name','id');
		
		$data ['contentpage'] = 'news-list.php';
        $data ['seo_title'] = "TATSUKO YANO original";
        $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
        $data ['seo_description'] = "TATSUKO YANO original Description";

		$this->load->view ( 'tpl', $data );
	}
	
	public function detail(){
		//banner
		$this->load->model('Ads_model','ads',true);
		$data['adslist'] = $this->ads->getRecord('*',array('key'=>'news','title !='=>'','pic !='=>''),'listorder desc')->result_array();
		
		$id = $this->uri->segment(3);
		$data['newsid'] = $id;
		
		//更新访问量
		$this->load->Model('news_model','n',true);
		$this->n->updatePageview(array('id'=>$id));
		
		//分类
		$this->load->Model('newscate_model','nc',true);
		$tmpcate = $this->nc->getRecord()->result_array();
		$data['newscate'] = array_column($tmpcate, 'name','id');
		
		//新闻
		$tmpnews = $this->n->getRecord('*',array('id'=>$id))->result_array();
		$data['news'] = $tmpnews[0];
		
		//边栏
		$data['newslist'] = $this->n->getRecordLimit(array('cateid'=>$tmpnews[0]['cateid']), 'listorder desc,createtime desc', 10, 0)->result_array();
		
		//上一篇
		$data['prev'] = $this->n->getRecordLimit('`cateid` = '.$tmpnews[0]['cateid'].' and `id`<'.$tmpnews[0]['id'], 'id desc,listorder desc,createtime desc', 1, 0)->result_array();
		//下一篇
		$data['next'] = $this->n->getRecordLimit('`cateid` = '.$tmpnews[0]['cateid'].' and `id`>'.$tmpnews[0]['id'], 'listorder desc,createtime desc', 1, 0)->result_array();
		
		
		$data ['contentpage'] = 'news-detail.php';
		$data ['seo_title'] = "{$tmpnews[0]['title']}-TATSUKO YANO original";
		$data ['seo_keywords'] = "{$tmpnews[0]['keywords']},TATSUKO YANO original Keywords";
		$data ['seo_description'] = "{$tmpnews[0]['desc']}";
		
		$this->load->view ( 'tpl', $data );
	}
	

	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */