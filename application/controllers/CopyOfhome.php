<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

/**
 *
 * 首页控制器
 *       
 */
class Home extends CI_Controller {
	
	/**
	 * Index Page for this controller.
	 */
	public function index() {
		//banner
		$this->load->model('Ads_model','ads',true);
		$data['adslist'] = $this->ads->getRecord('*',array('key'=>'index','title !='=>'','pic !='=>''),'listorder desc')->result_array();
		
		// 新闻中心，三个分类,每个分类个4条
		$this->load->Model ( 'Newscate_model', 'nc', true );
		$this->load->Model ( 'News_model', 'n', true );
		$newscate = $this->nc->getRecordLimit ( array ('isdel'=>0), 'listorder desc', 3, 0 )->result_array ();
		$data ['newscate'] = $newscate;
		$newslist = array ();
		foreach ( $newscate as $v ) {
			// 每个分类获取4条新闻
			$tmp = array ();
			$tmp ['catename'] = $v ['name'];
			$tmp ['info'] = $this->n->getRecordLimit ( array (
					'cateid' => $v ['id'] ,'isdel'=>0
			), 'listorder desc,createtime desc', 4, 0 )->result_array ();
			$newslist [] = $tmp;
		}
		$data ['newslist'] = $newslist;
		
		// 资讯
		$this->load->Model ( 'Infocate_model', 'ic', true );
		$this->load->Model ( 'Info_model', 'i', true );
		$infocate = $this->ic->getRecordLimit ( array ('isdel'=>0), 'listorder desc', 2, 0 )->result_array ();
		$data ['infocate'] = $infocate;
		$infolist = array ();
		foreach ( $infocate as $v ) {
			// 每个分类获取4条新闻
			$tmp = array ();
			$tmp ['catename'] = $v ['name'];
			$tmp ['info'] = $this->i->getRecordLimit ( array (
					'cateid' => $v ['id'] ,'isdel'=>0
			), 'listorder desc,createtime desc', 6, 0 )->result_array ();
			$infolist [] = $tmp;
		}
		$data ['infolist'] = $infolist;
		
		// 合作伙伴
		$this->load->Model ( 'Groupcate_model', 'gc', true );
		$this->load->Model ( 'Group_model', 'g', true );
		$groupcate = $this->gc->getRecordLimit ( array ('isdel'=>0), 'listorder desc', 4, 0 )->result_array ();
		$data ['groupcate'] = $groupcate;
		$grouplist = array ();
		foreach ( $groupcate as $v ) {
			// 每个分类获取4条新闻
			$tmp = array ();
			$tmp ['catename'] = $v ['name'];
			$tmp ['info'] = $this->g->getRecordLimit ( array (
					'cateid' => $v ['id'] ,'isdel'=>0
			), 'listorder desc', 8, 0 )->result_array ();
			$grouplist [] = $tmp;
		}
		// print_r($grouplist);
		$data ['grouplist'] = $grouplist;
		
		$data ['contentpage'] = 'home.php';
        $data ['seo_title'] = "TATSUKO YANO original";
        $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
        $data ['seo_description'] = "TATSUKO YANO original Description";

		$this->load->view ( 'tpl', $data );
	}
	
