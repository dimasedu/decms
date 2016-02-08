<?php

class Modslideshow extends CI_Controller{

    function __construct()
    {
    	parent::__construct();
    	saya_masuk();
    	saya_admin();
    	$this->load->model('m_slideshow','slide');
    }


    function index()
    {
    	if(!isset($_POST['submit'])){
    		$data['query'] = $this->slide->get_slide();

    		$this->load->view('head');
    		$this->load->view('modslideshow/slideshow_view', $data);
    		$this->load->view('foot');
    	}else{

    		$slide1 = $this->input->post('slide1');
    		$text1 = $this->input->post('text1');
    		$slide2 = $this->input->post('slide2');
    		$text2 = $this->input->post('text2');
    		$slide3 = $this->input->post('slide3');
    		$text3 = $this->input->post('text3');
    		$slide4 = $this->input->post('slide4');
    		$text4 = $this->input->post('text4');
    		$slide5 = $this->input->post('slide5');
    		$text5 = $this->input->post('text5');
            $now = date('Y-m-d');

            $data = array(
                'slide1'=>$slide1,
                'text1'=>$text1,
                'slide2'=>$slide2,
                'text2'=>$text2,
                'slide3'=>$slide3,
                'text3'=>$text3,
                'slide4'=>$slide4,
                'text4'=>$text4,
                'slide5'=>$slide5,
                'text5'=>$text5,
                'input_date'=>$now
                );

            $this->slide->simpan_slide($data,1);

            $this->session->set_flashdata('pesan','<div id="pesan" class="alert alert-success"><b>Sukses!</b> Data berhasil disimpan</div>');
            redirect('modslideshow');
    	}
    }
//end of class

}    