<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	if (!function_exists('get_userdata')){
		function get_userdata($key){
			$CI =& get_instance();
			$CI->load->library('session');
			return $CI->session->userdata($key);
		}
	}
	if (!function_exists('set_userdata')){
		function set_userdata($key, $value){
			$CI =& get_instance();
			$CI->load->library('session');
			return $CI->session->set_userdata($key, $value);
		}
	}
	
	if (!function_exists('unset_userdata')){
		function unset_userdata($data){
			$CI =& get_instance();
			$CI->load->library('session');

			return $CI->session->unset_userdata($data);
		}
	}

	if (!function_exists('session_destroy')){
		function session_destroy(){
			$CI =& get_instance();
			$CI->load->library('session');
			return $CI->session->sess_destroy();
		}
	}
	
	if(!function_exists('CI_Controller')){
		function CI_Controller(){
			$CI = & get_instance();
			$CI->load->library('session');
			if($CI->session->userdata('CI_Controller'))
				return true;
			else
				return false;
		}
	}
        
?>