	/**
	 * 登录页面，这个页面属于vip模块，但是不需要检测登录，所以就放在这边
	 */
	public function login() {
		$post = $this->input->post ();
		if (empty ( $post )) {
			
			$authcode = '';
			$str = "23456789abcdefghijkmnpqrstuvwxyz";
			for ($i = 0; $i < 4; $i++) {
				$code = $str[mt_rand(0, strlen($str)-1)];
				$authcode .= $code;
			}
			//echo $authcode;
			$this->load->model('auth_model','auth',true);
			$data['authkey'] = microtime(true);
			//echo microtime(true);
			$this->auth->addRecord(array('authkey'=>$data['authkey'],'authcode'=>$authcode,'expire'=>time()+600));//600s
			$data['authcode'] = $authcode;
			
			//$this->session->set_userdata(array('authcode'=>$authcode,'expire'=>time()+600));
			
			$data ['contentpage'] = 'login.php';
            $data ['seo_title'] = "TATSUKO YANO original";
            $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
            $data ['seo_description'] = "TATSUKO YANO original Description";

            $this->load->view ( 'tpl', $data );
		} else {
			//print_r($post);exit();
			if($post['authkey']==''||$post['authcode']==''){
				showFrontendNotice('Auth code is invalid or has expired !','javascript:history.go(-1);',4);
			}
			//检查验证码
			$this->load->model('auth_model','auth',true);
			$authinfo = $this->auth->getRecord('*',array('authkey'=>$post['authkey'],'authcode'=>$post['authcode']))->result_array();
			if(empty($authinfo) || $authinfo[0]['expire']<time()){
				showFrontendNotice('Auth code is invalid or has expired !','javascript:history.go(-1);',4);
			}else{
				//删除authcode记录
				$this->auth->deleteRecord(array('id'=>$authinfo[0]['id']));
			}
			//验证登录
			$this->load->model('member_model','m',true);
			$tmpuser = $this->m->getRecord('*',"`isdel` = '0' and ((`mobile`='{$post['username']}' and `password`='".md5($post['password'])."') or (`idcard`='".strtoupper($post['username'])."' and `password`='".md5($post['password'])."'))")->result_array();
			//echo $this->db->last_query();exit;
			if(!empty($tmpuser)){
				$session['frontend'] = array(
						'is_login' => true,
						'memberid'=>$tmpuser[0]['id'],
						'nickname' => $tmpuser[0]['nickname']!=''?$tmpuser[0]['nickname']:$tmpuser[0]['mobile']
				);
				$this->session->set_userdata($session);
				
				//记住密码
				if(isset($post['remember']) && $post['remember']){
					$autocode = md5('iJk$30#9'.$tmpuser[0]['id'].microtime(true).$tmpuser[0]['password'].'37kShd#@3s');
					$this->session->set_userdata('auto',$autocode);
					$this->m->updateRecord(array('autocode'=>$autocode,'autoexpire'=>time()+2592000),array('id'=>$tmpuser[0]['id']));//一个月
				}
				redirect(site_url('vip/index'));
				//showFrontendNotice('登录成功！',site_url('vip/index'),3);
			}else{
				showFrontendNotice('Username or password error !','javascript:history.go(-1);',4);
			}
		}
	}
	
	/**
	 * 注册用户
	 */
	public function register() {
		$post = $this->input->post ();
		if (empty ( $post )) {
			
			$data ['contentpage'] = 'register.php';
            $data ['seo_title'] = "TATSUKO YANO original";
            $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
            $data ['seo_description'] = "TATSUKO YANO original Description";

            $this->load->view ( 'tpl', $data );
		} else {
			//验证code
			if($post['mobile'] == '' || $post['password'] == '' || $post['authcode'] == '' || $post['inputcode'] == ''){
				showFrontendNotice('Registration information is wrong !','javascript:history.go(-1);',4);
			}
			
			//验证手机号是否已注册
			$this->load->model('Member_model','m',true);
			if($this->m->getCount(array('mobile'=>$post['mobile'],'isdel'=>0))>0){
				showFrontendNotice('Mobile No has been registered !','javascript:history.go(-1);',4);
			}
			
			//验证码
			$this->load->model('Auth_model','auth',true);
			$authinfo = $this->auth->getRecord('*',array('authkey'=>$post['mobile']))->result_array();
			if(empty($authinfo) || $authinfo[0]['expire']<time() || $post['inputcode']!=$authinfo[0]['authcode'] ||$post['authcode']!=md5('67Y&s9'.$post['mobile'].'*y7U'.$authinfo[0]['authcode'].'0J1g')){
				showFrontendNotice('Auth code error','javascript:history.go(-1);',4);
			}
			
			$field['mobile'] = $post['mobile'];
			$field['password'] = md5($post['password']); 
			$field['createtime'] = time();
			$new_member_id = $this->m->addRecord($field);
			if($new_member_id){
				//删除验证code
				$this->auth->deleteRecord(array('id'=>$authinfo[0]['id']));
				//设置登录信息（直接登录）
				$session['frontend'] = array(
						'is_login' => true,
						'memberid'=>$new_member_id,
						'nickname' => $field['mobile']
				);
				$this->session->set_userdata($session);
				showFrontendNotice('success',site_url('vip/index'),3);
			}else{
				showFrontendNotice('failure','javascript:history.go(-1);',4);
			}
			
			
		}
	}
	
