<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function test(){
		echo "This is a test page.";
		file_get_contents("/license.txt");
		echo "read over<br />";
		file_put_contents("/abc.txt", "123");
		echo "page over";
	}
	
	
	public function hello(){
		echo '<pre>';
		print_r($this->session->all_userdata());
		echo '</pre>';
		$f = $this->session->userdata('frontend');
		if($f && $f['is_login']){
			echo 'frontend login success';
		}else{
			echo 'frontend login fail';
		}
	}
	
	public function login(){
		$arr['frontend'] = array('is_login'=>true,'username'=>'frontend');
		$this->session->set_userdata($arr);
	}
	
	public function logout(){
		$this->session->unset_userdata('frontend');
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */