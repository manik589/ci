<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function asset_url(){
   return base_url().'assets/';
}

function base_index_url(){
   return base_url().'index.php/';
}

function site_urls(){
   return base_url();
}
function home_url(){
	return base_url();
	
}

function send_email($creds){

	$tos = $creds['to'];
	$subject = $creds['subject'];
	$message = $creds['message'];
	$error = 0;
	$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";		
		$headers .= 'From: Iboxxz <info@iboxxz.com>' . "\r\n";
		foreach($tos as $to){
			
			if(mail($to,$subject,$message,$headers)){
				$error = 0;
			}else{
				$error = 1;
			}
			
		}
		
		if($error==0){
			return 'true';
		}else{
			return 'false';
		}
	
	
}

function classesName($id){
	$classes = array(1=>'First',2=>'Second',3=>'Third',4=>'Fourth',5=>'Fifth',6=>'Sixth',7=>"Seventh",8=>"Eight",9=>"Nine",10=>"Tenth");
	return ucfirst($classes[$id]);
	
}
