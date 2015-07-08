<?php
/**
 * 
 * Banner 控制器
 *
 */
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Ads extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		checkBackendLogin ();
	}
	public function test() {
	}
	
	/**
	 * Banner列表
	 */
	public function ls() {
		$this->load->Model ( 'Ads_model', 'ads', true );
		$data ['adslist'] = $this->ads->getRecord ( '*', array (), 'listorder desc' )->result_array ();
		$data ['contentpage'] = 'm_ads_list.php';
		$this->load->view ( 'm_tpl', $data );
	}
	
	/**
	 * 编辑Banner
	 */
	public function edit() {
		$post = $this->input->post ();
		$adsid = $this->uri->segment ( 3 );
		if (empty ( $post )) {
			// 加载页面
			$data ['adsid'] = $adsid;
			$this->load->Model ( 'Ads_model', 'ads', true );
			$adslist = $this->ads->getRecord ( '*', array (
					'id' => $adsid
			), 'listorder desc' )->result_array ();
			$data ['ads'] = $adslist [0];
			$data ['contentpage'] = 'm_ads_edit.php';
			$this->load->view ( 'm_tpl.php', $data );
		} else {
			if (! empty ( $_FILES ) && $_FILES ['pic'] ['error'] != 4) {
				$config ['upload_path'] = FCPATH . 'uploads/image/' . date ( 'Ymd' ) . '/';
				if (! file_exists ( $config ['upload_path'] )) {
					mkdir ( $config ['upload_path'], 0777, true );
				}
				$config ['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				$config ['encrypt_name'] = true;
				$this->load->library ( 'upload', $config );
				if (! $this->upload->do_upload ( 'pic' )) {
					showNotice ( $this->upload->display_errors (), site_url ( 'ads/edit' ), 4 );
				} else {
					$logodata = $this->upload->data ();
					$post ['pic'] = str_replace ( FCPATH, '', $logodata ['full_path'] );
				}
			}
			$this->load->Model ( 'Ads_model', 'ads', true );
			if ($this->ads->updateRecord ( $post, array (
					'id' => $adsid 
			) )) {
				showNotice ( 'success', site_url ( 'ads/ls' ), 3 );
			} else {
				showNotice ( 'failure', 'javascript:history.go(-1);', 4 );
			}
		}
	}
	
	/**
	 * 更新顺序
	 */
	public function updateOrder() {
		$post = $this->input->post ();
		$this->load->Model ( 'Ads_model', 'ads', true );
		$order = $post ['listorder'];
		if (empty ( $order )) {
			showNotice ( 'failure', site_url ( 'ads/ls' ), 4 );
		} else {
			foreach ( $order as $id => $listorder ) {
				$this->ads->updateRecord ( array (
						'listorder' => $listorder 
				), array (
						'id' => $id 
				) );
			}
			showNotice ( 'success', site_url ( 'ads/ls' ), 3 );
		}
	}
}