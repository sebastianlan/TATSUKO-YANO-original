<?php
/**
 * 
 * 会员管理 控制器
 *
 */
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Member extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		checkBackendLogin ();
	}
	public function test() {
	}
	
	/**
	 * 会员列表
	 */
	public function ls() {
		$this->load->Model ( 'Member_model', 'm', true );
		// 分页
		$this->load->library ( 'pagination' );
		$where ['isdel'] = 0;
		// 查询
		$post = $this->input->post ();
		if (! empty ( $post )) {
			if (isset ( $post ['idcard'] ) && $post ['idcard'] != '') {
				$k1 = $post ['idcard'];
			} else {
				$k1 = '0';
			}
			if (isset ( $post ['nickname'] ) && $post ['nickname'] != '') {
				$k2 = $post ['nickname'];
			} else {
				$k2 = '0';
			}
		} else {
			// 分页链接
			$k1 = urldecode ( $this->uri->segment ( 3, 0 ) );
			$k2 = urldecode ( $this->uri->segment ( 4, 0 ) );
		}
		if ($k1 != '0') {
			$where ['idcard like'] = '%' . $k1 . '%';
		}
		if ($k2 != '0') {
			$where ['nickname like'] = '%' . $k2 . '%';
		}
		$config ['base_url'] = site_url ( "member/ls/{$k1}/{$k2}" );
		$config ['total_rows'] = $this->m->getCount ( $where );
		$config ['uri_segment'] = 5;
		$page_config = makePageConfig ( $config, 10 );
		$this->pagination->initialize ( $page_config );
		$offset = $this->uri->segment ( 5, 0 );
		$data ['offset'] = $offset;
		$data ['memberlist'] = $this->m->getRecordLimit ( $where, '', $page_config ['per_page'], $offset )->result_array ();
		// echo $this->db->last_query();
		// print_r($data);
		$data ['contentpage'] = 'm_member_list.php';
		$this->load->view ( 'm_tpl', $data );
	}
	
	/**
	 * 新增
	 */
	public function add() {
		$post = $this->input->post ();
		if (empty ( $post )) {
			// 加载页面
			$data ['contentpage'] = 'm_member_add.php';
			$this->load->view ( 'm_tpl.php', $data );
		} else {
			// 验证手机号是否已存在
			$this->load->Model ( 'Member_model', 'm', true );
			if ($post ['mobile'] && $post ['mobile']!='' && $this->m->getCount ( array (
					'mobile' => $post ['mobile'] 
			) ) > 0) {
				showNotice ( 'Mobile No has been in existence !', 'javascript:history.go(-1);', 4 );
			}
			if ($post ['idcard']) {
				// 大写
				$post ['idcard'] = strtoupper ( $post ['idcard'] );
				// 验证身份证号码唯一
				if ($this->m->getCount ( array (
						'idcard' => $post ['idcard'] 
				) ) > 0) {
					showNotice ( 'ID card No has been in existence !', 'javascript:history.go(-1);', 4 );
				}
			}
			$post ['password'] = md5 ( $post ['password'] );
			$post ['createtime'] = time ();
			$memberid = $this->m->addRecord ( $post );
			if ($memberid) {
				showNotice ( 'success', site_url ( 'member/ls' ), 3 );
			} else {
				showNotice ( 'failure', site_url ( 'member/add' ), 4 );
			}
		}
	}
	
	/**
	 * 编辑
	 */
	public function edit() {
		$post = $this->input->post ();
		$memberid = $this->uri->segment ( 3 );
		if (empty ( $post )) {
			$data ['memberid'] = $memberid;
			// 加载页面
			$this->load->Model ( 'Member_model', 'm', true );
			$memberlist = $this->m->getRecord ( '*', array (
					'id' => $memberid,
					'isdel' => 0 
			) )->result_array ();
			$data ['member'] = $memberlist [0];
			$data ['contentpage'] = 'm_member_edit.php';
			$this->load->view ( 'm_tpl.php', $data );
		} else {
			if ($post ['password'] == '') {
				unset ( $post ['password'] );
			} else {
				$post ['password'] = md5 ( $post ['password'] );
			}
			// 验证手机号是否已存在
			$this->load->Model ( 'Member_model', 'm', true );
			if ($post ['mobile'] && $this->m->getCount ( array (
					'mobile' => $post ['mobile'],
					'`id` !=' => $memberid 
			) ) > 0) {
				showNotice ( 'Mobile No has been in existence !', 'javascript:history.go(-1);', 4 );
			}
			if ($post ['idcard'] && $post ['idcard'] != '') {
				// 大写
				$post ['idcard'] = strtoupper ( $post ['idcard'] );
				// 验证身份证号码唯一
				if ($this->m->getCount ( array (
						'idcard' => $post ['idcard'],
						'`id` !=' => $memberid 
				) ) > 0) {
					showNotice ( 'ID card No has been in existence !', 'javascript:history.go(-1);', 4 );
				}
			}
			$this->load->Model ( 'Member_model', 'm', true );
			if ($this->m->updateRecord ( $post, array (
					'id' => $memberid 
			) )) {
				showNotice ( 'success', site_url ( 'member/ls' ), 3 );
			} else {
				showNotice ( 'failure', site_url ( 'member/edit/' . $memberid ), 4 );
			}
		}
	}
	
	/**
	 * 删除会员
	 */
	public function delete() {
		$id = $this->uri->segment ( 3 );
		$offset = $this->uri->segment ( 4 );
		$this->load->Model ( 'Member_model', 'm', true );
		if ($this->m->updateRecord ( array (
				'isdel' => 1 
		), array (
				'id' => $id 
		) )) {
			showNotice ( 'success', site_url ( 'member/ls/' . $offset ), 3 );
		} else {
			showNotice ( 'failure', site_url ( 'member/ls/' . $offset ), 4 );
		}
	}
	
	/**
	 * 产品购买列表
	 */
	public function buylist() {
		$member_id = $this->uri->segment ( 3 );
		if ($member_id == '') {
			showNotice ( 'No parameter', 'javascript:history.go(-1);', 4 );
		}
		$data ['member_id'] = $member_id;
		$where ['member_id'] = $member_id;
		$post = $this->input->post ();
		if (! empty ( $post )) {
			if (isset ( $post ['tplname'] ) && $post ['tplname'] != '') {
				$k1 = $post ['tplname'];
			} else {
				$k1 = '0';
			}
		} else {
			// 分页链接
			$k1 = urldecode ( $this->uri->segment ( 4, 0 ) );
		}
		if ($k1 != '0') {
			$where ['tplname like'] = '%' . $k1 . '%';
		}
		// 分页
		$this->load->library ( 'pagination' );
		$this->load->model ( 'memberproduct_model', 'mp', true );
		$config ['base_url'] = site_url ( "member/buylist/{$member_id}/{$k1}" );
		$config ['total_rows'] = $this->mp->getCount ( $where );
		$config ['uri_segment'] = 5;
		$page_config = makePageConfig ( $config, 10 );
		$this->pagination->initialize ( $page_config );
		$offset = $this->uri->segment ( 5, 0 );
		$data ['offset'] = $offset;
		$data ['mplist'] = $this->mp->getRecordLimit ( $where, 'buytime desc', $page_config ['per_page'], $offset )->result_array ();
		// 付息方式
		$data ['eran_time'] = $this->config->item ( 'earn_time' );
		$data ['contentpage'] = 'm_member_product_list.php';
		$this->load->view ( 'm_tpl', $data );
	}
	
	/**
	 * 购买产品
	 */
	public function buy() {
		$member_id = $this->uri->segment ( 3 );
		if ($member_id == '') {
			showNotice ( 'No parameter', 'javascript:history.go(-1);', 4 );
		}
		$post = $this->input->post ();
		
		if (empty ( $post )) {
			// 会员信息
			$this->load->model ( 'member_model', 'm', true );
			
			$memberlist = $this->m->getRecord ( '*', array (
					'id' => $member_id 
			) )->result_array ();
			$data ['member'] = $memberlist [0];
			
			// 产品列表
			$this->load->model ( 'product_model', 'p', true );
			$data ['productlist'] = $this->p->getRecord ( 'id,name', array (), 'listorder desc' )->result_array ();
			
			// 收益时间
			$data ['eran_time'] = $this->config->item ( 'earn_time' );
			// $data['productlist'] = $this->p->getRecord('id,name',array(),'listorder desc');
			
			$data ['member_id'] = $member_id;
			$data ['contentpage'] = 'm_member_product_add.php';
			$this->load->view ( 'm_tpl', $data );
		} else {
			$post ['member_id'] = $member_id;
			$post ['buytime'] = strtotime ( $post ['buytime'] );
			$this->load->model ( 'memberproduct_model', 'mp', true );
			if ($this->mp->addRecord ( $post )) {
				showNotice ( 'success', site_url ( 'member/buylist/' . $member_id ), 3 );
			} else {
				showNotice ( 'failure', site_url ( 'member/buy/' . $member_id ), 4 );
			}
		}
	}
	
	/**
	 * 编辑购买产品
	 */
	public function editbuy() {
		// 会员购买产品ID
		$tplid = $this->uri->segment ( 3 );
		$post = $this->input->post ();
		if (empty ( $post )) {
			// 产品列表
			$this->load->model ( 'product_model', 'p', true );
			$data ['productlist'] = $this->p->getRecord ( 'id,name', array (), 'listorder desc' )->result_array ();
			
			// 模板信息
			$this->load->model ( 'memberproduct_model', 'mp', true );
			$list = $this->mp->getRecord ( '*', array (
					'id' => $tplid 
			) )->result_array ();
			$data ['mp'] = $list [0];
			
			// 会员信息
			$this->load->model ( 'member_model', 'm', true );
			
			$memberlist = $this->m->getRecord ( '*', array (
					'id' => $list [0] ['member_id'] 
			) )->result_array ();
			$data ['member'] = $memberlist [0];
			
			// 收益时间
			$data ['eran_time'] = $this->config->item ( 'earn_time' );
			$data ['member_id'] = $list [0] ['member_id'];
			$data ['tplid'] = $tplid;
			$data ['contentpage'] = 'm_member_product_edit.php';
			$this->load->view ( 'm_tpl', $data );
		} else {
			$member_id = $this->uri->segment ( 4 );
			$post ['buytime'] = strtotime ( $post ['buytime'] );
			$this->load->model ( 'memberproduct_model', 'mp', true );
			if ($this->mp->updateRecord ( $post, array (
					'id' => $tplid 
			) )) {
				showNotice ( 'success', site_url ( 'member/buylist/' . $member_id ), 3 );
			} else {
				showNotice ( 'failure', 'javascript:history.go(-1)', 4 );
			}
		}
	}
	
	/**
	 * 续期管理
	 */
	public function tplservice() {
		// 模板ID
		$tplid = $this->uri->segment ( 3 );
		if ($tplid == '') {
			showNotice ( 'No parameter', 'javascript:history.go(-1);', 4 );
		}
		$post = $this->input->post ();
		if (empty ( $post )) {
			// 模板信息
			$this->load->model ( 'memberproduct_model', 'mp', true );
			$list = $this->mp->getRecord ( '*', array (
					'id' => $tplid 
			) )->result_array ();
			$data ['mp'] = $list [0];
			
			//产品信息
			$this->load->model ( 'product_model', 'p', true );
			$plist = $this->p->getRecord ( 'name', array (
					'id' => $list [0]['product_id']
			) )->result_array ();
			$data ['product'] = $plist [0];
			//print_r($data ['product']);
			
			// 会员信息
			$this->load->model ( 'member_model', 'm', true );
			$memberlist = $this->m->getRecord ( '*', array (
					'id' => $list [0] ['member_id'] 
			) )->result_array ();
			$data ['member'] = $memberlist [0];
			
			// 收益信息
			$this->load->model ( 'membertpl_model', 'tpl', true );
			$data ['earnlist'] = $this->tpl->getRecord ( '*', array (
					'tplid' => $tplid 
			) )->result_array ();
			
			// 收益时间
			$data ['eran_time'] = $this->config->item ( 'earn_time' );
			// 会员信息
			$data ['member_id'] = $list [0] ['member_id'];
			$data ['tplid'] = $tplid;
			$data ['contentpage'] = 'm_member_tplservice.php';
			$this->load->view ( 'm_tpl', $data );
		} else {
			//会员信息
			$this->load->model ( 'memberproduct_model', 'mp', true );
			$list = $this->mp->getRecord ( '*', array (
					'id' => $tplid
			) )->result_array ();
			
			
			//删掉原信息
			$this->load->model ( 'membertpl_model', 'tpl', true );
			$this->tpl->deleteRecord(array('tplid'=>$tplid));
			
			$fields = array ();
			$timearr = $post ['time'];
			$moneyarr = $post ['money'];
			$total = 0;
			foreach ( $timearr as $k => $v ) {
				$tmp = array ();
				$tmp ['time'] = strtotime ( $v );
				$tmp ['money'] = $moneyarr [$k];
				$tmp ['tplid'] = $tplid;
				$fields [] = $tmp;
				$total+=$tmp ['money'];
			}
			$this->load->model ( 'membertpl_model', 'tpl', true );
			if ($this->tpl->addRecords ( $fields )) {
				//更新累计收益
				$this->mp->updateRecord(array('total'=>$total),array('id'=>$tplid));
				showNotice ( 'success', site_url ( 'member/buylist/' . $list[0]['member_id'] ), 3 );
			} else {
				showNotice ( 'failure', 'javascript:history.go(-1)', 4 );
			}
		}
	}
	
	public function sendsms(){
		$post = $this->input->post();
		// 会员信息
		$this->load->model ( 'member_model', 'm', true );
		$memberlist = $this->m->getRecord ( '*', array (
				'id' => $post ['member_id']
		) )->result_array ();
		if(empty($memberlist)){
			output(array('code'=>-1,'msg'=>'Member does not exist !'));
		}
		if($memberlist[0]['mobile'] == ''){
			output(array('code'=>-1,'msg'=>'The member is not set a phone number, can not send message !'));
		}
		$sms = $this->config->item('sms');
		$client = new SoapClient('http://mb345.com:999/ws/LinkWS.asmx?wsdl',array('encoding'=>'UTF-8'));
		$sendParam = array(
				'CorpID'=>$sms['uid'],
				'Pwd'=>$sms['passwd'],
				'Mobile'=>$memberlist[0]['mobile'],
				'Content'=>$post['content']."【TATSUKO YANO original】",
				'Cell'=>'',
				'SendTime'=>''
		);
		$result = $client->BatchSend($sendParam);
		$result = $result->BatchSendResult;
		//echo $result;
		//$result = 1;//测试
		if($result == 1){
			output(array('code'=>1,'msg'=>'Send successful !'));
		}else{
			//发送失败
			output(array('code'=>-2,'msg'=>'Send failing !'));
		}
	}
	
	/**
	 * 删除产品购买信息记录
	 */
	public function deletebuy(){
		$tplid = $this->uri->segment(3);
		//查询会员信息
		$this->load->model ( 'memberproduct_model', 'mp', true );
		$list = $this->mp->getRecord ( '*', array (
				'id' => $tplid
		) )->result_array ();
		//删除产品购买信息
		$this->mp->deleteRecord(array('id'=>$tplid));
		//删除产品收益信息
		$this->load->model ( 'membertpl_model', 'tpl', true );
		$this->tpl->deleteRecord(array('tplid'=>$tplid));
		showNotice ( 'success', site_url ( 'member/buylist/' . $list[0]['member_id'] ), 3 );
	}
}