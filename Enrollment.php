<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enrollment extends CI_Controller {

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
   $this->CI = & get_instance();   
   $this->CI->load->model('users');   $this->CI->load->model('common');
   $sess_id = $this->session->userdata('users_info');

   if(empty($sess_id))
   {
       redirect(base_index_url().'login');

   }
   
 }
 public function index(){
     	 $data->user_info = $head->user_info = $this->session->userdata('users_info');
		 $this->js_file[] = asset_url().'js/custom.js';
		 $data->msg = $this->session->userdata('msg');
		 $data->heading = 'Admin Login';
		 $data->actionlink = base_index_url().'enrollment/fill_form';
		 $this->load->view('header',$head);		
		 $this->load->view('content/enrollment',$data); 
	     $this->load->view('footer'); 	
	 }
	 
	public function fill_form(){
		$current_user = $this->session->userdata('users_info');	
					$first_name = $this->input->post('first_name');	
						$middle_name = $this->input->post('middle_name');	
							$surname = $this->input->post('surname');	
								$dateofbirth = $this->input->post('dateofbirth');
										$gender = $this->input->post('gender');	
											$streetaddress = $this->input->post('streetaddress');	
												$town = $this->input->post('town');	
													$postcode = $this->input->post('postcode');	
														$mobile_phone = $this->input->post('mobile_phone');	
															$other_phone = $this->input->post('other_phone');	
																$email = $this->input->post('email');	
																		$australia = $this->input->post('australia');

																$country = $this->input->post('country');	
														if($australia != ''){	
																$born_country = $this->input->post('australia');
															}else{	
															$born_country = $this->input->post('country');
																	}	
														$other_languages = $this->input->post('other_languages');
														$languages = $this->input->post('languages');	
												 	if($other_languages=='english'){		
												 		$other_language = 'english';
												 				}	
													if($other_languages=='other'){		
													$other_language = $this->input->post('languages');	
														}		
											$language_proficiency = $this->input->post('language_proficiency');
											$aboriginal = $this->input->post('aboriginal');		
											$disability = $this->input->post('disability');		
											$highest_education = $this->input->post('highest_education');
											$school_name = $this->input->post('school_name');
											$still_in_School = $this->input->post('still_in_School');

											$successfull_qualification = $this->input->post('successfull_qualification');	
											$successfull_qualificationv_degree = $this->input->post('successfull_qualificationv_degree');	
												if($successfull_qualification == 'yes'){	
														$successQualification = @implode(",",$successfull_qualificationv_degree);	
															}else{		
																$successQualification = 'no';	
																 }
										 $current_employement = $this->input->post('current_employement');	
										 $current_employement = @implode(",",$current_employement);	
									     $reason_course = $this->input->post('reason_course');	
									     $reason_course = @implode(",",$reason_course);	
									     $data = array(	
									     	'firstname' => $first_name,
									     	'lastname' => $surname,	
									     	'middlename' => $middle_name,	
									     	'sex' => $gender,
									   		'address' => $streetaddress,
									   		'town' => $town,
									   	    'phone' => $mobile_phone,
									   	   	'otherphone' => $other_phone,	
									     	'born_country' => $born_country,	
									     	'languages' => $other_language,	
									        'language_proficiency' => $language_proficiency,
									        'aboriginal' => $aboriginal,	
									        'disability' => $disability,
									        'highest_education' => $highest_education,
									        'school_name' => $school_name,
									        'still_in_School' => $still_in_School,
									        'successfull_qualification' => $successQualification,
									        'current_employement' => $current_employement,
									        'reason_course' => $reason_course,	
									        'dob' => $dateofbirth,		
									         	);	
							$this->common->update('users',$current_user['id'],$data);
							$this->users->update_info($current_user['id']);	
							$this->session->set_userdata(array('msg'=>'You have successfully updated your enrollment.')); 
							redirect(base_index_url().'enrollment');		
	 } 
 
 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */