<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

/**
 *
 * 会员前端 控制器
 *
 */
class Vip extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		checkFrontendLogin ();
	}
	
	/**
	 * 会员首页，产品续期列表
	 */
	public function index() {
		$frontend = $this->session->userdata ( 'frontend' );
		$member_id = $frontend ['memberid'];
		
		$where = array (
				'member_id' => $member_id 
		);
		
		// 产品塞选
		$product_id = $this->uri->segment ( 3 );
		if ($product_id != '' && $product_id != '-') {
			$where ['product_id'] = $product_id;
			$k1 = $product_id;
		} else {
			$k1 = '-';
		}
		$data ['product_id'] = $product_id;
		
		// 分页
		$this->load->library ( 'pagination' );
		$this->load->model ( 'memberproduct_model', 'mp', true );
		$config ['base_url'] = site_url ( "vip/index/{$k1}" );
		$config ['total_rows'] = $this->mp->getCount ( $where );
		$config ['uri_segment'] = 4;
		$page_config = makeFrontendPageConfig ( $config, 10 );
		$this->pagination->initialize ( $page_config );
		$offset = $this->uri->segment ( 4, 0 );
		$data ['offset'] = $offset;
		$list = $this->mp->getTpl ( 'tyo_member_product.*,tyo_product.id as pid,tyo_product.name as pname', $where, 'buytime desc', $page_config ['per_page'], $offset )->result_array ();
		$data ['list'] = $list;
		
		// $this->mp->getTpl('distinct(th_product.id) as pid,th_product.name as pname',$where);
		
		// print_r($list);
		// 当前会员的产品列表
		if (! empty ( $list )) {
			$data ['plist'] = $this->mp->getTpl ( 'distinct(tyo_product.id) as pid,tyo_product.name as pname', array (
					'member_id' => $member_id 
			) )->result_array ();
		} else {
			$data ['plist'] = array ();
		}
		
		// 收益时间
		$data ['eran_time'] = $this->config->item ( 'earn_time' );
		
		$data ['contentpage'] = 'vip-index.php';
        $data ['seo_title'] = "TATSUKO YANO original";
        $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
        $data ['seo_description'] = "TATSUKO YANO original Description";

		$this->load->view ( 'tpl', $data );
	}
	public function tpldetail() {
		$tplid = $this->uri->segment ( 3 );
		// 检测$tplid是否与$member_id相符
		$frontend = $this->session->userdata ( 'frontend' );
		$member_id = $frontend ['memberid'];
		$this->load->model ( 'memberproduct_model', 'mp', true );
		if ($tplid == '' || $tplid == 0) {
			showFrontendNotice ( 'Infinite parameter', site_url (), 4 );
		}
		$mp = $this->mp->getTpl ( 'tyo_member_product.*,tyo_product.id as pid,tyo_product.name as pname', array (
				'tyo_member_product.id' => $tplid,
				'member_id' => $member_id 
		) )->result_array ();
		if (empty ( $mp )) {
			showFrontendNotice ( 'Infinite parameter', site_url (), 4 );
		}
		$data ['mp'] = $mp [0];
		// 明细
		$this->load->model ( 'membertpl_model', 'tpl', true );
		$tpldetail = $this->tpl->getRecord ( '*', array (
				'tplid' => $tplid 
		), 'time desc' )->result_array ();
		$data ['tpldetail'] = $tpldetail;
		// print_r($tpldetail);
		
		// 收益时间
		$data ['eran_time'] = $this->config->item ( 'earn_time' );
		
		$data ['contentpage'] = 'vip-tpldetail.php';
        $data ['seo_title'] = "TATSUKO YANO original";
        $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
        $data ['seo_description'] = "TATSUKO YANO original Description";

		$this->load->view ( 'tpl', $data );
	}
	
	/**
	 * 注销
	 */
	public function logout() {
		$frontend = $this->session->userdata ( 'frontend' );
		$this->session->unset_userdata ( 'frontend' );
		// 删除autocode
		$this->load->model ( 'member_model', 'm', true );
		$this->m->updateRecord ( array (
				'autocode' => '',
				'autoexpire' => 0 
		), array (
				'id' => $frontend ['memberid'] 
		) );
		redirect ( site_url ( 'home/login' ) );
	}
	
	/**
	 * 修改密码
	 */
	public function editpwd() {
		$post = $this->input->post ();
		$frontend = $this->session->userdata ( 'frontend' );
		$member_id = $frontend ['memberid'];
		// 查询会员信息
		$this->load->model ( 'member_model', 'm', true );
		$memberlist = $this->m->getRecord ( '*', array (
				'id' => $member_id 
		) )->result_array ();
		if (empty ( $post )) {
			$data ['member'] = $memberlist [0];
			$data ['contentpage'] = 'vip-editpwd.php';
            $data ['seo_title'] = "TATSUKO YANO original";
            $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
            $data ['seo_description'] = "TATSUKO YANO original Description";

			$this->load->view ( 'tpl', $data );
		} else {
			if ($post ['password1'] == '' || $post ['password2'] == '' || $post ['password3'] == '' || ($post ['password2'] != $post ['password3'])) {
				showFrontendNotice ( 'Parameter error !', 'javascript:history.go(-1)', 4 );
			}
			if ($this->m->getCount ( array (
					'id' => $member_id,
					'password' => md5 ( $post ['password1'] ) 
			) ) > 0) {
				if ($this->m->updateRecord ( array (
						'password' => md5 ( $post ['password2'] ) 
				), array (
						'id' => $member_id 
				) )) {
					showFrontendNotice ( 'Modify password success !', site_url ( 'vip/editpwd' ), 3 );
				} else {
					showFrontendNotice ( 'Modify password failure !', 'javascript:history.go(-1)', 4 );
				}
			} else {
				// 原始密码错误
				showFrontendNotice ( 'The old password mistake !', 'javascript:history.go(-1)', 4 );
			}
		}
	}
	
	/**
	 * 完善资料
	 */
	public function editprofiles() {
		$post = $this->input->post ();
		$frontend = $this->session->userdata ( 'frontend' );
		$member_id = $frontend ['memberid'];
		// 查询会员信息
		$this->load->model ( 'member_model', 'm', true );
		$memberlist = $this->m->getRecord ( '*', array (
				'id' => $member_id 
		) )->result_array ();
		if (empty ( $post )) {
			$data ['member'] = $memberlist [0];
			$data ['contentpage'] = 'vip-editprofiles.php';
            $data ['seo_title'] = "TATSUKO YANO original";
            $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
            $data ['seo_description'] = "TATSUKO YANO original Description";

			$this->load->view ( 'tpl', $data );
		} else {
			//使用input=image时会有x,y值提交上来
			unset($post['x']);
			unset($post['y']);
			// 检测身份证是否已存在
			if ($this->m->getCount ( array (
					'idcard' => strtoupper($post ['idcard']),
					'`id` !=' => $member_id 
			) ) > 0) {
				showFrontendNotice ( 'Id card number has been in existence !', 'javascript:history.go(-1)', 4 );
			}
			$post['idcard'] = strtoupper($post ['idcard']);
			if ($this->m->updateRecord ( $post, array (
					'id' => $member_id 
			) )) {
				showFrontendNotice ( 'Modify profile success !', site_url ( 'vip/editprofiles' ), 3 );
			} else {
				showFrontendNotice ( 'Modify profile failure !', 'javascript:history.go(-1)', 4 );
			}
		}
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */