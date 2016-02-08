<?php

if(!function_exists('saya_admin')){
	
	function saya_admin(){
		$CI =& get_instance();

		if($CI->session->userdata('role') <> "admin"){
			$CI->session->set_flashdata('pesan','<div class="alert alert-danger">Error! Anda bukan administrator anda tidak berhak mengakses halaman ini.</div>');
			redirect('auth/login','refresh');
		}
	}
}


if(!function_exists('saya_masuk')){

	function saya_masuk()
	{
		$CI =& get_instance();

		if($CI->session->userdata('isLogin') == FALSE){
			$CI->session->set_flashdata('pesan','<div class="alert alert-danger">Error! Anda belum login silahkan login dahulu.</div>');
			redirect('auth/login','refresh');
		}
	}
}