<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Model {

    function __construct() {
	$this->load->database();
    } 
	
	public function check_user($email,$password){
       if(!empty($email) && !empty($password)){
$query = $this->db->query("SELECT * FROM users WHERE email = ?", array($email));
$data =  $query->row_array();
if($query->num_rows()>0){
	

	if($data['password'] === $password ){

			$this->session->set_userdata(array('msg'=>'Login Successfull')); 
			$this->session->set_userdata(array('users_info'=>$data));
			return 'success';
		}else{
			$this->session->set_userdata(array('msg'=>'Wrong Password')); 
			return 'error';
			}
		}else{
			$this->session->set_userdata(array('msg'=>'Wrong Username')); 
			return 'error';
		}
		}else{
			$this->session->set_userdata(array('msg'=>'Wrong Information')); 
			return 'error';
	}
	
}
	
    public function get_user_info($user_id) {
        $query = $this->db->query("SELECT * FROM users WHERE id = ?", array($user_id));
        return $query->row_array();
    }

	public function update_info($user_id){
		$query = $this->db->query("SELECT * FROM users WHERE id = ?", array($user_id));
        $data =  $query->row_array();
		$this->session->set_userdata(array('users_info'=>$data));
	}
	
	public function formail($email){
		$query = $this->db->query("SELECT * FROM users WHERE email = ?", array($email));
        return $query->row_array();
		}
		
	public function newpass($email,$postArray)
	{		
		
    $this->db->where('email',$email);	
		$this->db->update('users',$postArray);
     return $this->db->affected_rows();
 }  
}