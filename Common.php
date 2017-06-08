<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Model {

  
    function __construct() {
	$this->load->database();
    }
	
	
	function form_insert($table,$data){
		$this->db->insert($table, $data);
		}
		
	public function checkEmail($Email){ 
		$this->db->select('*');
		$this->db->where('email',$Email);
		$query=$this->db->get('users');
		return $query->result();
	}		
		
	function fetchall($table){
		$records = $this->db->select('*')->get($table);
		return $records->result();
		}
		
		function fetchletest($table){
		$records = $this->db->select('*')
		->order_by('id', 'DESC')
		->limit(6)
		->get($table);
		return $records->result();
		}
		
	function fetchallWhere($table,$data){
		$record = $this->db->get_where($table,$data);
		return $record->result();
		}		
function fetchResult($table,$data,$field,$asc, $limit, $offset){
	
 $query = $this->db->order_by($field, $asc)->get_where($table, $data, $limit, $offset);
//$this->db->order_by($field, $asc);
	//$query = $this->db->get();
	return $query->result();
}	
	
	function get_row($table,$data){
		$record = $this->db->get_where($table,$data);
		return $record->result();
		
		}	
		
	function update($table,$id,$data){
		
		$this->db->where('id', $id);
		$this->db->update($table, $data);

		}

function get_row_of_table($tbl,$data){
		$record = $this->db->get_where($tbl,$data);
		return $record->row_array();
		
		}
		
function delete_row($table,$data){
		$this->db->delete($table, $data); 
	}		


	
function count_rows($table,$query){
	
		$regUsers = "SELECT count(*) as totalRecords FROM ".$table." WHERE ".$query;
		$RegisteredUsers = $this->db->query($regUsers);
		$RegisteredUsers = $RegisteredUsers->result_array();
		return $RegisteredUsers;
}

function game_winner($boxid,$gameid){
	
		$this->db->select('email');
		$this->db->from('users');
		$this->db->join('game_play', 'game_play.user_id = users.id');
		$this->db->where('game_play.box_id', $boxid);
		$this->db->where('game_play.game_id', $gameid);
		$winningUser = $this->db->get()->result();
		return $winningUser;
}

function course_detail($table,$id){
	
	    $this->db->select('*');
		$this->db->where('id',$this->db->escape_str($id));
		$row = $this->db->get($this->db->escape_str($table));
		return $row->row();
}

public function get_where($table,$field,$value){
	  
	   $this->db->select('*');
	   $this->db->from($table);

       $this->db->where($field,$value);
       $query = $this->db->get();
       $row = $query->row_array();
       return $row;

}
public function choice_selectall($table,$sel,$whr)
{       
 
	   $this->db->select($sel);
	    $this->db->from($table);
		if($whr) {
		$this->db->where($whr['field'], $whr['value']);
		}
	  $records = $this->db->get()->result();
		return $records;

}
public function choice_selectall_arr($table,$sel,$whr)
{       
 
	   $this->db->select($sel);
	    $this->db->from($table);
		if($whr) {
		$this->db->where($whr['field'], $whr['value']);
		}
	  $records = $this->db->get()->result_array();
		return $records;

}
 
 public function getCourseName($courseId)
 {
	 $this->db->select('title');
	 $this->db->from('cources');

     $this->db->where('id',$courseId);
     $query = $this->db->get();
     $row = $query->row_array();
     return $row;
 }
  public function CourseInfo($user_id,$courseId)
 {
	 $this->db->select('*');
	 $this->db->from('user_courses');

     $this->db->where('user_id',$user_id);
     $this->db->where('course_id',$courseId);
     $query = $this->db->get();
     $row = $query->row_array();
     return $row;
 }

	function update_result($table,$user_id1 ,$id,$data){
		
		$this->db->where('user_id', $user_id1);
		$this->db->where('test_id', $id);
		$this->db->update($table, $data);

		}
	function update_user_courses($table,$user_id1 ,$id,$data1){
		
		$this->db->where('user_id', $user_id1);
		$this->db->where('course_id', $id);
		$this->db->update($table, $data1);

		}
	
}