	/**
	 * 手机验证码，注册
	 */
	public function sendcode(){
		//检测调用域名
		
		
		//手机号，post
		$post = $this->input->post();
		//$post['mobile'] = '18651948985';
		$code = mt_rand(100000, 999999);
		//判断手机号是否已注册
		$this->load->model('Member_model','m',true);
		if($this->m->getCount(array('mobile'=>$post['mobile'],'isdel'=>0))>0){
			//手机号已注册
			output(array('code'=>-1,'msg'=>'Mobile No has been registered !'));
		}
		
		$sms = $this->config->item('sms');
		$client = new SoapClient('http://mb345.com:999/ws/LinkWS.asmx?wsdl',array('encoding'=>'UTF-8'));
		$sendParam = array(
				'CorpID'=>$sms['uid'],
				'Pwd'=>$sms['passwd'],
				'Mobile'=>$post['mobile'],
				'Content'=>"您的验证码是：{$code}。请不要把验证码泄露给其他人。如非本人操作，可忽略。【TATSUKO YANO original】",
				'Cell'=>'',
				'SendTime'=>''
		);
		$result = $client->BatchSend($sendParam);
		$result = $result->BatchSendResult;
		//$result = 1;//测试
		if($result == 1){
			//保存数据库，判断是否第一次发送，如果是，则新增，否则更新。保证只有一条纪录
			$this->load->model('Auth_model','auth',true);
			if($this->auth->getCount(array('authkey'=>$post['mobile']))>0){
				//update
				$field['authcode'] = $code;
				$field['expire'] = time()+600;
				$flag = $this->auth->updateRecord($field,array('authkey'=>$post['mobile']));
			}else{
				//insert
				$field['authkey'] = $post['mobile'];
				$field['authcode'] = $code;
				$field['expire'] = time()+600;
				$flag = $this->auth->addRecord($field);
			}
			if ($flag){
				//auth用来注册时验证
				output(array('code'=>1,'msg'=>'Send successful !','auth'=>md5('67Y&s9'.$post['mobile'].'*y7U'.$code.'0J1g')));
			}else{
				output(array('code'=>-3,'msg'=>'Send failing !'));
			}
			
		}else{
			//发送失败
			output(array('code'=>-2,'msg'=>'Send failing !'));
		}
		/*
		if($result ==0 )
		{
			echo '短信发送成功,等待审核!<br/>';
		}else if($result == 1)
		{
			echo '短信发送成功<br/>';
		}
		else{
			echo '短信发送失败'. $result.'<br/>';
		}*/
		
	}
	
	
	/**
	 * 手机验证码，找回密码
	 */
	public function sendforgetcode(){
		//检测调用域名
	
	
		//手机号，post
		$post = $this->input->post();
		//$post['mobile'] = '18651948985';
		$code = mt_rand(100000, 999999);
		//判断手机号是否已注册
		$this->load->model('Member_model','m',true);
		if($this->m->getCount(array('mobile'=>$post['mobile'],'isdel'=>0))<=0){
			//手机号不存在
			output(array('code'=>-1,'msg'=>'Mobile No does not exist !'));
		}
	
		$sms = $this->config->item('sms');
		$client = new SoapClient('http://mb345.com:999/ws/LinkWS.asmx?wsdl',array('encoding'=>'UTF-8'));
		$sendParam = array(
				'CorpID'=>$sms['uid'],
				'Pwd'=>$sms['passwd'],
				'Mobile'=>$post['mobile'],
				'Content'=>"您正在使用密码找回功能。验证码是：{$code}。请不要把验证码泄露给其他人。如非本人操作，可忽略。【TATSUKO YANO original】",
				'Cell'=>'',
				'SendTime'=>''
						);
		$result = $client->BatchSend($sendParam);
		$result = $result->BatchSendResult;
		
		//$result = 1;//测试
		if($result == 1){
			//保存数据库，判断是否第一次发送，如果是，则新增，否则更新。保证只有一条纪录
			$this->load->model('Auth_model','auth',true);
			$authkey = $post['mobile'].'forget';
			if($this->auth->getCount(array('authkey'=>$authkey))>0){
				//update
				$field['authcode'] = $code;
				$field['expire'] = time()+600;
				$flag = $this->auth->updateRecord($field,array('authkey'=>$authkey));
			}else{
				//insert
				$field['authkey'] = $authkey;
				$field['authcode'] = $code;
				$field['expire'] = time()+600;
				$flag = $this->auth->addRecord($field);
			}
			if ($flag){
				//auth用来注册时验证
				output(array('code'=>1,'msg'=>'Send successful !','auth'=>md5('67Y&s9'.$post['mobile'].'*check'.$code.'0J1g')));
			}else{
				output(array('code'=>-3,'msg'=>'Send failing !'));
			}
				
		}else{
			//发送失败
			output(array('code'=>-2,'msg'=>'Send failing !'));
		}
	
	}
	
	
	
	
	
	
	/**
	 * 忘记密码
	 */
	public function forgethelp(){
		$data ['contentpage'] = 'home-forget-help.php';
        $data ['seo_title'] = "TATSUKO YANO original";
        $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
        $data ['seo_description'] = "TATSUKO YANO original Description";

        $this->load->view ( 'tpl', $data );
	}
	
