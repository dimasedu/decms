<?php

class Adminmedia extends CI_Controller{

    function __construct()
    {
    	parent::__construct();
    	saya_masuk();
    	saya_admin();
    	$this->load->model('m_media','media');
    }


    function index()
    {
    	$get = $this->db->get('media');
    	$config['base_url'] = site_url().'/media/index';
		$config['per_page'] = 30;
		$config['total_rows'] = $get->num_rows();
		$config['next_page'] = '&raquo;';
    	$config['prev_page'] = '&laquo;';

    	$this->pagination->initialize($config);

    	$data['halaman'] = $this->pagination->create_links();
    	$data['query'] = $this->media->show_media($config['per_page'], $this->uri->segment(3))->result();
    	$data['set'] = $this->m_setting->ambil_setting();

    	$this->load->view('head', $data);
    	$this->load->view('media/media_view', $data);
    	$this->load->view('foot');
    }



    function addmedia()
    {
    	$error = array('error' => '');

		$this->load->view('head');
		$this->load->view('media/media_add', $error);
		$this->load->view('foot');
    }


    function uploadmedia()
    {
    	$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '5000';
		$config['max_width']  = '2000';
		$config['max_height']  = '2000';
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload');
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('filename'))
		{
			$error = array('error' => $this->upload->display_errors('<div class="alert alert-warning">','</div>'));

			$this->load->view('head');
			$this->load->view('media/media_add', $error);
			$this->load->view('foot');
		}
		else
		{
			$data = $this->upload->data();
			$size = $data['file_size'];
			$name = $data['file_name'];
			$width = $data['image_width'];
			$height = $data['image_height'];
			$type = $data['file_type'];
			$now = date('Y-m-d H:i:s');

			$sql = array(
				'media_name'=>$name,
				'media_type'=>$type,
				'media_size'=>$size,
				'media_measure'=>$width." x ".$height,
				'input_date'=>$now
				);
			$this->media->save_media($sql);

			$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success!</b> The File has been uploaded and inserted into database.</div>');
			redirect('adminmedia/addmedia');
		}
    }


    function delete($id)
    {
    	if(!$id || empty($id)){
    		redirect('adminmedia');
    	}else{

    		$data = $this->media->get_media($id);

    		$filename = $data->media_name;

    		unlink('./uploads/'.$filename);

    		$this->media->delete_media($id);

    		$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success!</b> File has been permanent deleted.</div>');
			redirect('adminmedia');
    	}
    }

//end of class
}    
