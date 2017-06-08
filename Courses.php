<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller {

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
$userInfo = $this->session->userdata('user_info');
/* if(empty($userInfo)){	$this->session->set_userdata(array('msg'=>'Session has expired.')); 
	redirect(base_index_url().'home');} */  
   $this->CI = & get_instance();   
   $this->CI->load->model('users');
   $this->CI->load->model('common');
 }

  public function index() {	  
  $head->user_info = $this->session->userdata('users_info');	

$dataa->courses =  $this->CI->common->fetchall('cources');    
  $head->heading = 'All Courses';       
  $this->load->view('header',$head);	   /*$this->load->view('slider');*/ 	   
  $this->load->view('content/courses',$dataa); 	   
  $this->load->view('footer');
    }
 public function details($id){
		
	$head->user_info = $this->session->userdata('users_info');
	 $user_id=$head->user_info['id'];

    $CourseInfo =  $this->CI->common->CourseInfo($user_id,$id); 
    // print_r($CourseInfo);?

    if ($CourseInfo) {
    	// echo $CourseInfo['course_expire']."hhh111";
    	 if($CourseInfo['course_expire']=="x")
    	             {
    	              $dataa->CourseInfo= $CourseInfo['course_expire'];
    	              }
    	    else {
    	    	     $dataa->CourseInfo= $CourseInfo['course_expire'];
    	    	 }
    
    	    }
    	else { 	 
    	$dataa->CourseInfo="x"; }
    // return;
    $dataa->course  =  $this->CI->common->course_detail('cources',$id); 
	$head->heading = "Course Details";
    $this->load->view('header',$head);
	$this->load->view('content/course_details',$dataa);
	$this->load->view('footer');
	
	}
	public function my_courses($id){
            $head->user_info = $this->session->userdata('users_info');
			$userInfo = $this->session->userdata('user_info');
			 $id=$head->user_info['id']; 
			//  	echo "<pre>";
			// print_r($head->user_info);
			// echo $id;;
   //          echo "</pre>";
		    $this->db->select('user_id,course_id');
			$this->db->from('user_courses'); 
		 $where = "(user_id=$id AND course_expire ='')";
          $this->db->where($where);
			// $this->db->where('user_id', $id );  
			// $this->db->where('course_expire', $id );  
            $query = $this->db->get();
			$course =  $query->result();
			 foreach ($course as $key => $value) {
			 	 $stdCourses[] =  $this->CI->common->get_where('cources','id',$value->course_id); 
			    }
			$dataa->active_courses=$stdCourses;
			$head->heading = 'My Course';     
			$this->load->view('header',$head);	 
			$this->load->view('content/my_courses',$dataa); 	
			$this->load->view('footer');	
		

	
	}	
		
	 public function MyCourseDetails($id){
		     $id1=$id;
 			$head->user_info = $this->session->userdata('users_info');
		  
		    $dataa->course  =  $this->CI->common->course_detail('cources',$id);
            $sel="*";		
			$where1['field']='course_id';
			$where1['value']=$id;
		    $dataa->Cvideos  =  $this->CI->common->choice_selectall('course_videos',$sel,$where1); 
			$where2['field']='classes';
			$where2['value']=$id;
		   $result  =  $this->CI->common->choice_selectall_arr('test',$sel,$where2); 
			$dataa->testid=$result[0]['id'];
			$dataa->c_id=$id1;
			// echo $dataa->testid;
			 // echo '<pre>'; 
			 // print_r( $dataa->testid);
			 // echo '</pre>';
			 // return;
			$head->heading = "Course Details";
		    $this->load->view('header',$head);
			$this->load->view('content/mycourse_details',$dataa);
			$this->load->view('footer');
	
	}
	 public function vd($id){
		 
			$head->user_info = $this->session->userdata('users_info');
		  $this->load->view('header',$head);
			$this->load->view('content/videolist',$dataa);
			$this->load->view('footer');
		 
	 }
	 	 public function failure(){
    		$this->load->view('header',$head);
			$this->load->view('content/failure',$dataa);
			$this->load->view('footer');
		 
	 } 
	 	 public function success(){
    		$this->load->view('header',$head);
			$this->load->view('content/success',$dataa);
			$this->load->view('footer');
		 
	 }
	 /*-----------------------test area ---------------------*/

	public function my_courses2($id){



            $head->user_info = $this->session->userdata('users_info');
			$userInfo = $this->session->userdata('user_info');
			 $id=$head->user_info['id'];
			//  	echo "<pre>";
			// print_r($head->user_info);
			// echo $id;;
   //          echo "</pre>";
		    $this->db->select('user_id,course_id');
			$this->db->from('user_courses'); 
		 $where = "(user_id=$id AND course_expire ='')";
          $this->db->where($where);
			// $this->db->where('user_id', $id );  
			// $this->db->where('course_expire', $id );  
            $query = $this->db->get();
			$course =  $query->result();
			 foreach ($course as $key => $value) {
			 	 $stdCourses[] =  $this->CI->common->get_where('cources','id',$value->course_id); 
			    }
			$dataa->active_courses=$stdCourses;
			$head->heading = 'My Course';     
			$this->load->view('header',$head);	 
			$this->load->view('content/my_courses2',$dataa); 	
			$this->load->view('footer');	
		

	
	}



	 /*-----------------------test area ---------------------*/


		
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */