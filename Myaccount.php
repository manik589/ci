<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myaccount extends CI_Controller {

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
  public function __construct()    
 {
   parent::__construct();
   $sess_id = $this->session->userdata('users_info');  $this->CI = & get_instance();   
    $this->CI->load->model('common');
   
 }

  public function index() {	  
  $head->user_info = $dataa->user_info = $this->session->userdata('users_info');       
  if(empty($head->user_info)){redirect(base_index_url().'login');}
  $this->load->view('header',$head);     
  
  $this->load->view('content/membership',$dataa);	    
  $this->load->view('footer',$js); 	   	   
  $this->session->unset_userdata('msg'); 
		
    }
/***** membership *********/ 	

 public function membership() {	  
 $head->heading = 'Membership';
  $head->user_info = $dataa->user_info = $this->session->userdata('users_info');       
  if(empty($head->user_info)){redirect(base_index_url().'login');}
  $this->load->view('header',$head);     
  
  $this->load->view('content/membership',$dataa);	    
  $this->load->view('footer',$js); 	   	   
  $this->session->unset_userdata('msg'); 
		
    }

}