	/**
	 * 验证手机号
	 */
	public function forgetcheck(){
		$post = $this->input->post();
		if(empty($post)){
			$data ['contentpage'] = 'home-forget-check.php';
            $data ['seo_title'] = "TATSUKO YANO original";
            $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
            $data ['seo_description'] = "TATSUKO YANO original Description";

            $this->load->view ( 'tpl', $data );
		}else{
			//验证code
			if($post['mobile'] == '' || $post['authcode'] == '' || $post['inputcode'] == ''){
				showFrontendNotice('Information is wrong','javascript:history.go(-1);',4);
			}
				
			//验证手机号是否已注册
			$this->load->model('Member_model','m',true);
			if($this->m->getCount(array('mobile'=>$post['mobile'],'isdel'=>0))<=0){
				showFrontendNotice('Mobile No does not exist','javascript:history.go(-1);',4);
			}
				
			//验证码
			$this->load->model('Auth_model','auth',true);
			$authinfo = $this->auth->getRecord('*',array('authkey'=>$post['mobile'].'forget'))->result_array();
			if(empty($authinfo) || $authinfo[0]['expire']<time() || $post['inputcode']!=$authinfo[0]['authcode'] || $post['authcode']!=md5('67Y&s9'.$post['mobile'].'*check'.$authinfo[0]['authcode'].'0J1g')){
				showFrontendNotice('Auth code error','javascript:history.go(-1);',4);
			}
			
			//删除验证码记录
			$this->auth->deleteRecord(array('id'=>$authinfo[0]['id']));
			
			//生成验证code
			$memberlist = $this->m->getRecord('*',array('mobile'=>$post['mobile']))->result_array();
			$timestamp = time();
			$c = md5('sd*lK9'.$memberlist[0]['id'].'llDd(*d2'.$timestamp);
			redirect(site_url('home/forgetset/'.$memberlist[0]['id'].'/'.$timestamp.'/'.$c));
			//showFrontendNotice('注册成功!',site_url('home/forgetset/'.$memberlist[0]['id'].'/'.$timestamp.'/'.$c),3);
			
		}
	}
	
