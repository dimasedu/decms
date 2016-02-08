<?php

class Setting extends CI_Controller{

    function __construct()
    {
    	parent::__construct();
    	saya_masuk();
        saya_admin();
    }


    function index()
    {
    	$this->form_validation->set_rules('nama','Site Name','required|trim');
        $this->form_validation->set_rules('deskripsi','Description','required|trim');
        $this->form_validation->set_rules('front','Front Text','required|trim');
        $this->form_validation->set_rules('telp','Call Number','required|trim');
        $this->form_validation->set_rules('alamat','Address','required|trim');
        $this->form_validation->set_rules('email','Email Admin','required|valid_email');
        $this->form_validation->set_error_delimiters('<span class="label label-danger">','</span>');


    	if($this->form_validation->run() == FALSE){
    		$data['query'] = $this->m_setting->ambil_setting();

    		$this->load->view('head');
    		$this->load->view('setting/setting_view', $data);
    		$this->load->view('foot');
    	
    	}else{
    		$nama = $this->input->post('nama');
    		$deskripsi = $this->input->post('deskripsi');
            $front = $this->input->post('front');
            $telp = $this->input->post('telp');
            $alamat = $this->input->post('alamat');
            $featuredimage = $this->input->post('featuredimage');
            $online = $this->input->post('online');
            $adminemail = $this->input->post('email');

    		$data = array(
    			'site_name'=>$nama,
    			'address'=>$alamat,
                'description'=>$deskripsi,
                'callnumber'=>$telp,
                'address'=>$alamat,
                'front_text'=>$front,
    			'web_status'=>$online,
    			'admin_email'=>$adminemail,
    			'logo'=>$featuredimage
    			);

    		$this->m_setting->update_setting($data);
    		$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success!! </b>Your setting has been saved.</div>');
    		redirect('setting');
    	}
    }
//end of class	
}