	/**
	 * 设定密码
	 */
	public function forgetset(){
		$memberid = $this->uri->segment(3);
		$post = $this->input->post();
		if(empty($post)){
			$timestamp = $this->uri->segment(4);
			$code = $this->uri->segment(5);
			if($memberid && $timestamp){
				//验证code
				if(md5('sd*lK9'.$memberid.'llDd(*d2'.$timestamp) == $code){
					//验证有效期
					if(time()<$timestamp+600){
						//加载页面
						$data['memberid'] = $memberid;
						$data ['contentpage'] = 'home-forget-set.php';
                        $data ['seo_title'] = "TATSUKO YANO original";
                        $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
                        $data ['seo_description'] = "TATSUKO YANO original Description";

                        $this->load->view ( 'tpl', $data );
					}else{
						showFrontendNotice('Illegal request','javascript:history.go(-1);',4);
					}
				}else{
					showFrontendNotice('Illegal request','javascript:history.go(-1);',4);
				}
			}else{
				showFrontendNotice('Illegal request','javascript:history.go(-1);',4);
			}
		}else{
			//设置密码
			$this->load->model('Member_model','m',true);
			if($this->m->updateRecord(array('password'=>md5($post['password'])),array('id'=>$memberid))){
				redirect(site_url('home/forgetsuccess'));
				//showFrontendNotice('修改成功!',site_url('home/login'),3);
			}else{
				showFrontendNotice('failure','javascript:history.go(-1);',4);
			}
		}
		
			
	}
	
	/**
	 * 设置密码成功页面
	 */
	public function forgetsuccess(){
		$data ['contentpage'] = 'home-forget-success.php';
        $data ['seo_title'] = "TATSUKO YANO original";
        $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
        $data ['seo_description'] = "TATSUKO YANO original Description";

        $this->load->view ( 'tpl', $data );
	}
	
	
	/**
	 * 验证手机验证码
	 */
	public function mobileauth(){
		
	}
	
	/**
	 * 
	 * 生成验证码
	 * @param	$authcode		验证码
	 *
	 */
	public function authcode(){
		$authcode = $this->uri->segment(3);
		header ( 'Content-type: image/png' );
		// 创建图片
		$im = imagecreate ( $x = 116, $y = 38 );
		$bg = imagecolorallocate ( $im, rand ( 50, 200 ), rand ( 0, 155 ), rand ( 0, 155 ) ); // 第一次对 imagecolorallocate() 的调用会给基于调色板的图像填充背景色
		$fontColor = imageColorAllocate ( $im, 255, 255, 255 ); // 字体颜色
		$left = 10;
		for ($i = 0; $i < 4; $i++) {
			$code = substr($authcode, $i,1);
			imagettftext ( $im, 20, rand ( 0, 10 ) - rand ( 0, 15 ), $left,28, $fontColor, FCPATH.'t1.ttf', $code );
			$left += 25;
		}
		// 干扰线
		for($i = 0; $i < 8; $i ++) {
			$lineColor = imagecolorallocate ( $im, rand ( 0, 255 ), rand ( 0, 255 ), rand ( 0, 255 ) );
			imageline ( $im, rand ( 0, $x ), 0, rand ( 0, $x ), $y, $lineColor );
		}
		// 干扰点
		for($i = 0; $i < 250; $i ++) {
			imagesetpixel ( $im, rand ( 0, $x ), rand ( 0, $y ), $fontColor );
		}
		imagepng ( $im );
		imagedestroy ( $im );
	}
	
	
	/**
	 * Online Risk Test
	 */
	public function risk(){
		$this->config->load('online',true);
		$data['tzljcdoption'] = $this->config->item('tzljcdoption','online');
		$data['jtfdoption'] = $this->config->item('jtfdoption','online');
		$data['zyqkoption'] = $this->config->item('zyqkoption','online');
		$data['tzjyoption'] = $this->config->item('tzjyoption','online');
		$data['syysoption'] = $this->config->item('syysoption','online');
		$data['zytzoption'] = $this->config->item('zytzoption','online');
		$post = $this->input->post();
		$fields = array();
		
		
		if(empty($post)){
			//banner
			$this->load->model('Ads_model','ads',true);
			$data['adslist'] = $this->ads->getRecord('*',array('key'=>'online','title !='=>'','pic !='=>''),'listorder desc')->result_array();
			
			$frontend = $this->session->userdata('frontend');
			if($frontend && $frontend['is_login']){
				//获取手机号
				$this->load->model('member_model','m',true);
				$memberlist = $this->m->getRecord('*',array('id'=>$frontend['memberid']))->result_array();
				$fields['name'] = $memberlist[0]['nickname'];
				if(!empty($memberlist)){
					$fields['mobile'] = $memberlist[0]['mobile'];
				}else{
					$fields['mobile'] = '';
				}
			}else{
				$fields['name'] = '';
				$fields['mobile'] = '';
			}
				
			$data['fields'] = $fields;
			
			
			$data ['contentpage'] = 'home-risk.php';
            $data ['seo_title'] = "TATSUKO YANO original";
            $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
            $data ['seo_description'] = "TATSUKO YANO original Description";

            $this->load->view ( 'tpl', $data );
		}else{
			unset($post['x']);
			unset($post['y']);
				
			$data['fields'] = $post;
			$str = $this->load->view('home-risk-tpl',$data,true);
			
			//echo $str;exit;
			
			$fields['name'] = $post['name'];
			$fields['contact'] = $post['mobile'];
			$fields['answer'] = serialize($post);
			$fields['createtime'] = time();
			$fields['type'] = 1;
			$fields['html'] = $str;
				
			$this->load->model('survey_model','s',true);
			$id = $this->s->addRecord($fields);
			if($id){
				$this->load->model('isystem_model','sys',true);
				$systeminfo = $this->sys->getRecord('*',array('key'=>'service_email'))->result_array();
				$toemail = $systeminfo[0]['value'];
				//发邮件
				if($this->_sendemail($toemail,'Online risk test',$str)){
					showFrontendNotice('success',site_url('home/risk'),3);
				}else{
					showFrontendNotice('failure','javascript:history.go(-1);',4);
				}
			}else{
				showFrontendNotice('failure','javascript:history.go(-1);',4);
			}
		}
	}
	
	
	/**
	 * Online Asset Allocation
	 */
	public function asset(){
		$this->config->load('online',true);
		$data['shouruoption'] = $this->config->item('shouruoption','online');
		$data['hangyeoption'] = $this->config->item('hangyeoption','online');
		$data['shanyangoption'] = $this->config->item('shanyangoption','online');
		$data['cjtzcpoption'] = $this->config->item('cjtzcpoption','online');
		$data['tzgzwtoption'] = $this->config->item('tzgzwtoption','online');
		$data['tzzxlyoption'] = $this->config->item('tzzxlyoption','online');
		$post = $this->input->post();
		$fields = array();
		
		if(empty($post)){
			//banner
			$this->load->model('Ads_model','ads',true);
			$data['adslist'] = $this->ads->getRecord('*',array('key'=>'online','title !='=>'','pic !='=>''),'listorder desc')->result_array();
			
			
			//配置需显示的项
				
			$frontend = $this->session->userdata('frontend');
			if($frontend && $frontend['is_login']){
				//获取手机号
				$this->load->model('member_model','m',true);
				$memberlist = $this->m->getRecord('*',array('id'=>$frontend['memberid']))->result_array();
				$fields['name'] = $memberlist[0]['nickname'];
				if(!empty($memberlist)){
					$fields['mobile'] = $memberlist[0]['mobile'];
				}else{
					$fields['mobile'] = '';
				}
			}else{
				$fields['name'] = '';
				$fields['mobile'] = '';
			}
			
			$data['fields'] = $fields;
			
			$data ['contentpage'] = 'home-asset.php';
            $data ['seo_title'] = "TATSUKO YANO original";
            $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
            $data ['seo_description'] = "TATSUKO YANO original Description";

            $this->load->view ( 'tpl', $data );
		}else{
			unset($post['x']);
			unset($post['y']);
				
			//print_r($post);
			//exit;
			$data['fields'] = $post;
			$str = $this->load->view('home-asset-tpl',$data,true);
			
			//echo $str;exit;
			
			$fields['name'] = $post['name'];
			$fields['contact'] = $post['mobile'];
			$fields['answer'] = serialize($post);
			$fields['createtime'] = time();
			$fields['type'] = 2;
			$fields['html'] = $str;
				
			$this->load->model('survey_model','s',true);
			$id = $this->s->addRecord($fields);
			if($id){
				$this->load->model('isystem_model','sys',true);
				$systeminfo = $this->sys->getRecord('*',array('key'=>'service_email'))->result_array();
				$toemail = $systeminfo[0]['value'];
				//发邮件
				if($this->_sendemail($toemail,'Online asset allocation',$str)){
					showFrontendNotice('success',site_url('home/asset'),3);
				}else{
					showFrontendNotice('failure','javascript:history.go(-1);',4);
				}
			}else{
				showFrontendNotice('failure','javascript:history.go(-1);',4);
			}
		}
	}
	
	/**
	 * Online Booking
	 */
	public function subscribe(){
		$this->config->load('online',true);
		$data['product'] = $this->config->item('product','online');
		$post = $this->input->post();
		$fields = array();
		if(empty($post)){
			
			//banner
			$this->load->model('Ads_model','ads',true);
			$data['adslist'] = $this->ads->getRecord('*',array('key'=>'online','title !='=>'','pic !='=>''),'listorder desc')->result_array();
			
			//配置需显示的项
			
			$frontend = $this->session->userdata('frontend');
			if($frontend && $frontend['is_login']){
				//获取手机号
				$this->load->model('member_model','m',true);
				$memberlist = $this->m->getRecord('*',array('id'=>$frontend['memberid']))->result_array();
				$fields['name'] = $memberlist[0]['nickname'];
				if(!empty($memberlist)){
					$fields['mobile'] = $memberlist[0]['mobile'];
				}else{
					$fields['mobile'] = '';
				}
			}else{
				$fields['name'] = '';
				$fields['mobile'] = '';
			}
			
			
			
			$data['fields'] = $fields;
			$data ['contentpage'] = 'home-subscribe.php';
            $data ['seo_title'] = "TATSUKO YANO original";
            $data ['seo_keywords'] = "TATSUKO YANO original Keywords";
            $data ['seo_description'] = "TATSUKO YANO original Description";

            $this->load->view ( 'tpl', $data );
		}else{
			unset($post['x']);
			unset($post['y']);
			
			//print_r($post);
			$data['fields'] = $post;
			$str = $this->load->view('home-subscribe-tpl',$data,true);
			
			$fields['name'] = $post['name'];
			$fields['contact'] = $post['mobile'];
			$fields['answer'] = serialize($post);
			$fields['createtime'] = time();
			$fields['type'] = 3;
			$fields['html'] = $str;
			
			$this->load->model('survey_model','s',true);
			$id = $this->s->addRecord($fields);
			if($id){
				$this->load->model('isystem_model','sys',true);
				$systeminfo = $this->sys->getRecord('*',array('key'=>'service_email'))->result_array();
				$toemail = $systeminfo[0]['value'];
				//发邮件
				if($this->_sendemail($toemail,'Online booking',$str)){
					showFrontendNotice('success',site_url('home/subscribe'),3);
				}else{
					showFrontendNotice('failure','javascript:history.go(-1);',4);
				}
			}else{
				showFrontendNotice('failure','javascript:history.go(-1);',4);
			}
		}
	}
	
	
	public function lala(){
		$post = $this->input->post();
		if(empty($post)){
			$post['abc'] = '';
			$post['sex'] = '';
			$data['option'] = array('0'=>'Please select','1'=>'Male','2'=>'Female');
			$data['post'] = $post;
			$this->load->view ( 'home-test', $data );
		}else{
			$data['post'] = $post;
			$data['option'] = array('0'=>'Please select','1'=>'Male','2'=>'Female');
			//print_r($data);
			echo $this->load->view('home-test',$data,true);
		}
	}
	
	
	/**
	 * 发送邮件
	 * @param unknown $to
	 * @param unknown $subject
	 * @param unknown $content
	 * @return boolean
	 */
	public function _sendemail($to,$subject,$content){
		$emailconfig = $this->config->item ( 'email' );
		$this->load->library ( 'email', $emailconfig );
		$this->email->from ( $emailconfig ['smtp_user'], 'TATSUKO YANO original' );
		$this->email->to ( $to );
		
		$this->email->subject ( $subject );
		$this->email->message ( $content );
		
		if ($this->email->send ()) {
			return true;
		} else {
			echo $this->email->print_debugger ();
			exit();
			return false;
		}
				
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
